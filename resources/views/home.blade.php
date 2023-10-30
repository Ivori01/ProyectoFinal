@extends('layouts.ace',['title'=>'Inicio','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

@section('logo')
    @component('components.logo', ['app_name' => 'School', 'href_logo' => route('home')])
    @endcomponent
@endsection

@section('navbar-menu')
    @component('components.navbar-menu')
    @endcomponent
@endsection

@section('page-name')
    @component('components.page-name', ['subpage_name' => 'Cursos'])
        @slot('page_name')
            Portal
        @endslot
        @slot('subpage_name')

            Roles
        @endslot
    @endcomponent
@endsection
@section('content')
    @php
    $Director = 'fas fa-briefcase ';
    $Secretaria = 'fas fa-desktop ';
    $Alumno = 'fas fa-user-graduate';
    $Docente = 'fas fa-chalkboard-teacher';
    $Apoderado = 'fa fa-users';
    $SuperAdmin = 'fa fa-briefcase';

    @endphp
    <div class="row d-flex justify-content-center mx-1 mx-lg-0 mt-3">
        @foreach (Auth::user()->getRoleNames() as $rol)
            @php $rolname=trim(str_replace('-', '', $rol)); @endphp
            <div class="col-12 col-sm-6 col-lg-3 px-2 dh-zoom-1 ">
                <div class="d-style active w-100 border-none radius-b-1 overflow-hidden text-center border-t-3 my-1 pb-0 px-0 shadow btn-bgc-white btn btn-outline-default btn-h-outline-success btn-h-bgc-white btn-a-outline-success btn-a-bgc-white aos-init aos-animate"
                    data-aos="fade" data-aos-delay="100">
                    <div class="d-flex flex-column align-items-center">
                        <h4 class="w-90 pb-1 text-140 text-blue-m3 mt-2 mb-3 border-b-2 brc-grey-l2">
                            <i>
                                {{ $rol }}
                            </i>
                        </h4>
                        <div>
                            <div class="mb-2 px-2 radius-round bgc-blue-l4 text-blue-m1 py-25 border-1 brc-default-m4">
                                <i class="w-6 fa {{ $$rolname }} fa-2x">
                                </i>
                            </div>
                        </div>
                        {{-- <span class="mt-2 badge badge-lg bgc-red text-white brc-red arrowed-in arrowed-in-right">
                    Special offer
                </span> --}}
                        <div class="flex-grow-1 text-grey text-90 w-100">
                            <ul class="list-unstyled text-left mx-auto mb-0">
                                <li class="mt-45 text-center">
                                    <a class="btn radius-0 btn-success py-3 border-0 btn-block px-3 btn-bold text-105"
                                        href="{{ url(strtolower($rol)) }}">
                                        Iniciar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('footer')
    @component('components.footer')
    @endcomponent
@endsection
