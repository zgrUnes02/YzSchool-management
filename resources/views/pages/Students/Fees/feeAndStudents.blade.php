@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('students_trans.student_of') }} {{ $classroom_name -> class_name }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students_trans.student_of') }} {{ $classroom_name -> class_name }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('students_trans.student_of') }} {{ $classroom_name -> class_name }}</li>
            </ol>
        </div>
    </div>
</div>
@section('PageTitle')
    {{ trans('students_trans.student_of') }} {{ $classroom_name -> class_name }}
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
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">

                                        <thead>
                                            <tr class="table-success">
                                                <th>#</th>
                                                <th>{{trans('students_trans.name')}}</th>
                                                <th>{{trans('students_trans.Email')}}</th>
                                                <th>{{trans('students_trans.Grade')}}</th>
                                                <th>{{trans('students_trans.Classroom')}}</th>
                                                <th>{{trans('students_trans.Section')}}</th>
                                                <th>{{trans('students_trans.Processes')}}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($allStudents as $student)
                                                <tr>
                                                    <td>{{$loop -> iteration}}</td>
                                                    <td>{{$student->name}}</td>
                                                    <td>{{$student->email}}</td>
                                                    <td>{{$student -> grades -> name}}</td>
                                                    <td>{{$student -> classrooms -> class_name}}</td>
                                                    <td>{{$student -> sections -> name_section}}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa-solid fa-folder-open"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="{{route('students.show' , $student -> id)}}"><i class="fa-solid fa-user"></i> {{ trans('students_trans.Personal_info') }}</a>
                                                                <a class="dropdown-item" href="{{route('students.edit' , $student -> id)}}"><i class="fa-solid fa-user-pen"></i> {{ trans('students_trans.Edit_student') }}</a>
                                                                <a class="dropdown-item" href="{{route('fee_invoices.index')}}"><i class="fa-solid fa-money-bill-transfer"></i> Fee Invoices</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr> 
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