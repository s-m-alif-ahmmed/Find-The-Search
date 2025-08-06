<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\ChallengeSubscriber;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as LaravelSession;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Mail;
use App\Mail\ChallengeSubscribed;

class StripePaymentController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        // Set your secret Stripe API key
        Stripe::setApiKey(config('services.stripe.secret'));

        $challenge_id = $request->challenge_id;

        // Retrieve the challenge (assume you are fetching the active challenge)
        $challenge = Challenge::where('id', $challenge_id)->where('status', 'active')->first();

        // Ensure there is a valid challenge
        if (!$challenge) {
            return redirect()->route('home')->with('error', 'No active challenge available.');
        }

        $redirectUrl = route('stripe.success').'?token={CHECKOUT_SESSION_ID}';
        $cancelUrl = route('user.dashboard');

        // Create Stripe Checkout session
        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd', // Set the currency
                        'product_data' => [
                            'name' => $challenge->name, // Product name is the challenge name
                        ],
                        'unit_amount' => $challenge->entry_fee * 100, // Amount in cents
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'metadata' => [
                'challenge_id' => $challenge_id, // Store challenge_id here
            ],
            'success_url' => $redirectUrl,
            'cancel_url' => $cancelUrl,
        ]);

        // Redirect to Stripe's Checkout page
        return redirect($session->url, 303);
    }


    public function handleStripeResponse(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $stripe = new StripeClient(config('services.stripe.secret'));

        $session = $stripe->checkout->sessions->retrieve($request->token);


        // If no session ID is provided, return an error
        if (!$session) {
            return redirect(route('user.dashboard'))->with('error', 'Invalid session.');
        }

        try {

            // Check if the payment was successful
            if ($session->payment_status === 'paid') {
                DB::beginTransaction();

                // Retrieve the challenge_id from session metadata
                $challenge_id = $session->metadata->challenge_id;

                if (!$challenge_id) {
                    return redirect(route('user.dashboard'))->with('error', 'Challenge ID missing in session metadata.');
                }

                // Get active challenge for payment
                $challenge = Challenge::where('id', $challenge_id)->where('status', 'active')->first();

                if (!$challenge) {
                    return redirect(route('user.dashboard'))->with('error', 'No active challenge available.');
                }

                // Create the challenge subscriber record
                ChallengeSubscriber::create([
                    'user_id' => $user->id,
                    'challenge_id' => $challenge->id,
                    'entry_fee' => $challenge->entry_fee,
                    'payment_status' => 'paid',
                ]);

                DB::commit();

                // Send the email notification to the user
                Mail::to($user->email)->send(new ChallengeSubscribed($challenge));

                return redirect(route('user.dashboard'))->with('success', 'Payment successful and challenge subscribed.');
            } else {
                return redirect(route('user.dashboard'))->with('error', 'Payment failed.');
            }
        } catch (\Exception $e) {
            return redirect(route('user.dashboard'))->with('error', 'An error occurred while processing the payment.');
        }
    }

}
