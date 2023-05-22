<?php

    namespace App\Repository ;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

    class TeachersRepository implements TeachersRepositoryInterface
    {
        //? Function For Getting All Teachers :
        public function getAllTeachers()
        {
            return Teacher::all() ;
        }

        //? Function For Getting All Specializations :
        public function getAllSpecializations()
        {
            return Specialization::all() ;
        }

        //? Function For Getting All Genders :
        public function getAllGenders()
        {
            return Gender::all() ;
        }

        //? Function For Storing Teachers Info :
        public function storeInfo($info)
        {
            Teacher::create([
                'email' => $info -> email ,
                'password' => $info -> password ,
                'name' => ['ar' => $info -> teacher_name_ar , 'en' => $info -> teacher_name_en] ,
                'specialization_id' => $info -> specialization_id ,
                'gender_id' => $info -> gender_id ,
                'joining_Date' => $info -> date_joining ,
                'address' => $info -> teacher_address ,        
            ]) ;

            //! make account for student :
            User::create([
                'name' => $info -> teacher_name_en ,
                'email' => $info -> email ,
                'password' => Hash::make($info -> password) ,
                'type' => 'teacher' ,
            ]) ;

            toastr() -> success(trans('teachers_trans.add_success')) ;
            return redirect() -> route('teachers.index') ;
        }

        //? Function For Deleting Teacher :
        public function deleteTeacher($id)
        {
            try 
            {
                $teacherWannaDelete = Teacher::findOrFail($id) ;
                $teacherWannaDelete -> delete() ;

                toastr() -> success(trans('teachers_trans.Delete_success')) ;
                return redirect() -> route('teachers.index') ;
            } 
            catch(\Exception $error) {
                return redirect() -> route('teachers.index') -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        public function updateTeacher($newInfo)
        {
            try {
                $teacher_update_now = Teacher::findOrFail($newInfo -> teacher_wanna_update) ;
                $teacher_update_now -> update([
                    'email' => $newInfo -> email ,
                    'password' => Hash::make($newInfo -> password) ,
                    'name' => ['ar' => $newInfo -> teacher_name_ar , 'en' => $newInfo -> teacher_name_en] ,
                    'specialization_id' => $newInfo -> specialization_id ,
                    'gender_id' => $newInfo -> gender_id ,
                    'joining_Date' => $newInfo -> date_joining ,
                    'address' => $newInfo -> teacher_address
                ]) ;

                toastr() -> success(trans('teachers_trans.update_success')) ;
                return redirect() -> route('teachers.index') ;
            }
            catch(\Exception $error)
            {
                return redirect() -> route('teachers.index') -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }
    }