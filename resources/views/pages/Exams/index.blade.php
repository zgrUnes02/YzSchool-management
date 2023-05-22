@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('exam_trans.exams_list') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{ trans('exam_trans.exams_list') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('exam_trans.exams_list') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    <!-- breadcrumb -->

@section('PageTitle')
    {{ trans('exam_trans.exams_list') }}
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
                                <a href="{{route('exam.create')}}" class="btn btn-success " role="button"
                                   aria-pressed="true"> {{ trans('exam_trans.add_exam') }} </a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">

                                        <thead>
                                            <tr class="table-success">
                                                <th>#</th>
                                                <th>{{trans('subject_trans.name')}}</th>
                                                <th>{{trans('exam_trans.phase')}}</th>
                                                <th>{{trans('subject_trans.processe')}}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($exams as $exam)
                                                <tr>
                                                    <td>{{$loop -> iteration}}</td>
                                                    <td>{{$exam -> name}}</td>
                                                    <td>{{$exam -> term}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit_exam{{$exam -> id}}">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_exam{{$exam -> id}}">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @include('pages.Exams.delete') 
                                                @include('pages.Exams.edit')
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