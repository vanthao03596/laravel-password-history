<?php

namespace Vanthao03596\LaravelPasswordHistory\Commands;

use Illuminate\Console\Command;

class LaravelPasswordHistoryCommand extends Command
{
    public $signature = 'laravel-password-history';

    public $description = 'My command';

    public function handle(): void
    {
        $this->comment('All done');
    }
}
