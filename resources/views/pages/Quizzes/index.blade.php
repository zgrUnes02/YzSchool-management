@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('quiz_trans.quiz_list') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{ trans('quiz_trans.quiz_list') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('quiz_trans.quiz_list') }} </li>
                    </ol>
                </div>
            </div>
        </div>
    <!-- breadcrumb -->

@section('PageTitle')
    {{ trans('quiz_trans.quiz_list') }}
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

                                @if (auth() -> user() -> type != 'student')
                                    
                                    <a href="{{route('quiz.create')}}" class="btn btn-success " role="button" aria-pressed="true"> 
                                        {{ trans('quiz_trans.new_quiz') }} 
                                    </a>
                                
                                @endif

                                <br><br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">

                                        <thead>
                                            <tr class="table-success">
                                                <th>#</th>
                                                <th>{{ trans('quiz_trans.name') }}</th>
                                                <th>{{ trans('quiz_trans.name_subject') }}</th>
                                                <th>{{ trans('quiz_trans.grade_name') }}</th>
                                                <th>{{ trans('quiz_trans.classroom_name') }}</th>
                                                <th>{{ trans('quiz_trans.section_name') }}</th>
                                                <th>{{ trans('quiz_trans.name_teacher') }}</th>
                                                <th>{{ trans('parent_trans.Processes') }}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($quizzes as $quiz)
                                                <tr>
                                                    <td>{{$loop -> iteration}}</td>
                                                    <td>{{$quiz -> name}}</td>
                                                    <td>{{$quiz -> subjects -> name}}</td>
                                                    <td>{{$quiz -> grades -> name}}</td>
                                                    <td>{{$quiz -> classrooms -> class_name}}</td>
                                                    <td>{{$quiz -> sections -> name_section}}</td>
                                                    <td>{{$quiz -> teachers -> name}}</td>
                                                    <td>
                                                        @if (auth() -> user() -> type != 'student')
                                                            <a class="btn btn-outline-primary" href="{{route('quiz.edit' , $quiz -> id)}}">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>

                                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_quiz{{$quiz -> id}}">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button> 
                                                        @endif

                                                        <a class="btn btn-outline-warning" href="{{ url('/show') }}/{{$quiz -> teachers -> name}}/{{ $quiz -> path }}">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                        
                                                    </td>
                                                </tr>
                                                @include('pages.Quizzes.delete') 
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