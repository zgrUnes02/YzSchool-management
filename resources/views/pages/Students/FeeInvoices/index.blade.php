@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('students_trans.invoices') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('students_trans.invoices') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('students_trans.invoices') }}</li>
                </ol>
            </div>
        </div>
    </div>
@section('PageTitle')
    {{ trans('students_trans.invoices') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <br><br>
                    <div class="col-xl-12 mb-30">               
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('teachers_trans.Name')}}</th>
                                            <th>{{trans('students_trans.type_of_fee')}}</th>
                                            <th>{{trans('students_trans.amount')}}</th>
                                            <th>{{trans('students_trans.grade')}}</th>
                                            <th>{{trans('students_trans.classroom')}}</th>
                                            <th>{{trans('students_trans.desc')}}</th>
                                            <th>{{trans('parent_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Fee_invoices as $Fee_invoice)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$Fee_invoice -> students -> name}}</td>
                                                <td>{{$Fee_invoice -> fees -> name }}</td>
                                                <td>{{$Fee_invoice -> amount }} {{trans('students_trans.mad')}}</td>
                                                <td>{{$Fee_invoice -> grades -> name }}</td>
                                                <td>{{$Fee_invoice -> classrooms -> class_name}}</td>
                                                <td>{{$Fee_invoice -> description }}</td>
                                                <td>
                                                    <a href="{{route('fee_invoices.edit' , $Fee_invoice -> id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteInvoices{{$Fee_invoice -> id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.Students.FeeInvoices.deleteInvoices')
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