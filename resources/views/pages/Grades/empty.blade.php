<?php
//    header("Refresh:1");
?>
@extends('layouts.master')
@section('css')

@section('title')
    {{trans('grade_trans.Grades')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('main_trans.Grades')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{trans('grade_trans.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('grade_trans.Grades')}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<!-- main body -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                {{-- ----------------- Errors Messages ---------------- --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- -----------------------------------------------------}}

                {{-- button for adding --}}
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            {{trans('grade_trans.add_new_grade')}}
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('grade_trans.Names')}}</th>
                                <th>{{trans('grade_trans.Notes')}}</th>
                                <th>{{trans('grade_trans.Actions')}}</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php $i = 0  ?>
                            @foreach($all_grades as $grade)
                                <tr>
                                    <?php $i++  ?>
                                    <td>{{ $i  }}</td>
                                    <td>{{ $grade -> name  }}</td>
                                    <td>{{ $grade -> notes  }}</td>
                                    <td class="text-center">
                                        <button style="width: 100px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $grade -> id }}">
                                            {{trans('edit_model_trans.edit')}}
                                        </button>
                                        <!-- Button delete -->
                                        <button style="width: 100px" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$grade -> id}}">
                                            {{trans('crud_trans.Delete_button')}}
                                        </button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->

                                <div class="modal fade" id="editModal{{ $grade -> id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    {{trans('edit_model_trans.update_grade')}}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('Grades.update') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">{{ trans('grade_trans.stage_name_ar') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="Name_ar" class="form-control" required value="{{$grade -> getTranslation('name' , 'ar')}}">
                                                            <input id="id" type="hidden" class="form-control" name="id" value="{{$grade -> id}}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">{{ trans('grade_trans.stage_name_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control" name="Name_en" required value="{{$grade -> getTranslation('name' , 'en')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">{{ trans('grade_trans.Notes') }}
                                                            :</label>
                                                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3" >{{$grade -> notes}}</textarea>
                                                    </div>
                                                    <br><br>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('grade_trans.Close') }}</button>
                                                <button type="submit" class="btn btn-success">{{ trans('grade_trans.submit') }}</button>
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <!-- ----------------------------------------------------------------------------- -->

                                <!-- delete_modal_Grade -->

                                <div class="modal fade" id="exampleModal{{$grade -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{trans('crud_trans.Delete_title')}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{trans('crud_trans.body_modal')}}
                                                <form action="{{route('Grades.destroy')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$grade -> id}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('crud_trans.Cancel')}}</button>
                                                <button type="submit" class="btn btn-danger">{{trans('crud_trans.delete_data')}}</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- add_modal_Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{trans('grade_trans.add_new_grade')}}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('Grades.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">{{ trans('grade_trans.stage_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="Name_ar" class="form-control" required value="{{ old('Name_ar') }}">
                            </div>
                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">{{ trans('grade_trans.stage_name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="Name_en" required value="{{ old('Name_en') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ trans('grade_trans.Notes') }}
                                :</label>
                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                      rows="3" value="{{ old('Notes') }}"></textarea>
                        </div>
                        <br><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('grade_trans.Close') }}</button>
                            <button type="submit" class="btn btn-success">{{ trans('grade_trans.submit') }}</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>

{{--<!-- row closed -->--}}
@endsection
@section('js')

@endsection
