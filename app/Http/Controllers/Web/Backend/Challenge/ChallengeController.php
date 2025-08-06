<?php

namespace App\Http\Controllers\Web\Backend\Challenge;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\ChallengeRule;
use App\Models\ChallengeSubscriber;
use App\Models\ChallengeVote;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class ChallengeController extends Controller
{
    /**
     * Display a listing of dynamic page content.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View | JsonResponse {
        if ($request->ajax()) {
            $data = Challenge::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    $name = $data->name;
                    return $name;
                })
                ->addColumn('start_date', function ($data) {
                    $start_date = $data->start_date;
                    return $start_date;
                })
                ->addColumn('end_date', function ($data) {
                    $end_date = $data->end_date;
                    return $end_date;
                })
                ->addColumn('price_money', function ($data) {
                    $price_money = $data->price_money;
                    return $price_money;
                })

                ->addColumn('status', function ($data) {
                    $backgroundColor  = $data->status == "active" ? '#4CAF50' : '#ccc';
                    $sliderTranslateX = $data->status == "active" ? '26px' : '2px';
                    $sliderStyles     = "position: absolute; top: 2px; left: 2px; width: 20px; height: 20px; background-color: white; border-radius: 50%; transition: transform 0.3s ease; transform: translateX($sliderTranslateX);";

                    $status = '<div class="form-check form-switch" style="margin-left:40px; position: relative; width: 50px; height: 24px; background-color: ' . $backgroundColor . '; border-radius: 12px; transition: background-color 0.3s ease; cursor: pointer;">';
                    $status .= '<input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status" style="position: absolute; width: 100%; height: 100%; opacity: 0; z-index: 2; cursor: pointer;">';
                    $status .= '<span style="' . $sliderStyles . '"></span>';
                    $status .= '<label for="customSwitch' . $data->id . '" class="form-check-label" style="margin-left: 10px;"></label>';
                    $status .= '</div>';

                    return $status;
                })
                ->addColumn('leaderboard', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a href="' . route('challenge.index.leaderboard', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                Leader Board
                            </a>
                        </div>';
                })

                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="' . route('challenge.edit', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['name', 'start_date', 'end_date', 'price_money', 'status', 'leaderboard', 'action'])
                ->make();
        }
        return view('backend.layouts.challenge.index');
    }

    /**
     * Display a listing of dynamic page content.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function indexLeaderboard(Request $request, $id)
    {
        try {
            // Fetch the challenge
            $challenge = Challenge::findOrFail($id);

            // Fetch the challenge subscribers and load the necessary relationships
            if ($request->ajax()) {
                $subscribers = ChallengeSubscriber::with([
                    'user',
                    'user.challengeImages',
                    'user.challengeVotes' // Load the challenge votes for each user
                ])
                    ->where('challenge_id', $challenge->id)
                    ->get();

                // Map the data for DataTables
                $data = $subscribers->map(function ($subscriber) use ($challenge) {
                    $user = $subscriber->user;

                    // Count the votes for this user in the current challenge
                    $votesCount = $subscriber->user->challengeVotes()
                        ->where('challenge_id', $challenge->id)
                        ->where('status', 'active')
                        ->count();

                    // Get before and now images for the user
                    // Get before and now images for the user
                    $beforeImage = $subscriber->user->challengeImages()
                        ->where('status', 'active')
                        ->where('created_at', '<=', $challenge->end_date) // Get the image before the challenge started
                        ->orderBy('day', 'asc') // Order by created_at ascending to get the first image before the challenge
                        ->first();

                    $nowImage = $subscriber->user->challengeImages()
                        ->where('status', 'active')
                        ->where('created_at', '>', $challenge->start_date) // Get the image after the challenge started
                        ->orderBy('day', 'desc') // Order by created_at descending to get the latest image after the challenge
                        ->first();

                    $beforeImageUrl = $beforeImage ? asset($beforeImage->image) : asset('frontend/default-before-image.png');
                    $nowImageUrl = $nowImage ? asset($nowImage->image) : asset('frontend/default-now-image.png');

                    return [
                        'DT_RowIndex' => $subscriber->id, // Add index column for DataTables
                        'challenger' => '<img class="pe-2" src="' . ($user->avatar ? asset($user->avatar) : asset('frontend/profile-avatar.png')) . '" alt="Image" width="50px" height="50px">' . $user->first_name . ' ' . $user->last_name,
                        'email' => $user->email,
                        'before_image' => '<img src="' . $beforeImageUrl . '" alt="Before Image" width="50px" height="50px">',
                        'now_image' => '<img src="' . $nowImageUrl . '" alt="Now Image" width="50px" height="50px">',
                        'total_votes' => $votesCount
                    ];
                });
                // Return DataTables response
                return DataTables::of($data)
                    ->addIndexColumn() // Add an index column
                    ->rawColumns(['challenger', 'email', 'before_image', 'now_image', 'total_votes']) // Allow HTML in columns
                    ->make(true);
            }

            // If not an AJAX request, just return the view
            return view('backend.layouts.challenge.leaderboard', compact('challenge'));

        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching the leaderboard data.'], 500);
        }
    }

    /**
     * Show the form for creating a new dynamic page content.
     *
     * @return View
     */
    public function create(): View {
        return view('backend.layouts.challenge.create');
    }

    /**
     * Store a newly created dynamic page content in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse {
        try {
            $validator = Validator::make($request->all(), [
                'name'              => 'required|string|max:100',
                'start_date'        => 'required|date',
                'end_date'          => 'required|date|after:start_date',
                'entry_fee'         => 'required|numeric|min:0',
                'price_money'       => 'required|numeric|min:0',
                'vote_start_date'   => 'required|date|after:end_date',
                'vote_end_date'     => 'required|date|after:vote_start_date',
                'rules.*'           => 'required|string|max:255', // Each rule must be a string
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data                   = new Challenge();
            $data->name             = $request->name;
            $data->start_date       = $request->start_date;
            $data->end_date         = $request->end_date;
            $data->entry_fee        = $request->entry_fee;
            $data->price_money      = $request->price_money;
            $data->vote_start_date  = $request->vote_start_date;
            $data->vote_end_date    = $request->vote_end_date;
            $data->challenge_slug   = Str::slug($request->name);
            $data->save();

            // Store the rules related to this challenge
            foreach ($request->rules as $ruleText) {
                $rule = new ChallengeRule();
                $rule->challenge_id = $data->id; // Link the rule to the created challenge
                $rule->rule = $ruleText;
                $rule->save();
            }

            return redirect()->route('challenge.index')->with('t-success', 'Updated successfully');
        } catch (\Exception) {
            return redirect()->route('challenge.index')->with('t-success', 'Challenge failed created.');
        }
    }

    /**
     * Show the form for editing the specified dynamic page content.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View {
        $data = Challenge::find($id);

        // Check if the challenge exists, if not, redirect with an error
        if (!$data) {
            return redirect()->route('challenge.index')->with('t-error', 'Challenge not found');
        }

        // Get the rules for this challenge, return an empty collection if no rules are found
        $rules = $data->challengeRules()->get(); // This will be a collection, even if it's empty
        return view('backend.layouts.challenge.edit', compact('data', 'rules'));
    }

    /**
     * Update the specified dynamic page content in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse {
        try {
            $validator = Validator::make($request->all(), [
                'name'              => 'required|string|max:100',
                'start_date'        => 'required|date',
                'end_date'          => 'required|date|after:start_date',
                'entry_fee'         => 'required|numeric|min:0',
                'price_money'       => 'required|numeric|min:0',
                'vote_start_date'   => 'required|date|after:end_date',
                'vote_end_date'     => 'required|date|after:vote_start_date',
                'rules.*'           => 'required|string|max:255', // Each rule must be a string
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data                   = Challenge::findOrFail($id);
            $data->name             = $request->name;
            $data->start_date       = $request->start_date;
            $data->end_date         = $request->end_date;
            $data->entry_fee        = $request->entry_fee;
            $data->price_money      = $request->price_money;
            $data->vote_start_date  = $request->vote_start_date;
            $data->vote_end_date    = $request->vote_end_date;
            $data->challenge_slug   = Str::slug($request->name);
            $data->update();

            // Handle updating the rules
            // 1. Delete old rules if any
            $data->challengeRules()->delete();

            // 2. Add new rules if provided
            if ($request->has('rules') && is_array($request->rules)) {
                foreach ($request->rules as $rule) {
                    // Add each new rule
                    $data->challengeRules()->create([
                        'rule' => $rule
                    ]);
                }
            }

            return redirect()->route('challenge.index')->with('t-success', 'Challenge Updated Successfully.');

        } catch (\Exception) {
            return redirect()->route('challenge.index')->with('t-success', 'Challenge failed to update');
        }
    }

    /**
     * Change the status of the specified dynamic page content.
     *
     * @param int $id
     * @return JsonResponse
     */
//    public function status(int $id): JsonResponse {
//        $data = Challenge::findOrFail($id);
//        if ($data->status == 'active') {
//            $data->status = 'inactive';
//            $data->save();
//
//            return response()->json([
//                'success' => false,
//                'message' => 'Unpublished Successfully.',
//                'data'    => $data,
//            ]);
//        } else {
//            $data->status = 'active';
//            $data->save();
//
//            return response()->json([
//                'success' => true,
//                'message' => 'Published Successfully.',
//                'data'    => $data,
//            ]);
//        }
//    }

    public function status(int $id): JsonResponse {
        // Find the challenge by ID or fail
        $data = Challenge::findOrFail($id);

        // If we are changing the status from active to inactive
        if ($data->status == 'active') {
            $data->status = 'inactive';
            $data->save();

            return response()->json([
                'success' => false,
                'message' => 'Unpublished Successfully.',
                'data'    => $data,
            ]);
        } else {
            // Check if there is any other active challenge
            $activeChallenge = Challenge::where('status', 'active')->first();

            if ($activeChallenge) {
                // If there's already an active challenge, prevent the status change
                return response()->json([
                    'success' => false,
                    'message' => 'At a time, only one challenge can be active.',
                ]);
            }

            // If no other challenge is active, proceed to set this challenge as active
            $data->status = 'active';
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Published Successfully.',
                'data'    => $data,
            ]);
        }
    }


    /**
     * Remove the specified dynamic page content from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse {
        try {
            $data = Challenge::findOrFail($id);
            // Manually delete related ChallengeSubscriber records
            $data->challengeSubscribers()->delete();
            $data->challengeImages()->delete();
            $data->challengeVotes()->delete();
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Challenge deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the Challenge.',
            ]);
        }

    }



}
