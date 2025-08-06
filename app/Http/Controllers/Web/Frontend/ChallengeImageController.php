<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\ChallengeImage;
use App\Models\Faq;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class ChallengeImageController extends Controller
{
    /**
     * Store a newly created dynamic page content in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse {
        try {
            // Validation
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Ensure valid image type and size
                'user_id' => 'nullable',  // User ID is optional
                'challenge_id' => 'nullable',  // Challenge ID is optional
                'day' => 'nullable',  // Challenge ID is optional
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Get the challenge the user is participating in
            $challenge = Challenge::find($request->challenge_id);


            if (!$challenge) {
                return redirect()->back()->with('t-error', 'Challenge not found.');
            }

            // Check if the challenge is active (today should be within start and end date)
            $currentDate = now();
            if ($currentDate < $challenge->start_date || $currentDate > $challenge->end_date) {
                return redirect()->back()->with('t-error', 'Challenge is not active today.');
            }

            // Calculate the day number for the current date
            $startDate = Carbon::parse($challenge->start_date);
            $day = $startDate->diffInDays(Carbon::parse($currentDate)) + 1; // Adding 1 so Day 1 is 1

            // Round to the nearest integer (if it’s like 4.324234, it will save as 4)
            $currentDay = round($day);

            // Check if the user has already uploaded an image for the current day of the challenge
            $existingUpload = ChallengeImage::where('user_id', $request->user_id)
                ->where('challenge_id', $challenge->id)
                ->where('day', $currentDay)
                ->first();

            if ($existingUpload) {
                return redirect()->back()->with('t-error', 'You have already uploaded an image for today.');
            }

            // Create a new ChallengeImage record for the user
            $data = new ChallengeImage();
            $data->user_id = $request->user_id;
            $data->challenge_id = $challenge->id;
            $data->day = $currentDay;

            // Handle the image upload
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = Helper::fileUpload($image, 'challenge', $imageName);

            if ($imagePath === null) {
                return redirect()->back()->with('t-error', 'Failed to upload the image.');
            }

            $data->image = $imagePath;  // Save the image path

            $data->save();

            return redirect()->back()->with('t-success', 'Image uploaded successfully for the day.');
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the upload process
            return redirect()->back()->with('t-error', 'An error occurred while uploading the image. Please try again.');
        }
    }

//    public function destroy($id)
//    {
//        // Find the image by ID
//        $image = ChallengeImage::findOrFail($id);
//
//        // Delete the image file from storage
//        if (file_exists(public_path($image->image))) {
//            unlink(public_path($image->image));
//        }
//
//        // Delete the image record from the database
//        $image->delete();
//
//        // Redirect back to the previous page
//        return redirect()->back()->with('success', 'Image deleted successfully.');
//    }

}
