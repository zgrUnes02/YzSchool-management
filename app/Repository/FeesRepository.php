<?php

    namespace App\Repository ;

    use App\Models\Classroom;
    use App\Models\Fee;
    use App\Models\Grade;
    use App\Models\Student;

    class FeesRepository implements FeesRepositoryInterface
    {
        public function index()
        {
            $allFees = Fee::all() ;
            return view('pages.Students.Fees.index' , compact('allFees')) ;
        }

        public function createFees()
        {
            $grades = Grade::all() ;
            return view('pages.Students.Fees.createFees' , compact('grades')) ;
        }

        public function storeFees($request)
        {
            $validated = $request -> validate([
                'title_ar' => 'required' ,
                'title_en' => 'required' ,
                'amount'   => 'required|numeric' ,
                'Grade_id' => 'required' ,
                'Classroom_id' => 'required' ,
                'year' => 'required' ,
                'description' => 'required' ,
                'fee_type' => 'required' ,
            ]) ;

            try 
            {
                $numberOfClassroom = Fee::where('classroom_id' , $request -> Classroom_id) ->
                                          where('grade_id' , $request -> Grade_id) -> 
                                          where('fee_type' , $request -> fee_type) ->
                                          pluck('id') ;

                if ($numberOfClassroom -> count() != 0)
                {
                    toastr() -> error(trans('students_trans.fee_already_exists')) ;
                    return redirect() -> back() -> withErrors(trans('students_trans.fee_already_exists')) ;
                }

                $fees = new Fee() ;
                $fees -> name = ['ar' => $request -> title_ar , 'en' => $request -> title_en] ;
                $fees -> anmount = $request -> amount ;
                $fees -> grade_id = $request -> Grade_id ;
                $fees -> classroom_id = $request -> Classroom_id ;
                $fees -> year_academic = $request -> year ;
                $fees -> description = $request -> description ;
                $fees -> fee_type = $request -> fee_type ;
                $fees -> save() ;

                toastr() -> success(trans('students_trans.created_fee_success')) ;
                return redirect() -> back() ;

            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('students_trans.error')) ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        public function edit($id)
        {
            $grades = Grade::all() ;
            $fee = Fee::where('id',$id) -> first() ;

            return view('pages.Students.Fees.editFee' , compact('grades' , 'fee')) ;
        }

        public function update($request , $id)
        {
            //? validation :
            $validated = $request -> validate([
                'title_ar' => 'required' ,
                'title_en' => 'required' ,
                'amount'   => 'required|numeric' ,
                'Grade_id' => 'required' ,
                'Classroom_id' => 'required' ,
                'year' => 'required' ,
                'description' => 'required' ,
            ]) ;

            //? update on fee's table :
            try {
                Fee::where('id' , $id) -> update([
                    'name'          => ['ar' => $request -> title_ar , 'en' => $request -> title_en] ,
                    'anmount'       => $request -> amount ,
                    'grade_id'      => $request -> Grade_id ,
                    'classroom_id'  => $request -> Classroom_id ,
                    'year_academic' => $request -> year ,
                    'description'   => $request -> description ,
                ]) ;

                toastr() -> success(trans('students_trans.success_edit_fee')) ;
                return redirect() -> route('fees.index') ;
            }
            catch (\Exception $error){
                return redirect() -> route('fees.index') -> withErrors(trans('students_trans.error')) ;
            }
        }

        public function destroy($id)
        {
            try {
                Fee::findOrFail($id) -> delete() ;

                toastr() -> success(trans('students_trans.success_delete_fee')) ;
                return redirect() -> back() ;
            }
            catch (\Exception $error){
                return redirect() -> back() -> withErrors(trans('students_trans.error')) ;
            }
        }

        public function show($id)
        {
            try {
                $classroom_name = Classroom::where('id' , $id) -> first() ;
                $allStudents = Student::where('classroom_id' , $id) -> get() ;
                return view('pages.Students.Fees.feeAndStudents' , compact('allStudents' , 'classroom_name')) ;
            } 
            catch (\Exception $error)
            {
                return redirect() -> back() -> withErrors(trans('students_trans.error')) ; 
            }
        }
    }