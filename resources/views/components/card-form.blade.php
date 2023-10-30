<div class="card {{ $color ?? 'bgc-dark' }}  radius-0" draggable="false" id="{{ $cardId ?? 'card-form' }}">
    <div class="card-header card-header-sm">
        <h5 class="card-title text-110 text-white font-normal pt-1">
            {{ $titleCard ?? '' }}
        </h5>
        <div class="card-toolbar align-self-center">
            {{ $toolbarCard ?? '' }}
        </div>
    </div>
    <!-- /.card-header -->
    <form id="{{ $formId ?? 'form-create' }}" novalidate="novalidate" role="form">
        <div class="card-body bg-white p-0 collapse show" style="">
            <div class="p-3">
                {{ $formInputs ?? '' }}
            </div>
            <div class="{{ $classFooter ?? ' bgc-light px-3 py-2 border-t-1 brc-light d-flex justify-content-between' }}">
                {{ $cardButtons ?? '' }}
            </div>
        </div>
    </form>
    <!-- /.card-body -->
</div>