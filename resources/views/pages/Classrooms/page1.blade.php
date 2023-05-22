@extends('layouts.master')
@section('css')

@section('title')
    {{trans('classroom_truns.page_title')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('classroom_truns.page_title')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{trans('classroom_truns.home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('classroom_truns.page_title')}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30">
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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('classroom_truns.add') }}
                    </button>

                    <button type="button" class="button x-small bg-warning border-warning" id="btn_delete_all">
                        {{ trans('classroom_truns.checkbox_selected') }}
                    </button>

                    <br>


                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                                <tr>
                                    <th>{{trans('classroom_truns.select_all')}}&nbsp;&nbsp;&nbsp;&nbsp;<input name="select_all" id="select-all" type="checkbox" onclick="CheckAll('box1', this)"/></th>
                                    <th>#</th>
                                    <th>{{ trans('classroom_truns.classroom_name') }}</th>
                                    <th>{{ trans('classroom_truns.grade_name') }}</th>
                                    <th>{{ trans('section_truns.processes') }}</th>
                                </tr>
                            </thead>

                            <tbody>

                            <?php $i = 0 ?>
                            @foreach ($all_classroom as $classroom)
                                <tr>
                                    <?php $i++ ?>
                                    <td><input type="checkbox" value="{{ $classroom -> id }}" class="box1" name="checkbox"></td>
                                    <td>{{ $i  }}</td>
                                    <td>{{ $classroom -> class_name }}</td>
                                    <td>{{ $classroom -> Grades -> name }}</td>
                                    <td>
                                        <button style="width: 100px" type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#edit{{ $classroom->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}">
                                            {{trans('edit_model_trans.edit')}}
                                        </button>
                                        <button style="width: 100px" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $classroom->id }}">
                                            {{trans('crud_trans.Delete_button')}}
                                        </button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('classroom_truns.edit') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('Classroom.update') }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name_class_ar"
                                                                   class="mr-sm-2">{{ trans('classroom_truns.classroom_ar') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="Name_class_ar"
                                                                   class="form-control"
                                                                   value="{{$classroom -> getTranslation('class_name' , 'ar')}}"
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{$classroom->id}}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_class_en"
                                                                   class="mr-sm-2">{{ trans('classroom_truns.classroom_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{$classroom -> getTranslation('class_name' , 'en')}}"
                                                                   name="Name_class_en" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('classroom_truns.grade_name') }}
                                                            :</label>
                                                        <select class="form-control form-control-lg pb-2" name="grade_id">
                                                            <option value="{{$classroom -> Grades -> id}}">
                                                                {{$classroom -> Grades -> name}}
                                                            </option>
                                                            @foreach($all_grades as $grade)
                                                                <option value="{{$grade -> id}}">
                                                                    {{$grade -> name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">close</button>
                                                        <button type="submit"
                                                                class="btn btn-success">submit</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('classroom_truns.delete_title_modal') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('Classroom.destroy') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('classroom_truns.message_modal') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $classroom->id }}">
                                                    <div class="modal-footer mt-2">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{trans('classroom_truns.button_cancel')}}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{trans('classroom_truns.buttom_delete')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- add_modal_class -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ trans('classroom_truns.add') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class=" row mb-30" action="{{route('Classroom.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="repeater">
                                    <div data-repeater-list="List_Classes">
                                        <div data-repeater-item>

                                            <div class="row">

                                                <div class="col">
                                                    <label for="Name_class_ar"
                                                           class="mr-sm-2">{{trans('classroom_truns.classroom_ar')}}
                                                        :</label>
                                                    <input class="form-control" type="text" name="Name_class_ar" required />
                                                </div>


                                                <div class="col">
                                                    <label for="Name_class_en"
                                                           class="mr-sm-2">{{trans('classroom_truns.classroom_en')}}
                                                        :</label>
                                                    <input class="form-control" type="text" name="Name_class_en" required />
                                                </div>


                                                <div class="col">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{trans('classroom_truns.grade_name_chose')}}
                                                        :</label>

                                                    <div class="box">
                                                        <select class="fancyselect" name="Grade_id">
                                                            @foreach ($all_grades as $grade)
                                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{trans('classroom_truns.proccesses')}}
                                                        :</label>
                                                    <input class="btn btn-danger btn-block" data-repeater-delete
                                                           type="button" value="{{trans('classroom_truns.delete')}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-12">
                                            <input class="btn btn-primary bg-primary" data-repeater-create type="button" value="{{trans('classroom_truns.new_class')}}"/>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">{{trans('classroom_truns.cancel')}}</button>
                                        <button type="submit"
                                                class="btn btn-success">{{trans('classroom_truns.save')}}</button>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>


                </div>

            </div>

        </div>
        </div>

    <!-- حذف مجموعة صفوف -->
    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{trans('classroom_truns.message_deleted_all_selected_title')}}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('Classroom.delete_checkbox')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        {{trans('classroom_truns.message_deleted_all_selected')}}
                        <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('classroom_truns.cancel') }}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('classroom_truns.buttom_delete_all') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- row closed -->
@endsection
@section('js')
    <script type="text/javascript">
        function CheckAll(className , elem){

            var elements = document.getElementsByClassName(className) ;
            var lenghtElement = elements.length ;

            if(elem.checked){
                for (var i = 0 ; i < lenghtElement ; i++){
                    elements[i].checked = true ;
                }
            }
            else{
                for (var i = 0 ; i < lenghtElement ; i++){
                    elements[i].checked = false ;
                }
            }
        }
    </script>

    <script type="text/javascript">
        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = new Array();
                $("#datatable input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);
                });
                if (selected.length > 0) {
                    $('#delete_all').modal('show')
                    $('input[id="delete_all_id"]').val(selected);
                }
            });
        });
    </script>
@endsection
