<?php

namespace Azuriom\Plugin\PterodactylLink\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    /**
     * Show the home admin page of the plugin.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('pterodactyl-link::admin.index');
    }
}
