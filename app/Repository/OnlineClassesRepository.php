<?php

    namespace App\Repository ;

    use App\Http\Traits\OnlineClassesTrait;
    use App\Models\Grade;
    use App\Models\OnlineClasses;
use MacsiDigital\Zoom\Facades\Zoom;

    class OnlineClassesRepository implements OnlineClassesRepositoryInterface
    {
        //? use the trait :
        use OnlineClassesTrait ;
        
        //! function INDEX() :
        public function index()
        {
            $classes = OnlineClasses::all() ;
            return view('pages.OnlineClasses.index' , compact('classes')) ;
        }

        //! function CREATE() :
        public function create()
        {
            $grades = Grade::all() ;
            return view('pages.OnlineClasses.create' , compact('grades')) ;
        }

        //! function STORE() :
        public function store($request)
        {
            $validation = $request -> validate([
                'Grade_id'      => 'required' ,
                'Classroom_id'  => 'required' ,
                'section_id'    => 'required' , 
                'title'         => 'required' ,
                'starting_time' => 'required' ,
                'duration'      => 'required' ,
            ]) ;

            try 
            {
                $meeting = $this -> createMeeting($request) ;

                OnlineClasses::create([
                    'grade_id'     => $request -> Grade_id      ,
                    'classroom_id' => $request -> Classroom_id  ,
                    'section_id'   => $request -> section_id    ,
                    'user_id'      => auth()   -> user() -> id  ,
                    'meeting_id'   => $meeting -> id            ,
                    'topic'        => $request -> title         ,
                    'start_at'     => $request -> starting_time ,
                    'duration'     => $request -> duration      ,
                    'password'     => $meeting -> password      ,
                    'start_url'    => $meeting -> start_url     ,
                    'join_url'     => $meeting -> join_url      ,
                ]);
                
                toastr() -> success(trans('onlineClasses.success_add')) ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('attendance.error')) ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! function DESTROY() :
        public function destroy($request , $id)
        {
            try 
            {
                $meeting = Zoom::meeting() -> find($request -> id_meeting) ;

                if ( $meeting )
                {
                    $meeting -> delete() ;
                    OnlineClasses::where('id' , $id) -> delete() ; 
                }
                
                OnlineClasses::where('id' , $id) -> delete() ;
                

                toastr() -> success(trans('onlineClasses.success_delete')) ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('attendance.error')) ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! function CREATE_INDIRECT()
        public function create_indirect()
        {
            try 
            {
                $grades = Grade::all() ;
                return view('pages.OnlineClasses.create-indirect' , compact('grades')) ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('attendance.error')) ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
            
        }

        //! function STORE_INDIRECT()
        public function store_indirect($request)
        {
            $validation = $request -> validate([
                'Grade_id'      => 'required' ,
                'Classroom_id'  => 'required' ,
                'section_id'    => 'required' , 
                'number'        => 'required' ,
                'title'         => 'required' ,
                'starting_time' => 'required' ,
                'duration'      => 'required' ,
                'password'      => 'required' ,
                'starting_link' => 'required|url' ,
                'students_link' => 'required|url' ,
            ]) ;

            try 
            {
                $classExists = OnlineClasses::where('meeting_id' , $request -> number) -> pluck('id') ;
                if( $classExists -> count() != 0 )
                {
                    toastr() -> warning(trans('onlineClasses.warning_exists')) ;
                    return redirect() -> back() -> withErrors(['error' => trans('onlineClasses.warning_exists')]) ;
                }

                $onlineClass = new OnlineClasses() ;
                $onlineClass -> grade_id     = $request -> Grade_id      ;
                $onlineClass -> classroom_id = $request -> Classroom_id  ;
                $onlineClass -> section_id   = $request -> section_id    ;
                $onlineClass -> user_id      = auth()   -> user() -> id  ;
                $onlineClass -> meeting_id   = $request -> number        ;
                $onlineClass -> topic        = $request -> title         ;
                $onlineClass -> start_at     = $request -> starting_time ;
                $onlineClass -> duration     = $request -> duration      ;
                $onlineClass -> password     = $request -> password      ;
                $onlineClass -> start_url    = $request -> starting_link ;
                $onlineClass -> join_url     = $request -> students_link ;
                $onlineClass -> save() ;

                toastr() -> success(trans('onlineClasses.success_add')) ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('attendance.error')) ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
            
        }
    }