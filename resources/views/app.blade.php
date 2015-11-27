<html>
	<head>
		<meta charset="UTF-8">
		<title>Overlook</title>
		<link rel="stylesheet" href="{{ URL::to('/') }}/semantic/dist/semantic.css">
		<link rel="stylesheet" href="{{ URL::to('/') }}/semantic/dist/components/menu.css">
		<link rel="stylesheet" href="{{ URL::to('/') }}/semantic/dist/components/segment.css">
		<link rel="stylesheet" href="{{ URL::to('/') }}/semantic/dist/components/search.css">
		<link rel="stylesheet" href="{{ URL::to('/')  }}/semantic/dist/components/dropdown.css">
		<link rel="stylesheet" href="{{ URL::to('/')  }}/semantic/dist/components/modal.css">
		<link rel="stylesheet" href="{{ URL::to('/')  }}/semantic/dist/components/table.css">
		<link rel="stylesheet" href="{{ URL::to('/')  }}/semantic/dist/components/accordion.css">
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
		{{-- FULL CALENDAR SCRIPT --}}



		@yield('content')
        @yield('script')
        <style>
            body {
                background-image: url("{{ URL::to('/') }}/css/Jacob.png");
            }
        </style>
	</body>
</html>