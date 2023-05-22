<?php

    namespace App\Repository ;

    use App\Models\Grade;
    use App\Models\Promotion;
    use App\Models\Student;
    use Illuminate\Support\Facades\DB;

    class StudentsPromotionsRepository implements StudentsPromotionsRepositoryInterface
    {
        public function index()
        {
            $allGrades = Grade::all() ;
            return view('pages.Students.Promotion.index' , compact('allGrades')) ;
        }

        public function store($request)
        {
            
            try{
                //! get students :
                $students = Student::where('grade_id' , $request -> Grade_id)
                                -> where('classroom_id' , $request -> Classroom_id)  
                                -> where('section_id' , $request -> section_id) 
                                -> where('year_academic' , $request -> old_academic_year) 
                                -> get() ;

                //! transaction's begin ------ :
                    DB::beginTransaction() ;
                //! --------------------------

                foreach($students as $student)
                {
                    $ids = explode(',' , $student -> id) ;
                    Student::whereIn('id' , $ids) -> update([
                        'grade_id' => $request -> Grade_id_new ,
                        'classroom_id' => $request -> Classroom_id_new ,
                        'section_id' => $request -> section_id_new ,
                        'year_academic' => $request -> new_academic_year ,
                    ]) ;
                        
                    //! create in table promotion :
                    Promotion::updateOrCreate([
                        'student_id' => $student -> id ,

                        'from_grade' => $request -> Grade_id ,
                        'from_classroom' => $request -> Classroom_id ,
                        'from_section' => $request -> section_id ,
                        'from_year' => $request -> old_academic_year ,

                        'to_grade' => $request -> Grade_id_new ,
                        'to_classroom' => $request -> Classroom_id_new ,
                        'to_section' => $request -> section_id_new ,
                        'to_year' => $request -> new_academic_year ,
                    ]) ;
                }

                //! commit -------------- :
                    DB::commit() ;
                //! ---------------------

                toastr() -> success(trans('students_trans.promote_with_success')) ;
                return redirect() -> route('promotions.index') ;
            }
            catch(\Exception $error)
            {  
                //! rollback ------------- :
                    DB::rollBack() ;
                //! ----------------------

                toastr() -> error(trans('students_trans.promote_bad')) ;
                return redirect() -> route('promotions.index') -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! storePromotion function :
        public function create()
        {
            $promotions = Promotion::all() ;
            return view('pages.Students.Promotion.managementPromotions' , compact('promotions')) ;
        }

        //! destroy function :
        public function destroy($request)
        {
            try
            {
                //? if i want to retreat all promotions :
                if ($request -> page_id == 1)
                {
                    //? get all promotions :
                    $all_promotions = Promotion::all() ;

                    //* begin transaction :
                    DB::beginTransaction() ;

                    foreach($all_promotions as $promotion)
                    {
                        $ids = explode(',' , $promotion -> student_id) ;

                        //? update: 
                        Student::whereIn('id' , $ids) -> update([
                            'grade_id' => $promotion -> from_grade ,
                            'classroom_id' => $promotion -> from_classroom ,
                            'section_id' => $promotion -> from_section , 
                            'year_academic' => $promotion -> from_year ,
                        ]) ;
                    }

                    //? delete all promotions :
                    Promotion::truncate() ;

                    //* commit :
                    // DB::commit() ;

                    toastr() -> success(trans('students_trans.success_retreat_all_promotions')) ;
                    return redirect() -> back() ;
                }
                else 
                {
                    $promotionWannaRetreat = Promotion::where('id' , $request -> promotion_wanna_delete) -> first() ;
                    // $ids = explode(',' , $promotionWannaRetreat -> student_id) ;

                    Student::where('id' , $promotionWannaRetreat -> student_id) -> update([
                        'grade_id' => $promotionWannaRetreat -> from_grade ,
                        'classroom_id' => $promotionWannaRetreat -> from_classroom ,
                        'section_id' => $promotionWannaRetreat -> from_section ,
                        'year_academic' => $promotionWannaRetreat -> from_year ,
                    ]) ;
                    
                    $promotionWannaRetreat -> delete() ;
                    toastr() -> success(trans('students_trans.success_retreat_one_promotion')) ;
                    return redirect() -> back() ; 
                    
                }
              
            }
            catch(\Exception $error)
            {
                //* rollBack :
                DB::rollBack() ;

                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
            
        }
    }