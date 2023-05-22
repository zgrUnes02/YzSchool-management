<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{trans('classroom_truns.home')}}</title>
    @include('layouts.head')
    @livewireStyles
</head>

<body>

    <div class="wrapper">

    <!--================================= preloader -->
        <div id="pre-loader">
            <img src="{{asset('assets/images/pre-loader/loader-01.svg')}}" alt="">
        </div>
    <!--================================= preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

    <!--================================= Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

            <div class="page-title mb-3">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0">{{trans('main_trans.Dashboard')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>

            @if (auth() -> user() -> type == 'student')
                <!-- widgets students -->

                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-danger">
                                            <i class="fa-solid fa-book-bookmark highlight-icon" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark"> {{trans('home_trans.library')}} </p>
                                        <h4> {{ App\Models\Book::count() }} </h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <a href="{{route('library.index')}}" target="_blank" class="btn">{{ trans('home_trans.more_details') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-warning">
                                            <i class="fa-solid fa-globe highlight-icon"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark"> {{trans('home_trans.zoom')}} </p> 
                                        <h4> {{ App\Models\OnlineClasses::count() }} </h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <a href="{{route('onlineclasses.index')}}" target="_blank" class="btn">{{ trans('home_trans.more_details') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-success">
                                            <i class="fa-solid fa-microscope highlight-icon"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark"> {{trans('home_trans.quizzes')}} </p>
                                        <h4> {{ App\Models\Quiz::count() }} </h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <a href="{{route('quiz.index')}}" target="_blank" class="btn">{{ trans('home_trans.more_details') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

            @if (auth() -> user() -> type == 'teacher')
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-danger">
                                            <i class="fa-solid fa-book-bookmark highlight-icon"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark"> {{trans('library.library')}} </p>
                                        <h4> {{ App\Models\Book::count() }} </h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <a href="{{route('library.index')}}" target="_blank" class="btn">{{ trans('home_trans.more_details') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-warning">
                                            <i class="fa-solid fa-microscope highlight-icon"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">{{trans('quiz_trans.quizzes')}}</p>
                                        <h4> {{ App\Models\Quiz::count() }} </h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <a href="{{route('quiz.index')}}" target="_blank" class="btn">{{ trans('home_trans.more_details') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-success">
                                            <i class="fa-solid fa-calendar-days highlight-icon"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">{{trans('attendance.attendance')}}</p>
                                        <h4> {{ App\Models\Attendance::count() }} </h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <a href="{{route('attendance.index')}}" target="_blank" class="btn">{{ trans('home_trans.more_details') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-primary">
                                            <i class="fa-solid fa-globe highlight-icon"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">{{trans('onlineClasses.online_title')}}</p>
                                        <h4> {{ App\Models\OnlineClasses::count() }} </h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <a href="{{route('onlineclasses.index')}}" target="_blank" class="btn">{{ trans('home_trans.more_details') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (auth() -> user() -> type == 'admin')
                <!-- widgets admin -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-danger">
                                            <i class="fa-solid fa-school highlight-icon" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">{{trans('grade_trans.Grades')}}</p>
                                        <h4> {{ App\Models\Grade::count() }} </h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <a href="{{route('Grades.index')}}" target="_blank" class="btn">{{ trans('home_trans.more_details') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-warning">
                                            <i class="fa-solid fa-building-user highlight-icon"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">{{trans('classes.Classrooms')}}</p>
                                        <h4> {{ App\Models\Classroom::count() }} </h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <a href="{{route('Classroom.index')}}" target="_blank" class="btn">{{ trans('home_trans.more_details') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-success">
                                            <i class="fa-solid fa-book highlight-icon"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">{{trans('home_trans.sections')}}</p>
                                        <h4> {{ App\Models\Section::count() }} </h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <a href="{{route('Section.index')}}" target="_blank" class="btn">{{ trans('home_trans.more_details') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-primary">
                                            <i class="fa-solid fa-users highlight-icon" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">{{trans('students_trans.Students')}}</p>
                                        <h4> {{ App\Models\Student::count() }} </h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <a href="{{route('students.index')}}" target="_blank" class="btn">{{ trans('home_trans.more_details') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div  style="height: 400px;" class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="tab nav-border" style="position: relative;">
                                    <div class="d-block d-md-flex justify-content-between">
                                        <div class="d-block w-100">
                                            <h5 style="font-family: 'Cairo', sans-serif" class="card-title"> {{ trans('home_trans.last') }} </h5>
                                        </div>
                                        <div class="d-block d-md-flex nav-tabs-custom">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                                <li class="nav-item">
                                                    <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                    href="#students_dash" role="tab" aria-controls="students"
                                                    aria-selected="true"> {{ trans('home_trans.students') }} </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                                    role="tab" aria-controls="teachers" aria-selected="false">{{ trans('home_trans.teachers') }}
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                                    role="tab" aria-controls="parents" aria-selected="false"> {{ trans('home_trans.parents') }}
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                                    role="tab" aria-controls="fee_invoices" aria-selected="false">{{ trans('home_trans.invoices') }}
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="myTabContent">

                                        {{--students Table--}}
                                        <div class="tab-pane fade active show" id="students_dash" role="tabpanel" aria-labelledby="students-tab">
                                            <div class="table-responsive mt-15">
                                                <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                    <thead>
                                                    <tr  class="table-info text-black">
                                                        <th>#</th>
                                                        <th>{{ trans('home_trans.name') }}</th>
                                                        <th>{{ trans('home_trans.email') }}</th>
                                                        <th>{{ trans('home_trans.sexe') }}</th>
                                                        <th>{{ trans('home_trans.grade') }}</th>
                                                        <th>{{ trans('home_trans.classroom') }}</th>
                                                        <th>{{ trans('home_trans.section') }}</th>
                                                        <th>{{ trans('home_trans.joining') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$student->name}}</td>
                                                            <td>{{$student->email}}</td>
                                                            <td>{{$student->genders->name}}</td>
                                                            <td>{{$student->grades->name}}</td>
                                                            <td>{{$student->classrooms->class_name}}</td>
                                                            <td>{{$student->sections->name_section}}</td>
                                                            <td class="text-success">{{$student->created_at}}</td>
                                                            @empty
                                                                <td class="alert-danger" colspan="8"> {{ trans('home_trans_no_data') }} </td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{--teachers Table--}}
                                        <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                            <div class="table-responsive mt-15">
                                                <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                    <thead>
                                                    <tr  class="table-info text-black">
                                                        <th>#</th>
                                                        <th> {{ trans('home_trans.teacher_name') }} </th>
                                                        <th> {{ trans('home_trans.sexe') }} </th>
                                                        <th> {{ trans('home_trans.date_of_appointment') }} </th>
                                                        <th> {{ trans('home_trans.speciality') }} </th>
                                                        <th> {{ trans('home_trans.date_add') }} </th>
                                                    </tr>
                                                    </thead>

                                                    @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                        <tbody>
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$teacher->name}}</td>
                                                            <td>{{$teacher->genders->name}}</td>
                                                            <td>{{$teacher->joining_Date}}</td>
                                                            <td>{{$teacher->specializations->name}}</td>
                                                            <td class="text-success">{{$teacher->created_at}}</td>
                                                            @empty
                                                                <td class="alert-danger" colspan="8"> {{ trans('home_trans_no_data') }} </td>
                                                        </tr>
                                                        </tbody>
                                                    @endforelse
                                                </table>
                                            </div>
                                        </div>

                                        {{--parents Table--}}
                                        <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                            <div class="table-responsive mt-15">
                                                <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                    <thead>
                                                    <tr  class="table-info text-black">
                                                        <th>#</th>
                                                        <th> {{ trans('home_trans.parent_name') }} </th>
                                                        <th> {{ trans('home_trans.email') }} </th>
                                                        <th> {{ trans('home_trans.cin') }} </th>
                                                        <th> {{ trans('home_trans.phone') }} </th>
                                                        <th> {{ trans('home_trans.date_add') }} </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse(\App\Models\My_parents::latest() -> take(5) -> get() as $parent)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$parent->Name_Father}}</td>
                                                            <td>{{$parent->Email}}</td>
                                                            <td>{{$parent->National_ID_Father}}</td>
                                                            <td>{{$parent->Phone_Father}}</td>
                                                            <td class="text-success">{{$parent->created_at}}</td>
                                                            @empty
                                                                <td class="alert-danger" colspan="8"> {{ trans('home_trans_no_data') }} </td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{--sections Table--}}
                                        <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                                            <div class="table-responsive mt-15">
                                                <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                    <thead>
                                                    <tr  class="table-info text-black">
                                                        <th>#</th>
                                                        <th> {{ trans('home_trans.name') }} </th>
                                                        <th> {{ trans('home_trans.grade') }} </th>
                                                        <th> {{ trans('home_trans.classroom') }} </th>
                                                        <th> {{ trans('home_trans.type') }} </th>
                                                        <th> {{ trans('home_trans.price') }} </th>
                                                        <th> {{ trans('home_trans.date_add') }} </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse(\App\Models\FeeInvoices::latest()->take(10)->get() as $invoice)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$invoice->students->name}}</td>
                                                            <td>{{$invoice->classrooms->class_name}}</td>
                                                            <td>{{$invoice->grades->name}}</td>
                                                            <td>{{$invoice->fees->name}}</td>
                                                            <td>{{$invoice->fees->anmount}}</td>
                                                            <td class="text-success">{{$invoice->created_at}}</td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td class="alert-danger" colspan="9"> {{ trans('home_trans_no_data') }} </td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <livewire:calendar>

            @endif
            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')
    @livewireScripts
    @stack('scripts')

</body>

</html>
