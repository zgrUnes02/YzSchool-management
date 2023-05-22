@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('students_trans.Add_new_students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students_trans.Add_new_students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('students_trans.Add_new_students') }}</li>
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post"  action="{{ route('students.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('students_trans.Personal_info')}} :</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students_trans.Student_name_ar')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name_ar" class="form-control" class="@error('name_ar') is-invalid @enderror" value="{{ old('name_ar') }}">
                                    @error('name_ar')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students_trans.Student_name_en')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="name_en" type="text" class="@error('name_en') is-invalid @enderror" value="{{ old('name_en') }}">
                                    @error('name_en')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students_trans.Email')}} : </label>
                                    <input type="email" name="email" class="form-control" class="@error('email') is-invalid @enderror" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students_trans.Password')}} :</label>
                                    <input  type="password" name="password" class="form-control" class="@error('password') is-invalid @enderror" value="{{ old('password') }}">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">{{trans('students_trans.Genders')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id" class="@error('gender_id') is-invalid @enderror" value="{{ old('gender_id') }}">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($data['genders'] as $Gender)
                                            <option  value="{{ $Gender->id }}">{{ $Gender->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nal_id">{{trans('students_trans.Nationality')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="nationalitie_id" class="@error('nationalitie_id') is-invalid @enderror" value="{{ old('nationalitie_id') }}">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($data['nationalities'] as $nal)
                                            <option  value="{{ $nal->id }}">{{ $nal->nationality_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('nationalitie_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bg_id">{{trans('students_trans.Type_blood')}} : </label>
                                    <select class="custom-select mr-sm-2" name="blood_id" class="@error('blood_id') is-invalid @enderror" value="{{ old('blood_id') }}">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($data['bloods'] as $bg)
                                            <option value="{{ $bg->id }}">{{ $bg->type_of_blood }}</option>
                                        @endforeach
                                    </select>
                                    @error('blood_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('students_trans.Birth_date')}}  :</label>
                                    <input class="form-control" type="text"  id="datepicker-action" name="Birth_date" data-date-format="yyyy-mm-dd" class="@error('Birth_date') is-invalid @enderror" value="{{ old('Birth_date') }}">
                                    @error('Birth_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('students_trans.Student_info')}} :</h6><br>
                    <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Grade_id" class="@error('Grade_id') is-invalid @enderror" value="{{ old('Grade_id') }}">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($data['grades'] as $grade)
                                            <option  value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('Grade_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">{{trans('students_trans.Classroom')}}<span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Classroom_id" class="@error('Classroom_id') is-invalid @enderror" value="{{ old('Classroom_id') }}">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>

                                    </select>
                                    @error('Classroom_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id">{{trans('students_trans.Section')}} : <span class="text-danger">*</span></label> </label>
                                    <select class="custom-select mr-sm-2" name="section_id" class="@error('section_id') is-invalid @enderror" value="{{ old('section_id') }}">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>

                                    </select>
                                    @error('section_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{trans('students_trans.Parent_name')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id" class="@error('parent_id') is-invalid @enderror" value="{{ old('parent_id') }}">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                       @foreach($data['parents'] as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->Name_Father }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
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
                            
                            <div class="col-md-3 mt-4 ">
                                <div class="form-group">
                                    <label for="attachements">{{trans('students_trans.attachements')}} : </label>
                                    <input type="file" accept="image/*" name="images[]" class="form-control-file ml-1" multiple>
                                </div>
                            </div>
                        </div><br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('students_trans.Submit')}}</button>
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
