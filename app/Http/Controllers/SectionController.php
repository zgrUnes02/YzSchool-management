<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $Grades = Grade::with(['Sections']) -> get() ;
      $list_Grades = Grade::all() ;

      $list_classrooms = Classroom::all() ;
      $all_teachers = Teacher::all() ;

      return view('pages.Sections.sections_page' , compact('Grades' , 'list_Grades' , 'list_classrooms' , 'all_teachers')) ;

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      if(Section::where('name_section->ar' , $request -> Name_Section_Ar) ->
                  orWhere('name_section->en' , $request ->Name_Section_En) ->
                  exists()
      ){
          toastr() -> error(trans('section_truns.section_exists')) ;
          return redirect() -> back() -> withErrors(trans('section_truns.section_exists')) ;
      }
      try {

            $store_section = new Section() ;
            $store_section -> name_section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En] ;
            $store_section -> grade_id = $request->Grade_id ;
            $store_section -> classroom_id = $request->Class_id ;
            $store_section -> status = 1 ;
            $store_section -> save() ;

        //! insert into pivot table section_teacher ------------------------ :
            $store_section -> Teachers() -> attach($request -> teacher_id) ;
        //! ---------------------------------------------------------------- ;
          
          toastr() -> success(trans('section_truns.success_store')) ;
          return redirect() -> route('Section.index') ;
      }
      catch (\Exception $error)
      {
          return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
      }

  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
      try {
          $section_wanna_update = Section::findOrFail($request -> id_update) ;

          if ($request -> active_checkbox == 'on')
          {
              $section_wanna_update->update([
                  'name_section' => ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En],
                  'grade_id' => $request->Grade_id,
                  'classroom_id' => $request->Class_id,
                  'status' => 1
              ]);
          }
          else
          {
              $section_wanna_update->update([
                  'name_section' => ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En],
                  'grade_id' => $request->Grade_id,
                  'classroom_id' => $request->Class_id,
                  'status' => 2
              ]);
          }

          if(isset($request -> teacher_id))
          {
             $section_wanna_update -> Teachers() -> sync($request -> teacher_id) ;
          }

          toastr() -> success(trans('section_truns.success_update')) ;
          return redirect() -> route('Section.index') ;

      }
      catch (\Exception $error)
      {
          return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
      }

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
      try {
          Section::where('id' , '=' , $request -> id) -> delete() ;

          toastr() -> success(trans('section_truns.success_delete')) ;
          return redirect() -> route('Section.index') ;
      }
      catch (\Exception $error)
      {
          return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
      }
  }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("class_name", "id");

        return $list_classes ;
    }

}

?>
