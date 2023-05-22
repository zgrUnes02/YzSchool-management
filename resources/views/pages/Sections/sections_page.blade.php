@extends('layouts.master')
@section('css')

@section('title')
    {{trans('section_truns.sections')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('section_truns.section_top_title') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('section_truns.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('section_truns.section_top_title') }}</li>
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
{{--            <div class="card-body">--}}

                {{-- ----------------- Errors Messages ---------------- --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- -----------------------------------------------------}}

                <div class="card-body">
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('section_truns.add_section') }}</a>
                </div>


                {{----------------------------------------------------------------------------------------------}}

                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{trans('section_truns.sections')}}</h5>
                            <div class="accordion gray plus-icon round">

                                @foreach ($Grades as $Grade)

                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">{{$Grade -> name}}</a>
                                        <div class="acd-des">
                                            <div class="row">
                                                <div class="col-xl-12 mb-30">
                                                    <div class="card card-statistics h-100">
                                                        <div class="card-body">
                                                            <div class="d-block d-md-flex justify-content-between">
                                                                <div class="d-block">
                                                                </div>
                                                            </div>
                                                            <div class="table-responsive mt-15">
                                                                <table class="table center-aligned-table mb-0 text-center">
                                                                    <thead>
                                                                        <tr class="text-dark">
                                                                            <th>#</th>
                                                                            <th>{{trans('section_truns.class_name')}}</th>
                                                                            <th>{{trans('section_truns.name')}}</th>
                                                                            <th>{{trans('section_truns.status')}}</th>
                                                                            <th>{{trans('section_truns.processes')}}</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i = 0; ?>
                                                                        @foreach ($Grade->Sections as $list_Sections)
                                                                        <tr>
                                                                            <?php $i++; ?>
                                                                            <td>{{$i}}</td>
                                                                            <td>{{ $list_Sections->name_section }}</td>
                                                                            <td>{{ $list_Sections->Classrooms->class_name }}</td>
                                                                            <td>
                                                                                @if ($list_Sections->status == 1)
                                                                                    <label
                                                                                        class="badge badge-success">{{ trans('section_truns.Status_Section_AC') }}</label>
                                                                                @else
                                                                                    <label
                                                                                        class="badge badge-danger">{{ trans('section_truns.Status_Section_No') }}</label>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                <a href="#"
                                                                                   class="btn btn-outline-info btn-sm"
                                                                                   data-toggle="modal"
                                                                                   data-target="#edit{{ $list_Sections->id }}">{{ trans('section_truns.Edit') }}</a>
                                                                                <a href="#"
                                                                                   class="btn btn-outline-danger btn-sm"
                                                                                   data-toggle="modal"
                                                                                   data-target="#delete{{ $list_Sections->id }}">{{ trans('section_truns.Delete') }}</a>
                                                                            </td>
                                                                        </tr>

                                                                        <!-- delete_modal_Grade -->
                                                                        <div class="modal fade" id="delete{{ $list_Sections->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('section_truns.delete_Section') }}</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>

                                                                                    <div class="modal-body">
                                                                                        <form action="{{ route('Section.destroy') }}" method="post">
                                                                                            @csrf
                                                                                            {{ trans('section_truns.Warning_Section') }}
                                                                                            <input id="id" type="hidden" name="id" class="form-control" value="{{ $list_Sections->id }}">
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('section_truns.Cancel') }}</button>
                                                                                                <button type="submit" class="btn btn-danger">{{ trans('section_truns.delete_Section') }}</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end delete_modal_Grade -->

                                                                        <!-- edit -->
                                                                        <div class="modal fade" id="edit{{$list_Sections->id}}" tabindex="-1" role="dialog"
                                                                             aria-labelledby="exampleModalLabel"
                                                                             aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                                                                            id="exampleModalLabel">
                                                                                            {{ trans('section_truns.edit_section') }}</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">

                                                                                        <form action="{{route('Section.update')}}" method="POST">
                                                                                            @csrf
                                                                                            <div class="row">
                                                                                                <div class="col">
                                                                                                    <input type="text" name="Name_Section_Ar" class="form-control" value="{{$list_Sections -> getTranslation('name_section' , 'ar')}}"
                                                                                                           placeholder="{{ trans('section_truns.Section_name_ar') }}">
                                                                                                </div>

                                                                                                <div class="col">
                                                                                                    <input type="text" name="Name_Section_En" class="form-control" value="{{$list_Sections -> getTranslation('name_section' , 'en')}}"
                                                                                                           placeholder="{{ trans('section_truns.Section_name_en') }}">
                                                                                                </div>

                                                                                                <input type="hidden" value="{{$list_Sections -> id}}" name="id_update">

                                                                                            </div>
                                                                                            <br>


                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                       class="control-label">{{ trans('section_truns.Name_Grade') }}</label>
                                                                                                <select name="Grade_id" class="custom-select"
                                                                                                        onchange="console.log($(this).val())">
                                                                                                    <!--placeholder-->
                                                                                                    <option value="{{ $Grade->id }}" selected>{{ $Grade->name }}</option>
                                                                                                    @foreach ($list_Grades as $list_Grade)
                                                                                                        <option value="{{ $list_Grade->id }}"> {{ $list_Grade->name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                            <br>

                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                       class="control-label">{{ trans('section_truns.Name_Class') }}</label>
                                                                                                <select name="Class_id" class="custom-select">
                                                                                                    <option value="{{ $list_Sections->Classrooms->id }}" selected>{{ $list_Sections->Classrooms->class_name }}</option>
                                                                                                    @foreach($list_classrooms as $classroom)
                                                                                                        <option value="{{$classroom -> id}}">
                                                                                                            {{$classroom -> getTranslation('class_name' , 'en')}}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>

                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                       class="control-label">{{ trans('section_truns.teachers') }}</label>
                                                                                                <select name="teacher_id[]" class="custom-select" multiple>
                                                                                                    @foreach($list_Sections -> Teachers as $teacher)
                                                                                                        <option selected value="{{$teacher -> id}}">
                                                                                                            {{$teacher -> name}}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                    @foreach($all_teachers as $teacher)
                                                                                                        <option value="{{$teacher -> id}}">
                                                                                                            {{$teacher -> name}}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>

                                                                                            <div class="form-check mt-3 ml-3">
                                                                                                @if($list_Sections -> status == 1)
                                                                                                    <input type="checkbox" checked id="active_checkbox" name="active_checkbox">
                                                                                                @else
                                                                                                    <input type="checkbox" id="active_checkbox" name="active_checkbox">
                                                                                                @endif
                                                                                                <label class="form-check-label" for="active_checkbox">
                                                                                                    {{trans('classroom_truns.active')}}
                                                                                                </label>
                                                                                            </div>


                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary"
                                                                                                data-dismiss="modal">{{ trans('section_truns.Cancel') }}</button>
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('section_truns.edit_section') }}</button>
                                                                                    </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>

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

            <!--اضافة قسم جديد -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                id="exampleModalLabel">
                                {{ trans('section_truns.add_section') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{route('Section.store')}}" method="POST" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="Name_Section_Ar" class="form-control"
                                               placeholder="{{ trans('section_truns.Section_name_ar') }}">
                                    </div>

                                    <div class="col">
                                        <input type="text" name="Name_Section_En" class="form-control"
                                               placeholder="{{ trans('section_truns.Section_name_en') }}">
                                    </div>

                                </div>
                                <br>


                                <div class="col">
                                    <label for="inputName"
                                           class="control-label">{{ trans('section_truns.Name_Grade') }}</label>
                                    <select name="Grade_id" class="custom-select"
                                            onchange="console.log($(this).val())">
                                        <!--placeholder-->
                                        <option value="" selected
                                                disabled>{{ trans('section_truns.Select_Grade') }}
                                        </option>
                                        @foreach ($list_Grades as $list_Grade)
                                            <option value="{{ $list_Grade->id }}"> {{ $list_Grade->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>

                                <div class="col">
                                    <label for="inputName"
                                           class="control-label">{{ trans('section_truns.Name_Class') }}</label>
                                    <select name="Class_id" class="custom-select">
                                        @foreach($list_classrooms as $classroom)
                                            <option value="{{$classroom -> id}}">
                                                {{$classroom -> class_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- teachers choose  --}}                                

                                <div class="col">
                                    <label for="inputName"
                                           class="control-label">{{ trans('section_truns.teachers') }}</label>
                                    <select name="teacher_id[]" class="custom-select" multiple>
                                        @foreach($all_teachers as $teacher)
                                            <option value="{{$teacher -> id}}">
                                                {{$teacher -> name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('section_truns.Cancel') }}</button>
                            <button type="submit"
                                    class="btn btn-success">{{ trans('section_truns.Save') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


                {{---------------------------------------------------------------------------------------------}}

{{--            </div>--}}
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
