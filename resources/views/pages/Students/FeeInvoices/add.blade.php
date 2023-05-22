@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('students_trans.add_new_invoice') }} {{ $student -> name }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('students_trans.add_new_invoice') }} {{ $student -> name }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('students_trans.add_new_invoice') }} {{ $student -> name }}</li>
                </ol>
            </div>
        </div>
    </div>
@section('PageTitle')
    {{ trans('students_trans.add_new_invoice') }} {{ $student -> name }}
@stop
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

                        <form class=" row mb-30" action="{{route('fee_invoices.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="repeater">
                                    <div data-repeater-list = "List_Fees" >
                                        <div data-repeater-item>
                                            <div class="row">

                                                <div class="col">
                                                    <label for="Name" class="mr-sm-2">{{ trans('students_trans.student_name') }}</label>
                                                    <select class="fancyselect" name="student_id" required>
                                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{ trans('students_trans.type_of_fee') }}</label>
                                                    <div class="box">
                                                        <select class="fancyselect" name="fee_id" required>
                                                            <option value="">-- {{ trans('parent_trans.Choose') }} --</option>
                                                            @foreach($fees as $fee)
                                                                <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{ trans('students_trans.amount') }}</label>
                                                    <div class="box">
                                                        <select class="fancyselect" name="amount" required>
                                                            <option value="">-- {{ trans('parent_trans.Choose') }} --</option>
                                                            @foreach($fees as $fee)
                                                                <option value="{{ $fee->anmount }}">{{ $fee->anmount }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <label for="description" class="mr-sm-2">{{ trans('students_trans.desc') }}</label>
                                                    <div class="box">
                                                        <input type="text" class="form-control" name="description" required>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{ trans('students_trans.Processes') }}</label>
                                                    <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('crud_trans.Delete_button') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-12">
                                            <input class="button" data-repeater-create type="button" value="{{ trans('parent_trans.Processes') }}"/>
                                        </div>
                                    </div><br>

                                    <input type="hidden" name="grade_id" value=" {{ $student->grade_id }} ">
                                    <input type="hidden" name="classroom_id" value=" {{ $student->classroom_id }} ">

                                    <button type="submit" class="btn btn-primary">{{ trans('grade_trans.submit') }}</button>
                                </div>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection
@section('js')

@endsection