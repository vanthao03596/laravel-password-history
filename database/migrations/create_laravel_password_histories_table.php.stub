<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaravelPasswordHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create(config('password-history.table_name'), function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('model');
            $table->string('password');
            $table->dateTime('changed_at');
        });
    }
}
