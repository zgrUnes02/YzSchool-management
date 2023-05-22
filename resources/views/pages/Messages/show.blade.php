@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('message_trans.messages') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{ trans('message_trans.messages') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('message_trans.messages') }} </li>
                    </ol>
                </div>
            </div>
        </div>
    <!-- breadcrumb -->

@section('PageTitle')
    {{ trans('message_trans.messages') }}
@stop
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

                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100 mt-4" >
                            
                            <main id="main" style="margin:20px;padding: -40px;margin-bottom:-18px " class="main">

                    <div class="pagetitle">
                
                    </div><!-- End Page Title -->
                
                    <section class="section profile">
                        <div class="row">
                
                
                            <div class="col-xl-12" >
                
                                <div class="card">
                                    <div class="card-body pt-3">
                                        <!-- Bordered Tabs -->
                                        <ul class="nav nav-tabs nav-tabs-bordered">
                
                                            <li class="nav-item">
                                                <button class="nav-link active" data-bs-toggle="tab" >Message</button>
                                            </li>
                
                                        </ul>
                                        <div class="tab-content pt-2">
                
                                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                                <div class="form-floating mb-4">
                                                    <textarea disabled style="min-height:200px" class="form-control"> {{ $message -> message }} </textarea>
                                                </div>

                                            </div>
                
                                        </div><!-- End Bordered Tabs -->
                
                                    </div>
                                </div>
                
                            </div>
                        </div>
                    </section>
                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection
@section('js')
   
@endsection