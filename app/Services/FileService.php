<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
 public static function uploadFile($file, $defaultFile = 'kazan.jpg', $folder='/')
 {
     if($file !== null){
         $path = $file->store($folder,'public');
     }else{
         $path = $defaultFile;
     }
     return $path;
 }
 public static function deleteFile($file,$defaultFiles = ['kazan.jpg', 'logo.jpg'], $folder='public/storage')
 {
    $path=$folder . $file;
    if (Storage::exists($path) && !in_array($file, $defaultFiles)){
        Storage::delete($path);
    }
 }

 public static function updateFile($file , $previousFile, $folder="/", $disk="public/storage")
 {
     $path = $disk . $previousFile;
     if($file !== null){
         Storage::delete($path);
         $path = $file->store($folder,'public');
     }else{
         $path = $previousFile;
     }
     return $path;

 }
}
