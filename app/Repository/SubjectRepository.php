<?php

    namespace App\Repository ;

    use App\Models\Classroom;
    use App\Models\Grade;
    use App\Models\Subject;
    use App\Models\Teacher;

    class SubjectRepository implements SubjectRepositoryInterface 
    {
        //! function INDEX() :
        public function index()
        {
            try {
                $subjects = Subject::all() ;
                return view('pages.Subjects.index' , compact('subjects')) ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('subject_trans.error')) ;
                return redirect() -> back() -> withErrors(['error' => trans('subject_trans.error')]) ;
            }
        }

        //! function CREATE() :
        public function create()
        {
            try {
                $grades = Grade::all() ;
                $teachers = Teacher::all() ;

                return view('pages.Subjects.create' , compact('grades' , 'teachers')) ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('students_trans.error')) ;
                return redirect() -> back() -> withErrors(['error' => trans('subject_trans.error')]) ;
            }
        }

        //! function STORE() :
        public function store($request)
        {
            //! validation :
            $validation = $request -> validate([
                'name_ar' => 'required' ,
                'name_en' => 'required' ,
                'Grade_id' => 'required' ,
                'Classroom_id' => 'required' ,
                'teacher_id' => 'required' ,
            ]) ;

            try {
                $subject = new Subject() ;
                $subject -> name = ['ar' => $request -> name_ar , 'en' => $request -> name_en] ;
                $subject -> grade_id = $request -> Grade_id ;
                $subject -> classroom_id = $request -> Classroom_id ;
                $subject -> teacher_id = $request -> teacher_id ;
                $subject ->save() ;

                toastr() -> success(trans('subject_trans.create_success')) ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('students_trans.error')) ;
                return redirect() -> back() -> withErrors(['error' => trans('subject_trans.error')]) ;
            }
        } 

        //! function EDIT() :
        public function edit($id)
        {
            try {
                $grades = Grade::all() ;
                $teachers = Teacher::all() ;

                $subject = Subject::findOrFail($id) ;
                return view('pages.Subjects.edit' , compact('subject' , 'grades' , 'teachers')) ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('students_trans.error')) ;
                return redirect() -> back() -> withErrors(['error' => trans('subject_trans.error')]) ;
            }
        } 

        //! function UPDATE() :
        public function update($request , $id)
        {
            //! validation :
            $validation = $request -> validate([
                'name_ar' => 'required' ,
                'name_en' => 'required' ,
                'Grade_id' => 'required' ,
                'Classroom_id' => 'required' ,
                'teacher_id' => 'required' ,
            ]) ;

            try {
                $subject = Subject::where('id' , $id) -> first() ;
                $subject -> name = ['ar' => $request -> name_ar , 'en' => $request -> name_en] ;
                $subject -> grade_id = $request -> Grade_id ;
                $subject -> classroom_id = $request -> Classroom_id ;
                $subject -> teacher_id = $request -> teacher_id ;
                $subject ->save() ;

                toastr() -> success(trans('subject_trans.edit_success')) ;
                return redirect() -> route('subject.index') ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('students_trans.error')) ;
                return redirect() -> back() -> withErrors(['error' => trans('subject_trans.error')]) ;
            }
        }

        public function destroy($id)
        {
            try {
                Subject::destroy($id) ;
                toastr() -> success(trans('subject_trans.delete_success')) ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('subject_trans.error')) ;
                return redirect() -> back() -> withErrors(['error' => trans('subject_trans.error')]) ;
            }

        }

    }