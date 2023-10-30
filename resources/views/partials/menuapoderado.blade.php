         <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-primary btn-white">
                            <i class="ace-icon fa fa-signal red"></i>
                        </button>

                        <button class="btn btn-primary btn-white">
                            <i class="ace-icon fa fa-pencil blue"></i>
                        </button>

                        <button class="btn btn-primary btn-white">
                            <i class="ace-icon fa fa-users green"></i>
                        </button>

                        <button class="btn btn-primary btn-white">
                            <i class="ace-icon fa fa-cogs"></i>
                        </button>
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!-- /.sidebar-shortcuts -->

                <ul class="nav nav-list">
                    <li class="" id="apoderado-home">
                        <a href="{{route('apoderado.home')}}">
                            <i class="menu-icon fa fa-tachometer "></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

             
    

          
  <li class="" id="apoderado-alumnos">
                        <a href="{{route('apoderado.indexalumnos')}}">
                            <i class="menu-icon ace-icon fa fa-child"></i>
                            <span class="menu-text">Alumnos </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

        
  <li class="hide" id="apoderado-grados">
                        <a href="#">
                            <i class="menu-icon ace-icon fa fa-graduation-cap"></i>
                            <span class="menu-text">Grados </span>
                        </a>

                        <b class="arrow"></b>
                    </li>
 <li class="hide" id="apoderado-notas">
                        <a href="#">
                            <i class="menu-icon ace-icon fa fa-book"></i>
                            <span class="menu-text"> Notas </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

             

 <li class="hide" id="apoderado-horario">
                        <a href="#">
                            <i class="menu-icon ace-icon fa fa-calendar"></i>
                            <span class="menu-text"> Horario</span>
                        </a>

                        <b class="arrow"></b>
                    </li>
          

      
</ul>

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>