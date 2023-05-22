@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('students_trans.create_new_fee') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students_trans.create_new_fee') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('students_trans.create_new_fee') }}</li>
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

                {{------------------- errors checking ------------------}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- ------------------------------------------------- --}}

                <form action="{{route('fees.store')}}" method="post">

                    @csrf

                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputEmail4">{{ trans('students_trans.name_fee_ar') }}</label>
                            <input type="text" name="title_ar" class="form-control" class="@error('title_ar') is-invalid @enderror"  value="{{ old('title_ar') }}">
                            @error('title_ar')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group col">
                            <label for="inputEmail4">{{ trans('students_trans.name_fee_en') }}</label>
                            <input type="text"  class="form-control" class="@error('title_en') is-invalid @enderror" name="title_en"  value="{{ old('title_en') }}">
                            @error('title_en')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group col">
                            <label for="inputEmail4">{{ trans('students_trans.fees_amount') }}</label>
                            <input type="number"  class="form-control" class="@error('amount') is-invalid @enderror" name="amount"  value="{{ old('amount') }}">
                            @error('amount')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    
                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputState">{{ trans('students_trans.Grade') }}</label>
                            <select class="custom-select mr-sm-2" name="Grade_id" class="@error('Grade_id') is-invalid @enderror">
                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($grades as $Grade)
                                    <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                @endforeach
                            </select>
                            @error('Grade_id')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group col">
                            <label for="inputZip"> {{ trans('students_trans.Classroom') }} </label>
                            <select class="custom-select mr-sm-2" name="Classroom_id" class="@error('Classroom_id') is-invalid @enderror">

                            </select>
                            @error('Classroom_id')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col">
                            <label for="inputZip">{{ trans('students_trans.Academic_year') }}</label>
                            <select class="custom-select mr-sm-2" name="year" class="@error('year') is-invalid @enderror">
                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                @php
                                    $current_year = date("Y")
                                @endphp
                                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                    <option value="{{ $year}}">{{ $year }}</option>
                                @endfor
                            </select>
                            @error('year')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col">
                            <label for="inputState">{{ trans('students_trans.fee_type') }}</label>
                            <select class="custom-select mr-sm-2" name="fee_type" class="@error('fee_type') is-invalid @enderror">
                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    <option value="1">{{ trans('students_trans.school') }}</option>
                                    <option value="2">{{ trans('students_trans.bus') }}</option>
                            </select>
                            @error('fee_type')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label for="description">{{ trans('students_trans.desc') }}</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">{{ trans('students_trans.Submit') }}</button>

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