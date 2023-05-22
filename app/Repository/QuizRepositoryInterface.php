<?php

    namespace App\Repository ;

    interface QuizRepositoryInterface
    {
        public function index() ;
        public function create() ;
        public function store($request) ;    
        public function edit($id) ;
        public function update($request , $id) ;
        public function destroy($request , $id) ;
        public function showFile($teacher_name , $file_name) ;
    }