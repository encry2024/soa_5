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
        <div class="link item">
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
        <a class="item" href="{{ route('user.edit', $id->id) }}">
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
                    <div class="active section">{{ $id->name }}</div>
                </div>
            </div>

            <div class="ui segment"
                 style="
                 position: fixed;
                 width: 81.55%;
                 ">
                <div class="ui grid">
                    <div class="sixteen wide column grid">
                        <h2 class="ui center aligned icon header"><i class="user icon"></i>
                        {{ $id->name }}
                            <div class="sub header">{{ $id->email }}</div>
                        </h2>
                        <div class="ui horizontal divider">current Roles</div>
                        <table class="ui very basic fixed table">
                            <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Permission(s)</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($id->roles as $user_role)
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
                        <div class="ui horizontal divider">Assign to Roles</div>
                        <label>Roles: </label>
                        <br>
                        @foreach ($roles as $key => $role)
                            <div class="ui checkbox">
                                <input id="{{ $key }}" type="checkbox" name="role-{{ $role->id }}" tabindex="{{ $key }}" class="hidden">
                                <label for="{{ $key }}">{{ $role->display_name }}</label>
                            </div>
                            <br>
                        @endforeach
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
        $('.ui.checkbox').checkbox({
            onChecked: function() {
                console.log($(this).text);
            }
        });
    </script>
@stop