<?php

namespace Hexafuchs\Skeleton\Commands;

use Illuminate\Console\Command;

/**
 *
 */
class SkeletonCommand extends Command
{
    public $signature = ':package_slug_without_prefix';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
