<div class="sidebar sidebar-fixed expandable sidebar-color sidebar-gradient2 {{-- sidebar-visible --}}" id="sidebar"  data-gotoactive="true" data-swipe="true">
    <div class="sidebar-inner">
        <div {{-- ace-scroll --}} class="flex-grow-1 ace-scroll ">
            @yield('sidebar-buttons')
                    @yield('sidebar-menu')
        </div>
        <!-- /.sidebar scroll -->
        <div class="sidebar-section">
            @yield('sidebar-section')
        </div>
    </div>
</div>