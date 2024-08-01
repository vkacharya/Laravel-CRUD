<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $request['subject'] }}</title>
</head>

<body>
    {{-- use keys as variable for private/protected variablea --}}
    {{-- <h1>{{ $mailDetail['name'] }}</h1>
    <h1>{{ $mailDetail['scenario'] }}</h1>
    <h3>{{ $mailSubject }}</h3>
    <p>{{ $mailMessage }}</p> --}}

    <h3>test data for attachments</h3>
    <p>name: {{ $request['name'] }}</p>
    <p>email: {{ $request['email'] }}</p>
    <p>subject: {{ $request['subject'] }}</p>
    <p>message: {{ $request['message'] }}</p>

</body>


</html>
