@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('message_trans.messages') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{ trans('message_trans.messages') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('message_trans.messages') }} </li>
                    </ol>
                </div>
            </div>
        </div>
    <!-- breadcrumb -->

@section('PageTitle')
    {{ trans('message_trans.messages') }}
@stop
@endsection

@section('content')

    <!-- row -->
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
                                <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">

                                        <thead>
                                            <tr class="table-success">
                                                <th>#</th>
                                                <th> {{ trans('message_trans.full_name') }} </th>
                                                <th> {{ trans('message_trans.email') }} </th>
                                                <th> {{ trans('message_trans.processes') }} </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($messages as $message)
                                                <tr>
                                                    <td>{{$loop -> iteration}}</td>
                                                    <td>{{$message -> full_name}}</td>
                                                    <td>{{$message -> email}}</td>
                                                    <td>
                                                        @if (auth() -> user() -> type = 'admin')

                                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_quiz{{$message -> id}}">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button> 
                                                        @endif

                                                        <a class="btn btn-outline-success" href="{{ route('show_messages' , $message -> id) }}">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>  
                                                    </td>
                                                </tr>
                                                @include('pages.Messages.delete') 
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