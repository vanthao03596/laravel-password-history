<?php

namespace Vanthao03596\LaravelPasswordHistory\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Orchestra\Testbench\TestCase as Orchestra;
use Vanthao03596\LaravelPasswordHistory\LaravelPasswordHistoryServiceProvider;
use Vanthao03596\LaravelPasswordHistory\Tests\TestSupport\TestModels\TestModel;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);

        $this->withFactories(__DIR__.'/factories');
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelPasswordHistoryServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase($app)
    {
        include_once __DIR__.'/../database/migrations/create_laravel_password_histories_table.php.stub';
        (new \CreateLaravelPasswordHistoriesTable())->up();

        $app['db']->connection()->getSchemaBuilder()->create('test_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('password');
        });

    }
}
