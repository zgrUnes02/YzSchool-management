<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>YZschool</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        
        <!-- Fonts -->
        <!-- Lato -->
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/016d4eb37c.js" crossorigin="anonymous"></script>

        <!-- CSS -->
        <link rel="stylesheet" href={{asset("landing-page/css/bootstrap.min.css")}}>
        <link rel="stylesheet" href={{asset("landing-page/css/font-awesome.min.css")}}>
        <link rel="stylesheet" href={{asset("landing-page/css/owl.carousel.css")}}>
        <link rel="stylesheet" href={{asset("landing-page/css/animate.css")}}>
        <link rel="stylesheet" href={{asset("landing-page/css/main.css")}}>

        <!-- Responsive Stylesheet -->
        <link rel="stylesheet" href={{asset("landing-page/css/responsive.css")}}>
        
    </head>

    <body id="body">

    	<div id="preloader">
    		<div class="book">
    		  <div class="book__page"></div>
    		  <div class="book__page"></div>
    		  <div class="book__page"></div>
    		</div>
    	</div>

	    <!-- 
	    Header start
	    ==================== -->
	    <div class="navbar-default navbar-fixed-top" id="navigation">
	        <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="#">
                        <img class="logo-1" style="height: 30px" src="{{asset('landing-page/images/logo-10.png')}}" alt="LOGO">
	                    <img class="logo-2" style="height: 30px" src="{{asset('landing-page/images/logo-11.png')}}" alt="LOGO">
	                </a>
	            </div>

	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <nav class="collapse navbar-collapse" id="navbar">
	                <ul class="nav navbar-nav navbar-right" id="top-nav">
	                    <li class="current"><a href="#body">Home</a></li>
	                    {{-- <li><a href="#about">About us</a></li> --}}
	                    <li><a href="#service">Services</a></li>
	                    <li><a href="#contact">Contact</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
	                </ul>
	            </nav><!-- /.navbar-collapse -->
	        </div><!-- /.container-fluid -->
	    </div>

	    <section id="hero-area">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="block">
	                        <h1 class="wow fadeInDown">Yzschool International School</h1>
	                        <p class="wow fadeInDown" data-wow-delay="0.3s">
                                YZschool is an educational institution dedicated to providing quality education and holistic development of its students.
                            </p>
	                        <div class="wow fadeInDown" data-wow-delay="0.3s">
	                        	<a class="btn btn-default btn-home" href="{{ route('login') }}" role="button">Get Started</a>
                                <a class="btn btn-default btn-home ml-3" href="{{asset('landing-page/images/about-img.jpg')}}" role="button">About Us</a>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-6 wow zoomIn">
	                    <div class="block">
	                        <div class="counter text-center">
	                            <ul id="countdown_dashboard">
	                                <li>
	                                    <div class="dash days_dash">
                                            <div class="digit">+</div>
	                                        <div class="digit"> {{ App\Models\Teacher::count() }} </div>
	                                        <span class="dash_title">Teachers</span>
	                                    </div>
	                                </li>
	                                <li>
	                                    <div class="dash hours_dash">
	                                        <div class="digit">+</div>
	                                        <div class="digit"> {{ App\Models\Student::count() }} </div>
	                                        <span class="dash_title">Students</span>
	                                    </div>
	                                </li>
	                                <li>
	                                    <div class="dash minutes_dash">
	                                        <div class="digit">+</div>
	                                        <div class="digit"> {{ App\Models\Subject::count() }} </div>
	                                        <span class="dash_title">Subjects</span>
	                                    </div>
	                                </li>
	                                <li>
	                                    <div class="dash seconds_dash">
	                                        <div class="digit">+</div>
	                                        <div class="digit"> {{ App\Models\Book::count() }} </div>
	                                        <span class="dash_title">Books</span>
	                                    </div>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	            </div><!-- .row close -->
	        </div><!-- .container close -->
	    </section><!-- header close -->

        {{-- <!-- About start ==================== -->
        <section id="about" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 wow fadeInLeft">
                    	<div class="sub-heading">
                    		<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam ipsa recusandae consequatur veniam, reiciendis odit quia eaque vel eius a.</h3>
                    	</div>
                        <div class="block">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla-mco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in</p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, aspernatur.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- #about close -->
        <!-- About start ==================== --> --}}

        <!-- 
        Service start
        ==================== -->
        <section id="service" class="section">
            <div class="container">
                <div class="row">
                    <div class="heading wow fadeInUp">
                        <h2>Our service</h2>
                        <p>
                            Welcome to our school website! At our school, we are committed to providing high-quality education and a supportive learning environment to help our students achieve their full potential. We offer a range of services to ensure that our students receive a well-rounded education and are equipped with the skills and knowledge they need to succeed in their academic and personal lives.

                            Our academic programs are designed to challenge and engage students, with a focus on developing critical thinking, problem-solving, and collaboration skills. Our dedicated teachers provide personalized attention to each student to help them achieve their academic goals.

                            We also offer a wide range of extracurricular activities, including sports, music, drama, and clubs, to provide students with opportunities for personal growth, socialization, and exploration of their interests and talents.

                            Our student support services, including counseling, special education, and tutoring, are designed to help students overcome challenges and succeed academically and emotionally.

                            Finally, our commitment to community engagement ensures that we work closely with the local community to promote the welfare of our students and enhance the educational experience. We encourage you to explore our website to learn more about our school and the services we offer.
                        </p>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft">
                        <div class="service">
                            <div class="icon-box">
                            	<span class="icon">
                                    <i class="fa-solid fa-user-graduate"></i>
                                </span>
                            </div>
                            <div class="caption">
                                <h3>Education</h3>
                                <p>
                                    Schools provide academic programs to help students develop knowledge and skills in various subjects, including language arts, mathematics, science, and social studies.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="service">
                            <div class="icon-box">
                            	<span class="icon">
                                    <i class="fa-solid fa-chart-line"></i>  
                                </span>
                            </div>
                            <div class="caption">
                            	<h3>Extracurricular activities</h3>
                                <p>
                                    Schools offer a range of extracurricular activities, such as sports, music, drama, and clubs, to provide students with opportunities for personal growth, socialization, and exploration of their interests and talents.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.6s">
                        <div class="service">
                            <div class="icon-box">
                            	<span class="icon">
                                    <i class="fa-solid fa-headset"></i> 
                                </span>
                            </div>
                            <div class="caption">
                                <h3>Student support services</h3>
                                <p>
                                    Schools provide a variety of student support services, such as counseling, special education, and tutoring, to help students succeed academically and emotionally.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.9s">
                        <div class="service">
                            <div class="icon-box">
                            	<span class="icon">
                                    <i class="fa-solid fa-hand-holding-hand"></i>  
                                </span>
                            </div>
                            <div class="caption">
                                <h3>Community engagement</h3>
                                <p>
                                    Schools engage with the local community through outreach programs, partnerships with local organizations, and participation in community events, to promote the welfare of the community and enhance the educational experience of students.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .container close -->
        </section><!-- #service close -->

        <section id="call-to-action" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow text-center">
                        <div class="block">
                            <h2>Lorem ipsum dolor sit amet, consectetur adipisicing</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Your Email Address">
                                <button class="btn btn-default btn-submit" type="submit">Get Notified</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #call-to-action close -->

        <!-- 
        Contact start
        ==================== -->
        <section id="contact" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="block">
                            <div class="heading wow fadeInUp">
                                <h2>Get In Touch</h2>
                                <p>
                                    Have a question or need assistance ? We're here to help! Simply click the 'Send a Message' button below to get in touch with us.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 wow fadeInUp">
						<div class="block text-left">
							<div class="sub-heading">
								<h4>Contact Address</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quos maxime voluptate doloribus, voluptatum nemo vel ipsa in eligendi, ullam. Ducimus consequuntur labore error hic.</p>
							</div>
							<address class="address">
                                <hr>
								<p>Bouskoura<br> Casablnaca,<br> Morocco</p>
                                <hr>
                                <p><strong>E:</strong>&nbsp;younesszagouri2002@gmail.com<br>
                                <strong>P:</strong>&nbsp;+212 699 030 265</p>
								
                                
							</address>
						</div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-1 wow fadeInUp" data-wow-delay="0.3s">
                    	<div class="form-group">
                    	    <form action="{{ route('contact') }}" method="POST" id="contact-form">
                                @csrf
                    	        <div class="input-field">
                    	            <input type="text" class="form-control" placeholder="Your Name" name="full_name">
                    	        </div>
                    	        <div class="input-field">
                    	            <input type="email" class="form-control" placeholder="Email Address" name="email">
                    	        </div>
                    	        <div class="input-field">
                    	            <textarea class="form-control" placeholder="Your Message" rows="3" name="message"></textarea>
                    	        </div>
                    	        <button class="btn btn-send" type="submit">Send a Message</button>
                    	    </form>
       	    
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                    	</div>
                    </div>
                </div>
            </div>
        </section>

        <section clas="wow fadeInUp">
        	<div class="map-wrapper">
        	</div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <p>Copyright &copy; <a href="#">Yzschool</a>| All right reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Js -->
        <script src={{asset('landing-page/js/vendor/modernizr-2.6.2.min.js')}}></script>
        <script src={{asset('landing-page/js/vendor/jquery-1.10.2.min.js')}}></script>
        <script src='https://maps.googleapis.com/maps/api/js?sensor=false'></script>
        <script src={{asset('landing-page/js/jquery.lwtCountdown-1.0.js')}}></script>
        <script src={{asset('landing-page/js/bootstrap.min.js')}}></script>
        <script src={{asset('landing-page/js/owl.carousel.min.js')}}></script>
        <script src={{asset('landing-page/js/jquery.validate.min.js')}}></script>
        <script src={{asset('landing-page/js/jquery.form.js')}}></script>
        <script src={{asset('landing-page/js/jquery.nav.js')}}></script>
        <script src={{asset('landing-page/js/jquery.sticky.js')}}></script>
        <script src={{asset('landing-page/js/plugins.js')}}></script>
        <script src={{asset('landing-page/js/wow.min.js')}}></script>
        <script src={{asset('landing-page/js/main.js')}}></script>
        
    </body>
</html>
