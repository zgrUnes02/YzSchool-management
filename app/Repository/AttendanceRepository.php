<?php

    namespace App\Repository ;

use App\Models\Attendance;
use App\Models\Classroom;
    use App\Models\Grade;
    use App\Models\Student;
    use App\Models\Teacher;

    class AttendanceRepository implements AttendanceRepositoryInterface
    {
        //! function INDEX :
        public function index()
        {
            try {
                $grades = Grade::with(['sections']) -> get() ;
                $classrooms = Classroom::all() ;
                $teachers = Teacher::all() ;
                $students = Student::all() ;

                return view('pages.Attendances.index' , compact('teachers' , 'grades' , 'classrooms' , 'students')) ;
            }
            catch(\Exception $error)
            {
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
            
        }

        //! function SHOW :
        public function show($id)
        {
            try {
                $students = Student::with('attendances') -> where('section_id' , $id) -> get() ;
                return view('pages.Attendances.show' , compact('students')) ;
            }
            catch(\Exception $error)
            {
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! function UPDATE :
        public function update($request , $id)
        {
            //
        }

        //! function STORE :
        public function store($request)
        {
            try {
                $attendance_date = date('Y-m-d') ;
                foreach($request -> attendences as $student_id => $presentOrAbsent)
                {
                    if ($presentOrAbsent == 'present')
                    {
                        $attendace_statu = 1 ;
                    }
                    elseif ($presentOrAbsent == 'absent')
                    {
                        $attendace_statu = 0 ;
                    }

                    Attendance::create([
                        'student_id' => $student_id ,
                        'garde_id' => $request -> grade_id ,
                        'classroom_id' => $request -> classroom_id ,
                        'section_id' => $request -> section_id ,
                        'teacher_id' => 1 ,
                        'attendance_date' => $attendance_date ,
                        'status' => $attendace_statu ,
                    ]) ;
                }
                toastr() -> success(trans('attendance.success_add')) ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('attendance.error')) ;
                return redirect() -> back() -> withErrors(['error' => trans('attendance.error')]) ;
            }
        } 

        //! function DESTROY :
        public function destroy($id)
        {
            //
        }
    }
    