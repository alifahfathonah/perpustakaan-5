<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta http-equiv="Content-Language" content="en"/>
    <meta name="msapplication-TileColor" content="#206bc4"/>
    <meta name="theme-color" content="#206bc4"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="MobileOptimized" content="320"/>
    <meta name="robots" content="noindex,nofollow,noarchive"/>
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>
    <title>
        <?php echo $title; ?>
    </title>
    <!-- Libs CSS -->
    <link href="<?php echo base_url();?>assets/dist/libs/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/libs/selectize/dist/css/selectize.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/libs/fullcalendar/core/main.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/libs/fullcalendar/daygrid/main.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/libs/fullcalendar/timegrid/main.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/libs/fullcalendar/list/main.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/libs/daterangepicker/daterangepicker.css" rel="stylesheet"/>
    <!-- Tabler Core -->
    <link href="<?php echo base_url();?>assets/dist/css/tabler.min.css" rel="stylesheet"/>
    <!-- Tabler Plugins -->
    <link href="<?php echo base_url();?>assets/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/css/tabler-buttons.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/css/datatables.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/css/jquery-confirm.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/css/jquery-confirm.min.css" rel="stylesheet"/>
  </head>
  <style>
	html, body, .content-page {
		/* background-color: #fff;
		color: #636b6f; */
		font-weight: 200;
		/* height: 100vh;
		margin: 0; */
		background:url('assets/img/5294.jpg') no-repeat center center fixed;
		background-size:cover;
		background-attachment: fixed;
		background: alpha(opacity=40); 
	}
	</style>
  <body class="antialiased">
    <div class="wrapper">
      <div class="content">
          <?php require_once 'common/header.php'; ?>
        <div class="content-page" >
          <main class="container my-4 flex-fill">
            <!-- Page title -->
            <div class="page-title-box">
              <div class="row align-items-center">
                <div class="col-auto">
                  <h1 class="page-title">
				  	        <span id="header_img"><img alt='image' class='img-md' src='<?php echo base_url(); ?>assets/img/flaticon/<?php echo $title_gmbr;?>'></span>
                    <?php echo $title;?>
                  </h1>
                </div>
              </div>
            </div>
                <?php echo $content; ?>                
          </main>
        </div>
      </div>
    </div>

    <!-- Libs JS -->
	  <script src="<?php echo base_url();?>assets/dist/js/jquery.min.js"></script>
	  <script src="<?php echo base_url();?>assets/dist/js/jquery-migrate.min.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/dist/libs/jquery/dist/jquery.slim.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/libs/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/libs/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url();?>assets/dist/libs/jqvmap/dist/maps/jquery.vmap.usa.js"></script>
    <script src="<?php echo base_url();?>assets/dist/libs/jqvmap/dist/maps/continents/jquery.vmap.europe.js"></script>
    <script src="<?php echo base_url();?>assets/dist/libs/peity/jquery.peity.min.js"></script>
    <!-- Tabler Core -->
    <!-- <script src="<?php echo base_url();?>assets/dist/js/jquery-3.5.1.js"></script> -->
    <script src="<?php echo base_url();?>assets/dist/js/tabler.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/datatables.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/datatables.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>
	<script type='text/javascript'>
		$(function() {
			var current = window.location.href;
			var current_url = current.replace(/\/$/, "");

			$('.navbar-nav li a').each(function(){
				var $this = $(this);
				console.log($this.attr('href'));
				console.log(current);
				// if the current path is like this link, make it active
				if($this.attr('href')==current_url){
					$this.addClass('nav-item active');
				}
				// if($this.attr('href').indexOf(current_url) !== -1){
				// 	$this.addClass('active');
				// }

				
			});
		});

	</script>
   
  </body>
</html>