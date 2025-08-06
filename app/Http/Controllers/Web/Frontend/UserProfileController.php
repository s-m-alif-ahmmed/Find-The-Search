<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    /**
     * Update the user's profile.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function UpdateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'  => 'required|max:100|min:2',
            'last_name'   => 'required|max:100|min:2',
            'email'       => 'required',
            'dob'         => 'nullable|date',
            'job_title'   => 'nullable|string|max:100|min:2',
            'avatar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Retrieve the current user
            $user = User::find(auth()->user()->id);

            // Update the profile fields
            $user->first_name = $request->first_name;
            $user->last_name  = $request->last_name;
            $user->email      = $request->email;
            $user->dob        = $request->dob;
            $user->job_title  = $request->job_title;

            // Handle the avatar upload
            if ($request->hasFile('avatar')) {
                // Delete the old avatar if it exists
                if ($user->avatar && file_exists(public_path($user->avatar))) {
                    Helper::fileDelete(public_path($user->avatar));
                }

                // Upload the new avatar
                $avatar = $request->file('avatar');
                $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
                $avatarPath = Helper::fileUpload($avatar, 'profile', $avatarName);

                if ($avatarPath === null) {
                    return redirect()->back()->with('t-error', 'Failed to upload the avatar.');
                }

                // Update the avatar path in the database
                $user->avatar = $avatarPath;
            }

            // Save the user
            $user->save();

            return redirect()->back()->with('t-success', 'Profile updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    /**
     * Update the user's password.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function UpdatePassword(Request $request)
    {
        // Validation rules for password change
        $validator = Validator::make($request->all(), [
            'old_password' => 'required', // Ensure the old password is entered
            'password'     => 'required|confirmed|min:8', // New password must be confirmed and at least 8 characters
        ]);

        if ($validator->fails()) {
            // If validation fails, return back with errors
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Get the current logged-in user
            $user = Auth::user();

            // Check if the entered old password matches the stored password
            if (Hash::check($request->old_password, $user->password)) {
                // Update the password with the new one (hashed)
                $user->password = Hash::make($request->password);
                $user->save();

                // Return success message
                return redirect()->back()->with('t-success', 'Password updated successfully');
            } else {
                // If old password is incorrect, show an error message
                return redirect()->back()->with('t-error', 'Current password is incorrect');
            }
        } catch (\Exception $e) {
            // If an error occurs, show a generic error message
            return redirect()->back()->with('t-error', 'Something went wrong: ' . $e->getMessage());
        }
    }


}
