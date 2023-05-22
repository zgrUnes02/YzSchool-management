@extends('layouts.master')
@section('css')
    
@section('title')
    {{trans('students_trans.management_promotion')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('students_trans.management_promotion')}}
@stop
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students_trans.management_promotion') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('students_trans.management_promotion') }}</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100 mt-4">
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

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                    {{ trans('students_trans.retreat_all') }}
                                </button>
                                <br><br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                            data-page-length="50"
                                            style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('Students_trans.name')}}</th>
                                            <th class="alert-danger">{{ trans('students_trans.old_grade') }}</th>
                                            <th class="alert-danger">{{ trans('students_trans.old_classroom') }}</th>
                                            <th class="alert-danger">{{ trans('students_trans.old_section') }}</th>
                                            <th class="alert-danger">{{ trans('students_trans.old_academic_year') }}</th>
                                            <th class="alert-success">{{ trans('students_trans.new_grade') }}</th>
                                            <th class="alert-success">{{ trans('students_trans.new_classroom') }}</th>
                                            <th class="alert-success">{{ trans('students_trans.new_section') }}</th>
                                            <th class="alert-success">{{ trans('students_trans.new_academic_year') }}</th>
                                            <th>{{trans('students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{$loop -> iteration}}</td>
                                                <td>{{ $promotion -> Students -> name }}</td>
                                                <td>{{ $promotion -> Grades -> name }}</td>
                                                <td>{{ $promotion -> Classrooms -> class_name }}</td>
                                                <td>{{ $promotion -> Sections -> name_section }}</td>
                                                <td>{{ $promotion -> from_year }}</td>
                                                <td>{{ $promotion -> toGrades -> name }}</td>
                                                <td>{{ $promotion -> toClassrooms -> class_name }}</td>
                                                <td>{{ $promotion -> toSections -> name_section }}</td>
                                                <td>{{ $promotion -> to_year }}</td>

                                                <td>
                                                    <a href="#"
                                                        class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                        class="fa fa-graduation-cap"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_one{{ $promotion->id }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('pages.Students.Promotion.deleteOne')
                                        @endforeach
                                        @include('pages.Students.Promotion.deleteAll')
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
