<?php

namespace App\Http\Traits;

use Illuminate\Http\UploadedFile;

trait FileManager
{
    /**
     * Validates the file from the request & persists it into storage
     * @param String $requestAttributeName from request
     * @param String $folder
     * @param String $disk
     * @return String $path
     */
    public function upload($requestAttributeName = null, $folder = '', $disk = 'public'){
        $path = null;
        if(request()->hasFile($requestAttributeName) && request()->file($requestAttributeName)->isValid()){
            $path = 'storage/'.request()->file($requestAttributeName)->store($folder, $disk);
        }
        return $path;
    }





    public function uploadMultipleFiles(string $requestAttributeName = null, string $folder = '', string $disk = 'public',$oldPath = null): array
    {
        $uploadedFiles = [];

        if (request()->hasFile($requestAttributeName) && request()->file($requestAttributeName)->isValid()) {
            foreach (request()->file($requestAttributeName) as $file) {
                if ($file instanceof UploadedFile) {
                    $path = 'storage/'.$file->store($folder, $disk);
                    $uploadedFiles[] = $path;

                    ####### Delete Multiple Files Uploaded
                    if($oldPath != null){
                        $images = json_decode($oldPath);
                        if($images != null){
                            foreach ($images as $image){
                                if(file_exists($image)) {
                                    unlink($image);
                                }
                            }
                        }

                    }
                }
            }
        }

        return $uploadedFiles;
    }





    /**
     * Validates the file from the request & persists it into storage then unlink old one
     * @param String $requestAttributeName from request
     * @param String $folder
     * @param String $oldPath
     * @return String $path
     */
    public function updateFile($requestAttributeName = null, $folder = '',$oldPath){
        $path = null;
        if(request()->hasFile($requestAttributeName) && request()->file($requestAttributeName)->isValid()){
            $path = $this->upload($requestAttributeName,$folder);
            if(file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
        return $path;
    }




    /**
     * Delete the file from the path
     * @param String $oldPath
     */

    public function deleteFile($oldPath){
        if(file_exists($oldPath)) {
            unlink($oldPath);
        }
    }
}
