<section class="flex xs:flex-col xs:gap-3 md:flex-row justify-between md:items-center xs:my-3 md:my-9">

    <div class='flex xs:order-2  md:order-1'>
        @if($paginator->hasPages())
            <nav class="basis-full">
                <ul class="flex md:items-center xs:items-start -space-x-px h-8 text-sm xs:justify-between md:justify-normal w-full">
                    @if($paginator->onFirstPage())
                        <li>
                            <button type="button" disabled
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border borderl-0 border-gray-300 rounded-l-lg xs:w-full">
                                <span class="sr-only">Previous</span>
                                <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                            </button>

                        </li>
                    @else
                        <li>
                            <a href="{{  $paginator->previousPageUrl()  }}"
                               class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-l-0 border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 xs:w-full">
                                <span class="sr-only">Previous</span>
                                <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                                Previous
                            </a>
                        </li>

                    @endif
                    @php
                        $onEachSide = 2;
                        $currentPage = $paginator->currentPage();
                        $lastPage = $paginator->lastPage();

                        // Calculate start and end pages
                        $start = max($currentPage - $onEachSide, 1);
                        $end = min($currentPage + $onEachSide, $lastPage);

                        // Adjust if we're near the beginning or end
                        if ($end - $start < $onEachSide * 2) {
                            if ($start === 1) {
                                $end = min($start + ($onEachSide * 2), $lastPage);
                            } else {
                                $start = max($end - ($onEachSide * 2), 1);
                            }
                        }
                    @endphp
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


                    @if($paginator->hasMorePages())
                        <li>
                            <a href="{{ $paginator->nextPageUrl() }}"
                               class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 xs:w-fu">
                                <span class="sr-only">Next</span>
                                <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 9 4-4-4-4"/>
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
                                          stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                            </button>
                        </li>
                    @endif
                </ul>
            </nav>
        @endif
    </div>

    <div class='flex xs:flex-col md:flex-row  md:items-center md:justify-between xl:justify-end xs:gap-4 xs:order-1 '>
        <div class="basis-full">
            <form method="GET" action="{{ route('dashboard.users') }}" class=" m-0">
                <select id="perPageSelect" onchange="this.form.submit()" name="per_page"
                        class="block w-full xs:py-1 text-sm text-center text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">per page</option>
                    <option value="5" @selected(request('per_page') === '5')> 5 per page</option>
                    <option value="10" @selected(request('per_page') === '10')>10 per page</option>
                    <option value="25" @selected(request('per_page') === '25') >25 per page</option>
                    <option value="50" @selected(request('per_page') === '50')>50 per page</option>
                </select>
            </form>
        </div>


        <div class="xs:basis-full xs:text-center xl:basis-2/5">
                <span class="text-sm text-gray-700 text-nowrap">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">1</span> to <span
                        class="font-semibold text-gray-900 dark:text-white">{{ $paginator->count()	}}</span> of <span
                        class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total()	 }}</span>
                        <span>Entries</span>
                </span>
        </div>


    </div>

</section>
