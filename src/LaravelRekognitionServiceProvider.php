<?php

namespace LaravelGeek\LaravelRekognition;

use Illuminate\Support\Facades\Config;
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
            ->hasConfigFile();

        $this->app->bind(LaravelRekognition::class, function () {
            return new LaravelRekognition();
        });

        $this->ensureRekognitionIsConfigured();
    }

    /**
     * Ensure AWS Rekognition is properly configured.
     *
     * @return void
     */
    protected function ensureRekognitionIsConfigured(): void
    {
        if (isset($_ENV['AWS_ACCESS_KEY_ID'])) {
            Config::set('rekognition.key', $_ENV['AWS_ACCESS_KEY_ID']);
        }

        if (isset($_ENV['AWS_SECRET_ACCESS_KEY'])) {
            Config::set('rekognition.secret', $_ENV['AWS_SECRET_ACCESS_KEY']);
        }
    }
}
