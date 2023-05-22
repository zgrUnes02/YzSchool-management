<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeStoreRequest;
use App\Http\Requests\StoreGradeRequest;
use App\Models\Classroom;
use App\Models\Grade;
use http\Env\Response;
use Illuminate\Http\Request;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $all_grades = Grade::all() ;
      return view('pages.Grades.empty' , compact('all_grades')) ;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
        //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(GradeStoreRequest $request)

  {
      // This If() For Checking If The Grade Already Exists ! :
      if(Grade::where('name->ar' , $request -> Name_ar) -> orWhere('name->en' , $request -> Name_en) -> exists()){

          toastr()->error(trans('grade_trans.Exists'));

          return redirect()-> back() -> withErrors(trans('grade_trans.Exists')) ;
      }

      try {
      // $translation Is For Traslating The Data In Database ! :
          $translation = ['en' => $request -> Name_en , 'ar' => $request -> Name_ar] ;

          Grade::create([
              'name' => $translation ,
              'notes' => $request -> Notes ,
          ]) ;

          toastr()->success(trans('crud_trans.Insert'));

          return redirect()->route('Grades.index');

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
  public function update(GradeStoreRequest $request)
  {

      try {

          $translation = [
              'ar' => $request -> Name_ar ,
              'en' => $request -> Name_en
          ] ;

          $findGrade = Grade::findOrFail($request -> id) ;

          $findGrade -> update([
              'name' => $translation ,
              'notes' => $request -> Notes ,
          ]) ;

          toastr()->success(trans('crud_trans.Edit'));

          return redirect() -> route('Grades.index') ;
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
      try {

          $all_classrooms = Classroom::where('grade_id' , $request -> id) -> pluck('grade_id') ;
          $count_of_classrooms = $all_classrooms -> count() ;

          if( $count_of_classrooms == 0)
          {
              $grade_wanna_delete = Grade::findOrFail($request -> id) ;
              $grade_wanna_delete -> delete() ;

              toastr() -> success(trans('crud_trans.Delete')) ;
              return redirect() -> route('Grades.index') ;

          }
          else{
              toastr() -> error(trans('crud_trans.error_delete')) ;
              return redirect() -> route('Grades.index') ;
          }

      }
      catch (\Exception $error){
          return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
      }
      $all_classrooms = Classroom::where('grade_id' , $request -> id) -> pluck('grade_id') ;
      return $all_classrooms -> count() ;
  }

}

?>
