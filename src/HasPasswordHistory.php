<?php

namespace Vanthao03596\LaravelPasswordHistory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Arr;

trait HasPasswordHistory
{
    public static function bootHasPasswordHistory()
    {
        static::saved(function (Model $model) {
            if (! $password = Arr::get($model->getChanges(), 'password')) {
                return;
            }

            $model->passwordHistories()->create([
                'changed_at' => now(),
                'password' => $password,
            ]);
        });
    }

    public function passwordHistories(): MorphMany
    {
        return $this->morphMany(config('password-history.password_history_model'), 'model');
    }
}
