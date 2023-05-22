<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomStoreRequest;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

use App\Models\Classroom;
use http\Env\Response;

class ClassroomController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
        $all_classroom = Classroom::all() ;
        $all_grades = Grade::all() ;
        return view('pages.Classrooms.page1' , compact('all_grades' , 'all_classroom')) ;
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
      try {
          $List_Classes = $request->List_Classes;

        foreach ($List_Classes as $List_Class) {

            $My_Classes = new Classroom();

            $My_Classes->class_name = ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name_class_ar']];

            $My_Classes->grade_id = $List_Class['Grade_id'];

            $My_Classes->save();
        }

          toastr()->success(trans('crud_trans.Insert'));

          return redirect() -> route('Classroom.index') ;
      }
      catch (\Exception $error){
          return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
      }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

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
          $classroom_update = Classroom::findOrFail($request -> id) ;

          $classroom_update -> class_name = ['ar' => $request -> Name_class_ar , 'en' => $request -> Name_class_en] ;
          $classroom_update -> grade_id = $request -> grade_id ;
          $classroom_update -> save() ;

          toastr()->success(trans('classroom_truns.edit_message'));
          return redirect() -> route('Classroom.index') ;

      }

      catch (\Exception $error){
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
      $all_section = Section::where('classroom_id' , $request -> id) -> pluck('classroom_id') ;
      $count_of_section = $all_section -> count() ;

      if($count_of_section != 0){

          toastr() -> error(trans('classroom_truns.cant_delete')) ;
          return redirect() -> back() -> withErrors(trans('classroom_truns.cant_delete')) ;

      }

      try {
          $classroom_delete= Classroom::findOrFail($request -> id) ;
          $classroom_delete -> delete();

          toastr() -> success(trans('classroom_truns.delete_message')) ;
          return redirect() -> route('Classroom.index') ;
      }
      catch (\Exception $error){
          return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
      }

  }

    public function delete_checkbox(Request $request)
    {
        try {
            $all_classrooms_ids =  $request -> delete_all_id ;
            $test = explode(',' , $all_classrooms_ids) ;

            for ($i = 0 ; $i < sizeof($test) ; $i++)
            {
                Classroom::where('id' , $test[$i]) -> delete() ;
            }

            toastr() -> success(trans('classroom_truns.deleted_selected')) ;
            return redirect() -> route('Classroom.index') ;
        }
        catch (\Exception $error){
            return redirect() -> back() -> withErrors(['error' => $error -> getMessage()])  ;
        }
    }

}

?>
