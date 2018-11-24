<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <style>
        .margin-10 {
            margin: 10px;
        }
        input {
            margin: 2px;
        }
        .card {
            margin:20px;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="container">
        @if (Auth::check())
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item
                        @if(request()->is('home'))
                            active
                        @endif
                    ">
                        <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item
                        @if(request()->is('clientslist') || request()->is('insertclient'))
                            active
                        @endif
                    ">
                        <a class="nav-link" href="/clientslist">Clients</a>
                    </li>
                    <li class="nav-item
                        @if(request()->is('transactionslist') || request()->is('edittransaction'))
                            active
                        @endif
                    ">
                        <a class="nav-link disabled" href="/transactionslist">Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="{{url('logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        @endif
        <div class="content">
@yield('content')