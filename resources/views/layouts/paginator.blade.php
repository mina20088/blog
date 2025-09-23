<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/js/dashboard.js', 'resources/css/app.css'])


</head>

<body>
    <section class="flex justify-between items-center my-9">
        <div>
            @if($paginator->hasPages())
                <nav aria-label="Page navigation example">
                    <ul class="flex items-center -space-x-px h-8 text-sm">

                        {{-- Paginatore Previous --}}
                        @if($paginator->onFirstPage())
                            <li>
                                <button type="button" disabled
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                </button>

                            </li>
                        @else
                            <li>
                                <a href="{{  $paginator->previousPageUrl()  }}"
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Previous</span>
                                    Previous
                                </a>
                            </li>

                        @endif

                        {{-- Page Numbers with Limited Range --}}
                        @php
                            $onEachSide = 3; // Set your desired number
                            $currentPage = $paginator->currentPage();
                            $lastPage = $paginator->lastPage();

                            // Calculate start and end pages
                            $start = max($currentPage - $onEachSide, 1);
                            $end = min($currentPage + $onEachSide, $lastPage);

                            // Adjust if we're near the beginning or end
                            if ($end - $start < $onEachSide * 2) {
                                if ($start == 1) {
                                    $end = min($start + ($onEachSide * 2), $lastPage);
                                } else {
                                    $start = max($end - ($onEachSide * 2), 1);
                                }
                            }
                        @endphp



                        {{-- Show first page + ellipsis if needed --}}
                        @if($start > 1)
                            <li class="xs:hidden md:flex">
                                <a href="{{ $paginator->url(1) }}"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                            </li>
                            @if($start > 2)
                                <li class="xs:hidden md:flex">
                                    <span
                                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300">...</span>
                                </li>
                            @endif
                        @endif

                        {{-- Page range around current page --}}
                        @foreach(range($start, $end) as $page)
                            <li class="xs:hidden md:flex">
                                @if($page === $currentPage)
                                    <span
                                        class="flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50">{{ $page }}</span>
                                @else
                                    <a href="{{ $paginator->url($page) }}"
                                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $page }}</a>
                                @endif
                            </li>
                        @endforeach

                        {{-- Show ellipsis + last page if needed --}}
                        @if($end < $lastPage)
                            @if($end < $lastPage - 1)
                                <li class="xs:hidden md:flex">
                                    <span
                                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300">...</span>
                                </li>
                            @endif
                            <li class="xs:hidden md:flex">
                                <a href="{{ $paginator->url($lastPage) }}"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $lastPage }}</a>
                            </li>
                        @endif


                        {{-- Paginatore Next --}}
                        @if($paginator->hasMorePages())
                            <li>
                                <a href="{{ $paginator->nextPageUrl() }}"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </a>
                            </li>
                        @else
                            <li>
                                <button type="button" disabled
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </button>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
        <div class='flex items-center gap-4'>
            <form method="GET" action="{{ route('dashboard.users') }}" class="m-0">
                <select id="perPageSelect" onchange="this.form.submit()" name="per_page"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    <option value="">Items per page</option>
                    <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5 per page</option>
                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 per page</option>
                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 per page</option>
                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 per page</option>
                </select>
            </form>

            <span class="text-sm text-gray-700 dark:text-gray-400">
                Showing <span class="font-semibold text-gray-900 dark:text-white">1</span> to <span
                    class="font-semibold text-gray-900 dark:text-white">{{ $paginator->count()	}}</span> of <span
                    class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total()	 }}</span> Entries
            </span>

        </div>

    </section>

</body>

</html>
