<x-modal name="show-item-{{ $data->id }}">
    <div class="relative p-4 sm:p-5 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative h-full pb-4">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Show Todo List
                </h3>
                <button type="button" x-on:click="$dispatch('close')"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-dark dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <x-input-label for="title" class="mb-2">Title</x-input-label>
                    <x-text-input type="text" name="title" id="title" class="p-2.5" placeholder="Nama Item"
                        required="" value="{{ $data->title }}" disabled/>
                </div>
                <div>
                    <x-input-label for="category" class="mb-2">Status</x-input-label>
                    <input type="text" name="title" id="category" 
                        @if ($data->status == 'unfinished')
                            class="p-2.5 bg-gray-300 rounded-lg text-gray-700 dark:bg-gray-600 dark:text-gray-300 sm:text-sm block w-full"
                            value="Unfinished"
                        @elseif ($data->status == 'progressing')
                            class="p-2.5 bg-blue-300 rounded-lg text-blue-700 dark:bg-blue-600 dark:text-blue-300 sm:text-sm block w-full"
                            value="Progressing"
                        @elseif ($data->status == 'complete')
                            class="p-2.5 bg-green-300 rounded-lg text-green-700 dark:bg-green-600 dark:text-green-300 sm:text-sm block w-full"
                            value="Complete"
                        @endif
                        disabled />
                </div>
            </div>
            <div class="grid mb-4">
                <div>
                    <x-input-label for="description" class="mb-4">Description</x-input-label>
                    <textarea name="description" id="description"
                        class="p-2.5 block w-full h-full border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-darker dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        disabled placeholder="{{ $data->description }}"></textarea>
                </div>
            </div>
        </div>
    </div>
</x-modal>
