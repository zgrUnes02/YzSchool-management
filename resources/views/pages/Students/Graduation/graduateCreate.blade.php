@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('students_trans.graduating_students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students_trans.graduating_students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('students_trans.graduating_students') }}</li>
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('graduate.store')}}" method="post">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputState">{{trans('students_trans.Grade')}}</label>
                            <select class="custom-select mr-sm-2" 
                                    name="Grade_id" 
                                    required
                                    class="@error('Grade_id') is-invalid @enderror">

                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($grades as $Grade)
                                    <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                                @endforeach
                            </select>
                            @error('Grade_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group col">
                            <label for="Classroom_id">{{trans('students_trans.Classroom')}} :</label>
                            <select class="custom-select mr-sm-2" 
                                    name="Classroom_id" 
                                    required
                                    class="@error('Classroom_id') is-invalid @enderror">

                            </select>
                            @error('Classroom_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col">
                            <label for="section_id">{{trans('students_trans.Section')}} : </label>
                            <select class="custom-select mr-sm-2" 
                                    name="section_id" 
                                    required
                                    class="@error('section_id') is-invalid @enderror">

                            </select>
                            @error('section_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">submit</button>
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
                            $('select[name="Classroom_id"]').append('<option selected disabled>' + '{{trans('students_trans.Choose')}}' + '...</option>')
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
                            $('select[name="section_id"]').append('<option selected disabled>' + '{{trans('students_trans.Choose')}}' + '...</option>')
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