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
    <h1>Participants</h1> 
    <a href="{{ route('admin.participants.create') }}">Create</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Univirsity ID</th>
                <th>Phone</th>
                <th>Slot</th>
                <th>Device</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participants as $participant)
                <tr>
                    <td>{{ $participant->id }}</td>
                    <td>{{ $participant->name }}</td>
                    <td>{{ $participant->email }}</td>
                    <td>{{ $participant->university_id }}</td>
                    <td>{{ $participant->phone }}</td>
                    <td>{{ $participant->slot->slot_time }}</td>
                    <td>{{ $participant->slot->device->name }}</td>
                    <td>
                        <a href="{{ route('admin.participants.show', $participant->id) }}">Show</a>
                        <a href="{{ route('admin.participants.edit', $participant->id) }}">Edit</a>
                        <form action="{{ route('admin.participants.destroy', $participant->id) }}" method="POST">
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