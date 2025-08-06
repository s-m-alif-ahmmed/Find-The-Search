<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\Contact;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class HomeController extends Controller {
    /**
     * Display the welcome page.
     *
     * @return View
     */
    public function index(): View {

        // Store CSRF token in session
        session(['csrf_token' => csrf_token()]);

        $challenges = Challenge::where('status', 'active')->with('challengeRules')->get();
        $faqs = Faq::where('status', 'active')->get();

        return view('frontend.layouts.pages.home', compact('challenges', 'faqs'));
    }
    public function about(): View {
        $challenges = Challenge::where('status', 'active')->with('challengeRules')->get();
        return view('frontend.layouts.pages.about',compact('challenges'));
    }
    public function challenge(): View {
        $challenges = Challenge::where('status', 'active')->with('challengeRules')->get();
        return view('frontend.layouts.pages.challenge',compact('challenges'));
    }
    public function contact(): View
    {
        return view('frontend.layouts.pages.contact');
    }

    public function contactStore(Request $request): RedirectResponse {
        try {
            $validator = Validator::make($request->all(), [
                'first_name'        => 'required|string|max:100',
                'last_name'         => 'required|string|max:100',
                'email'             => 'required|string|email|max:100',
                'number'            => 'required|numeric',
                'message'           => 'required',
                'terms_and_policy'  => 'nullable|boolean',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data                   = new Contact();
            $data->first_name       = $request->first_name;
            $data->last_name        = $request->last_name;
            $data->email            = $request->email;
            $data->number           = $request->number;
            $data->message          = $request->message;
            $data->terms_and_policy = $request->terms_and_policy === null ? 0 : (int) $request->terms_and_policy;
            $data->save();

            return redirect()->route('contact')->with('t-success', 'Message sent successfully');
            } catch (\Exception) {
        return redirect()->route('contact')->with('t-error', 'Message sent failed.');
        }
    }
}
