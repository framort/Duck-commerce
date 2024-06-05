<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="{{Storage::url('img/logo.png')}}" type="image/x-icon">
    <title>Duck Commerce</title>
</head>
<body>

    <x-navbar />
    <div class="spacer"></div>

    <div class="min-vh-100">
        {{$slot}}
    </div>

    <x-footer />

    <script src="https://kit.fontawesome.com/57bd6dffc2.js" crossorigin="anonymous"></script>
</body>
</html>