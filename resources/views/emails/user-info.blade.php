<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logging User Information</title>
</head>
<body>
    <h1 style="font-weight:normal;padding-bottom:10px;border-bottom:1px solid #ccc;">
        Logging User introduce himself :
    </h1>
    <table style="border:1px solid #000;border-collapse:collapse;width:100%;">
        <thead>
            <tr>
                <td>Id</td>
                <td>Email</td>
                <td>Name</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->name }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>