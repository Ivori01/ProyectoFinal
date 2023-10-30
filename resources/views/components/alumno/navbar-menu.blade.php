<div class="navbar-nav">
    <ul class="nav">
        {!!  $li ?? ''!!}
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="{{ route('Alumno.AulaVirtual.Index') }}">
                <i class="ace-icon fa fa-tasks">
                    Aula virtual
                </i>
            </a>
        </li>
        {{--
        <li class="nav-item dropdown dropdown-mega">
            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="http://104.237.146.83/templates/ace/demo/#" role="button">
                <i class="fa fa-list-alt mr-2 d-lg-none">
                </i>
                Mega
                <i class="caret fa fa-angle-down d-none d-lg-block">
                </i>
                <i class="caret fa fa-angle-left d-block d-lg-none">
                </i>
            </a>
            <div class="p-0 dropdown-menu dropdown-animated bgc-light-m1 brc-primary-m2 border-t-0 border-x-1 border-b-2 ace-scrollbar">
                <div class="row mx-0">
                    <div class="col-lg-4 col-12 p-2 p-lg-3 p-xl-4 d-flex align-items-center">
                        <div class="list-group mt-3 mx-auto px-0">
                            <a class="list-group-item list-group-item-action" href="http://104.237.146.83/templates/ace/demo/#">
                                <i class="fab fa-facebook text-blue-m1 text-110 mr-2">
                                </i>
                                Cras justo odio
                            </a>
                            <a class="list-group-item list-group-item-action text-primary" href="http://104.237.146.83/templates/ace/demo/#">
                                <i class="fa fa-user text-success-m2 text-110 mr-2">
                                </i>
                                Dapibus ac facilisis in
                            </a>
                            <a class="list-group-item list-group-item-action" href="http://104.237.146.83/templates/ace/demo/#">
                                <i class="fa fa-clock text-purple-m2 text-110 mr-2">
                                </i>
                                Morbi leo risus
                            </a>
                            <a class="list-group-item list-group-item-action bgc-success-l1 bgc-h-success-l2" href="http://104.237.146.83/templates/ace/demo/#">
                                <i class="fa fa-check text-orange text-110 mr-2">
                                </i>
                                Porta ac consectetur
                                <span class="ml-2 badge badge-primary badge-pill badge-lg">
                                    14
                                </span>
                            </a>
                            <a class="list-group-item list-group-item-action disabled" href="http://104.237.146.83/templates/ace/demo/#">
                                Vestibulum at eros
                            </a>
                        </div>
                    </div>
                    <!-- .col:mega links -->
                    <div class="bgc-white col-lg-4 col-12 p-4">
                        <h5 class="text-blue-m1">
                            <i class="fas fa-bullhorn mr-1 text-grey-m2">
                            </i>
                            Notifications
                        </h5>
                        <div>
                            <div class="media mt-2 px-3 pt-1 border-l-2 brc-purple-m2">
                                <span class="d-block bgc-purple-tp2 radius-1 mr-3 p-3">
                                    <i class="fa fa-user text-white text-150">
                                    </i>
                                </span>
                                <div class="media-body pb-0 mb-0 text-90 text-muted">
                                    <div class="text-grey-d2 font-bolder">
                                        @username1
                                    </div>
                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus...
                                </div>
                            </div>
                            <hr>
                                <div class="media mt-2 px-3 pt-1 border-l-2 brc-warning-m2">
                                    <span class="d-block bgc-warning-tp2 radius-1 mr-3 p-3">
                                        <i class="fa fa-user text-white text-150">
                                        </i>
                                    </span>
                                    <div class="media-body pb-0 mb-0 text-90 text-muted">
                                        <div class="text-grey-d2 font-bolder">
                                            @username2
                                        </div>
                                        Fusce dapibus, tellus ac cursus commodo, tortor mauris...
                                    </div>
                                </div>
                                <hr>
                                    <div class="media mt-2 px-3 pt-1 border-l-2 brc-success-m2">
                                        <span class="d-block bgc-success-tp2 radius-1 mr-3 p-3">
                                            <i class="fa fa-user text-white text-150">
                                            </i>
                                        </span>
                                        <div class="media-body pb-0 mb-0 text-90 text-muted">
                                            <div class="text-grey-d2 font-bolder">
                                                @username3
                                            </div>
                                            Tortor mauris condimentum nibh, fusce dapibus...
                                        </div>
                                    </div>
                                </hr>
                            </hr>
                        </div>
                    </div>
                    <!-- .col:mega notifications -->
                    <div class="col-lg-4 col-12 p-4 dropdown-clickable">
                        <h5 class="text-blue-m1">
                            <i class="fa fa-envelope mr-1 text-grey-m2">
                            </i>
                            Contact Us
                        </h5>
                        <form class="my-3">
                            <div class="form-group mb-2">
                                <input class="form-control border-l-2" placeholder="Name" type="text">
                                </input>
                            </div>
                            <div class="form-group mb-2">
                                <input class="form-control border-l-2" placeholder="Email" type="text">
                                </input>
                            </div>
                            <div class="form-group mb-4">
                                <textarea class="form-control brc-primary-m2 border-l-2 text-grey-d1" placeholder="Your message..." rows="3">
                                </textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-smd btn-wide btn-secondary text-110" type="reset">
                                    Reset
                                </button>
                                <button class="btn btn-smd btn-wide btn-primary text-110" type="button">
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- .col:mega contact -->
                </div>
                <!-- .row: mega -->
                <div class="row mx-0 order-first order-lg-last bgc-primary-l4 border-t-1 brc-default-m4">
                    <div class="col-lg-8 offset-lg-2 d-flex justify-content-center py-4 d-flex">
                        <button class="mx-2px btn btn-sm btn-app btn-outline-warning btn-h-outline-warning btn-a-outline-warning radius-1 border-2">
                            <i class="fa fa-cog text-190 d-block mb-2 h-4">
                            </i>
                            <span class="text-muted">
                                Settings
                            </span>
                        </button>
                        <button class="mx-2px btn btn-sm btn-app btn-outline-info btn-h-outline-info radius-1 border-2">
                            <i class="fa fa-edit text-190 d-block mb-2 h-4">
                            </i>
                            Edit
                            <span class="position-tr text-danger-m2 text-130 mr-1">
                                *
                            </span>
                        </button>
                        <button class="mx-2px btn btn-sm btn-app btn-dark radius-1">
                            <i class="fa fa-lock text-150 d-block mb-2 h-4">
                            </i>
                            Lock
                        </button>
                    </div>
                </div>
                <!-- .row:megamenu big buttons -->
            </div>
        </li>
        <li class="nav-item dropdown dropdown-mega">
            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle pl-lg-3 pr-lg-4" data-toggle="dropdown" href="http://104.237.146.83/templates/ace/demo/#" role="button">
                <i class="fa fa-bell text-110 icon-animated-bell mr-lg-2">
                </i>
                <span class="d-inline-block d-lg-none ml-2">
                    Notifications
                </span>
                <!-- show only on mobile -->
                <span class="badge badge-sm badge-warning radius-round text-80 border-1 brc-white-tp5" id="id-navbar-badge1">
                    3
                </span>
                <i class="caret fa fa-angle-left d-block d-lg-none">
                </i>
                <div class="dropdown-caret brc-white">
                </div>
            </a>
            <div class="shadow dropdown-menu dropdown-animated dropdown-sm p-0 bg-white brc-primary-m3 border-1 border-b-2">
                <ul class="nav nav-tabs nav-tabs-simple w-100 nav-justified dropdown-clickable border-b-1 brc-default-m4">
                    <li class="nav-item">
                        <a class="d-style px-0 mx-0 py-3 nav-link active text-600 brc-blue-m2 text-grey-m3 bgc-h-blue-l4" data-toggle="tab" href="http://104.237.146.83/templates/ace/demo/#navbar-notif-tab-1" role="tab">
                            <span class="d-active text-blue-m1 text-105">
                                Notifications
                            </span>
                            <span class="d-n-active">
                                Notifications
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-style px-0 mx-0 py-3 nav-link text-600 brc-purple-m2 text-grey-m3 bgc-h-purple-l4" data-toggle="tab" href="#navbar-notif-tab-2" role="tab">
                            <span class="d-active text-purple-m1 text-105">
                                Messages
                            </span>
                            <span class="d-n-active">
                                Messages
                            </span>
                        </a>
                    </li>
                </ul>
                <!-- .nav-tabs -->
                <div class="tab-content tab-sliding p-0">
                    <div class="tab-pane mh-none show active px-md-1 pt-1" id="navbar-notif-tab-1" role="tabpanel">
                        <a class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary" href="http://104.237.146.83/templates/ace/demo/#">
                            <i class="fab fa-twitter bgc-blue-tp1 text-white text-110 mr-1 p-2 radius-1">
                            </i>
                            <span class="text-muted">
                                Followers
                            </span>
                            <span class="float-right badge badge-danger radius-round text-80">
                                - 4
                            </span>
                        </a>
                        <a class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary" href="http://104.237.146.83/templates/ace/demo/#">
                            <i class="fa fa-comment bgc-pink-tp1 text-white text-110 mr-1 p-2 radius-1">
                            </i>
                            <span class="text-muted">
                                New Comments
                            </span>
                            <span class="float-right badge badge-info radius-round text-80">
                                +12
                            </span>
                        </a>
                        <a class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary" href="http://104.237.146.83/templates/ace/demo/#">
                            <i class="fa fa-shopping-cart bgc-success-tp1 text-white text-110 mr-1 p-2 radius-1">
                            </i>
                            <span class="text-muted">
                                New Orders
                            </span>
                            <span class="float-right badge badge-success radius-round text-80">
                                +8
                            </span>
                        </a>
                        <a class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary" href="http://104.237.146.83/templates/ace/demo/#">
                            <i class="far fa-clock bgc-purple-tp1 text-white text-110 mr-1 p-2 radius-1">
                            </i>
                            <span class="text-muted">
                                Finished processing data!
                            </span>
                        </a>
                        <hr class="mt-1 mb-1px brc-info-m4">
                            <a class="mb-0 py-3 border-0 list-group-item text-blue-m2 text-uppercase text-center text-85 font-bold" href="http://104.237.146.83/templates/ace/demo/#">
                                See All Notifications
                                <i class="ml-2 fa fa-arrow-right text-muted">
                                </i>
                            </a>
                        </hr>
                    </div>
                    <!-- .tab-pane : notifications -->
                    <div class="tab-pane mh-none pl-md-2" id="navbar-notif-tab-2" role="tabpanel">
                        <div ace-scroll='{"ignore": "mobile", "height": 300, "smooth":true}' class="ace-scroll ace-scroll-wrap" style="max-height: 300px;">
                            <div class="ace-scroll-inner" style="color: rgb(33, 37, 41);">
                                <a class="d-flex mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary" href="http://104.237.146.83/templates/ace/demo/#">
                                    <img class="align-self-start border-2 brc-primary-m3 p-1px mr-2 radius-round" src="./Gallery - Ace Admin_files/avatar.png" width="48">
                                        <div>
                                            <span class="text-blue-m1 font-bolder">
                                                Alex:
                                            </span>
                                            <span class="text-grey text-90">
                                                Ciao sociis natoque penatibus et auctor ...
                                            </span>
                                            <br>
                                                <span class="text-grey-m2 text-85">
                                                    <i class="far fa-clock">
                                                    </i>
                                                    a moment ago
                                                </span>
                                            </br>
                                        </div>
                                    </img>
                                </a>
                                <hr class="my-1px brc-grey-l3">
                                    <a class="d-flex mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary" href="http://104.237.146.83/templates/ace/demo/#">
                                        <img class="align-self-start border-2 brc-primary-m3 p-1px mr-2 radius-round" src="./Gallery - Ace Admin_files/avatar3.png" width="48">
                                            <div>
                                                <span class="text-blue-m1 font-bolder">
                                                    Susan:
                                                </span>
                                                <span class="text-grey text-90">
                                                    Vestibulum id ligula porta felis euismod ...
                                                </span>
                                                <br>
                                                    <span class="text-grey-m2 text-85">
                                                        <i class="far fa-clock">
                                                        </i>
                                                        20 minutes ago
                                                    </span>
                                                </br>
                                            </div>
                                        </img>
                                    </a>
                                    <hr class="my-1px brc-grey-l3">
                                        <a class="d-flex mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary" href="http://104.237.146.83/templates/ace/demo/#">
                                            <img class="align-self-start border-2 brc-primary-m3 p-1px mr-2 radius-round" src="./Gallery - Ace Admin_files/avatar4.png" width="48">
                                                <div>
                                                    <span class="text-blue-m1 font-bolder">
                                                        Bob:
                                                    </span>
                                                    <span class="text-grey text-90">
                                                        Nullam quis risus eget urna mollis ornare ...
                                                    </span>
                                                    <br>
                                                        <span class="text-grey-m2 text-85">
                                                            <i class="far fa-clock">
                                                            </i>
                                                            3:15 pm
                                                        </span>
                                                    </br>
                                                </div>
                                            </img>
                                        </a>
                                        <hr class="my-1px brc-grey-l3">
                                            <a class="d-flex mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary" href="http://104.237.146.83/templates/ace/demo/#">
                                                <img class="align-self-start border-2 brc-primary-m3 p-1px mr-2 radius-round" src="./Gallery - Ace Admin_files/avatar2.png" width="48">
                                                    <div>
                                                        <span class="text-blue-m1 font-bolder">
                                                            Kate:
                                                        </span>
                                                        <span class="text-grey text-90">
                                                            Ciao sociis natoque eget urna mollis ornare ...
                                                        </span>
                                                        <br>
                                                            <span class="text-grey-m2 text-85">
                                                                <i class="far fa-clock">
                                                                </i>
                                                                1:33 pm
                                                            </span>
                                                        </br>
                                                    </div>
                                                </img>
                                            </a>
                                            <hr class="my-1px brc-grey-l3">
                                                <a class="d-flex mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary" href="http://104.237.146.83/templates/ace/demo/#">
                                                    <img class="align-self-start border-2 brc-primary-m3 p-1px mr-2 radius-round" src="./Gallery - Ace Admin_files/avatar5.png" width="48">
                                                        <div>
                                                            <span class="text-blue-m1 font-bolder">
                                                                Fred:
                                                            </span>
                                                            <span class="text-grey text-90">
                                                                Vestibulum id penatibus et auctor  ...
                                                            </span>
                                                            <br>
                                                                <span class="text-grey-m2 text-85">
                                                                    <i class="far fa-clock">
                                                                    </i>
                                                                    10:09 am
                                                                </span>
                                                            </br>
                                                        </div>
                                                    </img>
                                                </a>
                                            </hr>
                                        </hr>
                                    </hr>
                                </hr>
                            </div>
                        </div>
                        <!-- ace-scroll -->
                        <hr class="my-1px brc-grey-l2 border-double">
                            <a class="mb-0 py-3 border-0 list-group-item text-blue-m2 text-uppercase text-center text-85 font-bold" href="http://104.237.146.83/templates/ace/demo/html/inbox.html">
                                See All Messages
                                <i class="ml-2 fa fa-arrow-right text-muted">
                                </i>
                            </a>
                        </hr>
                    </div>
                    <!-- .tab-pane : messages -->
                </div>
            </div>
        </li>
        <li class="nav-item dd-backdrop dropdown dropdown-mega">
            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle pl-lg-3 pr-lg-4" data-toggle="dropdown" href="http://104.237.146.83/templates/ace/demo/#" role="button">
                <i class="fa fa-flask text-110 icon-animated-vertical mr-lg-1">
                </i>
                <span class="d-inline-block d-lg-none ml-2">
                    Tasks
                </span>
                <!-- show only on mobile -->
                <span class="badge badge-sm text-90 text-success-l4" id="id-navbar-badge2">
                    +2
                </span>
                <i class="caret fa fa-angle-left d-block d-lg-none">
                </i>
                <div class="dropdown-caret brc-warning-l2">
                </div>
            </a>
            <div class="shadow dropdown-menu dropdown-animated animated-1 dropdown-xs p-0 bg-white brc-warning-l1 border-x-1 border-b-1">
                <div class="bgc-warning-l2 py-25 px-4 border-b-1 brc-warning-l2">
                    <span class="text-dark-tp4 text-600 text-90 text-uppercase">
                        <i class="fa fa-check mr-2px text-warning-d2 text-120">
                        </i>
                        4 Tasks to complete
                    </span>
                </div>
                <div class="px-4 py-2">
                    <div class="text-95">
                        <span class="text-grey-d1">
                            Software update
                        </span>
                    </div>
                    <div class="progress mt-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar bgc-info" role="progressbar" style="width: 60%;">
                            60%
                        </div>
                    </div>
                </div>
                <hr class="my-1 mx-4">
                    <div class="px-4 py-2">
                        <div class="text-95">
                            <span class="text-grey-d1">
                                Hardware upgrade
                            </span>
                        </div>
                        <div class="progress mt-2">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar bgc-warning" role="progressbar" style="width: 40%;">
                                40%
                            </div>
                        </div>
                    </div>
                    <hr class="my-1 mx-4">
                        <div class="px-4 py-2">
                            <div class="text-95">
                                <span class="text-grey-d1">
                                    Customer support
                                </span>
                            </div>
                            <div class="progress mt-2">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar bgc-danger" role="progressbar" style="width: 30%;">
                                    30%
                                </div>
                            </div>
                        </div>
                        <hr class="my-1 mx-4">
                            <div class="px-4 py-2">
                                <div class="text-95">
                                    <span class="text-grey-d1">
                                        Fixing bugs
                                    </span>
                                </div>
                                <div class="progress mt-2">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar bgc-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 85%;">
                                        85%
                                    </div>
                                </div>
                            </div>
                            <hr class="my-1px mx-2 brc-info-l2 ">
                                <a class="d-block bgc-h-primary-l4 py-3 border-0 text-center text-blue-m2" href="http://104.237.146.83/templates/ace/demo/#">
                                    <span class="text-85 text-600 text-uppercase">
                                        See All Tasks
                                    </span>
                                    <i class="ml-2 fa fa-arrow-right text-muted">
                                    </i>
                                </a>
                            </hr>
                        </hr>
                    </hr>
                </hr>
            </div>
        </li>
        --}}
        <li class="nav-item dropdown order-first order-lg-last">
            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                <img alt="Photo" class="d-none d-lg-inline-block radius-round border-2 brc-white-tp1 mr-2" height="36" id="id-navbar-user-image" src="{{ url(Storage::url('sistem/photos/'.Auth::user()->persona->foto))}}" width="36">
                    <span class="d-inline-block d-lg-none d-xl-inline-block">
                        <span class="text-90" id="id-user-welcome">
                            welcome ,
                        </span>
                        <span class="nav-user-name">
                            {{ Auth::user()->persona->nombres }}
                        </span>
                    </span>
                    <i class="caret fa fa-angle-down d-none d-xl-block">
                    </i>
                    <i class="caret fa fa-angle-left d-block d-lg-none">
                    </i>
                </img>
            </a>
            <div class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3">
                <div class="d-none d-lg-block d-xl-none">
                    <div class="dropdown-header">
                        {{ Auth::user()->persona->nombres }}
                    </div>
                    <div class="dropdown-divider">
                    </div>
                </div>
                <a class="dropdown-item btn btn-outline-grey btn-h-lighter-primary btn-a-lighter-primary" href="{{ route('MyProfile') }}">
                    <i class="fa fa-user text-primary-m1 text-105 mr-1">
                    </i>
                    Perfil
                </a>
                <a class="dropdown-item btn btn-outline-grey btn-h-lighter-success btn-a-lighter-success" href="{{ route('MySettings') }}">
                    <i class="fa fa-cog text-success-m1 text-105 mr-1">
                    </i>
                    Ajustes
                </a>
                <div class="dropdown-divider brc-primary-l2">
                </div>
                <a class="dropdown-item btn btn-outline-grey btn-h-lighter-secondary btn-a-lighter-secondary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off text-warning-d1 text-105 mr-1">
                    </i>
                    Logout
                </a>
                <form action="{{ route('logout') }}" id="logout-form" method="POST">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
        <!-- /.nav-item:last -->
    </ul>
    <!-- /.navbar-nav menu -->
</div>
<!-- /.navbar-nav -->
