<?php

namespace The3LabsTeam\AdsPostParser\Commands;

use Illuminate\Console\Command;

class AdsPostParserCommand extends Command
{
    public $signature = 'laravel-ads-post-parser';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
