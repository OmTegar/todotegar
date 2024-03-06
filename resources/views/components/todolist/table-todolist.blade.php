@foreach ($todolists as $data)
    <tr
        class="bg-white transition-colors duration-150 border-b dark:bg-[#152D49] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-[#1a3759] whitespace-nowrap">
        <td class="px-4 py-3">
            {{ $loop->iteration }}
        </td>
        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ \Illuminate\Support\Str::limit($data->title, 24, '...') }}
        </td>
        <td class="px-4 py-3">
            @if ($data->status == 'unfinished')
                <div
                    class="text-sm font-medium p-1 w-full text-center bg-gray-300 rounded text-gray-700 dark:bg-gray-600 dark:text-gray-300">
                    Unfinished
                </div>
            @elseif ($data->status == 'progressing')
                <div
                    class="text-sm font-medium p-1 w-full text-center bg-blue-300 rounded text-blue-700 dark:bg-blue-600 dark:text-blue-300">
                    Progressing
                </div>
            @elseif ($data->status == 'complete')
                <div
                    class="text-sm font-medium p-1 w-full text-center bg-green-300 rounded text-green-700 dark:bg-green-600 dark:text-green-300">
                    complete
                </div>
            @endif
        </td>
        <td class="px-4 py-3">
            {{ $data->updated_at->diffForHumans() }}
        </td>
        <td class="px-4 py-3">
            <div class="items-center justify-center flex flex-row gap-3">
                {{-- show item --}}
                @include('todolist.modals.modal-show')
                <button type="button" x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'show-item-{{ $data->id }}')"
                    class="font-medium text-blue-600 dark:text-blue-500 mr-2 hover:text-blue-300">
                    <span class="icon-[mdi--show-outline] w-6 h-6"></span>
                </button>

                {{-- edit item --}}
                @include('todolist.modals.modal-edit')
                <button type="button" x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'edit-item-{{ $data->id }}')"
                    class="font-medium text-orange-400 dark:text-orange-400">
                    <span class="icon-[tabler--edit] w-6 h-6"></span>
                </button>

                {{-- delete item --}}
                @include('todolist.modals.modal-delete')
                <button type="button" x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'hapus-item-{{ $data->id }}')"
                    class="font-medium text-red-600 dark:text-red-500">
                    <span class="icon-[ph--trash-bold] w-6 h-6"></span>
                </button>
            </div>
        </td>
    </tr>
@endforeach
