<?php

    namespace App\Repository ;

    use App\Models\Grade;
    use App\Models\Student;
    use PHPUnit\Framework\MockObject\Builder\Stub;

    class StudentsGraduateRepository implements StudentsGraduateRepositoryInterface
    {
        public function index()
        {
            $graduateStudents = Student::onlyTrashed() -> get() ;
            return view('pages.Students.Graduation.graduateIndex' , compact('graduateStudents')) ;
        }

        public function create()
        {
            $grades = Grade::all() ;
            return view('pages.Students.Graduation.graduateCreate' , compact('grades')) ;
        }

        public function softDelete($request)
        {
            $validate = $request -> validate([
                'Grade_id' => 'required' ,
                'Classroom_id' => 'required' ,
                'section_id' => 'required' ,
            ]) ;

            $students_graduate = Student::where('grade_id' , $request -> Grade_id)
                                        -> where('classroom_id' , $request -> Classroom_id) 
                                        -> where('section_id' , $request -> section_id) -> get() ;

            if($students_graduate -> count() == 0)
            {
                toastr() -> warning(trans('students_trans.count_0')) ;
                return redirect() -> route('graduate.create') -> withErrors(['error' => trans('students_trans.count_0')]) ;
            }

            foreach($students_graduate as $student)
            {
                $ids = explode(',' , $student -> id) ;
                Student::whereIn('id' , $ids) -> delete() ;
            }

            toastr() -> success(trans('students_trans.graduate_with_success')) ;
            return redirect() -> route('graduate.create') ;
        }

        public function restoreOrDeleteDefinitly($request)
        {
            try
            {
                if ($request -> restore_Or_ForceDelete == 'forceDelete') 
                {
                    $studentWannaForceDelete = Student::onlyTrashed() -> where('id' , $request -> id_student)
                                                                    -> first() ;

                    //! force delete the students :
                    $studentWannaForceDelete -> forceDelete() ;

                    //! return :
                    toastr() -> success(trans('students_trans.deleteDefinitly')) ;
                    return redirect() -> back() ;


                }
                elseif ($request -> restore_Or_ForceDelete == 'restore')
                {
                    $studentWannaRestore = Student::onlyTrashed() -> where('id' , $request -> id_student)
                                                                -> first() ;

                    //! restore the students :
                    $studentWannaRestore -> restore() ;

                    //! return :
                    toastr() -> success(trans('students_trans.restore')) ;
                    return redirect() -> back() ;
                }
                else{
                    return redirect() -> back() -> withErrors(['error' => 'error']) ;
                }
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('students_trans.error')) ; 
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }
    }