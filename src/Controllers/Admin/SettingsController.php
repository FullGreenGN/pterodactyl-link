<?php

namespace Azuriom\Plugin\PterodactylLink\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display the pterodactyl-link settings page.
     *
     * @return Application|Factory|View
     */
    public function show(): View|Factory|Application
    {
        return view('pterodactyl-link::admin.settings', [
            'host' => setting('pterodactyl-link.host', 'https://panel.domain.ltd/'),
            'apikey' => setting('pterodactyl-link.apikey', 'ptlc_vjfvdyIwY6yNAmpeyr9cmGYlYnIrSfUXozV0i5Wf4E5'),
        ]);
    }

    public function save(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $this->validate($request, [
            'host' => ['required', 'string', 'max:255'],
            'apikey' => ['required', 'string', 'max:255'],
        ]);

        Setting::updateSettings([
            'pterodactyl-link.host' => $validated['host'],
            'pterodactyl-link.apikey' => $validated['apikey'],
        ]);

        return redirect()->route('pterodactyl-link.admin.settings')->with('success', trans(trans('admin.settings.updated')));
    }
}
