@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('subject_trans.subjects') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{ trans('subject_trans.subjects') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('subject_trans.subjects') }} </li>
                    </ol>
                </div>
            </div>
        </div>
    <!-- breadcrumb -->

@section('PageTitle')
    {{ trans('subject_trans.subjects') }}
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
                                <a href="{{route('subject.create')}}" class="btn btn-success " role="button"
                                   aria-pressed="true"> {{ trans('subject_trans.add') }} </a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">

                                        <thead>
                                            <tr class="table-success">
                                                <th>#</th>
                                                <th>{{trans('subject_trans.name')}}</th>
                                                <th>{{trans('subject_trans.grade')}}</th>
                                                <th>{{trans('subject_trans.classroom')}}</th>
                                                <th>{{trans('subject_trans.processe')}}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($subjects as $subject)
                                                <tr>
                                                    <td>{{$loop -> iteration}}</td>
                                                    <td>{{$subject -> name}}</td>
                                                    <td>{{$subject -> grades ->  name}}</td>
                                                    <td>{{$subject -> classrooms -> class_name }}</td>
                                                    <td>
                                                        <a href="{{route('subject.edit' , $subject -> id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a class="btn btn-outline-danger" data-target="#Delete_subject{{ $subject -> id }}" data-toggle="modal"><i class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @include('pages.Subjects.delete') 
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