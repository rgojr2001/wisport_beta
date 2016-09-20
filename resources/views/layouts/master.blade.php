<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="WiSport">
    <meta name="author" content="modded by RJ">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>WiSport V3.0</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" >

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link href="assets/css/animate-custom.css" rel="stylesheet">



    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-offset="0" data-target="#navbar-main">


<div id="navbar-main">
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
                </button>
                <a class="navbar-brand hidden-xs hidden-sm" href="#home"><span class="icon icon-home" style="font-size:18px; color:#3498db;"></span></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/" class="smoothScroll">Home</a></li>
                    <li> <a href="#" class="smoothScroll"> About</a></li>
                    <li> <a href="schedule" class="smoothScroll"> Schedule</a></li>
                    <li> <a href="#" class="smoothScroll"> Results</a></li>
                    <li> <a href="#" class="smoothScroll"> Standings</a></li>
                    <li> <a href="auth/login" class="smoothScroll"> Sign In</a></li>
                    <li> <a href="#" class="smoothScroll"> Sign Up</a></li>
                    <!--li>
                        <?php /*
                        $user = Auth::user();
                        //echo 'Session;
                        echo 'user logged in='.Auth::check();
                            $letter = 'a';
                        $id =  \App\Models\User::
                                where('wisportId', 'like', 'WI'.$letter.'%')
                                ->orderBy('wisportId','DESC')
                                ->limit(1)
                                ->first();
                            echo $id->wisportId;*/
                        ?>
                    </li-->
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<!--div class="container"-->


    <div class="page_header">
        <div class="container" style="padding-top: 50px;">
            @yield('header')
        </div>
    </div>
    @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    @yield('content')
<!--/div-->

<div class="container" id="contact" name="contact">
    <div class="row">
        <br>
        <h1 class="centered">THANKS FOR VISITING US</h1>
        <hr>
        <br>
        <br>
        <div class="col-lg-4">
            <h3>Contact Information</h3>
            <p><span class="icon icon-home"></span> Some Address 987, WI<br/>
                <span class="icon icon-phone"></span> 763-898-6065 <br/>
                <span class="icon icon-envelop"></span> <a href="#"> wisport@wisport.org</a> <br/>
                <span class="icon icon-facebook"></span> <a href="https://www.facebook.com/WiSport-Cycling-Group-161082763922189/"> WiSport Citizens Cycling </a> <br/>
            </p>
        </div><!-- col -->

        <div class="col-lg-4">
            <h3>Newsletter</h3>
            <p>Register to our newsletter and be updated with the latests information regarding our events, standings and much more.</p>
            <p>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-4 control-label"></label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="col-lg-4 control-label"></label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="text1" placeholder="Your Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </div>
                </div>
            </form><!-- form -->
        </div><!-- col -->

        <div class="col-lg-4">
            <h3>Support Us</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div><!-- col -->

    </div><!-- row -->

</div><!-- container -->

<div id="footerwrap">
    <div class="container">

    </div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/retina.js"></script>
<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="assets/js/jquery-func.js"></script>
</body>
</html>
