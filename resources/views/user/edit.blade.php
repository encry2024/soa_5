@extends('app')


@section('content')
    <div class="ui inverted visible left attached vertical sidebar borderless accordion menu"
         style="width: 16.35%;
         ">
        <div class="item">
            <img class="ui centered image" src="{{ URL::to('/') }}/css/logo.png" />
            {{--<h3 style="text-align: center;">{{ Auth::user()->name }}</h3>--}}
        </div>
        <div class="ui horizontal divider"><span style="color: white;">user</span></div>
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
        <div class="ui horizontal divider"><span style="color: white;">MENU</span></div>
        <a class="item" href="{{ route('user.show', $user->id) }}">
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
                <div class="ui breadcrumb" style="
                    border-radius: 0em !important;
                    margin: 0em !important;
                    width: 81.55%;
                ">
                    <a class="section" href="{{ route('home') }}">Home</a>
                    <i class="right angle icon divider"></i>
                    <a href="{{ route('user.index') }}" class="section">User</a>
                    <i class="right angle icon divider"></i>
                    <a class="section" href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a>
                    <i class="right angle icon divider"></i>
                    <div class="active section">Edit Information</div>
                </div>
            </div>

            @if (Session::has('msg'))
            <div class="ui success message">
                <i class="close icon"></i>
                <div class="header">
                    {{ $user->name }} {{ Session::get('msg') }}
                </div>
            </div>
            @endif

            <div class="ui segment" style="width: 100%;">
                <form action="{{ route('update_role', $user->id) }}" method="POST">
                <input type="hidden" name="_method" value="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                    <input type="text" placeholder="First Name" name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="ui form">
                            <div class="inline fields">
                                <div class="sixteen wide field">
                                    <label>Email</label>
                                    <input type="email" placeholder="E-mail" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="ui horizontal divider">Assign to Roles</div>
                            <table class="ui table">
                                <thead>
                                    <th class="center aligned"></th>
                                    <th>Role</th>
                                    <th>Permission(s)</th>
                                    <th>Description</th>
                                </thead>

                                <tbody>
                                @foreach ($roles as $role)
                                    <?php $role_status = ""; ?>
                                    @foreach ($role_ids as $role_id)
                                        @if ($role->id == $role_id)
                                            <?php $role_status = "checked";
                                            break;
                                            ?>
                                        @else
                                            <?php $role_status = "";?>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td class="center aligned">
                                            <div class="ui checkbox">
                                                <input type="checkbox" name="role[]" value="{{ $role->name }}" {{ $role_status }}>
                                                <label for=""></label>
                                            </div>
                                        </td>
                                        <td>{{ $role->display_name }}</td>
                                        <td>
                                            @foreach ($role->permission_role as $user_permission)
                                                {{ $user_permission->display_name }}
                                                <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($role->permission_role as $user_permission)
                                                {{ $user_permission->description }}
                                                <br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        <button type="submit" class="ui button fluid positive update_btn">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


    {{--<div class="ui form modal">
        <form class="ui modal" action="{{ route('user.update', $user->id) }}" method="POST">
            <input type="hidden" name="_method" value="patch">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h2 class="ui header">
                <i class="warning circle icon"></i>
                Update Role
            </h2>

            <div class="ui content">
                <label style="font-size: 16px;">You are about to update {{ $user->name }}'s role.</label>
            </div>
            <div class="actions">
                Are you sure?
                <button type="submit" class="ui positive right button submit">
                    Update
                </button>
                <div class="ui negative deny button">
                    Cancel
                </div>
            </div>
            <input type="hidden" name="user_id" id="user_id">
            <input type="hidden" name="role_id" id="role_id">
        </form>
    </div>--}}
@stop


@section('script')
    <script>
        $('.dropdown').dropdown();
        $('.ui.accordion').accordion();

        $('.message .close').on('click', function()
        {
            $(this)
                    .closest('.message')
                    .transition('fade')
            ;
        });
    </script>
@stop