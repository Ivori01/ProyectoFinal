@extends('layouts.error',['title'=>'Página no encontrada'])
       
@section('content')
<div class="page-content container">
    <div class="row justify-content-center pos-rel">
        <div class="pos-rel col-12 col-sm-7 py-3 px-4 mt-3">
            <div class="position-tc text-center">
                <i class="fa fa-search text-grey-l3 anim-zoom search-icon">
                </i>
            </div>
            <!-- the big search icon -->
            <div class="pos-rel">
                <div class="slot-col-container row px-3 justify-content-center mx-auto">
                    <div class="col-4 slot-column text-orange-m3 mx-n1 pos-rel py-4 px-0">
                        <div class="slot-column-bg-top position-tc">
                        </div>
                        <div class="slot-column-numbers anim-slot mx-auto">
                            12345678901234567890
                        </div>
                        <div class="slot-column-bg-bottom position-bc">
                        </div>
                    </div>
                    <!-- slot column -->
                    <div class="col-4 slot-column text-orange-m3 mx-n1 pos-rel py-4 px-0">
                        <div class="slot-column-bg-top position-tc">
                        </div>
                        <div class="slot-column-numbers anim-slot2 mx-auto">
                            78901234567890123456
                        </div>
                        <div class="slot-column-bg-bottom position-bc">
                        </div>
                    </div>
                    <!-- slot column -->
                    <div class="col-4 slot-column text-orange-m3 mx-n1 pos-rel py-4 px-0">
                        <div class="slot-column-bg-top position-tc">
                        </div>
                        <div class="slot-column-numbers anim-slot3 mx-auto">
                            12345678901234567890
                        </div>
                        <div class="slot-column-bg-bottom position-bc">
                        </div>
                    </div>
                    <!-- slot column -->
                </div>
                <!-- slot-machine -->
                <div class="mt-5 text-center">
                    <span class="text-170 text-primary-d1">
                        Página no encontrada
                    </span>
                </div>
                <hr class="border-t-2 border-dotted brc-danger-m4">
                    <div class="text-dark-m2 text-120 text-center text-md-left">
                        We looked everywhere but we couldn't find it!
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <input class="form-control form-control-lg pr-4" placeholder="Give it a search ..." type="text">
                            <i class="fa fa-search ml-n4 text-secondary-d1">
                            </i>
                            <button class="btn btn-secondary btn-lg btnxs ml-25" type="button">
                                Go!
                            </button>
                        </input>
                    </div>
                    <div class="mt-4 text-dark-m2 text-105">
                        Try one of the following:
                        <ul class="list-unstyled mt-3 mx-3">
                            <li class="my-2">
                                <i class="fa fa-circle text-xs text-blue-d1 align-middle mr-1">
                                </i>
                                Re-check the url for typos
                            </li>
                            <li class="my-2">
                                <i class="fa fa-circle text-xs text-blue-d1 align-middle mr-1">
                                </i>
                                Read the faq
                            </li>
                            <li class="my-2">
                                <i class="fa fa-circle text-xs text-blue-d1 align-middle mr-1">
                                </i>
                                Tell us about it
                            </li>
                        </ul>
                    </div>
                    <hr class="border-dotted">
                        <div class="text-center">
                            <a class="btn btn-default btn-md btn-text-slide-x" href="javascript:history.back()">
                                <i class="btn-text-2 fa fa-arrow-left text-110 align-text-bottom mr-2">
                                </i>
                                Go Back
                            </a>
                            <button class="btn btn-primary btn-md" type="button">
                                <i class="fa fa-home">
                                </i>
                                Homepage
                            </button>
                        </div>
                    </hr>
                </hr>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@component('components.footer')
@endcomponent
@endsection