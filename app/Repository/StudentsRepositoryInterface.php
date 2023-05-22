<?php

    namespace App\Repository ;

    interface StudentsRepositoryInterface
    {
        //! function for listing the students :
            public function getStudents() ;

        //! function for returning the view :
        public function createStudents() ;

        //! function for showing informations the view :
            public function show($id) ;

        //! function for updating the student :
        public function updateStudent($info , $id) ;

        //! function for storing data :
        public function storeStudent($info) ; 

        //! function for deleting student :
        public function deleteStudent($id_student_wanna_delete) ; 

        //! function for uploading more attachements :
        public function uploadMoreAttachements($attachements) ;

        //! function for downloading attachements :
        public function downloadAttachement($studentName , $fileName) ;

        //! function for returning view for edit :
            public function editStudent($id) ; 

        //! function for deleting attachements :  
            public function deleteAttachement($request) ;
        

        //! function for sending the classroom's name to tha ajax's code :
        public function getClassroomsForAjax($id) ;

        //! function for sending the section's name to tha ajax's code :
        public function getSectionsForAjax($id) ;
    }