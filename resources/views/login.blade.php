<!DOCTYPE html>
<html lang="br" class="full-height">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
    <!-- ClockPicker Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css"
          rel="stylesheet">
    <style>
        body{
            background-image: url("img/24ccd8727862de7fe80cd11ca0543c48.jpg");
        }
    </style>
</head>
<body>
<div class="row mt-5">
    <div class="col-4"></div>
    <div class="col-4">
        <!-- Material form login -->
        <div class="card">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Login</strong>
            </h5>
            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">
                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="#!">
                    <!-- Email -->
                    <div class="md-form">
                        <input type="email" id="materialLoginFormEmail" class="form-control">
                        <label for="materialLoginFormEmail">Login</label>
                    </div>
                    <!-- Password -->
                    <div class="md-form">
                        <input type="password" id="materialLoginFormPassword" class="form-control">
                        <label for="materialLoginFormPassword">Password</label>
                    </div>
                    <!-- Sign in button -->
                    <button id="btnLogin" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="button">
                        Logar
                    </button>
                </form>
                <!-- Form -->
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6 text-center">
                        <div class="alert alert-danger" role="alert" style="display: none">
                            Login Invalido.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Material form login -->
    </div>
</div>
</body>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- JQueryUI -->
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>

<script src="js/login.js"></script>
</html>
