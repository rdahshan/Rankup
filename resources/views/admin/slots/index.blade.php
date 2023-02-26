<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=slot-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(Session::has('success'))
        {{ Session::get('success') }}
    @endif
    <h1>Slot</h1> 
    <a href="{{ route('admin.slots.create') }}">Create</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Device</th>
                <th>Slot Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($slots as $slot)
                <tr>
                    <td>{{ $slot->id }}</td>
                    <td>{{ $slot->device->name }}</td>
                    <td>{{ $slot->slot_time }}</td>
                    <td>
                        <a href="{{ route('admin.slots.show', $slot->id) }}">Show</a>
                        <a href="{{ route('admin.slots.edit', $slot->id) }}">Edit</a>
                        <form action="{{ route('admin.slots.destroy', $slot->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>