@if ($paginator->hasPages())
<div class="dropdown dd-backdrop d-inline-block">
    <a aria-expanded="false" aria-haspopup="true" class="btn btn-primary btn-md dropdown-toggle" data-toggle="dropdown" href="#" id="dropdownMenuLink2" role="button">
        Slide from Bottom
    </a>
    @dump($contenidos)
    <div aria-labelledby="dropdownMenuLink2" class="dropdown-menu dd-slide-up">
        <div class="dropdown-inner">
            {{-- Pagination Elements --}}
            {{ var_dump($paginator) }}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li class="disabled">
                <span>
                    {{ $element }}
                </span>
            </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
            <a class="dropdown-item active" href="#">
                This Week
            </a>
            @else
            <a class="dropdown-item " href="{{ $url }}">
                {{ $page }}
            </a>
            @endif
                @endforeach
            @endif
        @endforeach
        </div>
    </div>
</div>
@endif
