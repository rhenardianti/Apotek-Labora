<!DOCTYPE html>
<!--<html class="no-js">-->
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Apotek Sehat</title>
		<meta name="description" content="Apotek Sehat" />
		<meta name="keywords" content="html5 template, css3, one page, animations, agency, portfolio, web design" />
		<meta name="author" content="" />
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="assets/vendors/animate.css/animate.min.css" rel="stylesheet">
     <link href="assets/css/custom.min.css" rel="stylesheet">
    <link href="assets/css/custom.min.css" rel="stylesheet">
		<script src="assets/js/modernizr.custom.js"></script>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/jquery.fancybox.css" rel="stylesheet">
		<link href="assets/css/flickity.css" rel="stylesheet" >
		<link href="assets/css/animate.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
		<link href="assets/css/styles.css" rel="stylesheet">
		<link href="assets/css/queries.css" rel="stylesheet">
	</head>
	<body>
		<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		<!-- open/close -->
		<header>
			<section class="hero">
				<div class="texture-overlay"></div>
				<div class="container">
					<div class="row nav-wrapper">
						<div class="col-md-6 col-sm-6 col-xs-6 text-left">
							<a href="hal_utama"><span style="font-family:Pacifico;font-size:40px;color: white">Aplikasi Apotek Sehat</span></a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 text-right navicon">
							<p>MENU</p><a id="trigger-overlay" class="nav_slide_button nav-toggle" ><span></span></a>
						</div>
					</div>
					<div class="row hero-content">
						<div class="col-md-12">
							<h1 class="animated fadeInDown">Apotek Sehat</h1>
							<a data-toggle="modal" data-target="#login" class="use-btn animated fadeInUp">Login</a>
						</div>
					</div>
				</div>
			</section>
		</header>
		<div class="overlay overlay-boxify">
			<nav>
				<ul>
					<li><a data-toggle="modal" data-target="#login"><i class="fa fa-heart"></i>Login</a></li>
				</ul>
			</nav>
		</div>
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true"?>&times</span></button>
            <h4 class="modal-title" id="loginLabel">Login</h4>
          </div>
          <div class="modal-body">
                <form action="hal_utama/login" method="post">
												<div >
														<?php echo $this->session->flashdata('notif');?>
												</div>
												<div>
                          <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                        </div>
                        <br/>
                        <div>
                          <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        </div>
          </div>
          <div class="modal-footer">
            <div>
              <button type="submit" class="btn btn-default submit" name="submit">Log in</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="assets/js/min/toucheffects-min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="assets/js/flickity.pkgd.min.js"></script>
		<script src="assets/js/jquery.fancybox.pack.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="assets/js/retina.js"></script>
		<script src="assets/js/waypoints.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/min/scripts-min.js"></script>
		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-XXXXX-X');ga('send','pageview');
		</script>
	</body>
</html>
