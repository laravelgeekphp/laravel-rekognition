<?php

namespace LaravelGeek\LaravelRekognition;

use Aws\Credentials\Credentials;
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
        // Ensure we are running on Vapor...
        if (! isset($_ENV['VAPOR_SSM_PATH'])) {
            return;
        }

        Config::set('rekognition', array_merge([
            'key' => $_ENV['REKOGNITION_KEY'] ?? null,
            'secret' => $_ENV['REKOGNITION_SECRET'] ?? null,
            'region' => $_ENV['AWS_DEFAULT_REGION'] ?? 'us-east-1',
        ], Config::get('rekognition') ?? []));
    }

    public static function provideCredentials(): Credentials
    {
        return new Credentials(config('rekognition.key'), config('rekognition.secret'));
    }
}
