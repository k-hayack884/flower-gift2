<?php

namespace App\Services;

use InterventionImage;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public static function upload($imageFile, $folderName)
    {
        $fileName=uniqid(rand().'_'); //ユニークなIDを生成
            $extension=$imageFile->extension(); //拡張子を判別
            $fileNameToStore=$fileName.'.'.$extension;
        $resizedImage=InterventionImage::make($imageFile)->resize(400, 400)->encode();
        Storage::disk('s3')->put($folderName,$fileNameToStore, 'public');
        // Storage::put('public/'.$folderName.'/'.$fileNameToStore, $resizedImage);
        
        return $fileNameToStore;
    }
}
