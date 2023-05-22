<?php 

    namespace App\Repository ;

use App\Models\Exam;

    class ExamRepository implements ExamRepositoryInterface
    {
        //! function INDEX() :
        public function index()
        {
            try {
                $exams = Exam::all() ;
                return view('pages.Exams.index' , compact('exams')) ;
            }
            catch(\Exception $error)
            {
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! function CREATE() :
        public function create()
        {
            try {
                return view('pages.Exams.create') ;
            }
            catch(\Exception $error)
            {
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! function STORE() :
        public function store($request)
        {
            $validation = $request -> validate([
                'name_ar' => 'required' ,
                'name_en' => 'required' ,
                'term' => 'required' ,
                'academic_year' => 'required' ,
            ]) ;

            try {
                $exam = new Exam() ;
                $exam -> name = ['ar' => $request -> name_ar , 'en' => $request -> name_en] ;
                $exam -> term = $request -> term ;
                $exam -> academic_year = $request -> academic_year ;
                $exam -> save() ;

                toastr() -> success(trans('exam_trans.add_succeess')) ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                return redirect() -> back() -> withErrors(['error' => trans('exam_trans.error')]) ;
            }
        }

        //! function UPDATE() :
        public function update($request , $id)
        {
            try {
                $exam = Exam::findOrFail($id) ;
                $exam -> name = ['ar' => $request -> name_ar , 'en' => $request -> name_en] ;
                $exam -> term = $request -> term ;
                $exam -> academic_year = $request -> academic_year ;
                $exam -> save() ;

                toastr() -> success(trans('exam_trans.edit_succeess')) ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                return redirect() -> back() -> withErrors(['error' => trans('exam_trans.error')]) ;
            }

        }

        //! function DESTROY() :
        public function destroy($id)
        {
            try {
                Exam::findOrFail($id) -> delete() ;

                toastr() -> success(trans('exam_trans.delete_succeess')) ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                return redirect() -> back() -> withErrors(['error' => trans('exam_trans.error')]) ;
            }
        }

    }