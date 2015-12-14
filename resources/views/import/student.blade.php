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
                            <a href="#"><i class="user icon"></i> Profile</a>
                        </div>
                        <div class="field">
                            <a href="#"><i class="settings icon"></i> Settings</a>
                        </div>

                        <div class="field">
                            <a href="#"><i class="Undo icon"></i> Change Password</a>
                        </div>
                        <div class="field">
                            <a href="{{ url('/auth/logout') }}"><i class="Sign out icon"></i>  Sign out</a>
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
        <div class="active item">
            <i class="asterisk icon"></i>
            <a class="active title">
                SOA Information
            </a>
            <div class="active content">
                <div class="content">
                    <div class="ui form">
                        <div class="grouped fields">
                            <a class="item"><i class="plus icon" style="float: left;"></i> &nbsp; Add Information<a>
                                    <a class="item"><i class="pencil icon" style="float: left;"></i> &nbsp; Edit Information<a>
                                            <a class="item"><i class="calendar icon" style="float: left;"></i> &nbsp; Update Due Date</a>
                        </div>
                    </div>
                </div>
            </div>
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
                    <div class="active section">Information</div>
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
                 ">
                <h1 class="ui header">
                    <i class="asterisk icon"></i>
                    <div class="ui content">
                        Information
                        <div class="sub header">Student's data based on the excel files.</div>
                    </div>
                </h1>
                <div class="ui divider"></div>
                <table class="ui fixed table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Data</th>
                        <th class="three wide">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($fields as $field)
                        <tr>
                            <td>{{ ++$ctr }}</td>
                            <td>{{ $field->student_label }}</td>
                            <td>
                                <a class="edit_modal" style="cursor: hand;" onclick="editField({{ $field->id }}, '{{ $field->student_label }}')"><i class="pencil icon"></i></a>
                                <a style="cursor: hand;" onclick="deleteField({{ $field->id }}, '{{ $field->student_label }}')"><i class="trash icon"></i></a>
                                <a style="cursor: hand;" onclick="seeInfo({{ $field->id }}, '{{ $field->student_label }}')"><i class="Code icon"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="ui small modal" id="editModal">

        <div class="header">
            <h3 class="ui header">
                <i class="pencil icon"></i>
                <div class="content">
                    Edit Student Label
                </div>
            </h3>
        </div>

        <div class="ui internally celled grid">
            <div class="row">
                <div class="sixteen wide column">
                    <br>
                    <form class="ui form" method="POST" id="editForm" name="editForm">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="ui form">
                            <div class="field">
                                <label>Field Label</label>
                                <input name="student_label" id="field_label">
                            </div>
                        </div>
                        <input type="hidden" id="field_id" name="field_id">
                    </form>
                </div>
            </div>
        </div>

        <div class="actions">
            <button class="ui positive approve button" id="submitForm" onclick="document.editForm.submit();">Update</button>

            <button class="ui negative cancel button">Cancel</button>
        </div>
    </div>
@endsection


@section('script')
    <script>
        //$('.ui.accordion').accordion();
        $('.dropdown').dropdown();

        $('.visible.example .ui.sidebar').sidebar({
            context: '.pusher .bottom.segment'
        })

        $('.message .close').on('click', function()
        {
            $(this).closest('.message').transition('fade');
        });
    </script>
@stop