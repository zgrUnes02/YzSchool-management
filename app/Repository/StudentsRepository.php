<?php

    namespace App\Repository ;

    use App\Models\Blood;
    use App\Models\Classroom;
    use App\Models\Gender;
    use App\Models\Grade;
    use App\Models\Image;
    use App\Models\My_parents;
    use App\Models\Nationality;
    use App\Models\Section;
    use App\Models\Student;
use App\Models\User;
use Flasher\Laravel\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

    class StudentsRepository implements StudentsRepositoryInterface
    {
        //! function for listing the students :
        public function getStudents()
        {
            try{
                $allStudents = Student::all() ;
                return view('pages.Students.showStudents' , compact('allStudents')) ; 
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('students_trans.message_add_warning')) ;
                return redirect() -> route('students.create') -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! function for returning the view of add new student :
        public function createStudents()
        {
            try{
                $data['grades'] = Grade::all() ;
                $data['parents'] = My_parents::all() ;
                $data['bloods'] = Blood::all() ;
                $data['genders'] = Gender::all() ;
                $data['nationalities'] = Nationality::all() ;
    
                return view('pages.Students.addStudents' , compact('data')) ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('students_trans.message_add_warning')) ;
                return redirect() -> route('students.create') -> withErrors(['error' => $error -> getMessage()]) ;
            }

        }

        public function getClassroomsForAjax($id)
        {
            $myClassrooms = Classroom::where('grade_id' , $id) -> pluck('class_name' , 'id') ;
            return $myClassrooms ;
        }

        public function getSectionsForAjax($id)
        {
            $mySections = Section::where('classroom_id' , $id) -> pluck('name_section' , 'id') ;
            return $mySections ;
        }

        //! function for storing data :
        public function storeStudent($info)
        {          
            DB::beginTransaction() ;
            try
            {
                //! model Student :
                $student = new Student() ;
                
                //! insert :
                $student -> name = ['ar' => $info -> name_ar , 'en' => $info -> name_en]  ;
                $student -> email = $info -> email  ;
                $student -> password = Hash::make($info -> password)  ;
                $student -> birthdate = $info -> Birth_date  ;
                $student -> grade_id = $info -> Grade_id ; 
                $student -> classroom_id = $info -> Classroom_id ;
                $student -> section_id = $info -> section_id ;
                $student -> blood_id = $info -> blood_id ;
                $student -> nationality_id = $info -> nationalitie_id ;
                $student -> gender_id = $info -> gender_id ;
                $student -> parent_id = $info -> parent_id ;
                $student -> year_academic = $info -> academic_year ;

                //! save :
                $student -> save() ;

                //! make account for student :
                User::create([
                    'name' => $info -> name_en ,
                    'email' => $info -> email ,
                    'password' => Hash::make($info -> password) ,
                    'type' => 'student' ,
                ]) ;

                //! insert attachement :
                if($info -> hasfile('images'))
                {
                    foreach($info -> file('images') as $file)
                    {
                        $file_name = $file -> getClientOriginalName() ;
                        $file -> storeAs('attachement/student/'.$student->name , $file_name , 'upload_attachements');

                        //! model Image :
                        $images = new Image() ;

                        //! insert :
                        $images -> file_name = $file_name ;
                        $images -> imageable_id = $student -> id ;
                        $images -> imageable_type = 'App\Models\Student' ;

                        //! save :
                        $images -> save() ;
                    }
                }

                DB::commit() ;

                toastr() -> success(trans('students_trans.message_add_success')) ;
                return redirect() -> route('students.create') ;
            }
            catch(\Exception $error)
            {
                DB::rollBack() ;
                toastr() -> error(trans('students_trans.message_add_warning')) ;
                return redirect() -> route('students.create') -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! return view for edit
        public function editStudent($id)
        {
            try
            {
                $data['grades'] = Grade::all() ;
                $data['parents'] = My_parents::all() ;
                $data['bloods'] = Blood::all() ;
                $data['genders'] = Gender::all() ;
                $data['nationalities'] = Nationality::all() ;

                $studentWannaEdit = Student::where('id' , $id) -> first() ;

                return view('pages.Students.editStudent' , compact('studentWannaEdit' , 'data')) ;
            }
            catch(\Exception $error)
            {
                return redirect() -> route('students.index') -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        public function updateStudent($info , $id)
        {
            try{

                $updateStudent = Student::findOrfail($id) ;
                $updateStudent -> update([
                    'name' => ['ar' => $info -> name_ar , 'en' => $info -> name_en] ,
                    'email' => $info -> email ,
                    'password' => Hash::make($info -> password) ,
                    'birthdate' => $info -> Birth_date ,
                    'grade_id' => $info -> Grade_id ,
                    'classroom_id' => $info -> Classroom_id ,
                    'section_id' => $info -> section_id ,
                    'blood_id' => $info -> blood_id ,
                    'nationality_id' => $info -> nationalitie_id ,
                    'gender_id' => $info -> gender_id ,
                    'parent_id' => $info -> parent_id ,
                    'year_academic' => $info -> academic_year ,
                ]) ;
                
                //! toastr 
                toastr() -> success(trans('students_trans.update_message')) ;
                return redirect() -> route('students.index') ;
            }
            catch(\Exception $error)
            {
                return redirect() -> route('students.index') -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        public function deleteStudent($id_student_wanna_delete)
        {
            //! Check If The Student Has Attachements :
            $hasAnAttachement = Image::where('imageable_id' , $id_student_wanna_delete) -> Where('imageable_type' , 'App\Models\Student') -> pluck('id') ;
            if($hasAnAttachement->count() != 0)
            {
                toastr() -> error(trans('students_trans.sorryHasAttachements')) ;
                return redirect() -> route('students.index') ;
            } 

            try
            {
                $Student_delete = Student::findOrFail($id_student_wanna_delete) ;
                $Student_delete -> delete() ;

                toastr() -> success(trans('students_trans.message_delete')) ;
                return redirect() -> route('students.index') ;
            }
            catch(\Exception $error)
            {
                return redirect() -> route('students.index') -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        public function show($id)
        {
            $Student = Student::findOrFail($id) ;
            return view('pages.Students.showStudentInformations' , compact('Student')) ;
        }

        public function uploadMoreAttachements($attachments)
        {
            //? Start The Transaction :
            DB::beginTransaction() ;
            try{
                if($attachments -> hasfile('photos'))
                {
                    foreach($attachments -> photos as $file)
                    {
                        //! Upload The Attachements :
                        $file_name = $file -> getClientOriginalName() ;
                        $file -> storeAs('/attachement/student/'.$attachments -> student_name , $file_name , 'upload_attachements') ;

                        //! Insert On The Image Table :
                        $imageTable = new Image() ;

                        $imageTable -> file_name = $file_name ;
                        $imageTable -> imageable_id = $attachments -> student_id ;
                        $imageTable -> imageable_type = 'App\Models\Student' ;

                        //! Save :
                        $imageTable -> save() ;
                    }
                    //? Commit :
                    DB::commit() ;
                    toastr() -> success(trans('students_trans.moreAttachSuccess')) ;
                    return redirect() -> route('students.show' , $attachments -> student_id) ;
                }
            }
            catch(\Exception $error)
            {
                //? Roolback :
                DB::rollBack() ;
                toastr() -> error(trans('students_trans.moreAttachError')) ;
                return redirect() -> route('students.show' , $attachments -> student_id) -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! function for downloading attachements :
        public function downloadAttachement($studentName , $fileName)
        {
            return response() -> download('attachement/student/' . $studentName . '/' . $fileName) ;
        }

        //! function for deleting attachements :
        public function deleteAttachement($request)
        {
            try
            {
                Image::where('id' , $request -> id) -> where('imageable_id' , $request -> student_id) -> delete() ;
                Storage::disk('upload_attachements') -> delete('/attachement/student/' . $request -> student_name . '/' . $request -> filename) ; 

                toastr() -> success(trans('students_trans.deleteAttach')) ;
                return redirect() -> route('students.show' , $request -> student_id)  ;    
            }
            catch(\Exception $error)
            {
                return redirect() -> route('students.show' , $request -> student_id) -> withErrors(['error' => $error -> getMessage()]) ;
            }
              
        }
    }