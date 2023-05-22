<?php

    namespace App\Repository ;

    class StudentAccountRepository implements StudentAccountRepositoryInterface
    {
        public function index()
        {
            return 'hello from the repository class exatly function index' ;
        }
    }