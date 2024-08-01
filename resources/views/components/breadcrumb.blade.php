@props(['breadcrumbs'])

<nav aria-label="Breadcrumb" class="text-gray-500 text-sm my-4">
    <ol class="list-none p-0 inline-flex">
        <li class="flex items-center">
            <a href="{{ route('home') }}" class="hover:text-[#90EE90] transition-colors duration-200 ease-in-out">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                    </path>
                </svg>
                Beranda
            </a>
        </li>
        @foreach ($breadcrumbs as $breadcrumb)
            <li class="flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                @if (!$loop->last)
                    <a href="{{ $breadcrumb['url'] }}"
                        class="hover:text-[#90EE90] transition-colors duration-200 ease-in-out">
                        {{ $breadcrumb['name'] }}
                    </a>
                @else
                    <span class="text-gray-700 font-medium" aria-current="page">
                        {{ $breadcrumb['name'] }}
                    </span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
