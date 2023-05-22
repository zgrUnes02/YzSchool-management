<?php

    namespace App\Repository ;

    interface StudentsGraduateRepositoryInterface
    {
        public function index() ;

        public function create() ; 

        public function softDelete($request) ; 

        public function restoreOrDeleteDefinitly($request) ; 
    }