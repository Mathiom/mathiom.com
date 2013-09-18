<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mathiom</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
</head>
<body>
    @include('layouts.parts.userbar')
    @include('layouts.parts.messages.header')

    @yield('content')
</body>
</html>