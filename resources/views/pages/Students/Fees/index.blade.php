@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('students_trans.fees') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students_trans.fees') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('students_trans.fees') }}</li>
            </ol>
        </div>
    </div>
</div>
@section('PageTitle')
    Fees
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

                    <a href="{{route('fees.create')}}" class="btn btn-outline-success ml-3 mt-2">{{ trans('students_trans.create_new_fee') }}</a>

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
                                                <th>{{ trans('students_trans.name_fee') }}</th>
                                                <th>{{ trans('students_trans.amount_mad') }}</th>
                                                <th>{{ trans('students_trans.Grade') }}</th>
                                                <th>{{ trans('students_trans.Classroom') }}</th>
                                                <th>{{ trans('students_trans.Academic_year') }}</th>
                                                <th>{{ trans('students_trans.Processes') }}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($allFees as $fee)
                                                <tr>
                                                    <td>{{$loop -> iteration}}</td>
                                                    <td>{{$fee->name}}</td>
                                                    <td>{{$fee->anmount}} {{trans('students_trans.mad')}}</td>
                                                    <td>{{$fee -> grades -> name}}</td>
                                                    <td>{{$fee -> classrooms -> class_name}}</td>
                                                    <td>{{$fee -> year_academic}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteFee{{$fee->id}}"><i class="fa fa-trash"></i></button>
                                                        <a href="{{route('fees.edit' , $fee -> id)}}" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        {{-- <a href="{{ route('fees.show' , $fee -> classroom_id) }}" class="btn btn-warning text-white btn-sm"><i class="fa-sharp fa-regular fa-eye"></i></a> --}}
                                                    </td>
                                                </tr>
                                                @include('pages.Students.Fees.deleteFee') 
                                                {{-- @include('pages.Students.Graduation.restore')  --}}
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