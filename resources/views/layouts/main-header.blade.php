        <!--=================================
 header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="{{route('home')}}"><img src={{asset('attachement/logo/logo.png')}} alt=""></a>
                <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img src={{asset("assets/images/logo-icon-dark.png")}} alt=""></a>
            </div>

            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
                <li class="nav-item">
                    <div class="search">
                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                        <div class="search-box not-click">
                            <input type="text" class="not-click form-control" placeholder="Search" value=""
                                name="search">
                            <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                        </div>
                    </div>
                </li>
            </ul>

            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <div class="dropdown mt-2">
                        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{trans('main_trans.Language')}}
                        </button>
                        <ul class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>

                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>

                @if (auth() -> user() -> type == 'admin')  
                    <li class="nav-item dropdown ">
                        <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                            aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-big">
                            <div class="dropdown-header">
                                <strong> {{ trans('events_trans.quick_links') }} </strong>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="nav-grid">
                                <a href="{{ route('events.index') }}" class="nav-grid-item">
                                    <i class="fa-solid fa-calendar-check text-primary"></i>
                                    <h5> {{ trans('events_trans.events') }} </h5>
                                </a>
                                <a href="{{ route('settings.index') }}" class="nav-grid-item">
                                    <i class="fa-solid fa-screwdriver-wrench text-success"></i>
                                    <h5> {{ trans('settings.settings') }} </h5>
                                </a>
                            </div>
                            <div class="nav-grid">
                                <a href=" {{ route('students.index') }} " class="nav-grid-item">
                                    <i class="fa-solid fa-user-graduate text-warning"></i>
                                    <h5> {{ trans('students_trans.Students') }} </h5>
                                </a>
                                <a href=" {{ route('teachers.index') }} " class="nav-grid-item">
                                    <i class="fa-sharp fa-solid fa-person-chalkboard text-danger"></i>
                                    <h5> {{ trans('teachers_trans.teachers') }} </h5>
                                </a>
                            </div>
                        </div>
                    </li>
                @endif
                
                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('assets/images/profile-avatar.jpg')}}" alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">{{auth() -> user() -> name}}</h5>
                                    <span>{{auth() -> user() -> email}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i> {{ trans('events_trans.profile') }} </a>
                                {{-- class="badge badge-info">6</span> </a> --}}
                        <div class="dropdown-divider"></div>
                        <form class="col" method="POST" action="{{ URL('/logout') }}">
                            @csrf
                            <a class="dropdown-item" style="margin-left: -15px;" href="#" onclick="event.preventDefault();this.closest('form').submit();"><i class="text-danger ti-unlock"></i>  {{ trans('events_trans.logout') }}  </a> 
                        </form>
                         
                    </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->
