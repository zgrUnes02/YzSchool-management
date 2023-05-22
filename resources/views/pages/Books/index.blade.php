@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('library.books') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{ trans('library.books') }} </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('teachers_trans.Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('library.books') }} </li>
                    </ol>
                </div>
            </div>
        </div>
    <!-- breadcrumb -->

@section('PageTitle')
    {{ trans('library.books') }}
@stop
@endsection

@section('content')

    <!-- row -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
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
                            <div class="card-body">

                                <br><br>
                                
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr class="table-success">
                                                <th> # </th>
                                                <th> {{trans('library.book_name')}}      </th>
                                                <th> {{trans('library.teacher')}}        </th>
                                                <th> {{trans('library.grade')}}          </th>
                                                <th> {{trans('library.classroom')}}      </th>
                                                <th> {{trans('library.section')}}        </th>
                                                <th> {{trans('parent_trans.Processes')}} </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($books as $book)
                                                <tr>
                                                    <td> {{ $loop -> iteration }}    </td>
                                                    <td> {{ $book -> title }}        </td>
                                                    <td> {{ $book -> teachers -> name }}   </td>
                                                    <td> {{ $book -> grades -> name }}     </td>
                                                    <td> {{ $book -> classrooms -> class_name }} </td>
                                                    <td> {{ $book -> sections -> name_section }}   </td>
                                                    <td>  
                                                        <a href="{{route('library.download' , $book -> file_name)}}" class="btn btn-outline-success">
                                                            <i class="fa-solid fa-download"></i>
                                                        </a>

                                                        <a href="{{route('library.show' , $book -> file_name)}}" class="btn btn-outline-warning">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>

                                                        @if (auth() -> user() -> type != 'student')
                                                            <a href="{{route('library.edit' , $book -> id)}}" class="btn btn-outline-primary">
                                                                <i class="fa-solid fa-edit"></i>
                                                            </a>

                                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_book{{$book -> id}}">
                                                                <i class="fa-solid fa-trash" ></i>
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @include('pages.Books.delete')
                                            @endforeach
                                    </table>
                                </div>
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