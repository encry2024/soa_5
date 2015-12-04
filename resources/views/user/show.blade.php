@extends('app')

{{--@section('header')
    @include('util.header')
@stop--}}

@section('content')
    <div class="ui inverted visible left attached vertical sidebar borderless accordion menu"
         style="width: 16.35%;
         ">
        <div class="item">
            <img class="ui centered image" src="{{ URL::to('/') }}/css/logo.png" />
            {{--<h3 style="text-align: center;">{{ Auth::user()->name }}</h3>--}}
        </div>
        <div class="item">Welcome,
            <a class="title">
                {{ Auth::user()->name }}
            </a>
            <div class="blue active content">
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
        <div class="ui  divider"></div>
        <a class="item" href="{{ route('user.edit', $user->id) }}">
            <i class="pencil icon"></i>
            Edit Information
        </a>
        <a class="item" href="{{ route('home') }}">
            <i class="chevron left icon"></i>
            Back
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
                    <a class="section" href="{{ route('home') }}">Home</a>
                    <i class="right angle icon divider"></i>
                    <div class="active section">User</div>
                    <i class="right angle icon divider"></i>
                    <div class="active section">{{ $user->name }}</div>
                </div>
            </div>

            <div class="ui segment"
                 style="
                    width: 100%;
                 ">
                <div class="ui grid">
                    <div class="sixteen wide column grid">
                        <h2 class="ui center aligned icon header"><i class="user icon"></i>
                        {{ $user->name }}
                            <div class="sub header">{{ $user->email }}</div>
                        </h2>
                        <div class="ui horizontal divider">information</div>
                        <div class="ui form">
                            <div class="inline fields">
                                <div class="sixteen wide field">
                                    <label>Name</label>
                                    <input type="text" placeholder="First Name" value="{{ $user->name }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="ui form">
                            <div class="inline fields">
                                <div class="sixteen wide field">
                                    <label>Email</label>
                                    <input type="text" placeholder="E-mail" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="ui horizontal divider">current Roles</div>
                        <table class="ui striped fixed table">
                            <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Permission(s)</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($user->roles as $user_role)
                                <tr>
                                    <td>{{ $user_role->display_name }}</td>
                                    <td>
                                        @foreach ($user_role->permission_role as $user_permission)
                                            {{ $user_permission->display_name }}
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($user_role->permission_role as $user_permission)
                                            {{ $user_permission->description }}
                                            <br>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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