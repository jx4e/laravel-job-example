@if ($paginator->hasPages())
    <nav class="flex justify-center mt-12">
        <ul class="inline-flex items-center space-x-4 text-sm font-medium">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-6 py-3 bg-gray-200 text-gray-400 rounded-full cursor-not-allowed shadow-sm">
                        ←
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-6 py-3 bg-white text-gray-800 rounded-full shadow-sm hover:bg-gray-100 transition ease-in-out duration-150">
                        ←
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Dots --}}
                @if (is_string($element))
                    <li>
                        <span class="px-6 py-3 bg-gray-200 text-gray-400 rounded-full cursor-not-allowed shadow-sm">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Page Numbers --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-6 py-3 bg-black text-white rounded-full shadow-md">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-6 py-3 bg-white text-gray-800 rounded-full shadow-sm hover:bg-gray-100 transition ease-in-out duration-150">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-6 py-3 bg-white text-gray-800 rounded-full shadow-sm hover:bg-gray-100 transition ease-in-out duration-150">
                        →
                    </a>
                </li>
            @else
                <li>
                    <span class="px-6 py-3 bg-gray-200 text-gray-400 rounded-full cursor-not-allowed shadow-sm">
                        →
                    </span>
                </li>
            @endif

        </ul>
    </nav>
@endif
