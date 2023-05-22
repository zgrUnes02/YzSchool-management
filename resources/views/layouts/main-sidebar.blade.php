{{-- <link rel="stylesheet" href="public/assets/css/plugins/all.min.css"> --}}
<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- home -->
                    <li>
                        <a href="{{route('home')}}" data-toggle="collapse">
                            <div class="pull-left"><i class="fa-solid fa-house"></i>
                                <span class="right-nav-text">{{trans('grade_trans.Home')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('grade_trans.sms')}}</li>
                    
                    @if (auth() -> user() -> type == 'admin')
                        <!-- Grades -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                <div class="pull-left"><i class="fa-sharp fa-solid fa-school"></i><span
                                        class="right-nav-text">{{trans('main_trans.Grades')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{route('Grades.index')}}">{{trans('main_trans.Grades_list')}}</a></li>
                            </ul>
                        </li>
                        <!-- Classrooms -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                                <div class="pull-left"><i class="fa-solid fa-hotel"></i><span
                                        class="right-nav-text">{{trans('classes.Classrooms')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('Classroom.index')}}">{{trans('classes.List_Classrooms')}} </a> </li>

                            </ul>
                        </li>
                        <!-- Section -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections">
                                <div class="pull-left"><i class="fa-solid fa-book"></i><span
                                        class="right-nav-text">{{trans('section_truns.side-bar-section')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="sections" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('Section.index')}}">{{trans('section_truns.section_list')}}</a> </li>

                            </ul>
                        </li>
                        <!-- Parents -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                                <div class="pull-left"><i class="fa-sharp fa-solid fa-people-roof"></i><span
                                        class="right-nav-text">{{ trans('parent_trans.parents') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="chart" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('parents.show_from')}}">{{ trans('parent_trans.list_parents') }}</a></li>
                            </ul>
                        </li>

                        <!-- teachers -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                                <div class="pull-left"><i class="fa-sharp fa-solid fa-person-chalkboard"></i><span class="right-nav-text">{{ trans('teachers_trans.teachers') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('teachers.index')}}">{{ trans('teachers_trans.list_teachers') }}</a> </li>
                            </ul>
                        </li>


                        <!-- Students -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students">
                                <div class="pull-left"><i class="fa-solid fa-user-graduate"></i><span class="right-nav-text">{{ trans('students_trans.Students') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="students" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('students.create')}}">{{ trans('students_trans.Add_new_students') }}</a> </li>
                                <li> <a href="{{route('students.index')}}">{{ trans('students_trans.List_students') }}</a> </li>
                                <li> <a href="{{route('promotions.index')}}">{{ trans('students_trans.promotion_students') }}</a></li>
                                <li> <a href="{{route('promotions.create')}}">{{ trans('students_trans.management_promotion') }}</a></li>
                                <li> <a href="{{route('graduate.index')}}">{{ trans('students_trans.graduate_list') }}</a></li>
                                <li> <a href="{{route('graduate.create')}}">{{ trans('students_trans.graduating_students') }}</a></li>
                            </ul>
                        </li>
                        
                        <!-- Fee - Invoices _ Receipt -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                                <div class="pull-left"><i class="fa-sharp fa-solid fa-circle-dollar-to-slot"></i><span class="right-nav-text">{{ trans('students_trans.fees') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Form" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('fees.index')}}">{{ trans('students_trans.fees_list') }}</a> </li>
                                <li> <a href="{{route('fee_invoices.index')}}">{{trans('students_trans.invoices_list')}}</a> </li>
                                <li> <a href="{{route('receipt.index')}}">{{trans('students_trans.receipt_list')}}</a> </li>
                                <li> <a href="{{route('payment.index')}}">{{trans('students_trans.payment_list')}}</a> </li>
                                <li> <a href="{{route('pay.index')}}">{{trans('students_trans.Exchange_List')}}</a> </li>
                            </ul>
                        </li>
                    @endif

                    <!-- Attendance -->
                    @if (auth() -> user() -> type == 'admin' || auth() -> user() -> type == 'teacher')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                                <div class="pull-left"><i class="fa-solid fa-calendar-days"></i><span class="right-nav-text">{{trans('attendance.attendance')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="table" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('attendance.index')}}">{{ trans('attendance.sections_list') }}</a> </li>
                            </ul>
                        </li>
                    @endif

                    <!-- Library -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library">
                            <div class="pull-left"><i class="fa-solid fa-book-bookmark"></i><span
                                    class="right-nav-text">{{ trans('library.library') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('library.index') }}">{{ trans('library.books') }}</a> </li>
                            @if (auth() -> user() -> type == 'admin' || auth() -> user() -> type == 'teacher')
                                <li> <a href="{{ route('library.create') }}">{{ trans('library.add_new_book') }}</a> </li>
                            @endif
                        </ul>
                    </li>

                    @if (auth() -> user() -> type == 'admin')
                        <!-- Subjects -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                                <div class="pull-left"><i class="fa-solid fa-flask-vial"></i><span class="right-nav-text">{{ trans('subject_trans.subjects') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('subject.index')}}">{{ trans('subject_trans.subject_list') }}</a> </li>
                            </ul>
                        </li>
                    @endif

                    {{-- <!-- Exams -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left"><i class="fa-solid fa-laptop-file"></i><span
                                    class="right-nav-text">{{ trans('exam_trans.exams') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('exam.index')}}">{{ trans('exam_trans.exams_list') }}</a> </li>
                            <li> <a href="{{route('exam.create')}}">{{ trans('exam_trans.add_exam') }}</a> </li>
                        </ul>
                    </li> --}}

                    <!-- Quizzes -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left"><i class="fa-solid fa-microscope"></i><span
                                    class="right-nav-text">{{ trans('quiz_trans.quizzes') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('quiz.index')}}">{{ trans('quiz_trans.quiz_list') }}</a> </li>
                            @if (auth() -> user() -> type == 'admin' || auth() -> user() -> type == 'teacher')
                                <li> <a href="{{route('quiz.create')}}">{{ trans('quiz_trans.new_quiz') }}</a> </li>
                            @endif
                        </ul>
                    </li>

                    <!-- Zoom -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#zoom">
                            <div class="pull-left"><i class="fa-solid fa-globe"></i><span
                                    class="right-nav-text">{{ trans('onlineClasses.online_title') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="zoom" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('onlineclasses.index')}}">{{ trans('onlineClasses.list_online_classes') }}</a> </li>
                            @if (auth() -> user() -> type == 'admin' || auth() -> user() -> type == 'teacher')
                                <li> <a href="{{route('onlineclasses.create')}}">{{ trans('onlineClasses.add_online_classes') }}</a> </li>
                                <li> <a href="{{route('indirect')}}">{{ trans('onlineClasses.add_online_classes_off') }}</a> </li>
                            @endif
                        </ul>
                    </li>

                    @if (auth() -> user() -> type == 'admin')
                    <!-- message -->
                    <li>
                        <a href="{{ route('show_all_messages') }}">
                            <i class="fa-solid fa-envelope"></i> {{ trans('message_trans.messages') }}
                        </a>
                    </li>

                    <!-- events -->
                    <li>
                        <a href="{{ route('events.index') }}">
                            <i class="fa-solid fa-calendar-check"></i> {{ trans('events_trans.events') }}
                        </a>
                    </li>

                    <!-- Settings -->
                        <li>
                            <a href="{{ route('settings.index') }}">
                                <i class="fa-solid fa-screwdriver-wrench"></i> {{ trans('settings.settings') }}
                            </a>
                        </li>
                    @endif
                    
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
