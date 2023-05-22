<?php

    namespace App\Repository ;

use App\Models\Grade;
use App\Models\Quiz;
use App\Models\Subject;
use App\Models\Teacher;
use Flasher\Laravel\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

    class QuizRepository implements QuizRepositoryInterface
    {
        //! function INDEX() :
        public function index()
        {
            $quizzes = Quiz::all() ;
            return view('pages.Quizzes.index' , compact('quizzes')) ;
        }

        //! function CREATE() :
        public function create()
        {
            $data['subjects'] = Subject::all() ;
            $data['teachers'] = Teacher::all() ;
            $data['grades']   = Grade::all() ;

            return view('pages.Quizzes.create' , $data) ;
        }

        //! function STORE() :
        public function store($request)
        {
            $file = $request -> file ;
            $fileName = $file -> getClientOriginalName() ;

            try {
                Quiz::create([
                    'name' => ['ar' => $request -> name_ar , 'en' => $request -> name_en] ,
                    'subject_id' => $request -> subject_id ,
                    'grade_id' => $request -> Grade_id ,
                    'classrooms_id' => $request -> Classroom_id ,
                    'section_id' => $request -> section_id ,
                    'teacher_id' => $request -> teacher_id ,
                    'path' => $fileName ,
                ]) ;

                $teacher = Teacher::where('id' , $request -> teacher_id) -> pluck('name') ;
                $file -> storeAs('/attachement/teacher/' . $teacher[0] , $fileName , 'upload_quiz') ;

                toastr() -> success(trans('quiz_trans.create_success')) ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! function EDIT() :
        public function edit($id)
        {
            try {
                $subjects = Subject::all() ;
                $teachers = Teacher::all() ;
                $grades   = Grade::all() ;
    
                $quiz = Quiz::findOrFail($id) ;
                return view('pages.Quizzes.edit' , compact('quiz' , 'subjects' , 'teachers' , 'grades')) ;
            }
            catch(\Exception $error)
            {
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! function UPDATE() :
        public function update($request , $id)
        {
            try {
                Quiz::where('id' , $id) -> update([
                    'name' => ['ar' => $request -> name_ar , 'en' => $request -> name_en] ,
                    'subject_id' => $request -> subject_id ,
                    'grade_id' => $request -> Grade_id ,
                    'classrooms_id' => $request -> Classroom_id ,
                    'section_id' => $request -> section_id ,
                    'teacher_id' => $request -> teacher_id ,
                ]) ;

                toastr() -> success(trans('quiz_trans.edit_success')) ;
                return redirect() -> route('quiz.index') ;
            }
            catch(\Exception $error)
            {
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! function DESTROY() :
        public function destroy($request , $id)
        {
            DB::beginTransaction() ;
            try {       
                //! delete file :         
                Storage::disk('upload_quiz') -> delete('attachement/teacher/' . $request -> name_teacher . '/' . $request -> file_path) ;

                //! delete quiz :
                Quiz::destroy($id) ;

                //! commit() :
                DB::commit() ;

                //! message success :
                toastr() -> success(trans('quiz_trans.delete_success')) ;
                return redirect() -> route('quiz.index') ;
            }
            catch(\Exception $error)
            {
                DB::rollBack() ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! function SHOWFILE() :
        public function showFile($teacher_name , $file_name)
        {
            try {
                return response() -> file(public_path('attachement/teacher/' . $teacher_name . '/' . $file_name));
            }
            catch(\Exception $error)
            {
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }
    }