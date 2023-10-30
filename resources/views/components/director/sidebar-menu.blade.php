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
        <a class="nav-link" href="{{route('Director.Home')}}">
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
                                <a class="nav-link" href="{{route('Director.Alumno.Index')}}">
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
                                <a class="nav-link" href="{{route('Director.Alumno.Create')}}">
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
                                <a class="nav-link" href="#">
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
                <li class="nav-item" id="menu-docente">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="nav-icon text-90 mr-2 text-warning-m1 fas fa-chalkboard-teacher">
                        </i>
                        <span class="nav-text">
                            <span>
                                Docente
                            </span>
                        </span>
                        <b class="caret fa fa-angle-left rt-n90">
                        </b>
                    </a>
                    <div class=" submenu collapse">
                        <ul class="submenu-inner">
                            <li class="nav-item" id="docente-todos">
                                <a class="nav-link" href="{{route('Director.Docente.Index')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Todos
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" id="docente-create">
                                <a class="nav-link" href="{{route('Director.Docente.Create')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Nuevo
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item d-none" id="docente-edit">
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
                            <li class="nav-item d-none" id="docente-show">
                                <a class="nav-link" href="#">
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
                <li class="nav-item" id="menu-director">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="nav-icon text-90 mr-2 text-warning-m1 ace-icon fas fa-briefcase">
                        </i>
                        <span class="nav-text">
                            <span>
                                Director
                            </span>
                        </span>
                        <b class="caret fa fa-angle-left rt-n90">
                        </b>
                    </a>
                    <div class=" submenu collapse">
                        <ul class="submenu-inner">
                            <li class="nav-item" id="director-todos">
                                <a class="nav-link" href="{{route('Director.Director.Index')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Todos
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" id="director-create">
                                <a class="nav-link" href="{{route('Director.Director.Create')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Nuevo
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item d-none" id="director-edit">
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
                            <li class="nav-item d-none" id="director-show">
                                <a class="nav-link" href="#">
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
                <li class="nav-item" id="menu-secretaria">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="nav-icon text-90 mr-2 text-warning-m1 ace-icon fas fa-desktop">
                        </i>
                        <span class="nav-text">
                            <span>
                                Secretaria
                            </span>
                        </span>
                        <b class="caret fa fa-angle-left rt-n90">
                        </b>
                    </a>
                    <div class=" submenu collapse">
                        <ul class="submenu-inner">
                            <li class="nav-item" id="secretaria-todos">
                                <a class="nav-link" href="{{route('Director.Secretaria.Index')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Todos
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" id="secretaria-create">
                                <a class="nav-link" href="{{route('Director.Secretaria.Create')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Nuevo
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item d-none" id="secretaria-edit">
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
                            <li class="nav-item d-none" id="secretaria-show">
                                <a class="nav-link" href="#">
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
                <li class="nav-item" id="menu-user">
                    <a class="nav-link" href="{{route('Director.User.Index')}}">
                        <span class="nav-text">
                            <span>
                                Usuarios
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <b class="sub-arrow">
        </b>
    </li>
    <li class="nav-item" id="menu-nivel">
        <a class="nav-link" href="{{route('Director.Nivel.Index')}}">
            <i class="nav-icon fas fa-sitemap">
            </i>
            <span class="nav-text fadeable">
                Niveles
            </span>
        </a>
        <b class="arrow">
        </b>
    </li>
    <li class="nav-item" id="menu-grado">
        <a class="nav-link" href="{{route('Director.Grado.Index')}}">
            <i class="nav-icon fas fa-list-ol">
            </i>
            <span class="nav-text fadeable">
                Grados
            </span>
        </a>
        <b class="arrow">
        </b>
    </li>
        <li class="nav-item" id="menu-trimestre">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fas fa-map-signs">
            </i>
            <span class="nav-text fadeable">
                <span>
                    Periodo Academico
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-trimestre-index">
                    <a class="nav-link" href="{{route('Director.Trimestre.Index')}}">
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
    <li class="nav-item" id="menu-curso">
        <a class="nav-link" href="{{route('Director.Curso.Index')}}">
            <i class="nav-icon fa fa-book ">
            </i>
            <span class="nav-text fadeable">
                Cursos
            </span>
        </a>
        <b class="arrow">
        </b>
    </li>
    <li class="nav-item" id="menu-criterioevaluacion">
        <a class="nav-link" href="{{route('Director.CriterioEvaluacion.Index')}}">
            <i class="nav-icon fas fa-ruler-combined ">
            </i>
            <span class="nav-text fadeable">
                Criterios de evaluacion
            </span>
        </a>
        <b class="arrow">
        </b>
    </li>
    

    <li class="nav-item" id="menu-plan_academico">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fab fa-elementor">
            </i>
            <span class="nav-text fadeable">
                <span>
                    Plan academico
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-plan_academico-todos">
                    <a class="nav-link" href="{{route('Director.PlanAcademico.Index')}}">
                        <span class="nav-text">
                            <span>
                                Todos
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item d-none" id="menu-plan_academico-ver">
                    <a class="nav-link" href="#">
                        <span class="nav-text">
                            <span>
                                Ver
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item d-none" id="menu-plan_academico-asignar-grado">
                    <a class="nav-link" href="#">
                        <span class="nav-text">
                            <span>
                                Grado
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item d-none" id="menu-plan_academico-asignar-grado-curso">
                    <a class="nav-link" href="#">
                        <span class="nav-text">
                            <span>
                                Curso
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item d-none" id="menu-plan_academico-curso-criterio">
                    <a class="nav-link" href="#">
                        <span class="nav-text">
                            <span>
                                Criterio de evaluacion
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <b class="sub-arrow">
        </b>
    </li>
    <li class="nav-item" id="menu-anio-academico">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fas fa-calendar-alt">
            </i>
            <span class="nav-text fadeable">
                <span>
                    Año academico
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-anio-academico-todos">
                    <a class="nav-link" href="{{route('Director.AnioAcademico.Index')}}">
                        <span class="nav-text">
                            <span>
                                Todos
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item d-none" id="menu-anio-academico-nivel">
                    <a class="nav-link" href="#">
                        <span class="nav-text">
                            <span>
                                Niveles
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item d-none" id="menu-anio-academico-trimestre">
                    <a class="nav-link" href="#">
                        <span class="nav-text">
                            <span>
                                Trimestres
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item" id="menu-anio-academico-activar">
                    <a class="nav-link" href="{{route('Director.AnioAcademico.Activar')}}">
                        <span class="nav-text">
                            <span>
                                Habilitar
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <b class="sub-arrow">
        </b>
    </li>
    <li class="nav-item" id="menu-seccion">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fas fa-boxes">
            </i>
            <span class="nav-text fadeable">
                <span>
                    Secciones
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-seccion-todos">
                    <a class="nav-link" href="{{route('Director.Seccion.Index')}}">
                        <span class="nav-text">
                            <span>
                                Todos
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item d-none" id="seccion-show">
                    <a class="nav-link" href="#">
                        <span class="nav-text">
                            <span>
                                Ver
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item" id="menu-seccion-docentecurso">
                    <a class="nav-link" href="{{route('Director.SeccionDocenteCurso.Index')}}">
                        <span class="nav-text">
                            <span>
                                Docente curso
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
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fas fa-calendar-day">
            </i>
            <span class="nav-text fadeable">
                <span>
                    Horario
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-horario-main">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="nav-icon text-90 mr-2 text-warning-m1 fas fa-user-graduate">
                        </i>
                        <span class="nav-text">
                            <span>
                                Asignacion
                            </span>
                        </span>
                        <b class="caret fa fa-angle-left rt-n90">
                        </b>
                    </a>
                    <div class=" submenu collapse">
                        <ul class="submenu-inner">
                            <li class="nav-item" id="menu-horario-asignar">
                                <a class="nav-link" href="{{route('Director.Horario.Index')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Secciones
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item d-none" id="menu-horario-asignar-edit">
                                <a class="nav-link" href="#">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Asignar
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
                    <a class="nav-link" href="{{route('Director.Matricula.Index')}}">
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
                    <a class="nav-link" href="{{route('Director.BoletaNotas.Index')}}">
                        <span class="nav-text">
                            <span>
                               Boleta de notas
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item" id="menu-reporte-ranking">
                    <a class="nav-link" href="{{route('Director.Ranking.Index')}}">
                        <span class="nav-text">
                            <span>
                               Ranking de notas
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item" id="menu-reporte-lista">
                    <a class="nav-link" href="{{route('Director.Lista.Index')}}">
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
    
    <li class="nav-item" id="menu-notas">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fas fa-scroll">
            </i>
            <span class="nav-text fadeable">
                <span>
                    Notas
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-notas-index">
                    <a class="nav-link" href="{{route('Director.Notas.Index')}}">
                        <span class="nav-text">
                            <span>
                                Todos
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item d-none" id="menu-notas-ver">
                    <a class="nav-link" href="#">
                        <span class="nav-text">
                            <span>
                                Ver
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <b class="sub-arrow">
        </b>
    </li>
    
    <li class="nav-item" id="menu-contabilidad">
        <a class="nav-link dropdown-toggle" href="#">
            <i class="nav-icon fas fa-money-bill-alt">
            </i>
            <span class="nav-text fadeable">
                <span>
                    Contabilidad
                </span>
            </span>
            <b class="caret fa fa-angle-left rt-n90">
            </b>
        </a>
        <div class="hideable submenu collapse">
            <ul class="submenu-inner">
                <li class="nav-item" id="menu-contabilidad-concepto-pago">
                    <a class="nav-link" href="{{route('Director.Concepto.Index')}}">
                        <span class="nav-text">
                            <span>
                                Concepto de pago
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item" id="menu-contabilidad-plantilla-pago">
                    <a class="nav-link" href="{{route('Director.PlantillaPago.Index')}}">
                        <span class="nav-text">
                            <span>
                                Plantillas de pago
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item" id="menu-contabilidad-concepto-descuento">
                    <a class="nav-link" href="{{route('Director.Descuento.Index')}}">
                        <span class="nav-text">
                            <span>
                                Concepto de descuento
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item" id="menu-contabilidad-cuenta-por-cobrar">
                    <a class="nav-link" href="{{route('Director.CuentaPorCobrar.Index')}}">
                        <span class="nav-text">
                            <span>
                                Cuentas por cobrar
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item" id="menu-contabilidad-asignar-descuento">
                    <a class="nav-link" href="{{route('Director.CuentaDescuento.Index')}}">
                        <span class="nav-text">
                            <span>
                                Asignar descuentos
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item" id="menu-cobros">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="nav-icon text-90 mr-2 text-warning-m1 fas fa-cash-register">
                        </i>
                        <span class="nav-text">
                            <span>
                                Cobros
                            </span>
                        </span>
                        <b class="caret fa fa-angle-left rt-n90">
                        </b>
                    </a>
                    <div class=" submenu collapse">
                        <ul class="submenu-inner">
                            <li class="nav-item" id="cobro-todos">
                                <a class="nav-link" href="{{route('Director.Cobro.Index')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Todos
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" id="cobro-create">
                                <a class="nav-link" href="{{route('Director.Cobro.Create')}}">
                                    <i class="nav-icon fa fa-caret-right">
                                    </i>
                                    <span class="nav-text">
                                        <span>
                                            Nuevo
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

    <li class="nav-item" id="colegio-info">
        <a class="nav-link" href="{{route('Director.Info.Index')}}">
            <i class="nav-icon fas fa-cog ">
            </i>
            <span class="nav-text fadeable">
                Configuracion
            </span>
        </a>
        <b class="arrow">
        </b>
    </li>
</ul>