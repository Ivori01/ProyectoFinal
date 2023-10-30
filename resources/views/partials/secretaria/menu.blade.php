         <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                          <a href="{{route('home')}}" class="btn btn-success">  <i class="ace-icon fa fa-home"></i></a>
                          <a href="{{route('Secretaria.Caja.Index')}}" class="btn btn-info">  <i class="ace-icon fas fa-money-bill-alt"></i></a>

                    
                        <a href="{{route('Secretaria.Alumno.Index')}}" class="btn btn-warning"> <i class="ace-icon fas fa-user-graduate"></i></a>

                        <a class="btn btn-danger" href="{{route('Secretaria.Profile')}}">
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
                    <li class="" id="admin-home">
                        <a href="{{route('Secretaria.Home')}}">
                            <i class="menu-icon fas fa-tachometer-alt "></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

<li id="menu-persona">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fas fa-user-cog "></i>
        <span class="menu-text">
          Personas
        </span>

        <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">

        <li class="" id="menu-apoderado">
        <a href="#" class="dropdown-toggle">
        <i class="menu-icon ace-icon fas fa-user-tie"></i>
        <span class="menu-text"> Padre | Apoderado </span>

        <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
        <li class="" id="apoderado-todos">
        <a href="{{route('Secretaria.Apoderado.Index')}}">
        <i class="menu-icon fa fa-caret-right"></i>
        Todos
        </a>

        <b class="arrow"></b>
        </li>

        <li class="" id="apoderado-create">
        <a href="{{route('Secretaria.Apoderado.Create')}}">
        <i class="menu-icon fa fa-caret-right"></i>
        Nuevo
        </a>

        <b class="arrow"></b>
        </li>
        <li id="apoderado-edit" class="hide">
        <a href="#">
        <i class="menu-icon fa fa-caret-right"></i>
        Editar
        </a>

        <b class="arrow"></b>
        </li>
        <li id="apoderado-show" class="hide">
        <a href="#">
        <i class="menu-icon fa fa-caret-right"></i>
        Perfil
        </a>

        <b class="arrow"></b>
        </li>
        </ul>
        </li>   

        <li id="menu-alumno">
        <a href="#" class="dropdown-toggle">
        <i class="menu-icon ace-icon fas fa-user-graduate"></i>
        <span class="menu-text"> Alumno </span>

        <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
        <li  id="alumno-todos">
        <a href="{{route('Secretaria.Alumno.Index')}}">
        <i class="menu-icon fa fa-caret-right"></i>
        Todos
        </a>

        <b class="arrow"></b>
        </li>

        <li id="alumno-create">
        <a href="{{route('Secretaria.Alumno.Create')}}">
        <i class="menu-icon fa fa-caret-right"></i>
        Nuevo
        </a>

        <b class="arrow"></b>
        </li>
        <li id="alumno-edit" class="hide">
        <a href="#">
        <i class="menu-icon fa fa-caret-right"></i>
        Editar
        </a>

        <b class="arrow"></b>
        </li>
        <li id="alumno-show" class="hide">
        <a href="#">
        <i class="menu-icon fa fa-caret-right"></i>
        Perfil
        </a>

        <b class="arrow"></b>
        </li>
        </ul>
        </li>             


                 
    </ul>

</li> 

        

                                     <li class="" id="menu-matricula">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fas fa-school"></i>
                            <span class="menu-text"> Matricula </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="" id="menu-matricula-todos">
                                <a href="{{route('Secretaria.Matricula.Index')}}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Todos
                                </a>

                                <b class="arrow"></b>
                            </li>

                        </ul>
                    </li>
                  
        

       



       
  


                                       <li id="menu-caja">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fas fa-cash-register"></i>
                            <span class="menu-text">Caja </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li id="menu-caja-index">
                                <a href="{{route('Secretaria.Caja.Index')}}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                Todos
                                </a>

                                <b class="arrow"></b>
                            </li>

                                <li id="menu-caja-boleta" class="hide">
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