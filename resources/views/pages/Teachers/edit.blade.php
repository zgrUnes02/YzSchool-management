@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('teachers_trans.update_teacher') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('teachers_trans.update_teacher') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('teachers_trans.update_teacher') }}</li>
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
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('teachers.update')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$teacher_wanna_update -> id}}" name="teacher_wanna_update">
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('parent_trans.email')}}</label>
                                    <input type="email" class="form-control" name="email" value="{{$teacher_wanna_update -> email}}">
                                    @error('Email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('parent_trans.password')}}</label>
                                    <input type="password" class="form-control" name="password" value="{{$teacher_wanna_update -> password}}">
                                    @error('Password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-row">
            
                                <div class="col">
                                    <label for="title">{{trans('teachers_trans.Teacher_name_en')}}</label>
                                    <input type="text" class="form-control" name="teacher_name_en" value="{{$teacher_wanna_update -> getTranslation('name' , 'en')}}">
                                    @error('Teacher_name_en')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
            
                                <div class="col">
                                    <label for="title">{{trans('teachers_trans.Teacher_name_ar')}}</label>
                                    <input type="text" class="form-control" name="teacher_name_ar" value="{{$teacher_wanna_update -> getTranslation('name' , 'ar')}}">
                                    @error('Teacher_name_ar')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
            
                            </div>      
            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">{{trans('teachers_trans.Specialization')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="specialization_id">
                                        <option value="{{$teacher_wanna_update -> specializations -> id}}" selected>{{$teacher_wanna_update -> specializations -> name}}</option>
                                        @foreach($specializations as $specialization)
                                            <option value="{{$specialization->id}}"> {{$specialization->name}} </option>
                                        @endforeach
                                    </select>
                                    @error('Specialization')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">{{trans('teachers_trans.Gender')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                        <option value="{{$teacher_wanna_update -> genders -> id}}" selected>{{$teacher_wanna_update -> genders -> name}}</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}"> {{$gender->name}} </option>
                                        @endforeach
                                    </select>
                                    @error('Blood_Type_Father_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">                 
                                <div class="col">
                                    <label for="title">{{trans('teachers_trans.Date_joining')}}</label>
                                    <input type="date" name="date_joining" class="form-control" value="{{$teacher_wanna_update -> joining_Date}}">
                                    @error('Date_joining')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
            
            
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{trans('teachers_trans.Address_teacher')}}</label>
                                <textarea class="form-control" name="teacher_address" id="exampleFormControlTextarea1" rows="4">{{$teacher_wanna_update -> address}}</textarea>
                                @error('Address_teacher')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
            

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">
                                {{trans('teachers_trans.update_button')}}
                            </button>

                            <a href="{{route('teachers.index')}}" class="btn btn-danger btn-sm nextBtn btn-lg pull-left">
                                {{trans('teachers_trans.Back')}}
                            </a>
        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
