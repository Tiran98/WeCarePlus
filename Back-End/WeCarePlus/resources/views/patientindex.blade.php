<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Address</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($patients as $patient)
      <tr>
        <td>{{$patient->id}}</td>
        <td>{{$patient->name}}</td>
        <td>{{$patient->email}}</td>
        <td>{{$patient->password}}</td>
        <td>{{$patient->gender}}</td>
        <td>{{$patient->age}}</td>
        <td>{{$patient->phone}}</td>
        <td>{{$patient->address}}</td>
        <td><a href="{{action('PatientController@edit', $patient->id)}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('PatientController@destroy', $patient->id)}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
