<?php

namespace Vanthao03596\LaravelPasswordHistory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Arr;

trait HasPasswordHistory
{
    public static function bootHasPasswordHistory()
    {
        static::updated(function (Model $model) {
            if (!$password = Arr::get($model->getChanges(), 'password')) {
                return;
            }

            $model->recordHistoryPassword($password);
        });

        static::created(function (Model $model) {
            $model->recordHistoryPassword($model->password);
        });
    }

    public function passwordHistories(): MorphMany
    {
        return $this->morphMany(config('password-history.password_history_model'), 'model');
    }

    protected function recordHistoryPassword($password): void
    {
        $this->passwordHistories()->create([
            'changed_at' => now(),
            'password' => $password
        ]);
    }
}
