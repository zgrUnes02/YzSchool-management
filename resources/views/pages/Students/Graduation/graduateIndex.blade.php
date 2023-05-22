@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('students_trans.graduate_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students_trans.graduate_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('students_trans.graduate_list') }}</li>
            </ol>
        </div>
    </div>
</div>
@section('PageTitle')
    {{trans('students_trans.Students')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100 mt-4" >
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table id="datatable" 
                                           class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">

                                        <thead class="table-success">
                                            <tr>
                                                <th>#</th>
                                                <th>{{trans('students_trans.name')}}</th>
                                                <th>{{trans('students_trans.Email')}}</th>
                                                <th>{{trans('students_trans.Gender')}}</th>
                                                <th>{{trans('students_trans.Grade')}}</th>
                                                <th>{{trans('students_trans.Classroom')}}</th>
                                                <th>{{trans('students_trans.Section')}}</th>
                                                <th>{{trans('students_trans.Processes')}}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($graduateStudents as $student)
                                                <tr>
                                                    <td>{{$loop -> iteration}}</td>
                                                    <td>{{$student->name}}</td>
                                                    <td>{{$student->email}}</td>
                                                    <td>{{$student -> genders -> name}}</td>
                                                    <td>{{$student -> grades -> name}}</td>
                                                    <td>{{$student -> classrooms -> class_name}}</td>
                                                    <td>{{$student -> sections -> name_section}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#force_delete{{$student->id}}"><i class="fa fa-trash"></i></button>
                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#restore{{$student->id}}"><i class="fa-sharp fa-solid fa-rotate-right"></i></button>
                                                    </td>
                                                </tr>
                                                @include('pages.Students.Graduation.forceDelete')
                                                @include('pages.Students.Graduation.restore')
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection
@section('js')

@endsection