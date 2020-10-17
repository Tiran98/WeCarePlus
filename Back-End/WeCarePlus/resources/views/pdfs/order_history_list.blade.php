<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock Order History List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="text-center">
        <h5>Stock Order History</h5>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr class="table-danger">
            <td>Supplier Name</td>
            <td>Item Name</td>
            <td>Quantity</td>
            <td>Message</td>
        </tr>
        </thead>
        <tbody>
            @foreach ($order as $data)
            <tr>
                <td>{{ $data->suppliers['name'] }}</td>
                <td>{{ $data->item_name }}</td>
                <td>{{ $data->qty }}</td>
                <td>{{ $data->message }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>

  </body>
</html>