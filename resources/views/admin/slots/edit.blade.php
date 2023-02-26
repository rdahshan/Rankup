<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Slot</h1>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    {{-- slot takes slot_time and device_id --}}
    <form action="{{ route('admin.slots.update', $slot->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="slot_time">Slot Time</label>
        <input type="text" name="slot_time" id="slot_time" value="{{ $slot->slot_time }}">
        <label for="device_id">Device Id</label>
        <select name="device_id" id="device_id">
            @foreach ($devices as $device)
                <option
                @if ($device->id == $slot->device_id) selected @endif
                value="{{ $device->id }}">{{ $device->name }}</option>
            @endforeach
        </select>
        
        <button type="submit">Update</button>
    </form>

    
</body>
</html>