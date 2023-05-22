@extends('layouts.master')
@section('css')
    
@section('title')
    {{trans('students_trans.Students')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students_trans.Students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('students_trans.Students') }}</li>
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
                                <a href="{{route('students.create')}}" class="btn btn-success " role="button"
                                   aria-pressed="true">{{trans('students_trans.Add_new_students')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
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
                                        @foreach($allStudents as $student)
                                            <tr>
                                                <td>{{$loop -> iteration}}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student -> genders -> name}}</td>
                                                <td>{{$student -> grades -> name}}</td>
                                                <td>{{$student -> classrooms -> class_name}}</td>
                                                <td>{{$student -> sections -> name_section}}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{ trans('students_trans.Processes') }}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route('students.show' , $student -> id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp; {{ trans('students_trans.show_students_info') }} </a>
                                                            <a class="dropdown-item" href="{{route('students.edit' , $student -> id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp; {{ trans('students_trans.edit_students_info') }} </a>
                                                            <a class="dropdown-item" href="{{route('fee_invoices.show' , $student -> id)}}"><i style="color: #0000cc" class="fa-sharp fa-solid fa-file-invoice-dollar"></i>&nbsp; {{ trans('students_trans.add_facture') }} </a>
                                                            <a class="dropdown-item" href="{{route('receipt.show' , $student -> id)}}"><i style="color: #2d9bb1" class="fa-solid fa-hand-holding-dollar"></i>&nbsp; receipt bond</a>
                                                            <a class="dropdown-item" href="{{route('payment.show' , $student -> id)}}"><i style="color: #ff9a04" class="fa-solid fa-money-bill-transfer"></i>&nbsp; payment</a>
                                                            <a class="dropdown-item" href="{{route('pay.show' , $student -> id)}}"><i style="color: #ff002f" class="fa-sharp fa-solid fa-arrow-right-arrow-left"></i>&nbsp; Exchange Bond</a>

                                                            <a class="dropdown-item" data-target="#Delete_Student{{ $student->id }}" data-toggle="modal" href="##Delete_Student{{ $student->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp; {{ trans('students_trans.delete_students_info') }} </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @include('pages.Students.deleteStudent') 
                                        @endforeach
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
