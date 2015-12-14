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
            <a href="{{ route('home') }}" class="content">
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
            </a>
        </div>
        <div class="ui divider"></div>
        <a href="{{ route('home') }}" class="item">
            <i class="home icon"></i>
            Home
        </a>
        <a class="item" href="{{ route('user.create') }}">
            <i class="add user icon"></i>
            Add Cashier
        </a>
        <a class="item" href="{{ route('information.index') }}">
            <i class="Certificate icon"></i>
            SOA Information
        </a>
        <a class="item">
            <i class="Money icon"></i>
            View Unpaid Balance
        </a>
        <div class="active link item">
            <a class="title">
                Import Reports
                <i class="level up icon" style="float: right;"></i>
            </a>
            <div class="active content">
                <div class="ui form">
                    <div class="grouped fields">
                        <a class="item" href="{{ route('import_payment_history') }}">Payment History</a>
                        <a class="active item" href="{{ route('import_soa_history') }}">SOA History</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui divider"></div>
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
                <h1 class="ui header">
                    <i class="download icon"></i>
                    <div class="ui content">
                        Import SOA History
                        <div class="sub header">Import csvs to the database</div>
                    </div>
                </h1>
                <div class="ui divider"></div>
                <form id='frm_update' class='updte' enctype='multipart/form-data'>
                    <input type='hidden' name='_method' value='POST'>
                    <input type="file" name="xl" id="xl">
                    <br/>
                    <input id="submit" class="ui button primary" type="submit" value="Upload XLS">
                </form>
                <br/><br/>
                <div class="progress">
                    <div class="progress-bar"  id="progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                        <label id="totalData" for="">0%</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        })

        $(document).on('submit', 'form', function() {
            var size = $("#xl")[0].files[0].size;
            var progress = 0;
            var newPercent = 0;
            var data_failed_import = 0;

            Papa.parse($("#xl")[0].files[0], {
                header: true,
                dynamicTyping: true,
                skipEmptyLines: true,
                download: true,

                step: function(row) {
                    var csvData = row.data[0];
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('importInformation') }}",
                        data: csvData,
                        success: function() {
                            progress = row.meta.cursor;
                            newPercent = Math.round(progress / size * 100);

                            document.getElementById("progress").style.width = newPercent + "%";
                            document.getElementById("totalData").innerHTML = newPercent + "%";
                        },
                        error: function() {
                            data_failed_import++;
                        }
                    });
                }
            });
            return false;
        });
    </script>
@stop