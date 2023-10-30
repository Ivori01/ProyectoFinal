<div class="sidebar responsive ace-save-state" id="sidebar">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <a class="btn btn-success" href="{{route('home')}}">
                <i class="ace-icon fa fa-home">
                </i>
            </a>
            <a class="btn btn-info" href="{{route('Director.Pago.Index')}}">
                <i class="ace-icon fas fa-money-bill-alt">
                </i>
            </a>
            <a class="btn btn-warning" href="{{route('Director.User.Index')}}">
                <i class="ace-icon fa fa-users">
                </i>
            </a>
            <a class="btn btn-danger" href="{{route('Director.Profile')}}">
                <i class="ace-icon fa fa-id-badge">
                </i>
            </a>
        </div>
        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success">
            </span>
            <span class="btn btn-info">
            </span>
            <span class="btn btn-warning">
            </span>
            <span class="btn btn-danger">
            </span>
        </div>
    </div>
    <ul class="nav nav-list">
        <li id="menu-caja">
            <a class="dropdown-toggle" href="#">
                <i class="menu-icon fas fa-cash-register">
                </i>
                <span class="menu-text">
                    Caja
                </span>
                <b class="arrow fa fa-angle-down">
                </b>
            </a>
            <b class="arrow">
            </b>
            <ul class="submenu">
                <li id="menu-caja-index">
                    <a href="{{route('Director.Caja.Index')}}">
                        <i class="menu-icon fa fa-caret-right">
                        </i>
                        Todos
                    </a>
                    <b class="arrow">
                    </b>
                </li>
                <li class="hide" id="menu-caja-boleta">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right">
                        </i>
                        Boleta
                    </a>
                    <b class="arrow">
                    </b>
                </li>
            </ul>
        </li>
    </ul>
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right" id="sidebar-toggle-icon">
        </i>
    </div>
</div>