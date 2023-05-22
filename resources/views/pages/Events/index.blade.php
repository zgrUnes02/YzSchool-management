@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('events_trans.events') }} 
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">  {{ trans('events_trans.events') }}  </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('events_trans.events') }} </li>
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

                <div class="table-responsive">
                    <table id="datatable" class="table table-hover table-sm table-bordered p-0"
                           data-page-length="50"
                           style="text-align: center">

                        <thead>
                            <tr class="table-success">
                                <th>#</th>
                                <th> {{ trans('events_trans.start') }} </th>
                                <th> {{ trans('events_trans.title') }} </th>
                                <th width=10%> {{ trans('events_trans.processes') }} </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{$loop -> iteration}}</td>
                                    <td>{{$event -> title}}</td>
                                    <td>{{$event -> start}}</td>
                                    <td>
                                        @if (auth() -> user() -> type == 'admin')
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit_event{{$event -> id}}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button> 

                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_event{{$event -> id}}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button> 
                                        @endif
                                    </td>
                                </tr>
                                @include('pages.Events.delete') 
                                @include('pages.Events.edit') 
                            @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
