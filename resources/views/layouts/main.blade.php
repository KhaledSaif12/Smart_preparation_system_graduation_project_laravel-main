<!doctype html>
<html lang="en" dir="rtl">

<head>
	<title>@yield('title','') | SAS - Smart Attendance System</title>
	<meta charset="UTF-8">
	<meta name="keywords" content="html rtl, html dir rtl, rtl website template, bootstrap 4 rtl template, rtl bootstrap template, admin panel template rtl, admin panel rtl, html5 rtl, academy training course css template, classes online training website templates, courses training html5 template design, education training rwd simple template, educational learning management jquery html, elearning bootstrap education template, professional training center bootstrap html, institute coaching mobile responsive template, marketplace html template premium, learning management system jquery html, clean online course teaching directory template, online learning course management system, online course website template css html, premium lms training web template, training course responsive website"/>
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Eudica - Online Education & Learning Courses HTML CSS Responsive Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
	<!-- initiate head with meta tags, css and script -->
	@include('include.head')

</head>
<body id="app" >


    <div class="wrapper">

    	<div class="page-wrap">

	    	<!-- initiate sidebar-->
	    	@include('include.sidebar')

			<!-- initiate header-->
			@include('include.header')

	    	<!-- initiate chat section-->
	    	@include('include.chat')


			<!--Dashboard CSS
			<link rel="stylesheet" href="{{ asset('css/style-rtl.css') }}">
			<link rel="stylesheet" href="{{ asset('plugins/sidemenu/sidemenu-rtl.css') }}"> -->


	    	<!-- initiate footer section-->
	    	@include('include.footer')

    	</div>

		<div class="app-content my-3 my-md-5">
			<!-- yeild contents here -->
			@yield('content')

		</div>
    </div>

	<!-- initiate modal menu section-->
	@include('include.modalmenu')

	<!-- initiate scripts-->
	@include('include.script')
</body>
</html>
