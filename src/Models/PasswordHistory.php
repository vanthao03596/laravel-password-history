<?php

namespace Vanthao03596\LaravelPasswordHistory\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class PasswordHistory extends Model
{
    protected $guarded = [];

    protected $casts = [
        'changed_at' => 'datetime',
    ];

    public $timestamps = false;

    public function getTable()
    {
        return config('password-history.table_name', parent::getTable());
    }

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
