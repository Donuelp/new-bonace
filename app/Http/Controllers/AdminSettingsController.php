<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $settings = array_merge($this->defaults(), SiteSetting::where('key', 'general')->value('value') ?? []);

        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'company_name' => ['nullable', 'string', 'max:255'],
            'addresses' => ['nullable', 'array'],
            'addresses.*' => ['nullable', 'string', 'max:500'],
            'phone_numbers' => ['nullable', 'array'],
            'phone_numbers.*' => ['nullable', 'string', 'max:100'],
            'emails' => ['nullable', 'array'],
            'emails.*' => ['nullable', 'email', 'max:255'],
            'socials' => ['nullable', 'array'],
            'socials.*.platform' => ['nullable', 'string', 'max:100'],
            'socials.*.url' => ['nullable', 'url', 'max:500'],
        ]);

        $value = [
            'company_name' => $data['company_name'] ?? '',
            'addresses' => $this->filled($data['addresses'] ?? []),
            'phone_numbers' => $this->filled($data['phone_numbers'] ?? []),
            'emails' => $this->filled($data['emails'] ?? []),
            'socials' => array_values(array_filter($data['socials'] ?? [], fn ($social) => !empty($social['platform']) || !empty($social['url']))),
        ];

        SiteSetting::updateOrCreate(['key' => 'general'], ['value' => $value]);

        return redirect()->route('admin.settings')->with('success', 'General settings saved successfully.');
    }

    private function defaults(): array
    {
        return [
            'company_name' => 'Bon-Ace Fashion Tools',
            'addresses' => ['Bon-Ace Complex, Tungkil, Minglanilla, Cebu, Philippines'],
            'phone_numbers' => [],
            'emails' => [],
            'socials' => [],
        ];
    }

    private function filled(array $values): array
    {
        return array_values(array_filter(array_map('trim', $values)));
    }
}
