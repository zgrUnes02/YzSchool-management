@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('attendance.title') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">  {{ trans('attendance.title') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('grade_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('attendance.title') }} </li>
                    </ol>
                </div>
            </div>
        </div>  
    <!-- breadcrumb -->
@section('PageTitle')
       {{ trans('attendance.title') }}
@stop
<!-- breadcrumb -->
@endsection

@section('content')

    <div class="card card-statistics mb-4">
        <div class="card-body">
            <div class="accordion gray plus-icon round">

                <!-- row -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ session('status') }}</li>
                        </ul>
                    </div>
                @endif

                <h5 class="mb-5 mt-2 alert alert-success text-center" style="font-family: 'Cairo', sans-serif;color: black"> {{ trans('attendance.date') }} : {{ date('Y - m - d') }} </h5>
                <form method="post" action="{{ route('attendance.store') }}">
                    @csrf
                    <table id="datatable" class="table table-hover table-sm table-bordered p-0 mb-4" data-page-length="50" style="text-align: center">
                        <thead>
                            <tr>
                                <th class="alert-success">#</th>
                                <th class="alert-success">{{ trans('Students_trans.name') }}</th>
                                <th class="alert-success">{{ trans('parent_trans.email') }}</th>
                                <th class="alert-success">{{ trans('students_trans.Gender') }}</th>
                                <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
                                <th class="alert-success">{{ trans('students_trans.Classroom') }}</th>
                                <th class="alert-success">{{ trans('attendance.section') }}</th>
                                <th class="alert-success">{{ trans('Students_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td> {{ $loop -> iteration }} </td>
                                    <td> {{ $student -> name }} </td>
                                    <td> {{ $student -> email }} </td>
                                    <td> {{ $student -> genders -> name }} </td>
                                    <td> {{ $student -> grades -> name }} </td>
                                    <td> {{ $student -> classrooms -> class_name }} </td>
                                    <td> {{ $student -> sections -> name_section }} </td>

                                    @if( isset($student -> attendances() -> where('attendance_date' , date('Y-m-d')) -> first() -> student_id))

                                        <td>

                                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                <input name="attendences[{{ $student -> id }}]" disabled
                                                    {{ $student -> attendances() -> first() -> status == 1 ? 'checked' : '' }}
                                                    class="leading-tight" type="radio" value="presence">
                                                <span class="text-success">
                                                    {{ trans('attendance.present') }}
                                                </span>
                                            </label>

                                            <label class="ml-4 block text-gray-500 font-semibold">
                                                <input name="attendences[{{ $student -> id }}]" disabled 
                                                    {{ $student -> attendances() -> first() -> status == 0 ? 'checked' : '' }}
                                                    class="leading-tight" type="radio" value="absent">
                                                <span class="text-danger">
                                                    {{ trans('attendance.absent') }}
                                                </span>
                                            </label>
                                        </td>
                            
                                    @else

                                        <td>

                                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                <input name="attendences[{{ $student -> id }}]" class="leading-tight" type="radio" value="present">
                                                <span class="text-success">
                                                    {{ trans('attendance.present') }}
                                                </span>
                                            </label>

                                            <label class="ml-4 block text-gray-500 font-semibold">
                                                <input name="attendences[{{ $student -> id }}]" class="leading-tight" type="radio" value="absent">
                                                <span class="text-danger">
                                                    {{ trans('attendance.absent') }}
                                                </span>
                                            </label>

                                        </td>

                                    @endif

                                    {{--* <input type="hidden" name="student_id[]" value="{{ $student -> id }}"> --}}
                                    <input type="hidden" name="grade_id" value="{{ $student -> grades -> id }}">
                                    <input type="hidden" name="classroom_id" value="{{ $student -> classrooms -> id }}">
                                    <input type="hidden" name="section_id" value="{{ $student -> sections -> id }}">
                                    
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>

                    <P class="mt-4">
                        <button class="btn btn-success" type="submit"> {{ trans('students_trans.Submit') }} </button>
                    </P>
                    
                </form>
                <!-- row closed -->
            </div>
        </div>
    </div>

@endsection

@section('js')
    
@endsection

