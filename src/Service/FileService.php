<?php

namespace  App\Service;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class FileService{
    public $targetDirectory;
    
    public function __construct(String $targetDirectory){
        $this->targetDirectory = $targetDirectory;
    }
    
    public function upload(UploadedFile $file):?String{
        $extension = $file->guessExtension();
        $fichero = uniqid().".$extension";
        try{
            $file->move($this->targetDirectory, $fichero);
        }catch(FileException $e){
            return NULL;
        }
        return $fichero;
    }
    
    public function replace(UploadedFile $file,?string $anterior):?String {
        $extension = $file->guessExtension();
        $fichero = uniqid().".$extension";
        try{
            $file->move($this->targetDirectory, $fichero);
            
            if($file && $anterior){
                $filesystem = new Filesystem();
                $filesystem->remove("$this->targetDirectory/$anterior");
                
            }
        }catch(FileException $e){
            return $anterior;
        }
        //return $file? $fichero : $anterior;
        return $fichero;
    }
    
    public function delete(String $fichero){
        $filesystem = new Filesystem();
        $filesystem->remove("$this->targetDirectory/$fichero");
    }
}