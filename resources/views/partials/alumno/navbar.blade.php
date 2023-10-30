<style type="text/css">
    .navbar .navbar-brand {
    color: #FFF;
    font-size: 24px;
    text-shadow: none;
    padding-top: 5px;
    padding-bottom: 5px;
    height: auto;
}
</style>
<div class="navbar navbar-default ace-save-state" id="navbar">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button class="navbar-toggle menu-toggler pull-left" data-target="#sidebar" id="menu-toggler" type="button">
            <span class="sr-only">
                Toggle sidebar
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
        </button>
        <div class="navbar-header pull-left">
            <a class="nav ace-nav navbar-brand" href="{{route('home')}}">
                <small class="ligther">
                    <img class="fa nav-user-photo " src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgmZNIb3gUEpXHiuoeTgICQ-zygduLcDYJnCe0uMU_HJ04_sk3yg"/>
                   Augenblick
                </small>
            </a>
        </div>
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="grey dropdown-modal">
                    <a class="dropdown-toggle"  href="{{ route('Alumno.AulaVirtual.Index') }}">
                        <i class="ace-icon fa fa-tasks">
                        </i>
                        Aula Virtual
                        
                    </a>
                    
                </li>
                <li class="light-blue dropdown-modal">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img alt="Jason's Photo" class="nav-user-photo" src="{{ url(Storage::url('sistem/photos/'.Auth::user()->persona->foto))}}"/>
                        <span class="user-info">
                            <small>
                                Bienvenido,
                            </small>
                            {!! Auth::user()->persona->nombres!!}
                        </span>
                        <i class="ace-icon fa fa-caret-down">
                        </i>
                    </a>
                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="{{route('Alumno.Profile')}}">
                                <i class="ace-icon fa fa-user">
                                </i>
                                Profile
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="ace-icon fa fa-power-off">
                                </i>
                                Logout
                            </a>
                            <form action="{{ route('logout') }}" id="logout-form" method="POST">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.navbar-container -->
</div>
