<?php

namespace Azuriom\Plugin\PterodactylLink\Providers;

use Azuriom\Extensions\Plugin\BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * @var string
     */
    protected string $namespace = 'Azuriom\Plugin\PterodactylLink\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function loadRoutes(): void
    {
        $this->mapPluginsRoutes();

        $this->mapAdminRoutes();

        //
    }

    protected function mapPluginsRoutes(): void
    {
        Route::prefix($this->plugin->id)
            ->middleware('web')
            ->namespace($this->namespace)
            ->name("{$this->plugin->id}.")
            ->group(plugin_path($this->plugin->id . '/routes/web.php'));
    }

    protected function mapAdminRoutes(): void
    {
        Route::prefix('admin/' . $this->plugin->id)
            ->middleware('admin-access')
            ->namespace($this->namespace . '\Admin')
            ->name($this->plugin->id . '.admin.')
            ->group(plugin_path($this->plugin->id . '/routes/admin.php'));
    }
}
