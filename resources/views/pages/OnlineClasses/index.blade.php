@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('onlineClasses.list_online_classes') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{ trans('onlineClasses.list_online_classes') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('onlineClasses.list_online_classes') }} </li>
                    </ol>
                </div>
            </div>
        </div>
    <!-- breadcrumb -->

@section('PageTitle')
    {{ trans('onlineClasses.list_online_classes') }}
@stop
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

                                @if (auth() -> user() -> type != 'student')
                                    <a href="{{route('onlineclasses.create')}}" class="btn btn-success " role="button" aria-pressed="true">
                                        {{ trans('onlineClasses.add_online_classes') }}
                                    </a>

                                    <a href="{{route('indirect')}}" class="btn btn-warning " role="button" aria-pressed="true">
                                        {{ trans('onlineClasses.add_online_classes_off') }}
                                    </a>
                                @endif

                                <br><br>
                                
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr class="table-success">
                                                <th>#</th>
                                                <th>{{trans('onlineClasses.grade')}}</th>
                                                <th>{{trans('onlineClasses.classroom')}}</th>
                                                <th>{{trans('onlineClasses.section')}}</th>
                                                <th> {{trans('onlineClasses.teacher')}} </th>
                                                <th> {{trans('onlineClasses.title')}} </th>
                                                <th> {{trans('onlineClasses.starting_dt')}} </th>
                                                <th> {{trans('onlineClasses.duration')}} </th>
                                                <th width=10> {{trans('onlineClasses.join')}} </th>
                                                @if (auth() -> user() -> type != 'student')
                                                    <th width=5> {{trans('onlineClasses.delete')}} </th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($classes as $classe)
                                                <tr>
                                                    <td> {{$loop -> iteration}}                  </td>
                                                    <td> {{$classe -> grades -> name}}           </td>
                                                    <td> {{$classe -> classrooms -> class_name}} </td>
                                                    <td> {{$classe -> sections -> name_section}} </td>
                                                    <td> {{$classe -> users -> name}}            </td>
                                                    <td> {{$classe -> topic}}                    </td>
                                                    <td> {{$classe -> start_at}}                 </td>
                                                    <td> {{$classe -> duration}} {{ trans('onlineClasses.mins') }}            </td>
                                                    <td> <a class='btn btn-outline-primary' href="{{$classe -> join_url }}" target="_blank"><i class="fa-regular fa-eye"></i></a> </td>
                                                    @if (auth() -> user() -> type != 'student')
                                                        <td>
                                                            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_classe{{$classe -> id}}"> 
                                                                <i class="fa-solid fa-trash"></i> 
                                                            </button>
                                                        </td>
                                                    @endif
                                                </tr>
                                                @include('pages.OnlineClasses.delete')
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