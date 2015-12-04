@extends('app')


@section('content')
    <div class="ui inverted visible left attached vertical sidebar borderless accordion menu"
         style="width: 16.35%;
         /*background-color: #FCF900;*/
         ">
        <div class="item">
            <img class="ui centered image" src="{{ URL::to('/') }}/css/logo.png" />
            {{--<h3 style="text-align: center;">{{ Auth::user()->name }}</h3>--}}
        </div>
        <div class="item">
            Welcome,
            <a class="title">
                {{ Auth::user()->name }}
            </a>
            <div class="active content">
                <div class="ui form">
                    <div class="grouped fields">
                        <div class="link field">
                            <a href="#">Profile</a>
                        </div>
                        <div class="field">
                            <a href="#">Settings</a>
                        </div>
                        <div class="field">
                            <a href="#">Change Password</a>
                        </div>
                        <div class="field">
                            <a href="{{ url('/auth/logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui divider"></div>
        <a class="item" href="{{ route('home') }}">
            <i class="home icon"></i>
            Home
        </a>
        <a class="item" href="{{ route('user.create') }}">
            <i class="add user icon"></i>
            Add Cashier
        </a>
        <div class="blue active item">
            <i class="Calendar icon"></i>
            Set Due Date
        </div>
        <a class="item">
            <i class="Money icon"></i>
            View Unpaid Balance
        </a>
        <div class="link item">
            <a class="title">
                Import Reports
                <i class="level up icon" style="float: right;"></i>
            </a>
            <div class="content">
                <div class="ui form">
                    <div class="grouped fields">
                        <a class="item">Payment History</a>
                        <a class="item">SOA History</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="item">
            <i class="Certificate icon"></i>
            Add SOA Information
        </a>
        <a class="item">
            <i class="Send icon"></i>
            Notify Students
        </a>
        <a class="item">
            <i class="book icon"></i>
            Activity Log
        </a>
    </div>

    <div class="pusher" style="
        -webkit-transform: none !important;
         transform:  none !important;
        float: right;
        width: 83.5%;
        " >

        <div class="ui basic segment">
            <div class="ui segment">
                <div class="ui breadcrumb">
                    <a class="section" href="{{ route('home') }}">Home</a>
                    <i class="right angle icon divider"></i>
                    <div class="active section">Due Dates</div>
                </div>
            </div>

            @if (Session::has('msg'))
                <div class="ui success message">
                    <i class="close icon"></i>
                    <div class="header">
                        {{ Session::get('msg') }}
                    </div>
                </div>
            @endif

            <div class="ui segment"
                 style="
                 /*border-radius: 0em !important;*/
                 margin: 0em !important;
                 position: fixed;
                 width: 81.55%;
                 ">
                <h1 class="ui header">
                    <i class="calendar icon"></i>
                    <div class="ui content">
                        Due Dates
                        <div class="sub header">Set the due dates of Enrollment</div>
                    </div>
                </h1>
                <div class="ui divider"></div>
                <div class="ui grid">
                    <div class="sixteen wide column grid">
                        <form class="ui form" action="{{ route('information.store') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="field">
                                <label>Down Payment Date</label>
                                <div class="ui input left icon">
                                    <input name="due_1" class="datepicker_1" type="text" placeholder="Down Payment Date">
                                    <i class="calendar icon"></i>
                                </div>
                            </div>

                            <div class="field">
                                <label>2nd Payment *</label>
                                <div class="ui left icon input">
                                    <input name="due_2" class="datepicker_2" type="text" placeholder="2nd Payment Date">
                                    <i class="calendar icon"></i>
                                </div>
                            </div>

                            <div class="field">
                                <label>3rd Payment *</label>
                                <div class="ui left icon input">
                                    <input name="due_3" class="datepicker_3" type="text" placeholder="3rd Payment Date">
                                    <i class="calendar icon"></i>
                                </div>
                            </div>

                            <div class="field">
                                <label>4th Payment *</label>
                                <div class="ui left icon input">
                                    <input name="due_4" class="datepicker_4" type="text" placeholder="4th Payment Date">
                                    <i class="calendar icon"></i>
                                </div>
                            </div>

                            <div class="field">
                                <label>5th Payment *</label>
                                <div class="ui left icon input">
                                    <input name="due_5" class="datepicker_5" type="text" placeholder="5th Payment Date">
                                    <i class="calendar icon"></i>
                                </div>
                            </div>
                            <button class="ui fluid button positive" type="submit"><i class="checkmark icon"></i> Set Due Date</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $('.datepicker_1').datepicker({
            format: "dd-MM-yyyy",
            autoclose: true,
            todayHighlight: 1,
            minView: 2,
            forceParse: 0,
            startDate: moment().format('DD-MMMM-YYYY')
        });

        $('.datepicker_2').datepicker({
            format: "dd-MM-yyyy",
            autoclose: true,
            todayHighlight: 1,
            minView: 2,
            forceParse: 0,
            startDate: moment().format('DD-MMMM-YYYY')
        });

        $('.datepicker_3').datepicker({
            format: "dd-MM-yyyy",
            autoclose: true,
            todayHighlight: 1,
            minView: 2,
            forceParse: 0,
            startDate: moment().format('DD-MMMM-YYYY')
        });

        $('.datepicker_4').datepicker({
            format: "dd-MM-yyyy",
            autoclose: true,
            todayHighlight: 1,
            minView: 2,
            forceParse: 0,
            startDate: moment().format('DD-MMMM-YYYY')
        });

        $('.datepicker_5').datepicker({
            format: "dd-MM-yyyy",
            autoclose: true,
            todayHighlight: moment(),
            minView: 2,
            forceParse: 0,
            startDate: moment().format('DD-MMMM-YYYY')
        });

        $('.ui.accordion').accordion();
        $('.dropdown').dropdown();
        $('.visible.example .ui.sidebar').sidebar({
            context: '.pusher .bottom.segment'
        })
    </script>
@stop