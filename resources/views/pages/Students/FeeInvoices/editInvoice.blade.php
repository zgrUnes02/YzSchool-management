@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('students_trans.edit_invoices') }}    
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('students_trans.edit_invoices') }} </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{trans('section_truns.home')}}</a></li>
                <li class="breadcrumb-item active"> {{ trans('students_trans.edit_invoices') }} </li>
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
                
                <form action="{{route('fee_invoices.update' , $fee_invoices -> id)}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4">اسم الطالب</label>
                            <input type="text" value="{{$fee_invoices->students->name}}" readonly name="title_ar" class="form-control">
                        </div>


                        <div class="form-group col">
                            <label for="inputEmail4">{{trans('students_trans.amount')}}</label>
                            <input type="number" value="{{$fee_invoices->amount}}" name="amount" class="form-control">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputZip">{{trans('students_trans.type_of_fee')}}</label>
                            <select class="custom-select mr-sm-2" name="fee_id">
                                @foreach($fees as $fee)
                                    <option value="{{$fee->id}}">{{$fee->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="inputAddress">{{trans("students_trans.desc")}}</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{$fee_invoices->description}}</textarea>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">{{trans('grade_trans.submit')}}</button>

                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection