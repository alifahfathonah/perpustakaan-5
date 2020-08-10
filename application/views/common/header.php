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
        <?php
            $img = $this->session->userdata('img');
            $url = base_url();
            $url2 = $url.'upload/'.$img;
            echo '<span class="avatar avatar-sm" style="background-image: url('.$url2.')"></span>';
        ?>
            <span class="ml-2 d-none d-lg-block lh-1">
                <?php echo $this->session->userdata('nama'); ?>
                <span class="text-muted d-block mt-1 text-h6"><?php 
                $priv = $this->session->userdata('priv');

                if($priv==1){
                    echo 'Administrator';
                }else{
                    echo 'Petugas';
                } 
                
                ?></span>
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
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>home/index" >
                <span class="nav-icon"><img alt='image' class='img-md' stroke="currentColor" src='<?php echo base_url(); ?>assets/img/flaticon/browser.png'></span>
            Dashboard
            </a>
        </li>
        <?php

            $priv = $this->session->userdata('priv');
            $id_user = $this->session->userdata('id');
            $url = base_url();

            $db = mysqli_connect("localhost", "root", "", "perpustakaan");
            $sql = "SELECT a.menu,a.icon,a.url FROM tbl_menu a INNER JOIN tbl_access_menu b ON a.id=b.id_menu WHERE id_user=$id_user AND is_main_menu=0";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

            if($result->num_rows>0){
                foreach ($row as $main){ 
                    $menus = $main['menu'];
                    $sub_menu = $db->query("SELECT a.menu,a.submenu,a.icon,a.url FROM tbl_menu a INNER JOIN tbl_access_menu b ON a.id=b.id_menu WHERE id_user=$id_user AND is_main_menu=1 AND menu='$menus'");

                    if ($sub_menu->num_rows>0) {
                        echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                        aria-expanded="false">
                        <span class="nav-icon"><img alt="image" class="img-md" src="'.$url.'assets/img/flaticon/'.$main['icon'].'"></span>
                        '.$main['menu'].'
                        </a>';

                        echo "<ul class='dropdown-menu'>
                        ";

                        $row2 = mysqli_fetch_all($sub_menu, MYSQLI_ASSOC);                       
                        foreach ($row2 as $sub) {
                            echo '<li><a class="dropdown-item" href="'.$url.$sub['url'].'" >
                            <span class="nav-icon"><img alt="image" class="img-md" src="'.$url.'assets/img/flaticon/'.$sub['icon'].'"></span>
                            '. $sub['submenu'] .'
                            </a></li>';
                        }
                        
                        echo"</ul></li>";

                    }else{
                        
                        echo '<li class="nav-item">
                        <a class="nav-link" href="'.$url.$main['url'].'" >
                        <span class="nav-icon"><img alt="image" class="img-md" src="'.$url.'assets/img/flaticon/'.$main['icon'].'"></span>
                        '.$main['menu'].'
                        </a>
                        </li>';
                    }

                }
            }
        
        ?>
        
        
        </ul>
    </div>
    </div>
</header>
