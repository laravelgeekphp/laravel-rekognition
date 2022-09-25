<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use LaravelGeek\LaravelRekognition\Facades\Rekognition;

it('throws InvalidArgumentException if given bad filepath', function () {
    Rekognition::getFromFilePath('badFilePath.jpg');
})->throws(InvalidArgumentException::class);

it('throws InvalidArgumentException if file has no contents', function () {
    Storage::fake();
    $filePath = 'test.jpg';
    $fakeFile = UploadedFile::fake()->image($filePath);

    Storage::putFile($filePath, $fakeFile);
    Storage::assertExists($filePath);

    Rekognition::getFromFilePath($filePath);
})->throws(InvalidArgumentException::class);
