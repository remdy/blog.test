<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon icon -->

    <title>Valdis-blog</title>

    <!-- common css -->
    <link rel="stylesheet" href="/css/my-bootstrap.min.css">
    <link rel="stylesheet" href="/css/front-2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.js"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/images/v-icon.ico">

</head>

<body>

<div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse col-md-10" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="/">Home</a>
                        <a class="nav-item nav-link" href="/about">About</a>
                        <a class="nav-item nav-link" href="/product">Products</a>
                    </div>
                </div>
                <div class="collapse navbar-collapse col-md-2 float-md-right" id="navbarNavAltMarkup1">
                    @if(Auth::check())
                    <div class="navbar-nav float-md-right">
                        <a class="nav-item nav-link" href="/profile">My profile</a>
                        <a class="nav-item nav-link" href="/logout">Logout</a>
                    </div>
                    @else
                    <div class="navbar-nav float-md-right">
                        <a class="nav-item nav-link" href="/register">Register</a>
                        <a class="nav-item nav-link" href="/login">Login</a>
                    </div>
                    @endif

                    @if (Auth::check() && Auth::user()->is_admin)
                            <div class="navbar-nav float-md-right">
                                <a class="nav-item nav-link" href="/admin">Admin tools</a>
                            </div>
                        @endif
                </div>
            </nav>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('admin.errors')
            @if(session('status'))
                <div class="alert alert-info">{{ session('status') }}</div>
            @endif
        </div>
    </div>
</div>

@yield('content')



<div class="footer-copy">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">&copy; Copyright <a href="#">Valdis, </a> All rights reserved
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>