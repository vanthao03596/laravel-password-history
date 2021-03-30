<?php

return [
    /**
     * The table name to save your password histories.
     */
    'table_name' => 'password_histories',

    /*
     * The fully qualified class name of the password_histories model.
     */
    'password_history_model' => \Vanthao03596\LaravelPasswordHistory\Models\PasswordHistory::class,

    /*
     * The number of months you want to check against new password.
     */

     'months_to_check' => 12,
];
