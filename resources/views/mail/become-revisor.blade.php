<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Duck Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body{
            height: 100vh;
            background: linear-gradient(135deg,white 70%,yellow 25%)
        }
        
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center text-center my-5">
            <h1>Richiesta privilegi Advisor:</h1>
            <div class="col-8 text-center my-5">
                <h2>Ecco i suoi dati:</h2>
                <p>Utente: <span class="text-primary fw-bold">{{ $user->name }} </span></p>
                <p>Mail: <span class="text-primary fw-bold"> {{ $user->email }} </span></p>
                <p>Se vuoi renderl* revisor, clicca qui:</p>
                <a class="btn btn-success" href="{{ route('make.revisor' , compact('user'))}}">Autorizza</a>
                <a class="btn btn-danger" href="{{ route('home')}}">Rifiuta</a>
            </div>
        </div>
    </div>
    <img src="{{Storage::url('img/logo.png')}}" class="position-absolute bottom-0 end-0" alt="">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
