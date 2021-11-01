<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</head>
<body>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Model</th>
            <th scope="col">Description</th>
            <th scope="col">Available/Quantity</th>
            <th scope="col">Borrowed by</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $row)
            <tr>
                <td>{{$row['name']}}</td>
                <td>{{$row['model']}}</td>
                <td>{{$row['description']}}</td>
                <td>{{$row['available']}}/{{$row['quantity']}}</td>
                <td style="width: 10%">
                    <table style="font-size: 75%; font-weight: bold">
                        @foreach($row['users'] as $user)
                            <tr><td>{{$user['login']}}</td></tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
