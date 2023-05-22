<?php

    namespace App\Repository ;

    interface FeesRepositoryInterface
    {
        //! index function :
        public function index() ;

        //! createFees function :
        public function createFees() ;

        //! storeFees function :
        public function storeFees($request) ;

        //! edit function :
        public function edit($id) ;

        //! update function :
        public function update($request , $id) ;

        //! destroy function :
        public function destroy($id) ;

        //! show function :
        public function show($id) ;
    }