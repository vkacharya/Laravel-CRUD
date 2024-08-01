<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">php crud</a>
            <a href="/users" class="link">Eloquent
                Crud</a>
            <a href="{{route('students.create')}}">
                <button style="margin-left: auto;" type="button" class="btn btn-primary">add new user</button>
            </a>
        </div>
    </nav>
    @if(session()->has('status'))

    <x-alert type="primary" message=" {{ session('status') }}" />


    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>email</th>
                <th>Mobile Number</th>
                <th>City</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->MoNumber}}</td>
                <td>{{$row->city}}</td>
                <td><a href="{{route('students.edit',$row->id)}}" class="btn btn-primary">Edit</a>
                </td>
                {{-- <td><a href="{{route('students.destroy',$row->id)}}" class="btn btn-danger">Delete</a>
                </td> --}}
                <td>
                    <form action="{{route('students.destroy',$row->id)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger ">
                            Delete </button>

                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5">{{ $students->links()}}</div>
    <script src="" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>