<?php

namespace LaravelGeek\LaravelRekognition;

use Aws\Credentials\Credentials;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use InvalidArgumentException;
use Throwable;

class LaravelRekognition
{
    /**
     * The rekognition client
     *
     * @var RekognitionClient|null
     */
    protected ?RekognitionClient $client = null;

    public function __construct()
    {
        $this->maybeSetupClient();
    }

    /**
     * Setup the rekognition client
     *
     * @return void
     */
    protected function maybeSetupClient()
    {
        if (is_null($this->client)) {
            $this->client = new RekognitionClient([
                'credentials' => LaravelRekognitionServiceProvider::provideCredentials(),
                'region' => config('rekognition.region'),
                'version' => 'latest',
            ]);
        }
    }

    /**
     * Get image labels from relative file path
     *
     *
     * @param  string  $path
     * @return string
     *
     * @throws InvalidArgumentException
     */
    public function getFromFilePath(string $path): ?string
    {
        try {
            $fileContents = Storage::get($path);
        } catch (FileNotFoundException $exception) {
            Log::error($exception->getMessage());
            $fileContents = null;
        } catch (Throwable $exception) {
            Log::error($exception->getMessage());
            $fileContents = null;
        }

        if (is_null($fileContents) || empty($fileContents)) {
            throw new InvalidArgumentException('No file contents found');
        }

        $result = $this->client->detectLabels([
            'Image' => [
                'Bytes' => $fileContents,
            ],
            'MaxLabels' => 12,
            'MinConfidence' => 65.00,
        ]);

        return collect($result->get('Labels'))->implode('Name', ', ');
    }
}
