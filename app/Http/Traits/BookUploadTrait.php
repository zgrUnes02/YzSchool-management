<?php

    namespace App\Http\Traits ;
    use Illuminate\Support\Facades\Storage;

    trait BookUploadTrait
    {
        //* function for uploading :
        public function uploadBook($request , $name)
        {
            $book = $request -> file($name) ;
            $file_name = $book -> getClientOriginalName() ;

            $book -> storeAs('attachement/book/' , $file_name , 'upload_attachements') ;
        }

        //* function for deleting :
        public function deleteBook($name)
        {
            $exists = Storage::disk('upload_attachements') -> exists('attachement/book/' . $name) ;
            if($exists)
            {
                Storage::disk('upload_attachements') -> delete('attachement/book/' . $name) ;
            }
        }
    }