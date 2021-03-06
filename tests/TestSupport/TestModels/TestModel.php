<?php

namespace Vanthao03596\LaravelPasswordHistory\Tests\TestSupport\TestModels;

use Illuminate\Database\Eloquent\Model;
use Vanthao03596\LaravelPasswordHistory\HasPasswordHistory;

class TestModel extends Model
{
    use HasPasswordHistory;

    protected $table = 'test_models';

    protected $guarded = [];

    public $timestamps = false;
}
