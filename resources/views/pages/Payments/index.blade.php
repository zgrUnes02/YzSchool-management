@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('students_trans.payments') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    payment
@stop
   <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  {{ trans('students_trans.payments') }} </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('grade_trans.Home') }}</a></li>
                    <li class="breadcrumb-item active"> {{ trans('students_trans.payments') }} </li>
                </ol>
            </div>
        </div>
    </div>  
    <!-- breadcrumb -->
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
                                        @foreach($payments as $payment)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$payment -> students -> name}}</td>
                                            <td>{{ number_format($payment -> amount, 2) }} {{trans('students_trans.mad')}}</td>
                                            <td>{{$payment->description}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_payment{{$payment->id}}" ><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_payment{{$payment->id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.Payments.delete')
                                        @include('pages.Payments.edit')
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

