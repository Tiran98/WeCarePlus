<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supplier List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="text-center">
        <h5>Income List</h5>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr class="table-danger">
            <td>Income ID</td>
            <td>Income Type</td>
            <td>Income Date</td>
            <td>Patient Registration Number</td>
            <td>Full Name</td>
            <td>Payment Type</td>
            <td>Payment Amount</td>
        </tr>
        </thead>
        <tbody>
            @foreach ($income as $data)
            <tr>
                <td>{{ $data->_id }}</td>
                <td>{{ $data->emptype }}</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->regNum }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->paytype }}</td>
                <td>{{ $data->payAmount }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>

  </body>
</html>