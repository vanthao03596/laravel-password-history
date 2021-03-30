<?php

namespace Vanthao03596\LaravelPasswordHistory\Tests;

use Spatie\TestTime\TestTime;
use Vanthao03596\LaravelPasswordHistory\Rules\NotInPasswordHistory;
use Vanthao03596\LaravelPasswordHistory\Tests\TestSupport\TestModels\TestModel;

class ValidationRuleTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        TestTime::freeze('Y-m-d H:i:s', '2021-01-01 00:00:01');
    }

    /** @test */
    public function validation_passes_when_password_not_used_before()
    {
        $rule = new NotInPasswordHistory($this->testModel);

        $this->assertTrue($rule->passes('password', 'newpassword'));
    }

    /** @test */
    public function validation_not_passes_when_password_used_before()
    {
        $rule = new NotInPasswordHistory($this->testModel);

        $this->assertFalse($rule->passes('password', 'password'));
    }

    /** @test */
    public function validation_passes_when_password_used_before_greater_than_month_to_check()
    {
        $model = factory(TestModel::class)->create();

        $rule = new NotInPasswordHistory($model);

        $this->assertFalse($rule->passes('password', 'password'));

        TestTime::addMonths(12);

        $rule = new NotInPasswordHistory($model);
        $this->assertTrue($rule->passes('password', 'password'));
    }
}
