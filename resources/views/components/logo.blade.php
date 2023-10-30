<button aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar" class="btn btn-burger burger-arrowed static ml-2 d-flex d-xl-none collapsed" data-target="#sidebar" data-toggle-mobile="sidebar" type="button">
    <span class="bars">
    </span>
</button>
<!-- mobile sidebar toggler button -->
<div class="navbar-brand" style="overflow: hidden;
position: relative;
width: 100%;height: 100%;" >
  <a   href="{{ $href_logo ?? '#' }}">
    <img src="{{ url(Storage::url('sistem/photos/'.$school_info->logo))}}"  class="mt-0 pt-0" style="
    height: 100%;
    width: 100%;
    top:0;
  
    ">  
    {{--   <span>1</span> --}}
  </a>
</div>

<!-- /.navbar-brand -->
<button aria-controls="sidebar" aria-expanded="true" aria-label="Toggle sidebar" class="btn btn-burger mr-2 d-none d-xl-flex" data-target="#sidebar" data-toggle="sidebar" type="button">
    <span class="bars">
    </span>
</button>
<!-- sidebar toggler button -->
