@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('attendance.sections_list') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{ trans('attendance.sections_list') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('grade_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('attendance.sections_list') }} </li>
                    </ol>
                </div>
            </div>
        </div>  
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('attendance.sections_list') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">

                        @foreach ($grades as $Grade)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $Grade->name }}</a>
                                <div class="acd-des">

                                    <div class="row">
                                        <div class="col-xl-12 mb-5">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark text-center">
                                                                    <th>#</th>
                                                                    <th>{{ trans('attendance.section') }}</th>
                                                                    <th>{{ trans('section_truns.Name_Class') }}</th>
                                                                    <th>{{ trans('section_truns.status') }}</th>
                                                                    <th>{{ trans('section_truns.processes') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($Grade->sections as $list_Sections)
                                                                <tr class="text-center">
                                                                    <td>{{ $loop -> iteration }}</td>
                                                                    <td>{{$list_Sections -> name_section}}</td>
                                                                    <td>{{$list_Sections -> classrooms -> class_name}}</td>
                                                                    <td>
                                                                        @if ($list_Sections -> status == 1)
                                                                            <label class="badge badge-success">
                                                                                {{ trans('section_truns.Status_Section_AC') }}
                                                                            </label>
                                                                        @else
                                                                            <label class="badge badge-danger">
                                                                                {{ trans('section_truns.Status_Section_No') }}
                                                                            </label>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('attendance.show' , $list_Sections -> id) }}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">{{ trans('attendance.student_list') }}</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- row closed -->
@endsection

@section('js')

    {{-- <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script> --}}