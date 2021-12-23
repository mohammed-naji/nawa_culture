<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th {
            background: #547;

        }
    </style>
</head>
<body>


<table>
    <tr style="background: #000; color: #fff">
        <th style="background: #000; color: #fff">ID</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Event</th>
        <th>Date</th>
    </tr>

    @foreach ($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->mobile }}</td>
            <td>{{ $item->event->title }}</td>
            <td>{{ $item->created_at->format('d/m/Y h:m:s') }}</td>
        </tr>
    @endforeach
</table>


</body>
</html>
