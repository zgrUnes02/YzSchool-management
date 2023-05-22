<?php

    namespace App\Repository ;

    interface TeachersRepositoryInterface
    {
        //! All Teachers Info :
        public function getAllTeachers() ;

        //! All Specializations Info :
        public function getAllSpecializations() ;

        //! All Genders Info :
        public function getAllGenders() ;

        //! Function For Storing Teachers Info :
        public function storeInfo($info) ;

        //! Function For Deleting A Teacher :
        public function deleteTeacher($id) ;

        //! Function For Update A Teacher :
        public function updateTeacher($newInfo) ;
    }