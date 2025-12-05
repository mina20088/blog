<?php

namespace App\services;

use App\Enums\UploadTypes;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\UploadedFile;

abstract class UploadService
{

    protected static function upload(UploadedFile $file,$path, mixed $option): false|string
    {
         return $file->storeAs($path, $file->hashName(), $option);
    }

    protected static function publicUpload(UploadedFile $file,$path): false|string
    {
        return $file->storeAs($path, $file->hashName(), 'public');
    }


    public static function uploadProfilePicture(UploadedFile $file , User $user)
    {
        $path = self::publicUpload($file,'profile');


        return  $user->upload()->create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'type' => UploadTypes::Profile,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
        ]);
    }



}
