<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Slot</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Device ID</th>
                <th>Slot Time</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $slot->id }}</td>
                <td>{{ $slot->device_id }}</td>
                <td>{{ $slot->slot_time }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>