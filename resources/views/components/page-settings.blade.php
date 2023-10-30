<div aria-hidden="true" class="my-1 my-lg-2 modal modal-nb ace-aside aside-right aside-offset aside-below-nav" data-backdrop="false" id="id-ace-settings-modal" role="dialog" style="display: none;" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content w-auto flex-grow-1 pb-1px radius-0 radius-l-2 border-y-2 border-l-1 brc-default-m3 bgc-white-tp1 shadow">
            <div class="modal-header p-0 radius-0 mx-3">
                <h4 class="modal-title text-blue-m1 pt-2 pl-1">
                    Demo Settings
                </h4>
                <button aria-label="Close" class="close m-0 mr-n2" data-dismiss="modal" type="button">
                    <i aria-hidden="true" class="fa fa-times text-70">
                    </i>
                </button>
            </div>
            <div ace-scroll='{"smooth": true, "lock": true}' class="modal-body mx-md-2 ace-scroll-lock ace-scroll ace-scroll-wrap" style="">
                <div class="ace-scroll-inner" style="color: rgb(72, 75, 81);">
                    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                        <h5 class="text-secondary-m1">
                            Zoom
                        </h5>
                        <div class="btn-group btn-group-toggle align-self-end" data-toggle="buttons">
                            <label class="btn btn-sm btn-light-grey btn-h-light-primary btn-a-primary">
                                90%
                                <input autocomplete="off" name="zoom-level" type="radio" value="90">
                                </input>
                            </label>
                            <label class="btn btn-sm btn-light-grey btn-h-light-primary btn-a-primary active">
                                100%
                                <input autocomplete="off" checked="" name="zoom-level" type="radio" value="none">
                                </input>
                            </label>
                            <label class="btn btn-sm btn-light-grey btn-h-light-primary btn-a-primary">
                                110%
                                <input autocomplete="off" name="zoom-level" type="radio" value="110">
                                </input>
                            </label>
                            <label class="btn btn-sm btn-light-grey btn-h-light-primary btn-a-primary">
                                120%
                                <input autocomplete="off" name="zoom-level" type="radio" value="120">
                                </input>
                            </label>
                        </div>
                    </div>
                    <hr class="border-double my-md-3">
                        <h5 class="text-purple-m2">
                            Themes
                        </h5>
                        <div class="bgc-secondary-l3 py-1 radius-1 mb-3 border-1 radius-1 border-l-3 brc-secondary-m3">
                            <label class="mt-1 pr-2 d-flex align-items-center" for="id-auto-match">
                                <input autocomplete="off" checked="" class="input-lg mx-15" id="id-auto-match" type="checkbox">
                                    <div class="pl-0 text-secondary-d1 text-90 font-bolder">
                                        Match sidebar & navbar themes
                                    </div>
                                </input>
                            </label>
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                            <h6 class="text-95 pl-1 text-grey-d1">
                                Sidebar:
                            </h6>
                            <div class="btn-group btn-group-toggle align-self-end flex-wrap px-0 col-10 col-sm-7" data-toggle="buttons">
                                <label class="btn btn-sm btn-outline-default active mb-1">
                                    Default
                                    <input autocomplete="off" checked="" name="sidebar-theme" type="radio" value="default">
                                    </input>
                                </label>
                                <label class="btn btn-sm btn-outline-default mb-1">
                                    Dark
                                    <input autocomplete="off" id="dark" name="sidebar-theme" type="radio" value="dark">
                                    </input>
                                </label>
                                <label class="btn btn-sm btn-outline-default mb-1">
                                    Light
                                    <input autocomplete="off" name="sidebar-theme" type="radio" value="light">
                                    </input>
                                </label>
                            </div>
                        </div>
                        <div>
                            <div class="d-none bgc-secondary-l1 radius-1 px-1 mb-3 mt-1 text-center" id="id-sidebar-themes-dark">
                                <div class="btn-group btn-group-toggle align-self-end flex-wrap justify-content-center w-75 mx-auto align-items-center my-2 flex-equal-sm" data-toggle="buttons">
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-dark d-style active">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" checked="" name="sidebar-dark" type="radio" value="dark">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-darkblue d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="darkblue">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-darkslategrey d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="darkslategrey">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-cadetblue d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="cadetblue">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-plum d-style my-1px">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="plum">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-darkslateblue d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="darkslateblue">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-purple d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="purple">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-steelblue d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="steelblue">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-blue d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="blue">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-teal d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="teal">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-green d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="green">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-darkcrimson d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="darkcrimson">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-gradient1 d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="gradient1">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-gradient2 d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" id="ga" name="sidebar-dark" type="radio" value="gradient2">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-gradient3 d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="gradient3">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-gradient4 d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="gradient4">
                                        </input>
                                    </label>
                                    <label class="btn btn-xs sidebar-color border-0 sidebar-gradient5 d-style">
                                        <i class="fa fa-check text-white v-active">
                                        </i>
                                        <input autocomplete="off" name="sidebar-dark" type="radio" value="gradient5">
                                        </input>
                                    </label>
                                </div>
                            </div>
                            <!-- #id-sidebar-themes-dark -->
                            <div class="d-none" id="id-sidebar-themes-light">
                                <div class="bgc-secondary-tp2 radius-1 py-1 px-1 mb-3 mt-1 text-center">
                                    <div class="d-flex btn-group btn-group-toggle align-self-end flex-wrap justify-content-center mx-auto align-items-center my-2 flex-equal-sm" data-toggle="buttons">
                                        <label class="active btn btn-xs border-0 sidebar-lightblue d-style my-1px">
                                            <i class="fa fa-check text-muted v-active">
                                            </i>
                                            <input autocomplete="off" checked="" name="sidebar-light" type="radio" value="lightblue">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs border-0 sidebar-lightpurple d-style">
                                            <i class="fa fa-check text-muted v-active">
                                            </i>
                                            <input autocomplete="off" name="sidebar-light" type="radio" value="lightpurple">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs border-0 sidebar-lightblue2 d-style">
                                            <i class="fa fa-check text-muted v-active">
                                            </i>
                                            <input autocomplete="off" name="sidebar-light" type="radio" value="lightblue2">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs border-0 sidebar-white2 d-style">
                                            <i class="fa fa-check text-muted v-active">
                                            </i>
                                            <input autocomplete="off" name="sidebar-light" type="radio" value="white2">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs border-0 sidebar-white d-style">
                                            <i class="fa fa-check text-muted v-active">
                                            </i>
                                            <input autocomplete="off" name="sidebar-light" type="radio" value="white">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs border-0 sidebar-white3 d-style">
                                            <i class="fa fa-check text-muted v-active">
                                            </i>
                                            <input autocomplete="off" name="sidebar-light" type="radio" value="white3">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs border-0 sidebar-light d-style">
                                            <i class="fa fa-check text-muted v-active">
                                            </i>
                                            <input autocomplete="off" name="sidebar-light" type="radio" value="light">
                                            </input>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- #id-sidebar-themes-light -->
                        </div>
                        <hr class="border-dotted">
                            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                                <h6 class="text-95 pl-1 text-grey-d1">
                                    Navbar:
                                </h6>
                                <div class="btn-group btn-group-toggle align-self-end flex-wrap px-0 col-10 col-sm-7" data-toggle="buttons">
                                    <label class="btn btn-sm btn-outline-green active mb-1">
                                        Default
                                        <input autocomplete="off" checked="" name="navbar-theme" type="radio" value="default">
                                        </input>
                                    </label>
                                    <label class="btn btn-sm btn-outline-green mb-1">
                                        Light
                                        <input autocomplete="off" name="navbar-theme" type="radio" value="light">
                                        </input>
                                    </label>
                                    <label class="btn btn-sm btn-outline-green mb-1">
                                        Dark
                                        <input autocomplete="off" name="navbar-theme" type="radio" value="dark">
                                        </input>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div class="d-none bgc-secondary-l1 radius-1 px-1 mb-3 mt-1 text-center" id="id-navbar-themes-dark">
                                    <div class="btn-group btn-group-toggle align-self-end flex-wrap justify-content-center w-75 mx-auto align-items-center my-2 flex-equal-sm" data-toggle="buttons">
                                        <label class="btn btn-xs navbar-color border-0 navbar-steelblue d-style active my-1px">
                                            <i class="fa fa-check text-white v-active">
                                            </i>
                                            <input autocomplete="off" checked="" name="navbar-dark" type="radio" value="steelblue">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs border-0 navbar-blue d-style">
                                            <i class="fa fa-check text-white v-active">
                                            </i>
                                            <input autocomplete="off" name="navbar-dark" type="radio" value="blue">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs navbar-color border-0 navbar-teal d-style">
                                            <i class="fa fa-check text-white v-active">
                                            </i>
                                            <input autocomplete="off" name="navbar-dark" type="radio" value="teal">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs navbar-color border-0 navbar-mediumseagreen d-style">
                                            <i class="fa fa-check text-white v-active">
                                            </i>
                                            <input autocomplete="off" name="navbar-dark" type="radio" value="mediumseagreen">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs navbar-color border-0 navbar-cadetblue d-style">
                                            <i class="fa fa-check text-white v-active">
                                            </i>
                                            <input autocomplete="off" name="navbar-dark" type="radio" value="cadetblue">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs navbar-color border-0 navbar-plum d-style">
                                            <i class="fa fa-check text-white v-active">
                                            </i>
                                            <input autocomplete="off" name="navbar-dark" type="radio" value="plum">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs navbar-color border-0 navbar-purple d-style">
                                            <i class="fa fa-check text-white v-active">
                                            </i>
                                            <input autocomplete="off" name="navbar-dark" type="radio" value="purple">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs navbar-color border-0 navbar-orange d-style">
                                            <i class="fa fa-check text-white v-active">
                                            </i>
                                            <input autocomplete="off" name="navbar-dark" type="radio" value="orange">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs navbar-color border-0 navbar-burlywood d-style">
                                            <i class="fa fa-check text-white v-active">
                                            </i>
                                            <input autocomplete="off" name="navbar-dark" type="radio" value="burlywood">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs navbar-color border-0 navbar-darkseagreen d-style">
                                            <i class="fa fa-check text-white v-active">
                                            </i>
                                            <input autocomplete="off" name="navbar-dark" type="radio" value="darkseagreen">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs border-0 navbar-skyblue d-style">
                                            <i class="fa fa-check text-white v-active">
                                            </i>
                                            <input autocomplete="off" name="navbar-dark" type="radio" value="skyblue">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs navbar-color border-0 navbar-secondary d-style">
                                            <i class="fa fa-check text-white v-active">
                                            </i>
                                            <input autocomplete="off" name="navbar-dark" type="radio" value="secondary">
                                            </input>
                                        </label>
                                        <label class="btn btn-xs navbar-color border-0 navbar-slategrey d-style">
                                            <i class="fa fa-check text-white v-active">
                                            </i>
                                            <input autocomplete="off" name="navbar-dark" type="radio" value="slategrey">
                                            </input>
                                        </label>
                                    </div>
                                </div>
                                <!-- #id-navbar-themes-dark -->
                                <div class="d-none" id="id-navbar-themes-light">
                                    <div class="bgc-secondary-tp2 radius-1 py-1 px-1 mb-3 mt-1 text-center">
                                        <div class="d-flex btn-group btn-group-toggle align-self-end flex-wrap justify-content-center mx-auto align-items-center my-2 flex-equal-sm" data-toggle="buttons">
                                            <label class="active btn btn-xs border-0 navbar-lightblue d-style my-1px">
                                                <i class="fa fa-check text-muted v-active">
                                                </i>
                                                <input autocomplete="off" checked="" name="navbar-light" type="radio" value="lightblue">
                                                </input>
                                            </label>
                                            <label class="btn btn-xs border-0 navbar-white d-style my-1px">
                                                <i class="fa fa-check text-muted v-active">
                                                </i>
                                                <input autocomplete="off" name="navbar-light" type="radio" value="white">
                                                </input>
                                            </label>
                                            <label class="btn btn-xs border-0 navbar-white2 d-style my-1px">
                                                <i class="fa fa-check text-muted v-active">
                                                </i>
                                                <input autocomplete="off" name="navbar-light" type="radio" value="white2">
                                                </input>
                                            </label>
                                            <label class="btn btn-xs border-0 navbar-lightpurple d-style">
                                                <i class="fa fa-check text-muted v-active">
                                                </i>
                                                <input autocomplete="off" name="navbar-light" type="radio" value="lightpurple">
                                                </input>
                                            </label>
                                            <label class="btn btn-xs border-0 navbar-lightgreen d-style">
                                                <i class="fa fa-check text-muted v-active">
                                                </i>
                                                <input autocomplete="off" name="navbar-light" type="radio" value="lightgreen">
                                                </input>
                                            </label>
                                            <label class="btn btn-xs border-0 navbar-lightgrey d-style">
                                                <i class="fa fa-check text-muted v-active">
                                                </i>
                                                <input autocomplete="off" name="navbar-light" type="radio" value="lightgrey">
                                                </input>
                                            </label>
                                            <label class="btn btn-xs border-0 navbar-lightyellow d-style">
                                                <i class="fa fa-check text-muted v-active">
                                                </i>
                                                <input autocomplete="off" name="navbar-light" type="radio" value="lightyellow">
                                                </input>
                                            </label>
                                            <label class="btn btn-xs border-0 navbar-khaki d-style">
                                                <i class="fa fa-check text-muted v-active">
                                                </i>
                                                <input autocomplete="off" name="navbar-light" type="radio" value="khaki">
                                                </input>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- #id-navbar-themes-light -->
                            </div>
                            <hr class="border-dotted">
                                <div class="text-95">
                                    <h5 class="text-success-m1">
                                        Layout
                                    </h5>
                                    <div class="mt-3 d-flex justify-content-between align-items-center">
                                        <label class="pl-1 text-grey-d1" for="id-navbar-fixed">
                                            Fixed Navbar
                                        </label>
                                        <input autocomplete="off" checked="" class="ace-switch" id="id-navbar-fixed" type="checkbox">
                                        </input>
                                    </div>
                                    <div class="mt-2 d-flex justify-content-between align-items-center">
                                        <label class="pl-1 text-grey-d1" for="id-sidebar-fixed">
                                            Fixed Sidebar
                                        </label>
                                        <input autocomplete="off" checked="" class="ace-switch" id="id-sidebar-fixed" type="checkbox">
                                        </input>
                                    </div>
                                    <div class="mt-2 d-flex justify-content-between align-items-center">
                                        <label class="pl-1 text-grey-d1" for="id-footer-fixed">
                                            Fixed Footer
                                        </label>
                                        <input autocomplete="off" class="ace-switch" id="id-footer-fixed" type="checkbox">
                                        </input>
                                    </div>
                                    <div class="mt-2 d-none d-xl-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                                        <div class="pl-1 text-grey-d1">
                                            Boxed Layout
                                        </div>
                                        <div class="w-50 btn-group btn-group-toggle flex-row flex-wrap fl1ex-md-nowrap" data-toggle="buttons">
                                            <label class="btn btn-sm btn-outline-info rounded-0 mx-0">
                                                None
                                                <input autocomplete="off" name="boxed-layout" type="radio" value="none">
                                                </input>
                                            </label>
                                            <label class="btn btn-sm btn-outline-info mx-0">
                                                All
                                                <input autocomplete="off" name="boxed-layout" type="radio" value="all">
                                                </input>
                                            </label>
                                            <label class="btn btn-sm btn-outline-info mx-0">
                                                Not Navbar
                                                <input autocomplete="off" name="boxed-layout" type="radio" value="not-navbar">
                                                </input>
                                            </label>
                                            <label class="btn btn-sm btn-outline-info rounded-0 mx-0 mt-n1px active">
                                                Only Content
                                                <input autocomplete="off" checked="" name="boxed-layout" type="radio" value="only-content">
                                                </input>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="collapse" id="id-body-bg">
                                        <div class="mt-3 d-none d-xl-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                                            <h6 class="text-95 pl-1 text-grey-d1">
                                                Body Background:
                                            </h6>
                                            <div class="btn-group btn-group-toggle align-self-end" data-toggle="buttons">
                                                <label class="btn btn-sm btn-outline-purple active mb-1">
                                                    Auto
                                                    <input autocomplete="off" checked="" name="body-theme" type="radio" value="auto">
                                                    </input>
                                                </label>
                                                <label class="btn btn-sm btn-outline-purple mb-1">
                                                    Image 1
                                                    <input autocomplete="off" name="body-theme" type="radio" value="img1">
                                                    </input>
                                                </label>
                                                <label class="btn btn-sm btn-outline-purple mb-1">
                                                    Image 2
                                                    <input autocomplete="off" name="body-theme" type="radio" value="img2">
                                                    </input>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="border-dotted my-2">
                                        <div class="mt-1 d-flex justify-content-between align-items-center">
                                            <label class="pl-1 text-grey-d1" for="id-rtl">
                                                RTL (right to left)
                                            </label>
                                            <input autocomplete="off" class="ace-switch" id="id-rtl" type="checkbox">
                                            </input>
                                        </div>
                                    </hr>
                                </div>
                                <hr class="border-double my-md-4">
                                    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                                        <h5 class="text-info">
                                            Font
                                        </h5>
                                        <div class="align-self-end w-75">
                                            <select autocomplete="off" class="ace-select radius-round w-100 text-grey brc-h-info-m2" id="id-change-font">
                                                <option value="lato">
                                                    Lato
                                                </option>
                                                <option value="montserrat">
                                                    Montserrat
                                                </option>
                                                <option value="noto-sans">
                                                    Noto Sans
                                                </option>
                                                <option selected="" value="open-sans">
                                                    Open Sans
                                                </option>
                                                <option value="poppins">
                                                    Poppins
                                                </option>
                                                <option value="raleway">
                                                    Raleway
                                                </option>
                                                <option class="text-primary-d2 text-600" value="roboto">
                                                    Roboto (popular)
                                                </option>
                                                <option value="">
                                                    ----
                                                </option>
                                                <option value="markazi">
                                                    Markazi (for RTL languages)
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="border-double my-md-4">
                                        <div class="text-95">
                                            <h5 class="text-warning-d1 ml-n2px">
                                                Sidebar
                                            </h5>
                                            <!--
                  <div class="mt-3 d-none d-xl-flex justify-content-between align-items-center">
                      <label for="id-sidebar-compact" class="pl-1 text-grey-d2">Compact</label>
        
                      <div class="custom-control custom-switch d-inline-block">
                        <input type="checkbox" class="custom-control-input" id="id-sidebar-compact" autocomplete="off" />
                        <label class="custom-control-label" for="id-sidebar-compact"></label>
                      </div>
                  </div>
        
                  <div class="mt-2 d-none d-xl-flex justify-content-between align-items-center">
                      <label for="id-sidebar-hover" class="pl-1 text-grey-d2">Submenu on Hover</label>
        
                      <div class="custom-control custom-switch d-inline-block">
                        <input type="checkbox" class="custom-control-input" id="id-sidebar-hover" autocomplete="off" />
                        <label class="custom-control-label" for="id-sidebar-hover"></label>
                      </div>
                  </div>
                  -->
                                            <div class="mt-2 d-none d-xl-flex justify-content-between align-items-center">
                                                <div class="pl-1 text-grey-d1">
                                                    Collapsed Mode
                                                </div>
                                                <div class="btn-group btn-group-toggle flex-row" data-toggle="buttons">
                                                    <label class="btn btn-sm btn-outline-red active mx-0">
                                                        Expand
                                                        <input autocomplete="off" checked="" name="sidebar-collapsed" type="radio" value="expandable">
                                                        </input>
                                                    </label>
                                                    <label class="btn btn-sm btn-outline-red mx-0">
                                                        Popup
                                                        <input autocomplete="off" name="sidebar-collapsed" type="radio" value="hoverable">
                                                        </input>
                                                    </label>
                                                    <label class="btn btn-sm btn-outline-red mx-0">
                                                        Hide
                                                        <input autocomplete="off" name="sidebar-collapsed" type="radio" value="hideable">
                                                        </input>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mt-3 d-none d-xl-flex justify-content-between align-items-center">
                                                <label class="pl-1 text-grey-d1" for="id-sidebar-hover">
                                                    Submenu on Hover
                                                </label>
                                                <label>
                                                    <input autocomplete="off" class="ace-switch" id="id-sidebar-hover" type="checkbox">
                                                    </input>
                                                </label>
                                            </div>
                                            <div class="mt-2 d-flex d-xl-none justify-content-between align-items-center">
                                                <label class="pl-1 text-grey-d1" for="id-push-content">
                                                    Push Content
                                                </label>
                                                <label>
                                                    <input autocomplete="off" class="ace-switch" id="id-push-content" type="checkbox">
                                                    </input>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="my-1">
                                        </div>
                                    </hr>
                                </hr>
                            </hr>
                        </hr>
                    </hr>
                </div>
            </div>
            <div class="modal-footer d-none justify-content-center">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    <i class="fa fa-times mr-1">
                    </i>
                    Close
                </button>
                <button class="btn btn-info" type="button">
                    <i class="fa fa-check mr-1">
                    </i>
                    Keep changes
                </button>
            </div>
        </div>
        <!-- .modal-content -->
        <div class="aside-header align-self-start mt-1 mt-md-5 text-right">
            <button class="btn btn-warning btn-lg shadow-sm pl-2 radius-l-2" data-target="#id-ace-settings-modal" data-toggle="modal" type="button">
                <i class="fa fa-cog text-110 ml-1">
                </i>
            </button>
        </div>
    </div>
    <!-- .modal-dialog -->
</div>