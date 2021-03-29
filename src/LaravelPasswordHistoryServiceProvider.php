<?php

namespace Vanthao03596\LaravelPasswordHistory;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Vanthao03596\LaravelPasswordHistory\Commands\LaravelPasswordHistoryCommand;

class LaravelPasswordHistoryServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-password-history')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_password_histories_table')
            ->hasCommand(LaravelPasswordHistoryCommand::class);
    }
}
