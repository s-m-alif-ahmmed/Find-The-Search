<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\CredentialSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class StripeSettingController extends Controller {
    /**
     * Display stripe settings page.
     *
     * @return View
     */
    public function index(): View {
        return view('backend.layouts.settings.stripe_settings');
    }
    /**
     * Display stripe settings page.
     *
     * @return View
     */
    public function google(): View {
        return view('backend.layouts.settings.google_settings');
    }

    public function edit()
    {
        // Retrieve the first policy entry or create a new instance if none exists
        $credential = CredentialSetting::first() ?? new CredentialSetting();
        return view('backend.layouts.credential', compact('credential'));
    }

    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'stripe_secret' => 'nullable|string',
            'stripe_key' => 'nullable|string',
            'google_client_id' => 'nullable|string',
            'google_client_secret_id' => 'nullable|string',
        ]);

        // Retrieve or create the policy record
        $credential = CredentialSetting::first() ?? new CredentialSetting();

        // Update policy content
        $credential->stripe_secret = $request->stripe_secret;
        $credential->stripe_key = $request->stripe_key;
        $credential->google_client_id = $request->google_client_id;
        $credential->google_client_secret_id = $request->google_client_secret_id;
        $credential->save();

        // Update .env file
        $this->updateEnv([
            'STRIPE_SECRET' => $request->stripe_secret,
            'STRIPE_KEY' => $request->stripe_key,
            'GOOGLE_CLIENT_ID' => $request->google_client_id,
            'GOOGLE_CLIENT_SECRET_ID' => $request->google_client_secret_id,
        ]);

        // Redirect back with success message
        return back()->with('t-success', 'Credentials successfully updated');
    }

    // Private function to update .env datas
    private function updateEnv($data)
    {
        $envPath = base_path('.env');

        if (File::exists($envPath)) {
            $envContent = File::get($envPath);

            foreach ($data as $key => $value) {
                $pattern = "/^{$key}=.*/m";
                $replacement = "{$key}={$value}";

                if (preg_match($pattern, $envContent)) {
                    $envContent = preg_replace($pattern, $replacement, $envContent);
                } else {
                    $envContent .= "\n{$key}={$value}";
                }
            }

            File::put($envPath, $envContent);
        }
    }

}
