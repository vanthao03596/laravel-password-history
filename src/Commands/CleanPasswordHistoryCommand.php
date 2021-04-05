<?php

namespace Vanthao03596\LaravelPasswordHistory\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Vanthao03596\LaravelPasswordHistory\Models\PasswordHistory;

class CleanPasswordHistoryCommand extends Command
{
    public $signature = 'password-history:clean
                {--months= : (optional) Records older than this number of months will be cleaned.}';

    public $description = 'Clean up old records from the password history.';

    public function handle(): void
    {
        $this->comment('Cleaning password history...');

        $maxAgeInMonths = $this->option('months') ?? config('password-history.months_to_check');

        $cutOffDate = Carbon::now()->subMonths($maxAgeInMonths)->format('Y-m-d H:i:s');

        $amountDeleted = PasswordHistory::where('changed_at', '<', $cutOffDate)
            ->delete();

        $this->info("Deleted {$amountDeleted} record(s) from the password history.");

        $this->comment('All done!');
    }
}
