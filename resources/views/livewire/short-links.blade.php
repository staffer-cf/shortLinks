<div>

    <input type="text" wire:model="originalLink">

    <button type="button" wire:click="add">Short It</button>

    <table>
        <thead>
            <tr>
                <th>Original</th>
                <th>Short</th>
            </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->original_url }}</td>
                <td>{{ $item->short_url }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
