<?php

    namespace App\Repository ;

    interface ExamRepositoryInterface
    {
        public function index() ;
        public function create() ;
        public function store($request) ;
        public function update($request , $id) ;
        public function destroy($id) ;
    }