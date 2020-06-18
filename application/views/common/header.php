<header class="topnav">
    <div class="container">
    <div class="navbar navbar-expand-lg navbar-light">
        <a href="." class="navbar-brand mr-4">
            <h2>Aplikasi Perpustakaan </h2>
        </a>
        <ul class="nav navbar-menu align-items-center ml-auto">
        <li class="nav-item d-none d-lg-flex mr-3">
        </li>
        <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown"
    class="nav-link d-flex align-items-center py-0 px-lg-0 px-2 text-reset ml-2">
            <span class="avatar avatar-sm" style="background-image: url(./static/avatars/004f.jpg)"></span>
            <span class="ml-2 d-none d-lg-block lh-1">
                <?php echo $this->session->userdata('nama'); ?>
                <span class="text-muted d-block mt-1 text-h6"><?php echo $this->session->userdata('username'); ?></span>
            </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon dropdown-icon"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                Profile
            </a>
            <a class="dropdown-item" href="<?php echo base_url();?>login/logout">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon dropdown-icon"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                Sign out
            </a>
            </div>
        </li>
        </ul>
    </div>
    </div>
</header>
<header class="topnav">
    <div class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <ul class="navbar-nav flex-wrap">
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url(); ?>home/index" >
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            </span>
            Dashboard
            </a>
        </li>
        <?php 

            $priv = $this->session->userdata('priv');
            $url = base_url();

            if($priv==1){
                echo '<li class="nav-item">
                <a class="nav-link" href="'.$url.'user\index" >
                <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                </span>
                Management Users
                </a>
                </li>';
            }else{
                echo'
                <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button"
    aria-expanded="false" >
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
            </span>
            Base
            </a>
            <ul class="dropdown-menu">
            <li >
                <a class="dropdown-item" href="./blank.html" >
                Starter page
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./buttons.html" >
                Buttons
                <span class="badge bg-green ml-auto">New</span>
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./cards.html" >
                Cards
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./datatables.html" >
                Data Tables
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./calendar.html" >
                Calendar
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./carousel.html" >
                Carousel
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./users.html" >
                Users
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./gallery.html" >
                Gallery
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./profile.html" >
                Profile
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./music.html" >
                Music
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./charts.html" >
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
            </span>
            Charts
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-error" data-toggle="dropdown" role="button"
    aria-expanded="false" >
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="9" y1="15" x2="15" y2="15"></line></svg>
            </span>
            Error pages
            </a>
            <ul class="dropdown-menu">
            <li >
                <a class="dropdown-item" href="./400.html" >
                400 page
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./401.html" >
                401 page
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./403.html" >
                403 page
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./404.html" >
                404 page
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./500.html" >
                500 page
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./503.html" >
                503 page
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./maintenance.html" >
                Maintenance page
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-a" data-toggle="dropdown" role="button"
    aria-expanded="false" >
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </span>
            A
            </a>
            <ul class="dropdown-menu">
            <li class="dropright">
                <a class="dropdown-item dropdown-toggle" href="#sidebar-b" data-toggle="dropdown" role="button" aria-expanded="false" >
                B
                </a>
                <div class="dropdown-menu">
                <a href="./tmp.html" class="dropdown-item">C</a>
                </div>
            </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./layouts.html" >
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
            </span>
            Layouts
            <span class="badge bg-green ml-2">New</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-extra" data-toggle="dropdown" role="button"
    aria-expanded="false" >
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            </span>
            Extra
            </a>
            <ul class="dropdown-menu">
            <li >
                <a class="dropdown-item" href="./invoice.html" >
                Invoice
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./blog.html" >
                Blog cards
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./search-results.html" >
                Search results
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-docs" data-toggle="dropdown" role="button"
    aria-expanded="false" >
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            </span>
            Documentation
            </a>
            <ul class="dropdown-menu">
            <li >
                <a class="dropdown-item" href="./docs/index.html" >
                Introduction
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/alerts.html" >
                Alerts
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/autosize.html" >
                Autosize
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/avatars.html" >
                Avatars
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/badges.html" >
                Badges
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/breadcrumb.html" >
                Breadcrumb
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/buttons.html" >
                Buttons
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/cards.html" >
                Cards
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/carousel.html" >
                Carousel
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/colors.html" >
                Colors
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/countup.html" >
                Countup
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/cursors.html" >
                Cursors
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/charts.html" >
                Charts
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/divider.html" >
                Divider
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/empty.html" >
                Empty states
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/flags.html" >
                Flags
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/form-elements.html" >
                Form elements
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/form-helpers.html" >
                Form helpers
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/input-mask.html" >
                Form input mask
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/layout.html" >
                Layout
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/progress.html" >
                Progress
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/payments.html" >
                Payments
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/ribbons.html" >
                Ribbons
                <span class="badge bg-green ml-auto">New</span>
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/spinners.html" >
                Spinners
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/steps.html" >
                Steps
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/tables.html" >
                Tables
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/tabs.html" >
                Tabs
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/timelines.html" >
                Timelines
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/toasts.html" >
                Toasts
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/tooltips.html" >
                Tooltips
                </a>
            </li>
            <li >
                <a class="dropdown-item" href="./docs/typography.html" >
                Typography
                </a>
            </li>
            </ul>
        </li>';
            }
        
        ?>
        
        
        </ul>
        <div class="navbar-search d-none d-xl-block">
        <form action="." method="get">
            <div class="input-icon">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </span>
            <input type="text" class="form-control" placeholder="Search&hellip;">
            </div>
        </form>
        </div>
    </div>
    </div>
</header>