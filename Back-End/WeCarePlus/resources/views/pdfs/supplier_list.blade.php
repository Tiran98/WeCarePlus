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
        <h5>Supplier List</h5>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr class="table-danger">
            <td>Supplier ID</td>
            <td>Supplier Name</td>
            <td>Product Type</td>
            <td>Address</td>
            <td>Email</td>
            <td>Phone Number</td>
        </tr>
        </thead>
        <tbody>
            @foreach ($supplier as $data)
            <tr>
                <td>{{ $data->_id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->product_type }}</td>
                <td>{{ $data->address }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->phone }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>

  </body>
</html>