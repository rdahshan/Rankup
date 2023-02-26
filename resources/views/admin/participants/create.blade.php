<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Add participant</h1>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    {{-- participant data is 'name',
        'university_id',
        'email',
        'phone',
        'slot_id' --}}

    <form action="{{ route('admin.participants.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="university_id">University ID</label>
        <input type="text" name="university_id" id="university_id">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone">
        <select name="device_id" id="device_id">
            <option value="" disabled selected>Please Select Device</option>
            @foreach ($devices as $device)
                <option value="{{ $device->id }}">{{ $device->name }}</option>
            @endforeach
        </select>
        <select name="slot_id" id="slot_id">
        </select>

        <script>
            // use regex admin/slot_by_device/{device_id}

            const deviceSelect = document.getElementById('device_id');
            const slotSelect = document.getElementById('slot_id');

            deviceSelect.addEventListener('change', function() {
                const device_id = this.value;
                const url = `/admin/slot_by_device/${device_id}`;
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        slotSelect.innerHTML = '';
                        data.forEach(slot => {
                            const option = document.createElement('option');
                            option.value = slot.id;
                            option.innerText = slot.slot_time;
                            slotSelect.appendChild(option);
                        });
                    });
            });


        </script>
        <button type="submit">Create</button>
    </form>

    
</body>
</html>