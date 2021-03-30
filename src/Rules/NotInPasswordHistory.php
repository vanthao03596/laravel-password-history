<?php

namespace Vanthao03596\LaravelPasswordHistory\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class NotInPasswordHistory implements Rule
{
    protected $user;

    protected $month_to_check;

    public function __construct($user)
    {
        $this->user = $user;
        $this->month_to_check = config('password-history.months_to_check');
    }

    public function passes($attribute, $value)
    {
        $passwordHistories = $this->user->passwordHistories()
            ->where('changed_at', '>=' ,now()->subMonths($this->month_to_check))
            ->get();

        foreach ($passwordHistories as $passwordHistory) {
            if (Hash::check($value, $passwordHistory->password)) {
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return __('password-history.used_in_pass_month', ['month' => $this->month_to_check]);
    }
}
