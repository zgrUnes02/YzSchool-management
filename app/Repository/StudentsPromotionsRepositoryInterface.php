<?php

    namespace App\Repository ;

    interface StudentsPromotionsRepositoryInterface 
    {
        //! index function :
        public function index() ;

        //! store function :
        public function store($request) ;

        //! create function :
        public function create() ;

        //! destroy function :
        public function destroy($request) ; 

    }