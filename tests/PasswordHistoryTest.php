<?php

namespace Vanthao03596\LaravelPasswordHistory\Tests;

use Vanthao03596\LaravelPasswordHistory\Tests\TestSupport\TestModels\TestModel;

class PasswordHistoryTest extends TestCase
{
    /** @test */
    public function history_is_stored_when_creating_new_model()
    {
        $model = factory(TestModel::class)->create();

        $this->assertEquals(1, $model->passwordHistories()->count());
    }

    /** @test */
    public function history_is_being_recorded_when_changing_password()
    {
        $model = factory(TestModel::class)->create();

        $model->password = 'new password';

        $model->save();

        $this->assertEquals(2, $model->passwordHistories()->count());

        $model->password = 'new password 2';

        $model->save();

        $this->assertEquals(3, $model->passwordHistories()->count());
    }

    /** @test */
    public function history_is_not_being_recorded_when_password_is_not_changed()
    {
        $model = factory(TestModel::class)->create();

        $model->name = 'new name';

        $model->save();

        $this->assertEquals(1, $model->passwordHistories()->count());
    }

    /** @test */
    public function history_is_not_being_recorded_if_new_password_used_before()
    {
        $password = '111111';

        $model = factory(TestModel::class)->create(['password' => $password]);

        $model->password = $password;

        $model->save();

        $this->assertEquals(1, $model->passwordHistories()->count());
    }
}
