<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free coming soon template with jQuery countdown">
    <meta name="author" content="http://bootstraptaste.com">
    <link rel="shortcut icon" href="{{URL::to('/')}}/assets/img/favicon.png">

    <title>Cardunia</title>

    <!-- Bootstrap -->
    <link href="{{URL::to('/')}}/assets/css/bootstrap.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/bootstrap-theme.css" rel="stylesheet">

    <!-- siimple style -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h1>Cardunia</h1>

                <h2 class="subtitle">We're working hard to launch our first beta product.Thanks for showing interest in
                    our service</h2>

                <div id="countdown"></div>
                {{--
                <form class="form-inline signup" role="form">
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1"
                               placeholder="Enter your email address">
                    </div>
                    <button type="submit" class="btn btn-theme">Get notified!</button>
                </form>
                --}}
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <p class="copyright">Copyright &copy; 2014 - <a href="#">Cardunia.com</a></p>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="{{URL::to('/')}}/assets/js/bootstrap.min.js"></script>
<script src="{{URL::to('/')}}/assets/js/jquery.countdown.min.js"></script>
<script type="text/javascript">
    $('#countdown').countdown('2015/01/01', function (event) {
        $(this).html(event.strftime('%w weeks %d days <br /> %H:%M:%S'));
    });
</script>
</body>
</html>