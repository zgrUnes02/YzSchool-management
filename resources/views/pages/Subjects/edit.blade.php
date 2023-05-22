@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('subject_trans.edit_subject') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{ trans('subject_trans.edit_subject') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('subject_trans.edit_subject') }} </li>
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

                <form method="post"  action="{{route('subject.update' , $subject -> id)}}" autocomplete="off">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('subject_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                <input  type="text" name="name_ar" class="form-control" class="@error('name_ar') is-invalid @enderror" value="{{ $subject -> getTranslation('name' , 'ar') }}">
                                @error('name_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('subject_trans.name_en')}} : <span class="text-danger">*</span></label>
                                <input  class="form-control" name="name_en" type="text" class="@error('name_en') is-invalid @enderror" value="{{ $subject -> getTranslation('name' , 'en') }}">
                                @error('name_en')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Grade_id">{{ trans('subject_trans.grade')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Grade_id" class="@error('Grade_id') is-invalid @enderror" value="{{ old('Grade_id') }}">
                                    <option selected value="{{ $subject -> grade_id }}"> {{ $subject -> grades -> name }} </option>
                                    @foreach($grades as $grade)
                                        <option  value="{{ $grade->id }}">{{ $grade -> name }}</option>
                                    @endforeach
                                </select>
                                @error('Grade_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Classroom_id">{{ trans('subject_trans.classroom')}}<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id" class="@error('Classroom_id') is-invalid @enderror" value="{{ old('Classroom_id') }}">
                                    <option selected value="{{ $subject -> classroom_id }}"> {{ $subject -> classrooms -> class_name }} </option>

                                </select>
                                @error('Classroom_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="parent_id">{{ trans('subject_trans.teacher') }} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="teacher_id" class="@error('teacher_id') is-invalid @enderror" value="{{ old('parent_id') }}">
                                    <option selected value="{{ $subject -> teacher_id }}"> {{ $subject -> teachers -> name }} </option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
    
                    </div>
                    <br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('students_trans.edit_btn')}}</button>
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
                else 
                {
                    console.log('AJAX load did not work');
                }
            });
        }); 

    </script>

@endsection