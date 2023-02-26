<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Participant Details</h1>
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
            <tr>
                <td>{{ $participant->id }}</td>
                <td>{{ $participant->name }}</td>
                <td>{{ $participant->email }}</td>
                <td>{{ $participant->university_id }}</td>
                <td>{{ $participant->phone }}</td>
                <td>{{ $participant->slot->slot_time }}</td>
                <td>{{ $participant->slot->device->name }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>