<div>

    <div class="bg-gray-100 h-screen items-center justify-center">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white p-8 rounded shadow-md">

                <h2 class="text-2xl font-semibold mb-4 text-gray-900 text-center">Simple service to short links</h2>

                <label for="originalLink" class="block text-sm font-semibold text-gray-600">Original url:</label>
                <input
                    type="text"
                    wire:model="originalLink"
                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-green-500"
                    placeholder="Original url"
                />
                @error('originalLink') <em>{{ $message }}</em>@enderror

                <button type="button" wire:click="add" class="w-full bg-green-700 text-white py-2 px-4 rounded-md hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mt-5 mb-5">Short It</button>


                <table class="w-full mx-auto bg-white shadow-md rounded overflow-hidden table-fixed">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-300 w-4/5">Original</th>
                            <th class="py-2 px-4 border-b border-gray-300 w-1/5">Short</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300 w-4/5 whitespace-nowrap overflow-hidden text-ellipsis">{{ $item->original_url }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 w-1/5 whitespace-nowrap overflow-hidden text-ellipsis">{{ $item->short_url }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
