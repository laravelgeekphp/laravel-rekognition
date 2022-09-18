<?php

namespace LaravelGeek\LaravelRekognition\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string getFromFilePath(string $path)
 *
 * @see \LaravelGeek\LaravelRekognition\LaravelRekognition
 */
class Rekognition extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \LaravelGeek\LaravelRekognition\LaravelRekognition::class;
    }
}
