@extends('app')

@section('content')
    <div class="ui inverted visible left attached vertical sidebar accordion menu"
         style="width: 16.35%;
         ">
        <div class="item">

            <h4><img class="ui mini spaced image" src="{{ URL::to('/') }}/css/logo.png"> BALANCE INQUIRY</h4>
            {{--<h3 style="text-align: center;">{{ Auth::user()->name }}</h3>--}}
        </div>
        <div class="ui link item">
            <a class="title">
                <i class="dropdown icon"></i>
                {{ Auth::user()->name }}
            </a>
            <div class="content">
                <div class="ui form">
                    <div class="grouped fields">
                        <div class="field">
                            <a>Profile</a>
                        </div>
                        <div class="field">
                            <a>Settings</a>
                        </div>
                        <div class="field">
                            <a>Change Password</a>
                        </div>
                        <div class="field">
                            <a href="{{ url('/auth/logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header item"><h3>MENU</h3></div>
        <a class="item" href="{{ route('user.create') }}">
            <i class="user layout icon"></i>
            Add Cashier
        </a>
        <a class="item">
            <i class="Calendar icon"></i>
            Set Due Date
        </a>
        <a class="item">
            <i class="Money icon"></i>
            View Unpaid Balance
        </a>
        <a class="item">
            <i class="level up icon"></i>
            Import Reports
        </a>
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
        ">

        <div class="ui basic segment">
            <div class="ui segment">
                <div class="ui breadcrumb">
                    <a class="section">Home</a>
                </div>
            </div>
        </div>

        <div class="ui basic segment">
            <div class="ui segment">
                <h3><i class="Users icon"></i> USERS</h3>
                <table class="ui striped table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Granted Access</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Christan Jake Gatchalian</td>
                            <td>Cashier</td>
                            <td>View-Report</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $('.dropdown').dropdown();
        $('.ui.accordion').accordion();
        $('.visible.example .ui.sidebar')
                .sidebar({
                    context: '.pusher .bottom.segment'
                })
    </script>
@stop