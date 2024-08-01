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
    <h1>
        @php echo isset($user->id) ? 'Update' : 'Add'; @endphp
    </h1>


    <form method="POST" enctype="multipart/form-data"
        action="{{  !isset($user->id) ? route('users.store') : route('users.update',$user->id)  }}">

        @csrf
        @if(isset($user->id))
        @method('PATCH')
        @else
        @method('POST')
        @endif

        <div class="form-group">
            <input type="hidden" name="id" value="">

            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name"
                value="{{ old('name', isset($user->name) ? $user->name : '') }}">
            <small class="text-danger">@error('name'){{$message}} @enderror</small>

        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email"
                value="{{ old('email', isset($user->email) ? $user->email : '') }}">
            <small class="text-danger">@error('email'){{$message}} @enderror</small>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" class="form-control" name="age" id="age"
                value="{{ old('age',isset($user->age) ? $user->age : '' )}}">
        </div> <small class="text-danger">@error('age'){{$message}} @enderror</small>

        <div class="form-group">
            <label for="city">city</label>
            <input type="text" class="form-control" name="city" id="city"
                value="{{ old('city', isset($user->city) ? $user->city: '') }}">
            <small class="text-danger">@error('city'){{$message}} @enderror</small>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password"
                value="{{ old('password', isset($user->password) ? $user->password: '') }}">
            <small class="text-danger">@error('password'){{$message}} @enderror</small>
        </div>
        {{-- <div class="form-group">
            <label for="userpassword-confirm"> Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password" value="">
            <small class="text-danger">@error('password'){{$message}} @enderror</small>
        </div> --}}

        <div class="mb-3">
            <label for="file" class="form-label">Image</label>
            <input class="form-control form-control-sm" id="file" type="file" name="file" accept="image/*"
                value="{{ old('file', isset($user->file) ? asset('/storage/'.$user->file): '') }}">
            <img class="rounded mx-auto d-block"
                src="{{ old('file', isset($user->file) ? asset('/storage/'.$user->file): '') }}">
            <small class="text-danger">@error('file'){{$message}} @enderror</small>
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            @php echo isset($user->id) ? 'Update' : 'Add'; @endphp </button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>