         <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                          <a href="{{route('home')}}" class="btn btn-success">  <i class="ace-icon fa fa-home"></i></a>
                          <a href="{{route('Alumno.Horario.Index')}}" class="btn btn-info">  <i class="ace-icon fas fa-calendar-day"></i></a>

                    
                        <a href="{{route('Alumno.Deuda.Index')}}" class="btn btn-warning"> <i class="ace-icon fas fa-money-bill-alt"></i></a>

                        <a class="btn btn-danger" href="{{route('Alumno.Profile')}}">
                            <i class="ace-icon fa fa-id-badge"></i>
                        </a>
                    </div>
                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div>
            

                <ul class="nav nav-list">
                    <li class="" id="alumno-home">
                        <a href="{{route('Alumno.Home')}}">
                            <i class="menu-icon fas fa-tachometer-alt "></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>

                        <b class="arrow"></b>
                    </li>
        

                                     <li class="" id="menu-grado">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fas fa-list-ol"></i>
                            <span class="menu-text">Grados </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="" id="menu-grado-todos">
                                <a href="{{route('Alumno.Grado.Index')}}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Todos
                                </a>

                                <b class="arrow"></b>
                            </li>
 <li class="hide" id="menu-grado-notas">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Notas
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>


                                       <li id="menu-horario">
                        <a href="{{route('Alumno.Horario.Index')}}" >
                            <i class="menu-icon fas fa-calendar-day"></i>
                            <span class="menu-text">Horario</span>

                          
                        </a>

              
                    </li>  


                     <li class="" id="menu-deuda">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fas fa-money-bill-alt"></i>
                            <span class="menu-text">Deudas </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="" id="menu-deuda-todos">
                                <a href="{{route('Alumno.Deuda.Index')}}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Todos
                                </a>

                                <b class="arrow"></b>
                            </li>
 <li class="hide" id="menu-deuda-boleta">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                   Boleta
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
</ul>

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>