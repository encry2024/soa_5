<div class="ui borderless menu right aligned" style="border-radius: 0px;
         background-color: #FCF900;">
    <div class="right menu">
        <div class="ui dropdown item">
            <i class="user icon"></i> {{ Auth::user()->name }} <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item">Profile</a>
                <a class="item">Settings</a>
                <a class="item" href="{{ url('/auth/logout') }}">Logout</a>
            </div>
        </div>
        <a class="right item"><i class="icon home"></i> Home</a>
    </div>
</div>