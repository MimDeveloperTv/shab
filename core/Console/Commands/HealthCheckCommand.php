<?php

namespace Core\Console\Commands;

use Core\Health\LogCheck;
use Core\Health\RabbitmqCheck;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\RedisCheck;
use Spatie\Health\Commands\RunHealthChecksCommand;
use Spatie\Health\Facades\Health;

class HealthCheckCommand extends RunHealthChecksCommand
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        Health::checks([
            RedisCheck::new(),
            CacheCheck::new(),
            DatabaseCheck::new(),
            EnvironmentCheck::new(),
            DebugModeCheck::new(),
            RabbitmqCheck::new(),
            LogCheck::new(),
        ]);

        return parent::handle();
    }
}
