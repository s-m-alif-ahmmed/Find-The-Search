<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Challenge;
use App\Models\ChallengeImage;
use App\Models\ChallengeSubscriber;
use App\Models\ChallengeVote;
use App\Models\DashboardSlider;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Events\ChallengeEvent as ChallengeEvent;

class DashboardFrontendController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $notifications = Notification::where('notifiable_id', $user->id)->latest()->get();

        $announcements = Announcement::where('status', 'active')->latest()->get();

        $dashboard_sliders = DashboardSlider::where('status', 'active')->latest()->get();

        $all_challenges = Challenge::where('status', 'active')->with('challengeRules')->get();
        $challenges = Challenge::where('status', 'active')->with('challengeRules')->first();

        if (!$challenges) {
            return view('frontend.layouts.pages.pricing',compact('all_challenges'));
        }

        $user_challenge = ChallengeSubscriber::where('user_id',$user->id)->where('challenge_id',$challenges->id)->where('payment_status','paid')->first();

        if (!$user_challenge) {
            return view('frontend.layouts.pages.pricing',compact('all_challenges'));
        }

        if($user_challenge) {

            $challenge_images = ChallengeImage::where('challenge_id', $challenges->id)->where('user_id', $user->id)->get();

            // Current date
            $currentDate = now();

            // Start and end date of the challenge
            $startDate = Carbon::parse($challenges->start_date);
            $endDate = Carbon::parse($challenges->end_date);

            // Check if the current date is before start_date
            $challenge_exist_date = $currentDate >= $startDate;

            // Check if the current date is before end_date
            $challenge_finish_date = $currentDate <= $endDate;

            $day = $startDate->diffInDays(Carbon::parse($currentDate)) + 1; // Adding 1 so Day 1 is 1

            // Round to the nearest integer (if it’s like 4.324234, it will save as 4)
            $currentDay = round($day);

            // Check if the user has already uploaded an image for today
            $existingUpload = ChallengeImage::where('user_id', $user->id)
                ->where('challenge_id', $challenges->id)
                ->where('day', $currentDay)
                ->get();

            return view('frontend.layouts.dashboard.pages.index',compact(
                'all_challenges',
                'challenges',
                'user_challenge',
                'challenge_images',
                'existingUpload',
                'currentDay',
                'challenge_exist_date',
                'challenge_finish_date',
                'announcements',
                'dashboard_sliders',
                'notifications'
            ));
        } else{
            return view('frontend.layouts.pages.pricing',compact('all_challenges','notifications'));
        }

    }

    public function rank(Request $request): JsonResponse | View
    {
        $user = Auth::user();

        $notifications = Notification::where('notifiable_id', $user->id)->latest()->get();

        $all_challenges = Challenge::where('status', 'active')->with('challengeRules')->get();

        $challenges = Challenge::where('status', 'active')->with('challengeRules')->first();

        $user_challenge = ChallengeSubscriber::where('user_id',$user->id)->where('challenge_id',$challenges->id)->where('payment_status','paid')->first();

        $vote_users = ChallengeVote::with('vote_user')->where('user_id', $user->id)->where('challenge_id',$challenges->id)->latest()->get();

        $announcements = Announcement::where('status', 'active')->latest()->get();

        // Get all users who are subscribed to the active challenge and order them by vote count
        $users = User::whereHas('challengeSubscribers', function($query) use ($challenges) {
            $query->where('challenge_id', $challenges->id)
                ->where('payment_status', 'paid');
            })
            ->with(['challengeImages' => function($query) {
                $query->orderBy('created_at', 'asc');  // First uploaded image
            }])
            ->withCount(['challengeVotes as total_votes' => function($query) {
                $query->where('status', 'active'); // Count only active votes
            }])
            ->orderByDesc('total_votes') // Order by the total votes in descending order
            ->paginate(25);

        if ($request->ajax()) {
            $view = view('frontend.layouts.dashboard.pages.rank', compact('users'))->render();
            $pagination = $users->links()->render();
            return response()->json(['view' => $view, 'pagination' => $pagination]);
        }

        // Get top 3 users who are subscribed to the active challenge and order them by vote count
        $top_users = User::whereHas('challengeSubscribers', function($query) use ($challenges) {
            $query->where('challenge_id', $challenges->id)
                ->where('payment_status', 'paid');
            })
            ->with(['challengeImages' => function($query) {
                $query->orderBy('created_at', 'asc');  // First uploaded image
            }])
            ->withCount(['challengeVotes as total_votes' => function($query) {
                $query->where('status', 'active'); // Count only active votes
            }])
            ->orderByDesc('total_votes') // Order by the total votes in descending order
            ->take(3)
            ->get();

        // Calculate total votes for each user and format it
        foreach ($users as $user) {
            $voteCount = ChallengeVote::where('user_id', $user->id)->where('status', 'active')->count();

            // Format the vote count to display in "k" format for thousands
            if ($voteCount >= 1000) {
                $formattedVotes = number_format($voteCount / 1000, 1) . 'k';  // 17.5k format
            } else {
                $formattedVotes = $voteCount;  // No change if less than 1000
            }

            $user->total_votes = $formattedVotes;
        }

        // Current date
        $currentDate = Carbon::now('Asia/Dhaka');

        // Start and end date of the challenge
        $startDate = $user_challenge->challenge->vote_start_date;
        $endDate = $user_challenge->challenge->vote_end_date;

        // Check if the current date is before start_date
        $vote_start = $currentDate >= $startDate;
        $vote_end_date = $currentDate <= $endDate && $currentDate >= $startDate;

        return view('frontend.layouts.dashboard.pages.rank',[
            'top_user_1' => $top_users->get(0),
            'top_user_2' => $top_users->get(1),
            'top_user_3' => $top_users->get(2),
        ], compact(
            'vote_start',
            'vote_end_date',
            'all_challenges',
            'challenges',
            'users',
            'vote_users',
            'announcements',
            'notifications'
        ));
    }

    public function userProfile($id): View
    {
        // Fetch the user by their ID
        $user = User::findOrFail($id);  // This will return the user if found, or throw a 404 error if not found

        $notifications = Notification::where('notifiable_id', $user->id)->latest()->get();

        $challenges = Challenge::where('status', 'active')->with('challengeRules')->first();

        $challenge_images = ChallengeImage::where('challenge_id', $challenges->id)->where('user_id', $user->id)->get();

        // Pass the user data to the view
        return view('frontend.layouts.dashboard.pages.user-profile', compact('user', 'challenge_images','notifications'));
    }


    public function setting(): View
    {
        $user = Auth::user();

        $notifications = Notification::where('notifiable_id', $user->id)->latest()->get();

        return view('frontend.layouts.dashboard.pages.setting', compact('notifications'));
    }


}
