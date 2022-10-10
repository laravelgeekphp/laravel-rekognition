<?php

// config for LaravelGeek/LaravelRekognition
return [
    'key' => env('REKOGNITION_KEY'),
    'secret' => env('REKOGNITION_SECRET'),
    'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
];
