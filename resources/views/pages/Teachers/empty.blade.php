@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('teachers_trans.Add_New_Teacher') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('teachers_trans.Add_New_Teacher') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('teachers_trans.Add_New_Teacher') }}</li>
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

                {{-- button for adding --}}
                <a href="{{route('teachers.create')}}" class="btn btn-success">{{ trans('teachers_trans.Add_New_Teacher') }}</a>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('teachers_trans.Name') }}</th>
                                <th>{{ trans('teachers_trans.Gender') }}</th>
                                <th>{{ trans('teachers_trans.Date_joining') }}</th>
                                <th>{{ trans('teachers_trans.Specialization') }}</th>
                                <th>{{ trans('teachers_trans.Processe') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php $i = 0  ?>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <?php $i++  ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $teacher -> name  }}</td>
                                    <td>{{ $teacher -> genders -> name }}</td>
                                    <td>{{ $teacher -> joining_Date  }}</td>
                                    <td>{{ $teacher -> specializations -> name }}</td>                                    
                                    <td class="text-center">
                                        <a href="{{route('teachers.edit' , $teacher -> id)}}" class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <!-- Button delete -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$teacher -> id}}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                  
                                  {{--! Model Delete : --}}
                                    <div class="modal fade" id="exampleModal{{$teacher -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ trans('teachers_trans.Delete_teacher') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('teachers.destroy')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="teacher_delete_id" value="{{$teacher -> id}}">
                                                <div class="modal-body">
                                                    {{ trans('teachers_trans.Message_delete') }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="buttom" class="btn btn-secondary" data-dismiss="modal">{{ trans('teachers_trans.Close') }}</button>
                                                    <button type="submit" class="btn btn-primary">{{ trans('teachers_trans.Delete') }}</button>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{--! ------------------------ --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')

@endsection
