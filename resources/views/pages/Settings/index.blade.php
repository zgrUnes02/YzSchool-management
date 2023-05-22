@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('settings.settings') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{ trans('settings.settings') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('settings.settings') }} </li>
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

                    <form method="post"  action="{{ route('settings.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" value="{{ $infos -> id }}" name="id">
                            <div class="row mt-3">

                                <div class="col">
                                    <label for="title">{{ trans('settings.school_name') }} : <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" autocomplete="none" class="@error('book_name') is-invalid @enderror"  value="{{ $infos -> school_name }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="title">{{ trans('settings.school_title') }} : <span class="text-danger">*</span></label>
                                    <input value="{{ $infos -> school_title }}" type="text" name="title" class="form-control" autocomplete="none" class="@error('book_name') is-invalid @enderror">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>

                            <div class="row mt-5">

                                <div class="col">
                                    <label for="title">{{ trans('settings.phone') }} : <span class="text-danger">*</span></label>
                                    <input value="{{ $infos -> phone }}" type="text" name="phone" class="form-control" autocomplete="none" class="@error('book_name') is-invalid @enderror">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="title">{{ trans('settings.email') }} : <span class="text-danger">*</span></label>
                                    <input value="{{ $infos -> school_email }}" type="text" name="email" class="form-control" autocomplete="none" class="@error('book_name') is-invalid @enderror">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="title">{{ trans('settings.address') }} : <span class="text-danger">*</span></label>
                                    <input value="{{ $infos -> address }}" type="text" name="address" class="form-control" autocomplete="none" class="@error('book_name') is-invalid @enderror">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>

                            <div class="row mt-5">

                                <div class="col">
                                    <label for="title">{{ trans('settings.end_first_term') }} : <span class="text-danger">*</span></label>
                                    <input value="{{ $infos -> end_first_term }}" type="date" name="end_first_term" class="form-control" autocomplete="none" class="@error('book_name') is-invalid @enderror">
                                    @error('end_first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="title">{{ trans('settings.end_second_term') }} : <span class="text-danger">*</span></label>
                                    <input value="{{ $infos -> end_second_term }}" type="date" name="end_second_term" class="form-control" autocomplete="none" class="@error('book_name') is-invalid @enderror">
                                    @error('end_second_term')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>

                            <div class="row mt-5">

                                <div class="col">
                                    <label for="title">{{ trans('settings.logo') }} : <span class="text-danger">*</span></label>
                                    <input value="{{ $infos -> name }}" type="file" name="logo" class="form-control" autocomplete="none" class="@error('book_file') is-invalid @enderror">
                                    @error('logo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <img style="width:500px" src="{{asset('attachement/logo/' . $infos -> logo)}}" alt="logo">
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

