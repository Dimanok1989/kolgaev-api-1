<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Dashboard $dashboard)
    {
        $dashboard->registerPermissions(
            ItemPermission::group(__('Disk'))
                ->addPermission('disk.access', __('Access'))
                ->addPermission('disk.download', __('Download files'))
                ->addPermission('disk.upload', __('Upload files'))
        );

        $dashboard->registerPermissions(
            ItemPermission::group(__('Finance'))
                ->addPermission('finance.access', __('Access'))
                ->addPermission('finance.showall', __('Show all'))
        );
    }
}
