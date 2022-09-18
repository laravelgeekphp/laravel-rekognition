<?php

namespace LaravelGeek\LaravelRekognition\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LaravelGeek\LaravelRekognition\LaravelRekognition
 */
class Rekognition extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \LaravelGeek\LaravelRekognition\LaravelRekognition::class;
    }
}
