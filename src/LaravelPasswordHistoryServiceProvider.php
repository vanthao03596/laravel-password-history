<?php

namespace Vanthao03596\LaravelPasswordHistory;

use Vanthao03596\LaravelPackageTools\Package;
use Vanthao03596\LaravelPackageTools\PackageServiceProvider;
use Vanthao03596\LaravelPasswordHistory\Commands\LaravelPasswordHistoryCommand;

class LaravelPasswordHistoryServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-password-history')
            ->hasConfigFile()
            ->hasMigration('create_laravel_password_histories_table')
            ->hasTranslations()
            ->hasCommand(LaravelPasswordHistoryCommand::class);
    }
}
