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
                    <div class="active section">Create User</div>
                </div>
            </div>
            @if (count($errors) > 0)
            <div class="ui negative message">
                <i class="close icon"></i>
                <div class="header">
                    User was not able to save because of the following reason(s):
                </div>
                <ul class="list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('message'))
                <div class="ui success message">
                    <i class="close icon"></i>
                    <div class="header">
                        {{ Session::get('message') }}
                    </div>
                </div>
            @endif
            <div class="ui segment">
                <h3><i class="Add User icon"></i> Create User</h3>
                <hr>
                <br>
                <form class="ui form" action="{{ route('user.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="field">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" value="{{ Input::old('name') }}">
                    </div>
                    <div class="field">
                        <label>E-mail</label>
                        <input type="email" name="email" placeholder="E-mail" value="{{ Input::old('email') }}">
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="field">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    <button class="ui positive fluid button" type="submit"><i class="add user icon"></i> Create User</button>
                    <div class="ui error message">
                </form>
            </div>
        </div>

        <div class="ui basic segment">


        </div>
    </div>
@endsection


@section('script')
    <script>
        $('.ui.accordion').accordion();
        $('.visible.example .ui.sidebar').sidebar
        ({
            context: '.pusher .bottom.segment'
        });

        $('.message .close').on('click', function()
        {
            $(this).closest('.message').transition('fade');
        });

        /*$('.ui.form').form({
            fields: {
                name: {
                    identifier: 'name',
                    rules: [
                        {
                            type: 'empty',
                            prompt : 'Please provide the user\'s name'
                        }
                    ]
                },
                email: {
                    identifier: 'email',
                    rules: [
                        {
                            type: 'empty',
                            contentType: 'email',
                            prompt : 'Please provide the user\'s e-mail'
                        }
                    ]
                },
                password: {
                    identifier: 'password',
                    rules: [
                        {
                            type: 'empty',
                            prompt : 'Please provide the user\'s password'
                        }
                    ]
                },
                password_confirmation: {
                    identifier: 'password_confirmation',
                    rules: [
                        {
                            type: 'empty',
                            prompt : 'Please provide the user\'s name'
                        }
                    ]
                }
            }
        });*/
    </script>
@stop