<?php

namespace LaravelGeek\LaravelRekognition;

use LaravelGeek\LaravelRekognition\Commands\LaravelRekognitionCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelRekognitionServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-rekognition')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-rekognition_table')
            ->hasCommand(LaravelRekognitionCommand::class);
    }
}
