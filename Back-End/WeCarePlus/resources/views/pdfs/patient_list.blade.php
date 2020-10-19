<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patients List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="text-center">
        <h3>Patients List</h3>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Patient ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Age</td>
                <td>Gender</td>
                <td>Phone</td>
                <td>Address</td>
            </tr>
        </thead>
        <tbody>
           @foreach($patient as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->gender}}</td>
                <td>{{$data->age}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->address}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>

  </body>
</html>
