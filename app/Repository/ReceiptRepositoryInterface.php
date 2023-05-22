<?php 

    namespace App\Repository ;

    interface ReceiptrepositoryInterface
    {
        public function index() ;
        public function show($id) ;
        public function store($request) ;
        public function edit($request , $id) ;
        public function destroy($id) ;
    }