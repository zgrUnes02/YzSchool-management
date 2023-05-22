
@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('quiz_trans.new_quiz') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{ trans('quiz_trans.new_quiz') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('quiz_trans.new_quiz') }} </li>
                    </ol>
                </div>
            </div>
        </div>
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('quiz_trans.new_quiz') }}
@stop
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('quiz.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                @csrf

                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">{{ trans('quiz_trans.name_ar') }} : <span class="text-danger">*</span></label>
                                        <input type="text" name="name_ar" class="form-control" autocomplete="none">
                                    </div>

                                    <div class="col">
                                        <label for="title">{{ trans('quiz_trans.name_en') }} : <span class="text-danger">*</span></label>
                                        <input type="text" name="name_en" class="form-control" autocomplete="none">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row mt-3">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="subject_id">{{trans('quiz_trans.name_subject')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="subject_id">
                                                <option selected disabled>{{ trans('parent_trans.Choose') }}...</option>
                                                @foreach($subjects as $subject)
                                                    <option  value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('quiz_trans.name_teacher')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="teacher_id">
                                                <option selected disabled>{{ trans('parent_trans.Choose') }}...</option>
                                                @foreach($teachers as $teacher)
                                                    <option  value="{{ $teacher -> id }}">{{ $teacher -> name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row mt-4">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('quiz_trans.grade_name')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Grade_id">
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Classroom_id">{{trans('quiz_trans.classroom_name')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Classroom_id">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">{{trans('quiz_trans.section_name')}} : <span class="text-danger">*</span> </label>
                                            <select class="custom-select mr-sm-2" name="section_id">

                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row mt-4">

                                    <div class="col-3">
                                        <label for="file">{{trans('quiz_trans.quiz')}} : <span class="text-danger">*</span></label>
                                        <input style="background: none" type="file" name="file" class="form-control" required accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
                                    </div>

                                </div>

                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right mt-3" type="submit">{{ trans('quiz_trans.add') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection

@section('js')

    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Classroom_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('select[name="Classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

@endsection
