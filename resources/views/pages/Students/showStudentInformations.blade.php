@extends('layouts.master')
@section('css')
  
@section('title')
    {{trans('students_trans.details')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students_trans.Students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('students_trans.Students') }}</li>
            </ol>
        </div>
    </div>
</div>
@section('PageTitle')
    {{trans('Students_trans.Student_details')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show text-center" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true"
                                       style="width: 10rem"
                                       >{{trans('students_trans.details')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-center" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false"
                                       style="width: 10rem"
                                       >{{trans('students_trans.attachements')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{trans('students_trans.name')}}</th>
                                            <td>{{ $Student->name }}</td>
                                            <th scope="row">{{trans('students_trans.Email')}}</th>
                                            <td>{{$Student->email}}</td>
                                            <th scope="row">{{trans('students_trans.Gender')}}</th>
                                            <td>{{$Student->genders->name}}</td>
                                            <th scope="row">{{trans('students_trans.Nationality')}}</th>
                                            <td>{{$Student->nationalities->nationality_name}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('students_trans.Grade')}}</th>
                                            <td>{{ $Student->grades->name }}</td>
                                            <th scope="row">{{trans('students_trans.Classroom')}}</th>
                                            <td>{{$Student->classrooms->class_name}}</td>
                                            <th scope="row">{{trans('students_trans.Section')}}</th>
                                            <td>{{$Student->sections->name_section}}</td>
                                            <th scope="row">{{trans('students_trans.Birth_date')}}</th>
                                            <td>{{ $Student->birthdate}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('students_trans.Parent_name')}}</th>
                                            <td>{{ $Student->parents->Name_Father}}</td>
                                            <th scope="row">{{trans('students_trans.Academic_year')}}</th>
                                            <td>{{ $Student->year_academic }}</td>
                                            <th scope="row">-</th>
                                            <td>-</td>
                                            <th scope="row">-</th>
                                            <td>-</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{route('students.moreAttachements')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="academic_year">{{trans('students_trans.attachements')}} : <span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" name="photos[]" multiple required>
                                                        <input type="hidden" name="student_name" value="{{$Student->name}}">
                                                        <input type="hidden" name="student_id" value="{{$Student->id}}">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                       {{trans('students_trans.Submit')}}
                                                </button>
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                               style="text-align:center">
                                            <thead>
                                            <tr class="table-success">
                                                <th scope="col">#</th>
                                                <th scope="col">{{trans('students_trans.nameFile')}}</th>
                                                <th scope="col">{{trans('students_trans.dateInsert')}}</th>
                                                <th scope="col">{{trans('students_trans.Processes')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($Student -> images as $attachment)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$attachment->file_name}}</td>
                                                    <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                           href="{{url('download_attachment')}}/{{ $attachment->imageable->name }}/{{$attachment->file_name}}"
                                                           role="button">{{trans('students_trans.download')}}</a>

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#Delete_img{{ $attachment->id }}">
                                                                {{trans('students_trans.delete')}}
                                                        </button>

                                                    </td>
                                                </tr>
                                                @include('pages.Students.deleteIamge')
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

            <!-- row closed -->
@endsection
@section('js')

@endsection