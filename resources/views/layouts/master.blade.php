<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="WiSport">
    <meta name="author" content="modded by RJ">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">

    <title>WiSport</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" >

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('assets/css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/icomoon.css')}}">
    <link href="{{ URL::asset('assets/css/animate-custom.css')}}" rel="stylesheet">


    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/modernizr.custom.js')}}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ URL::asset('assets/js/html5shiv.js')}}"></script>
    <script src="{{ URL::asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
    <style>
        #user_info > a {
            color: rgb(52, 152, 219);
        }
    </style>
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
                <a class="navbar-brand hidden-xs hidden-sm" href="/"><span class="icon icon-home" style="font-size:18px; color:#3498db;"></span></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/" class="smoothScroll">Home</a></li>
                    <li> <a href="about" class="smoothScroll"> About</a></li>
                    <li> <a href="schedule" class="smoothScroll"> Schedule</a></li>
                    <li> <a href="results" class="smoothScroll"> Results</a></li>
                    <li> <a href="standings" class="smoothScroll"> Standings</a></li>
                    <?php
                        if (!Auth::check()) {
                            echo '<li> <a href="/auth/login" class="smoothScroll"> Sign In</a></li>';
                            echo '<li> <a href="/auth/register" class="smoothScroll"> Sign Up</a></li>';
                        }
                        if (Auth::check()) {
                            $user = Auth::user();
                            if($user->paid==0){
                                echo '<li> <a href="/auth/renewal/'.$user->wisportId.'" class="smoothScroll"> Renew</a></li>';
                            }
                            echo '<li> <a href="/auth/logout" class="smoothScroll"> Logout</a></li>';
                            echo '<li id="user_info"><a href="#">Welcome '.$user->first_name.', '.$user->wisportId.'</a></li>';
                            // The user is logged in...
                        }
                    ?>
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
        <h2 class="centered">THANKS FOR VISITING US</h2>
        <hr>
        <br>
        <br>
        <div class="col-lg-4">
            <h3>Contact Information</h3>
            <p><span class="icon icon-home"></span> 10110 Welcome Ave N, Brooklyn Park, MN 55443<br/>
                <span class="icon icon-phone"></span> 763-898-6065 <br/>
                <span class="icon icon-envelop"></span> <a href="#"> wisport@wisport.org</a> <br/>
                <span class="icon icon-facebook"></span> <a href="https://www.facebook.com/WiSport-Cycling-Group-161082763922189/"> WiSport Citizens Cycling </a> <br/>
            </p>
        </div><!-- col -->

        <div class="col-lg-4">
            <h3>Subscribe to our mailing list</h3>
            <p>Register for our newsletter and be updated with the latest information regarding our events, standings and much more.</p>
            <p>
                <!-- Begin MailChimp Signup Form -->
                <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                <style type="text/css">
                    #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
                    /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
                       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                </style>
            <div id="mc_embed_signup">
                <form action="//wisport.us8.list-manage.com/subscribe/post?u=b1b6a487bf051a38f8cf1dee3&amp;id=564092f25c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                        <div class="mc-field-group">
                            <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                            </label>
                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                        </div>
                        <div class="mc-field-group">
                            <label for="mce-FNAME">First Name </label>
                            <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                        </div>
                        <div class="mc-field-group">
                            <label for="mce-LNAME">Last Name </label>
                            <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                        </div>
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_b1b6a487bf051a38f8cf1dee3_564092f25c" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                    </div>
                </form>
            </div>

            <!--End mc_embed_signup-->
            <!--form class="form-horizontal" role="form" method="POST" action="{{ url('email/register') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-lg-10">
                        <input type="email" class="form-control" id="email1" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-success">Subscribe</button>
                    </div>
                </div>
            </form><!-- form -->
        </div><!-- col -->

        <div class="col-lg-4">
            <h3>Support Us</h3>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book.
            </p>
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


<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/retina.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/smoothscroll.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery-func.js')}}"></script>
</body>
</html>
