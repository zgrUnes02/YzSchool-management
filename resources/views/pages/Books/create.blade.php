@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('library.add_new_book') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{ trans('library.add_new_book') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('library.add_new_book') }} </li>
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

                    <form method="post"  action="{{ route('library.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-3">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Grade_id">{{trans('students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Grade_id" class="@error('Grade_id') is-invalid @enderror" value="{{ old('Grade_id') }}">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($grades as $grade)
                                                <option  value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('Grade_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Classroom_id">{{trans('students_trans.Classroom')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Classroom_id" class="@error('Classroom_id') is-invalid @enderror" value="{{ old('Classroom_id') }}">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>

                                        </select>
                                        @error('Classroom_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="section_id">{{trans('students_trans.Section')}} : <span class="text-danger">*</span></label> </label>
                                        <select class="custom-select mr-sm-2" name="section_id" class="@error('section_id') is-invalid @enderror" value="{{ old('section_id') }}">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>

                                        </select>
                                        @error('section_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>

                            <br>

                            <div class="row mt-3">

                                <div class="col">
                                    <label for="title">{{ trans('library.book_name') }} : <span class="text-danger">*</span></label>
                                    <input type="text" name="book_name" class="form-control" autocomplete="none" class="@error('book_name') is-invalid @enderror">
                                    @error('book_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>

                            <div class="row mt-5">

                                <div class="col">
                                    <label for="title">{{ trans('library.select_book') }} : <span class="text-danger">*</span></label>
                                    <input type="file" name="book_file" class="form-control" autocomplete="none" class="@error('book_file') is-invalid @enderror">
                                    @error('book_file')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>

                        <button class="mt-5 btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('students_trans.Submit')}}</button>
                    </form>

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
