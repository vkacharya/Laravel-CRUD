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
            <a class="navbar-brand" href="#">php crud with eloquent</a>

            <a href="/">
                Query Builder crud </a>
            <a href="{{ route('logout') }}">
                <button type="button" value="" class="btn btn-danger">LogOut </button>
            </a>
            <a href="{{ route('users.create') }}">
                <button style="margin-left: auto;" type="button" class="btn btn-primary">add new user</button>
            </a>

    </nav>

    <div class="container-fluid">

        @if (session()->has('status'))
            <x-alert type="success" message=" {{ session('status') }}" />
        @endif

        <div btn-group>
            <a class="primary font-weight-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <h3> Hii! {{ Auth::check() ? Auth::user()->name : '' }}</h3>
            </a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>email</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Photo</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->age }}</td>
                        <td>{{ $row->city }}</td>
                        <td> <img class="img-fluid img-thumbnail " src="{{ asset('/storage/' . $row->file) }}"
                                width="300px">
                        </td>
                        <td><a href="{{ route('users.edit', $row->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $row->id) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger ">
                                    Delete </button>

                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-5">{{ $user->links() }}</div>
    </div>
    <script src="" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
