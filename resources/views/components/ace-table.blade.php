<div class="mt-4 mx-md-2 border-t-1 brc-secondary-l1">
    <div class="bgc-dark-tp2 text-white px-3 py-25">
        {{$title}}
    </div>
    <div class="table-responsive-md">
        <table class="table table-bordered text-dark-m1 text-95 brc-grey-l2 " id="{{$id ?? 'dynamic-table'}}">
            <thead class="text-dark-m3 bgc-grey-l4">
                <tr>
                    {{$slot}}
                </tr>
            </thead>
        </table>
    </div>
</div>