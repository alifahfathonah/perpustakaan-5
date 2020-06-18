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
    <link href="<?php echo base_url();?>assets/dist/libs/jqvmap/dist/jqvmap.min.css?1578694044" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/libs/selectize/dist/css/selectize.css?1578694044" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/libs/fullcalendar/core/main.min.css?1578694044" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/libs/fullcalendar/daygrid/main.min.css?1578694044" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/libs/fullcalendar/timegrid/main.min.css?1578694044" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/libs/fullcalendar/list/main.min.css?1578694044" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/libs/daterangepicker/daterangepicker.css?1578694044" rel="stylesheet"/>
    <!-- Tabler Core -->
    <link href="<?php echo base_url();?>assets/dist/css/tabler.min.css?1578694044" rel="stylesheet"/>
    <!-- Tabler Plugins -->
    <link href="<?php echo base_url();?>assets/dist/css/tabler-flags.min.css?1578694044" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/css/tabler-payments.min.css?1578694044" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/css/tabler-buttons.min.css?1578694044" rel="stylesheet"/>
    <!-- Styles -->
    <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito';
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background:url('assets/img/perpus.jpg') no-repeat center center fixed;
                background-size:cover;
                background-attachment: fixed;
                background: alpha(opacity=40); 
            }
            .transparent{
                background:rgba(2, 2, 2, 0.5);
                /* margin:0px auto; */
                color:#000000;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .col-lg-4 {
                text-align: center;
                margin:0px auto;
                top: 50px;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
  </head>
  <body class="antialiased">
    <div class="content">
        <main class="container my-4 flex-fill">
            <div class="col-lg-4">
                <div class="transparent">
                    <div class="card-body p-md-3 p-xl-4">
                        <div class="markdown">
                            <h4 class="h1 mt-0 mb-3" style="color:#ffffff;">Login</h4>
                            <form action="<?php echo base_url('login/login'); ?>" method="post">
                                <div class="example">
                                    <!-- <label class="form-label">Username</label> -->
                                    <input type="text" name="username" class="form-control" data-mask="username" 
                                    data-mask-visible="true" placeholder="username" autocomplete="off"/>
                                    <!-- <label class="form-label">Password</label> -->
                                    <input type="password" name="password" class="form-control" placeholder="******" autocomplete="off"/>
                                    <br>
                                    <?php 
                                        $flash = $this->session->flashdata('pesan');
                                        if($flash){
                                        ?>
                                        <div class="alert alert-danger" role="alert" style="font-size:14px;">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon mr-1"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                            <?php echo $this->session->flashdata('pesan'); ?>
                                        </div>                                      
                                        <?php
                                        } else {
                                            echo '';    
                                        }
                                    ?>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    <br>
                                    <label class="form-label"><? $error ?></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


    <script src="<?php echo base_url();?>assets/dist/libs/jquery/dist/jquery.slim.min.js?1578694044"></script>
    <script src="<?php echo base_url();?>assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js?1578694044"></script>
    <script src="<?php echo base_url();?>assets/dist/libs/apexcharts/dist/apexcharts.min.js?1578694044"></script>
    <script src="<?php echo base_url();?>assets/dist/libs/jqvmap/dist/jquery.vmap.min.js?1578694044"></script>
    <script src="<?php echo base_url();?>assets/dist/libs/jqvmap/dist/maps/jquery.vmap.world.js?1578694044"></script>
    <script src="<?php echo base_url();?>assets/dist/libs/jqvmap/dist/maps/jquery.vmap.usa.js?1578694044"></script>
    <script src="<?php echo base_url();?>assets/dist/libs/jqvmap/dist/maps/continents/jquery.vmap.europe.js?1578694044"></script>
    <script src="<?php echo base_url();?>assets/dist/libs/peity/jquery.peity.min.js?1578694044"></script>
    <!-- Tabler Core -->
    <script src="<?php echo base_url();?>assets/dist/js/tabler.min.js?1578694044"></script>
 

</body>
</html>