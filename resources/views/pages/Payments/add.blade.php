@extends('layouts.master')
@section('css')
    
@section('title')
progressing {{ trans('students_trans.for') }} {{ $student -> name }} 
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> progressing {{ trans('students_trans.for') }} {{ $student -> name }} </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('grade_trans.Home')}}</a></li>
                    <li class="breadcrumb-item active"> progressing {{ trans('students_trans.for') }} {{ $student -> name }} </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@section('PageTitle')
    progressing {{ trans('students_trans.for') }} {{ $student -> name }} 
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

                    <form method="post" action="{{route('payment.store')}}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col mt-3">
                                <div class="form-group">
                                    <label>{{trans('students_trans.amount')}} : <span class="text-danger">*</span></label>
                                    <input style="border-radius: 20px" class="form-control" name="amount" type="number" class="@error('debit') is-invalid @enderror">
                                    <input type="hidden" name="student_id"  value="{{$student->id}}" class="form-control">
                                </div>
                                @error('amount')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col mt-3">
                                <div class="form-group">
                                    <label>{{trans('students_trans.student_owes_to_school')}} : </label>
                                    <input style="border-radius: 20px" 
                                           value="{{$student -> students_accounts -> sum('debit') - $student -> students_accounts -> sum('cedit')}}" 
                                           class="form-control" 
                                           name="fund" 
                                           type="number" 
                                           class="@error('fund') is-invalid @enderror" 
                                           readonly >
                                </div>
                                @error('fund')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{trans('students_trans.desc')}} : <span class="text-danger">*</span></label>
                                    <textarea style="border-radius: 20px" class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" class="@error('description') is-invalid @enderror"></textarea>
                                </div>
                                @error('description')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <button class="btn btn-success pull-right mt-4 mb-2" type="submit">{{trans('grade_trans.submit')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    
@endsection
@section('js')

@endsection