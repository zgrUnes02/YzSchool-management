@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('students_trans.receipt_bonds') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">  {{ trans('students_trans.receipt_bonds') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('grade_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('students_trans.receipt_bonds') }} </li>
                    </ol>
                </div>
            </div>
        </div>  
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('students_trans.receipt_bonds') }}
@stop
@endsection

@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body mt-4">
                    <div class="col-xl-12 mb-30 m-1">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('students_trans.name')}}</th>
                                            <th>{{trans('students_trans.amount')}}</th>
                                            <th>{{trans('students_trans.desc')}}</th>
                                            <th>{{trans('students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($receipts as $receipt_student)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$receipt_student -> students -> name}}</td>
                                            <td>{{ number_format($receipt_student -> debit, 2) }} {{trans('students_trans.mad')}}</td>
                                            <td>{{$receipt_student->description}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_receipt{{$receipt_student->id}}" ><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$receipt_student->id}}" ><i class="fa fa-trash"></i></button>
                                                    <a href="{{route('receipt.show' , $receipt_student -> students -> id)}}" class="btn btn-success btn-sm"><i class="fa-sharp fa-solid fa-plus"></i></a>
                                                </td>
                                            </tr>
                                        @include('pages.Receipt.delete')
                                        @include('pages.Receipt.edit')
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

