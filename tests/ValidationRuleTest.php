<?php

namespace Vanthao03596\LaravelPasswordHistory\Tests;

use Vanthao03596\LaravelPasswordHistory\Rules\NotInPasswordHistory;

class ValidationRuleTest extends TestCase
{
    /** @test */
    public function validation_passes_when_password_not_used_before()
    {
        $rule = new NotInPasswordHistory($this->testModel);

        $this->assertFalse($rule->passes('password', 'password'));
        $this->assertTrue($rule->passes('password', 'newpassword'));
    }
}
