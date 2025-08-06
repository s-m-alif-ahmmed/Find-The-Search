<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\ChallengeImage;
use App\Models\ChallengeSubscriber;
use App\Models\ChallengeVote;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    /**
     * Display the dashboard page.
     *
     * @return View
     */

    public function index(): View
    {
        $user = Auth::user();

        if (Auth::check() && $user->role == 'admin') {

            $total_users = User::where('role', 'user')->count();
            $total_challenges = Challenge::where('deleted_at', null)->count();
            $total_collected_amounts = ChallengeSubscriber::whereNotNull('entry_fee')->sum('entry_fee');
            $total_new_queries = Contact::where('status', 'inactive')->count();

            return view('backend.layouts.dashboard.index',compact(
                'total_users',
                'total_challenges',
                'total_collected_amounts',
                'total_new_queries',
            ));
        } elseif (Auth::check() && $user->role == 'user'){
            return redirect()->route('user.dashboard');
        } else{
            return redirect()->back();
        }
    }

    public function getChallengeData()
    {
        $challenges = Challenge::all(); // Get all challenges
        $challengeData = [];

        foreach ($challenges as $challenge) {
            $subscribers = $challenge->challengeSubscribers; // Fetch the subscribers for the current challenge
            $subscriberCount = $subscribers->count(); // Count subscribers
            $totalCollections = $subscribers->where('payment_status', 'paid')->sum('entry_fee'); // Sum of paid subscribers' entry fees

            $challengeData[] = [
                'name' => $challenge->name, // Challenge name
                'subscribers' => $subscriberCount,
                'collections' => $totalCollections,
            ];
        }

        return response()->json($challengeData);
    }

    public function challengers(Request $request): JsonResponse | View
    {
        if ($request->ajax()) {
            $data = ChallengeSubscriber::with('user', 'challenge')
                ->where('payment_status', 'paid')
                ->whereNull('deleted_at')
                ->latest()
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($data) {
                    return $data->created_at;
                })
                ->addColumn('challenge_name', function ($data) {
                    return $data->challenge->name;
                })
                ->addColumn('challenge_entry_fee', function ($data) {
                    return $data->entry_fee;
                })
                ->addColumn('name', function ($data) {
                    return $data->user->first_name . ' ' . $data->user->last_name;
                })
                ->addColumn('email', function ($data) {
                    return $data->user->email;
                })
                ->addColumn('avatar', function ($data) {
                    $defaultImage = asset('frontend/profile-avatar.png');
                    $url = $data->user->avatar ? asset($data->user->avatar) : $defaultImage;
                    return '<img src="' . $url . '" alt="Image" width="50px" height="50px">';
                })
                ->rawColumns(['avatar'])  // Make sure avatar is rendered as raw HTML
                ->make(true);  // Ensure the response is formatted for DataTables
        }

        return view('backend.layouts.challengers.index');
    }

    public function challengerImages(Request $request): JsonResponse | View
    {
        if ($request->ajax()) {
            $data = ChallengeImage::with('user', 'challenge')
                ->whereNull('deleted_at')
                ->latest()
                ->get();

            $dataTableResponse = DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($data) {
                    return $data->created_at;
                })
                ->addColumn('challenge_name', function ($data) {
                    return $data->challenge->name;
                })
                ->addColumn('day', function ($data) {
                    return $data->day;
                })
                ->addColumn('image', function ($data) {
                    $defaultImage = asset('frontend/profile-avatar.png');
                    $url = $data->image ? asset($data->image) : $defaultImage;
                    return '<img src="' . $url . '" alt="Image" width="50px" height="50px">';
                })
                ->addColumn('name', function ($data) {
                    return $name = $data->user->first_name . ' ' . $data->user->last_name;
                })
                ->addColumn('email', function ($data) {
                    return $data->user->email;
                })
                ->addColumn('avatar', function ($data) {
                    $defaultImage = asset('frontend/profile-avatar.png');
                    $url = $data->user->avatar ? asset($data->user->avatar) : $defaultImage;
                    return '<img src="' . $url . '" alt="Image" width="50px" height="50px">';
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                <i class="fe fe-trash"></i>
                            </a>
                        </div>';
                })
                ->rawColumns(['name','image', 'avatar', 'action'])
                ->make(true);

            return $dataTableResponse;
        }

        return view('backend.layouts.challenger-images.index');
    }

    public function challengerImagesDestroy(int $id): JsonResponse {
        $data = ChallengeImage::findOrFail($id);
        $data->delete();
        return response()->json([
            't-success' => true,
            'message'   => 'Deleted successfully.',
        ]);
    }

    public function challengeVotes(Request $request): JsonResponse | View
    {
        if ($request->ajax()) {
            $data = ChallengeVote::with('user', 'challenge')
                ->whereNull('deleted_at')
                ->latest()
                ->get();

            $dataTableResponse = DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($data) {
                    return $data->created_at;
                })
                ->addColumn('challenge_name', function ($data) {
                    return $data->challenge->name;
                })
                ->addColumn('challenger_name', function ($data) {
                    return $name = $data->user->first_name. ' ' . $data->user->last_name;
                })
                ->addColumn('challenger_email', function ($data) {
                    return $data->user->email;
                })
                ->addColumn('voter_name', function ($data) {
                    return $voter_name = $data->vote_user->first_name. ' ' .$data->vote_user->last_name;
                })
                ->addColumn('voter_email', function ($data) {
                    return $data->vote_user->email;
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                <i class="fe fe-trash"></i>
                            </a>
                        </div>';
                })
                ->rawColumns(['action'])
                ->make(true);

            return $dataTableResponse;
        }

        return view('backend.layouts.challenge-votes.index');
    }

    public function challengeVotesDestroy(int $id): JsonResponse {
        $data = ChallengeVote::findOrFail($id);
        $data->delete();
        return response()->json([
            't-success' => true,
            'message'   => 'Deleted successfully.',
        ]);
    }


}
