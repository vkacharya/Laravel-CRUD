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
        @php echo isset($students->id) ? 'Update' : 'Add'; @endphp
    </h1>

    <form method="POST" enctype="multipart/form-data"
        action="{{  !isset($students->id) ? route('students.store') : route('students.update',$students->id)  }}">

        @csrf

        @if(isset($students->id))
        @method('PATCH')
        @else
        @method('POST')
        @endif

        <div class="form-group">
            <input type="hidden" name="id" value="">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name"
                value="{{ old('name', isset($students->name) ? $students->name : '') }}">
            <small class="text-danger">@error('name'){{$message}} @enderror</small>

        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email"
                value="{{ old('email', isset($students->email) ? $students->email : '') }}">
            <small class="text-danger">@error('email'){{$message}} @enderror</small>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" class="form-control" name="mobile" id="mobile"
                value="{{ old('mobile',isset($students->MoNumber) ? $students->MoNumber : '' )}}">
        </div> <small class="text-danger">@error('mobile'){{$message}} @enderror</small>

        <div class="form-group">
            <label for="city">city</label>
            <input type="text" class="form-control" name="city" id="city"
                value="{{ old('city', isset($students->city) ? $students->city: '') }}">
            <small class="text-danger">@error('city'){{$message}} @enderror</small>
        </div>



        <button type="submit" class="btn btn-primary mt-3">
            @php echo isset($students->id) ? 'Update' : 'Add'; @endphp </button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>