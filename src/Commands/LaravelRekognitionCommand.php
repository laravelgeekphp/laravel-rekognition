<?php

namespace LaravelGeek\LaravelRekognition\Commands;

use Illuminate\Console\Command;

class LaravelRekognitionCommand extends Command
{
    public $signature = 'laravel-rekognition';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
