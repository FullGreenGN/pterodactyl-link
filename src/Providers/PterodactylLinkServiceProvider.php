<?php

namespace Azuriom\Plugin\PterodactylLink\Providers;

use Azuriom\Models\Permission;
use Illuminate\Pagination\Paginator;
use Azuriom\Extensions\Plugin\BasePluginServiceProvider;

class PterodactylLinkServiceProvider extends BasePluginServiceProvider
{

    /**
     * Register any plugin services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerMiddlewares();

        //
    }

    /**
     * Bootstrap any plugin services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->registerPolicies();

        $this->loadViews();

        $this->loadTranslations();

        $this->loadMigrations();

        $this->registerRouteDescriptions();

        $this->registerAdminNavigation();

        $this->registerUserNavigation();

        Paginator::useBootstrap();

        Permission::registerPermissions([
            'pterodactyl-link.admin' => 'pterodactyl-link::admin.permission',
        ]);
    }

    /**
     * Returns the routes that should be able to be added to the navbar.
     *
     * @return array
     */
    protected function routeDescriptions(): array
    {
        return [
            'pterodactyl-link.index' => 'pterodactyl-link::messages.plugin_name',
        ];
    }

    /**
     * Return the admin navigations routes to register in the dashboard.
     *
     * @return array
     */
    protected function adminNavigation(): array
    {
        return [
            'pterodactyl-link' => [
                'name' => trans('pterodactyl-link::admin.nav.title'),
                'icon' => 'bi bi-slash-circle',
                'route' => 'pterodactyl-link.admin.settings',
                'permission' => 'pterodactyl-link.admin'
            ],
        ];
    }

    /**
     * Return the user navigations routes to register in the user menu.
     *
     * @return array
     */
    protected function userNavigation()
    {

    }
}
