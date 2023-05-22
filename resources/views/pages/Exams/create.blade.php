@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('exam_trans.add_exam') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">{{ trans('exam_trans.add_exam') }}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('exam_trans.add_exam') }}</li>
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

                <form method="post"  action="{{ route('exam.store') }}" autocomplete="off">
                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('exam_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                <input  type="text" name="name_ar" class="form-control" class="@error('name_ar') is-invalid @enderror" value="{{ old('name_ar') }}">
                                @error('name_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('exam_trans.name_en')}} : <span class="text-danger">*</span></label>
                                <input  class="form-control" name="name_en" type="text" class="@error('name_en') is-invalid @enderror" value="{{ old('name_en') }}">
                                @error('name_en')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{trans('exam_trans.phase')}} :</label>
                                <input type="number" name="term" class="form-control" class="@error('term') is-invalid @enderror" value="{{ old('term') }}">
                                @error('term')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="academic_year">{{trans('students_trans.Academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year" class="@error('academic_year') is-invalid @enderror" value="{{ old('academic_year') }}">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('academic_year')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                
                    </div>
                    
                    <br>
                        
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('students_trans.Submit')}}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->

@endsection

@section('js')
    
@endsection