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
    <li class="nav-item" id="alumno-home">
        <a class="nav-link" href="{{route('Alumno.Home')}}">
            <i class="nav-icon fas fa-tachometer-alt ">
            </i>
            <span class="nav-text fadeable">
                Dashboard
            </span>
        </a>
        <b class="arrow">
        </b>
    </li>
    <li class="nav-item" id="menu-grado">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fas fa-list-ol">
            </i>
            <span class="nav-text fadeable">
                <span>
                    Grados
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-grado-todos">
                    <a class="nav-link" href="{{route('Alumno.Grado.Index')}}">
                        <span class="nav-text">
                            <span>
                                Todos
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item d-none" id="menu-grado-notas">
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
        <a class="nav-link" href="{{route('Alumno.Horario.Index')}}">
            <i class="nav-icon fa fa-calendar-day ">
            </i>
            <span class="nav-text fadeable">
                Horario
            </span>
        </a>
        <b class="arrow">
        </b>
    </li>
    <li class="nav-item" id="menu-deuda">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fas fa-money-bill-alt">
            </i>
            <span class="nav-text fadeable">
                <span>
                   Deudas
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-deuda-todos">
                    <a class="nav-link" href="{{route('Alumno.Deuda.Index')}}">
                        <span class="nav-text">
                            <span>
                                Todos
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item d-none" id="menu-deuda-boleta">
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