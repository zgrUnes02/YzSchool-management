<?php

    namespace App\Repository ;

    interface OnlineClassesRepositoryInterface
    {
        public function index() ;
        public function create() ;
        public function store($request) ;
        public function destroy($request , $id) ;
        public function create_indirect() ;
        public function store_indirect($request) ;
    }