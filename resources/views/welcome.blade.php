<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Principal</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       
    </head>
    <body class="antialiased">
        <div class="container text-center"> 
       <h1>MIS CURSOS ONLINE</h1>
      <a href="{{ route ('login')}}" class="btn btn-info btn sm">LOGIN</a>
      <a href="{{ route ('register')}}" class="btn btn-info btn sm">REGISTER</a>

</div>
    </body>
</html>

