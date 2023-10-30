<ul aria-label="Main" class="nav has-active-border active-on-top has-active-arrow item-active-highlight-border" role="navigation">
    <li class="nav-item-caption">
        <span class="fadeable pl-3">
            {{--  MAIN --}}
        </span>
        <span class="fadeinable mt-n2 text-125">
            …
        </span>
        <!--
                    OR something like the following (with .hideable text)
                  -->
        <!--
                    <div class="hideable">
                      <span class="pl-3">MAIN</span>
                    </div>
                    <span class="fadeinable mt-n2 text-125">&hellip;</span>
                  -->
    </li>
    <li class="nav-item" id="secretaria-home">
        <a class="nav-link" href="{{route('Secretaria.Home')}}">
            <i class="nav-icon fas fa-tachometer-alt ">
            </i>
            <span class="nav-text fadeable">
                Dashboard
            </span>
        </a>
        <b class="arrow">
        </b>
    </li>
    <li class="nav-item" id="menu-persona">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fas fa-user-cog">
            </i>
            <span class="nav-text fadeable">
                <span>
                    Personas
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-apoderado">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="nav-icon text-90 mr-2 text-warning-m1 fas fa-user-tie">
                        </i>
                        <span class="nav-text">
                            <span>
                                Padres
                            </span>
                        </span>
                        <b class="caret fa fa-angle-left rt-n90">
                        </b>
                    </a>
                    <div class=" submenu collapse">
                        <ul class="submenu-inner">
                            <li class="nav-item" id="apoderado-todos">
                                <a class="nav-link" href="{{route('Secretaria.Apoderado.Index')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Todos
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" id="apoderado-create">
                                <a class="nav-link" href="{{route('Secretaria.Apoderado.Create')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Nuevo
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item d-none" id="apoderado-edit">
                                <a class="nav-link" href="#">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Editar
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item d-none" id="apoderado-show">
                                <a class="nav-link" href="{{route('Secretaria.Apoderado.Create')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Perfil
                                        </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <b class="sub-arrow">
                    </b>
                </li>
                <li class="nav-item" id="menu-alumno">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="nav-icon text-90 mr-2 text-warning-m1 fas fa-user-graduate">
                        </i>
                        <span class="nav-text">
                            <span>
                                Alumno
                            </span>
                        </span>
                        <b class="caret fa fa-angle-left rt-n90">
                        </b>
                    </a>
                    <div class=" submenu collapse">
                        <ul class="submenu-inner">
                            <li class="nav-item" id="alumno-todos">
                                <a class="nav-link" href="{{route('Secretaria.Alumno.Index')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Todos
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" id="alumno-create">
                                <a class="nav-link" href="{{route('Secretaria.Alumno.Create')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Nuevo
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item d-none" id="alumno-edit">
                                <a class="nav-link" href="#">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Editar
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item d-none" id="alumno-show">
                                <a class="nav-link" href="{{route('Secretaria.Apoderado.Create')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Perfil
                                        </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <b class="sub-arrow">
                    </b>
                </li>
            </ul>
        </div>
        <b class="sub-arrow">
        </b>
    </li>

    <li class="nav-item" id="menu-matricula">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fas fa-school">
            </i>
            <span class="nav-text fadeable">
                <span>
                    Matricula
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-matricula-todos">
                    <a class="nav-link" href="{{route('Secretaria.Matricula.Index')}}">
                        <span class="nav-text">
                            <span>
                                Todos
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <b class="sub-arrow">
        </b>
    </li>

 <li class="nav-item" id="menu-reporte">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fas fa-file-pdf">
            </i>
            
            <span class="nav-text fadeable">
                <span>
                   Reportes 
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-reporte-boleta">
                    <a class="nav-link" href="{{route('Secretaria.BoletaNotas.Index')}}">
                        <span class="nav-text">
                            <span>
                               Boleta de notas
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item" id="menu-reporte-ranking">
                    <a class="nav-link" href="{{route('Secretaria.Ranking.Index')}}">
                        <span class="nav-text">
                            <span>
                               Ranking de notas
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item" id="menu-reporte-lista">
                    <a class="nav-link" href="{{route('Secretaria.Lista.Index')}}">
                        <span class="nav-text">
                            <span>
                                Lista de notas
                            </span>
                        </span>
                    </a>
                </li>
             
            </ul>
        </div>
        <b class="sub-arrow">
        </b>
    </li>
    <li class="nav-item" id="menu-caja">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fas fa-cash-register">
            </i>
            <span class="nav-text fadeable">
                <span>
                    Caja
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-caja-index">
                    <a class="nav-link" href="{{route('Secretaria.Cobro.Index')}}">
                        <span class="nav-text">
                            <span>
                                Todos
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item d-none" id="menu-caja-boleta">
                    <a class="nav-link" href="#">
                        <span class="nav-text">
                            <span>
                                Boleta
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <b class="sub-arrow">
        </b>
    </li>
</ul>