{{-- <tr class="bg-white border-b hover:bg-gray-50">
    <td class="px-3 py-4">
        1
    </td>
    <td class="px-6 py-4">
        Membuat Aplikasi
    </td>
    <td class="px-6 py-4 min-w-[280px]">
        Membuat aplikasi dengan menggunakan framework Laravel 8
    </td>
    <td class="px-6 py-4]">
        @if ($data->statusPelanggaran == 'submitted')
            <div class="text-sm font-medium p-1 w-full text-center bg-gray-300 rounded text-gray-700">
                Submitted
            </div>
        @elseif($data->statusPelanggaran == 'rejected')
            <div class="text-sm font-medium p-1 w-full text-center bg-red-500 rounded text-white">
                Rejected
            </div>
        @elseif($data->statusPelanggaran == 'progressing')
            <div class="text-sm font-medium p-1 w-full text-center bg-yellow-500 rounded text-white">
                Progressing
            </div>
        @endif
        <div class="text-sm font-medium p-1 w-full text-center bg-gray-300 rounded text-gray-700">
            Existing
        </div>
    </td>
    <td class="px-6 py-4 flex text-center">
        <a href="#" class="font-medium text-blue-600 hover:underline">Buka</a>
    </td>
</tr> --}}

<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <td class="w-4 p-4">
        <div class="flex items-center">
            <input id="checkbox-table-search-1" type="checkbox"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
        </div>
    </td>
    <td class="px-6 py-4">
        1
    </td>
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        Membuat Aplikasi
    </th>
    <td class="px-6 py-4">
        Membuat aplikasi dengan menggunakan framework Laravel 8
    </td>
    <td class="px-6 py-4">
        <div class="text-sm font-medium p-1 w-full text-center bg-gray-300 rounded text-gray-700 dark:bg-gray-600 dark:text-gray-300">
            Existing
        </div>
    </td>
    <td class="px-6 py-4 flex gap-2">
        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Save</a>

        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
    </td>
</tr>
