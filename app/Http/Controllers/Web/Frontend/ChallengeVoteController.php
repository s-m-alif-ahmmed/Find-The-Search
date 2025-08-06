<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ChallengeSubscriber;
use App\Models\ChallengeVote;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChallengeVoteController extends Controller
{
    public function store(Request $request, $userId)
    {
        // Get the current logged-in user (voter)
        $voter = auth()->user();

        // Prevent the user from voting for themselves
        if ($voter->id == $userId) {
            return response()->json(['message' => 'You cannot vote for yourself.'], 400);
        }

        // Find the challenge for the logged-in user
        $challenge_subscriber = ChallengeSubscriber::where('user_id', $voter->id)->first();

        if (!$challenge_subscriber) {
            return response()->json(['message' => 'You are not subscribed to any challenge.'], 400);
        }

        // Check if the user has already voted for any user in this challenge
        $existingVote = ChallengeVote::where('challenge_id', $challenge_subscriber->challenge_id)  // Challenge ID
        ->where('voter_user_id', $voter->id)  // The user who is voting
        ->where('status', 'active')  // Only active votes
        ->first();

        // Prevent multiple votes from the same user in the challenge
        if ($existingVote) {
            return response()->json(['message' => 'You have already voted in this challenge.'], 400);
        }

        // If no existing vote, create a new vote record
        $vote = new ChallengeVote();
        $vote->user_id = $userId;  // User being voted for
        $vote->challenge_id = $challenge_subscriber->challenge_id;  // The challenge
        $vote->voter_user_id = $voter->id;  // Voter's user ID
        $vote->vote = 1;  // Setting the vote to 1 (positive)
        $vote->appreciate = 'no';  // Default value for appreciate (can be customized)
        $vote->status = 'active';  // Mark vote as active
        $vote->save();  // Save the vote

        return response()->json(['message' => 'Vote successfully recorded.'], 200);
    }

    public function appreciateStore(int $id): JsonResponse {
        $data = ChallengeVote::findOrFail($id);
        if ($data->appreciate == 'yes') {
            $data->appreciate = 'no';
            $data->save();

            return response()->json([
                'success' => false,
                'message' => 'Appreciate Successfully.',
                'data'    => $data,
            ]);
        } else {
            $data->appreciate = 'yes';
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Appreciate Successfully.',
                'data'    => $data,
            ]);
        }
    }

}
