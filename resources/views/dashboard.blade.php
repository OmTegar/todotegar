<x-app-layout>
    @if (session('success'))
    @endif
    <div class="py-6">
        <div class="max-w-[1760px] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Modal --}}
                    @include('todolist.modals.modal-tambah')

                    {{-- Content Header --}}
                    <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-blue-800">
                        <h1 class="text-2xl font-semibold">TO-DO LIST</h1>
                    </div>

                    {{-- Main Content --}}
                    <div class="px-4 py-3 lg:py-5 border-b dark:border-blue-600">
                        {{-- filter todo list --}}
                        <div class="bg-white dark:bg-darker p-4 rounded-lg">
                            @include('todolist.filter-todolist')
                        </div>
                    </div>
                    <div class="px-4 py-3 lg:py-5">
                        <div class="relative overflow-x-auto shadow-md rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-darker dark:text-gray-400">
                                    <tr class="whitespace-nowrap">
                                        <th scope="col" class="px-4 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Title
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Status
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Updated At
                                        </th>
                                        <th scope="col" class="px-4 py-3">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="result">
                                    {{-- <x-todolist.table-todolist :data="$data" /> --}}
                                    <x-todolist.table-todolist :todolists="$todolists" />
                                </tbody>
                            </table>
                        </div>
                        {{-- pagination --}}
                        <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between mt-2"
                            aria-label="Table navigation">
                            <span
                                class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $todolists->firstItem() }}
                                    -
                                    {{ $todolists->lastItem() }}</span> of <span
                                    class="font-semibold text-gray-900 dark:text-white">{{ $todolists->total() }}</span></span>
                            <ul class="inline-flex -space-x-px text-sm h-8">
                                <li>
                                    @if ($todolists->onFirstPage())
                                        <span
                                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg dark:bg-darker dark:border-gray-700 dark:text-gray-400 dark:hover:bg-[#1a304a] dark:hover:text-white">
                                            <del>
                                                Previous
                                            </del>
                                        </span>
                                    @else
                                        <a href="{{ $todolists->previousPageUrl() }}"
                                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-darker dark:border-gray-700 dark:text-gray-400 dark:hover:bg-[#1a304a] dark:hover:text-white">Previous</a>
                                    @endif
                                </li>
                                @foreach ($todolists->getUrlRange($todolists->currentPage() - 1, $todolists->currentPage() + 1) as $num => $url)
                                    <li>
                                        <a href="{{ $url }}"
                                            class="flex items-center justify-center px-3 h-8 leading-tight border border-gray-300 {{ $num == $todolists->currentPage() ? 'text-blue-600 bg-blue-50 dark:bg-[#1a304a] dark:border-gray-700 dark:text-white dark:hover:bg-[#1a304a] dark:hover:text-white' : 'hover:text-blue-700 hover:bg-blue-50 border-gray-300 bg-white text-gray-500 dark:bg-darker dark:border-gray-700 dark:text-gray-400 dark:hover:bg-[#1a304a] dark:hover:text-white' }}">{{ $num }}</a>
                                    </li>
                                @endforeach
                                <li>
                                    @if ($todolists->hasMorePages())
                                        <a href="{{ $todolists->nextPageUrl() }}"
                                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-darker dark:border-gray-700 dark:text-gray-400 dark:hover:bg-[#1a304a] dark:hover:text-white">Next</a>
                                    @else
                                        <span
                                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg dark:bg-darker dark:border-gray-700 dark:text-gray-400 dark:hover:bg-[#1a304a] dark:hover:text-white">
                                            <del>
                                                Next
                                            </del>
                                        </span>
                                    @endif
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
