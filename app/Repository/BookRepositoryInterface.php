<?php

    namespace App\Repository ;

    interface BookRepositoryInterface
    {
        public function index() ;
        public function create() ;
        public function store($request) ;
        public function destroy($request , $id) ;
        public function download($file_name) ;
        public function show($file_name) ;
        public function edit($id) ;
        public function update($request , $id) ;
    } 