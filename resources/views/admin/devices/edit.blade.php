<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Device</h1>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('admin.devices.update', $device->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $device->name }}">
        <button type="submit">Update</button>
    </form>
</body>
</html>