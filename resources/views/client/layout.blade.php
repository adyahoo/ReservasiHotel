<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/fa/all.min.css" />
    <link rel="stylesheet" href="css/client/layout.css" />
    
    @stack('css')

</head>

<body>

    <div class="row h-100 align-items-center justify-content-center no-gutters">
        <div class="col-8">
            <div class="card card-bg">
                @yield('content')
            </div>
        </div>
    </div>

    @stack('js')
</body>

</html>