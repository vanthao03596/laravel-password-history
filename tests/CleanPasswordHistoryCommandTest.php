<?php

namespace Vanthao03596\LaravelPasswordHistory\Tests;

use Carbon\Carbon;
use Spatie\TestTime\TestTime;
use Vanthao03596\LaravelPasswordHistory\Models\PasswordHistory;

class CleanPasswordHistoryCommandTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        TestTime::freeze('Y-m-d H:i:s', '2021-01-01 00:00:00');

        $this->app['config']->set('password-history.months_to_check', 12);
    }

    /** @test */
    public function it_can_clean_the_password_history()
    {
        collect(range(1, 36))->each(function (int $index) {
            PasswordHistory::create([
                'model_type' => 'model',
                'model_id' => 1,
                'password' => "password-{$index}",
                'changed_at' => Carbon::now()->subMonths($index)->startOfMonth(),
            ]);
        });

        $this->assertCount(36, PasswordHistory::all());

        $this->artisan('password-history:clean');

        $this->assertCount(12, PasswordHistory::all());

        $cutOffDate = Carbon::now()->subMonths(12)->format('Y-m-d H:i:s');

        $this->assertCount(0, PasswordHistory::where('created_at', '<', $cutOffDate)->get());
    }

    /** @test */
    public function it_can_accept_months_as_option_to_override_config_setting()
    {
        collect(range(1, 36))->each(function (int $index) {
            PasswordHistory::create([
                'model_type' => 'model',
                'model_id' => 1,
                'password' => "password-{$index}",
                'changed_at' => Carbon::now()->subMonths($index)->startOfDay(),
            ]);
        });

        $this->assertCount(36, PasswordHistory::all());

        $this->artisan('password-history:clean', ['--months' => 7]);

        $this->assertCount(7, PasswordHistory::all());

        $cutOffDate = Carbon::now()->subMonths(7)->format('Y-m-d H:i:s');

        $this->assertCount(0, PasswordHistory::where('created_at', '<', $cutOffDate)->get());
    }
}
