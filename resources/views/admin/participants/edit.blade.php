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
    {{-- participant data is 'name',
        'university_id',
        'email',
        'phone',
        'slot_id' --}}
    <form action="{{ route('admin.participants.update', $participant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $participant->name }}">
        <label for="university_id">University ID</label>
        <input type="text" name="university_id" id="university_id" value="{{ $participant->university_id }}">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $participant->email }}">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ $participant->phone }}">
        <button type="submit">Update</button>

    
</body>
</html>