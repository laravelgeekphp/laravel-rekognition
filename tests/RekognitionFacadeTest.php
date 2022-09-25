<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use LaravelGeek\LaravelRekognition\Facades\Rekognition;

it('returns null given bad data', function () {
    expect(Rekognition::getFromFilePath('badFilePath.jpg'))->toBeNull();
});

it('returns null if file has no contents', function () {
    Storage::fake();
    $filePath = 'test.jpg';
    $fakeFile = UploadedFile::fake()->image($filePath);

    Storage::putFile($filePath, $fakeFile);
    Storage::assertExists($filePath);

    expect(Rekognition::getFromFilePath($filePath))->toBeNull();
});
