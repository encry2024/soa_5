<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="_token" name="_token" content="{{ csrf_token() }}"/>

		<title>STI :: Statement Of Account</title>
		<link rel="stylesheet" href="{{ URL::to('/') }}/semantic/dist/semantic.css">
		<link rel="stylesheet" href="{{ URL::to('/') }}/semantic/dist/components/menu.css">
		<link rel="stylesheet" href="{{ URL::to('/') }}/semantic/dist/components/segment.css">
		<link rel="stylesheet" href="{{ URL::to('/') }}/semantic/dist/components/search.css">
		<link rel="stylesheet" href="{{ URL::to('/') }}/semantic/dist/components/dropdown.css">
		<link rel="stylesheet" href="{{ URL::to('/') }}/semantic/dist/components/modal.css">
		<link rel="stylesheet" href="{{ URL::to('/') }}/semantic/dist/components/accordion.css">
        <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.css">
		@yield('header')
	</head>

	<body>
		<script src="{{ URL::to('/') }}/semantic/dist/jquery.min.js"></script>
		<script src="{{ URL::to('/') }}/semantic/dist/semantic.min.js"></script>
		<script src="{{ URL::to('/') }}/semantic/dist/components/sidebar.js"></script>
		<script src="{{ URL::to('/') }}/semantic/dist/components/tab.js"></script>
		<script src="{{ URL::to('/') }}/semantic/dist/components/search.min.js"></script>
		<script src="{{ URL::to('/') }}/semantic/dist/components/dropdown.js"></script>
		<script src="{{ URL::to('/') }}/semantic/dist/components/api.min.js"></script>
		<script src="{{ URL::to('/') }}/semantic/dist/components/transition.min.js"></script>
		<script src="{{ URL::to('/') }}/semantic/dist/components/accordion.js"></script>
		<script src="{{ URL::to('/') }}/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="{{ URL::to('/') }}/moment.js"></script>

        @yield('content')
        @yield('script')

        <style>
            body {
                /*background-image: ;*/
                background: url("{{ URL::to('/') }}/css/Jacob.png") ;
            }
        </style>
	</body>
</html>