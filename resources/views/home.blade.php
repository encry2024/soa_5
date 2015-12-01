@extends('app')

{{--@section('header')
    @include('util.header')
@stop--}}

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
        <div class="active item">
            <i class="home icon"></i>
            Home
        </div>
        <a class="item" href="{{ route('user.create') }}">
            <i class="add user icon"></i>
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
        ">

        <div class="ui basic segment">
            <div class="ui segment">
                <div class="ui breadcrumb">
                    <div class="active section">Home</div>
                </div>
            </div>

            <div class="ui segment"
                 style="
                 /*border-radius: 0em !important;*/
                 margin: 0em !important;
                 position: fixed;
                 width: 81.55%;
                 ">
                <h1 class="ui header">Cashier List
                <div class="sub header">List of registered cashier members</div>
                </h1>
                <div class="ui divider"></div>
                <div class="ui grid">
                    <div class="sixteen wide column grid">
                        <button class="ui right floated button red"><i class="trash icon"></i>Delete</button>
                        <br><br>
                        <table class="ui striped table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Role Access</th>
                                    <th>Description</th>
                                    <th>
                                        <div class="ui checkbox">
                                            <input type="checkbox">
                                            <label></label>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $ctr++ }}</td>
                                    <td><a href="{{ route('user.show', $user->id) }}">{{ $user->name }} </a></td>
                                    <td class="ui item">
                                        @foreach ($user->roles as $user_role)
                                            {{ $user_role->display_name }}
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($user->roles as $user_role)
                                            @foreach ($user_role->permission_role as $user_permission)
                                                {{ $user_permission->name }},
                                            @endforeach
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($user->roles as $user_role)
                                            @foreach ($user_role->permission_role as $user_permission)
                                                {{ $user_permission->description }},
                                            @endforeach
                                                <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="ui checkbox">
                                            <input type="checkbox">
                                            <label></label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @include('util.paginator', ['paginator' => $users->appends(Request::only('filter'))])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $('.dropdown').dropdown();
        $('.ui.accordion').accordion();
        $('.visible.example .ui.sidebar').sidebar({
            context: '.pusher .bottom.segment'
        })
    </script>
@stop