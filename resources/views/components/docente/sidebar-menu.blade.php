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
    <li class="nav-item" id="admin-home">
        <a class="nav-link" href="{{route('Docente.Home')}}">
            <i class="nav-icon fas fa-tachometer-alt ">
            </i>
            <span class="nav-text fadeable">
                Dashboard
            </span>
        </a>
        <b class="arrow">
        </b>
    </li>
    <li class="nav-item" id="menu-curso">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fa fa-book">
            </i>
            <span class="nav-text fadeable">
                <span>
                    Cursos
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-curso-index">
                    <a class="nav-link" href="{{route('Docente.Curso.Index')}}">
                        <span class="nav-text">
                            <span>
                                Todos
                            </span>
                        </span>
                    </a>
                </li>
                 <li class="nav-item d-none" id="menu-curso-notas">
                    <a class="nav-link" href="#">
                        <span class="nav-text">
                            <span>
                               Notas
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <b class="sub-arrow">
        </b>
    </li>
    <li class="nav-item" id="menu-asistencia">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fa fa-book">
            </i>
            <span class="nav-text fadeable">
                <span>
                  Asistencia
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-asistencia-index">
                    <a class="nav-link" href="{{route('Docente.Asistencia.Index')}}">
                        <span class="nav-text">
                            <span>
                               Registrar
                            </span>
                        </span>
                    </a>
                </li>
                 <li class="nav-item d-none" id="menu-asistencia-create">
                    <a class="nav-link" href="#">
                        <span class="nav-text">
                            <span>
                               Notas
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <b class="sub-arrow">
        </b>
    </li>
     <li class="nav-item" id="menu-horario">
        <a class="nav-link" href="{{route('Docente.Horario.Index')}}">
            <i class="nav-icon fa fa-calendar-day ">
            </i>
            <span class="nav-text fadeable">
               Horario
            </span>
        </a>
        <b class="arrow">
        </b>
    </li>
</ul>