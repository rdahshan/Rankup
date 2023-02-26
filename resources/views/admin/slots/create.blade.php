<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Time Slot</h1>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('admin.slots.store') }}" method="POST">
        @csrf
        <label for="slot_time">Datetime</label>
        <input type="datetime-local" name="slot_time" id="slot_time">
        <select name="device_id" id="device_id">
            @foreach ($devices as $device)
                <option value="{{ $device->id }}">{{ $device->name }}</option>
            @endforeach
        </select>
        <button type="submit">Create</button>
    </form>
    
</body>
</html>