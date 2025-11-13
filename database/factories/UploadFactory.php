<?php

namespace Database\Factories;

use App\Enums\UploadTypes;
use App\Models\Upload;
use Illuminate\Database\Eloquent\Factories\Factory;


class UploadFactory extends Factory
{
    protected $model = Upload::class;

    public function definition(): array
    {
        $mimeTypes = ['image/png', 'image/jpeg', 'application/pdf'];
        $mimeType = $this->faker->randomElement($mimeTypes);

        // Assign extension based on mime type
        $extension = match ($mimeType) {
            'image/png' => 'png',
            'image/jpeg' => 'jpg',
            'application/pdf' => 'pdf',
            default => 'dat',
        };

        $fileName = $this->faker->word() . '.' . $extension;
        $fakePath = 'fake/path/' . $fileName;


        return [
            'name' => $fileName,
            'type' => $this->faker->randomElement(UploadTypes::cases()),
            'path' => $fakePath,
            'mime_type' => $mimeType,
            'size' => $this->faker->numberBetween(100, 10000), // fake file size in bytes
        ];// Just a dummy path
    }
}

