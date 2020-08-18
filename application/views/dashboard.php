<div class="row row-deck">
    <div class="col-sm-6 col-lg-3">
        <div class="card" style="background-color: rgb(249,244,98);">
            <div class="card-body">
                <div class="d-flex">
                    <div><h2>Anggota Perpustakaan</h2></div> 
                                   
                    <div class="ml-auto">  
                    <span id="header_img"><img alt='image' class='img-md' src='<?php echo base_url(); ?>assets/img/flaticon/crowd-64.png'></span>
                    </div>            
                </div>
                <div class="h1 mb-1 text-right text-blue">75</div>                        
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card" style="background-color: rgb(101,207,226);">
            <div class="card-body">
                <div class="d-flex">
                    <div><h2>Buku Dipinjam</h2></div> 
                                   
                    <div class="ml-auto">  
                    <span id="header_img"><img alt='image' class='img-md' src='<?php echo base_url(); ?>assets/img/flaticon/book5.png'></span>
                    </div>            
                </div>
                <div class="h1 mb-1 text-right text-blue">20</div>                        
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card" style="background-color: rgb(159,152,205);">
            <div class="card-body">
                <div class="d-flex">
                    <div><h2>Buku Tersedia</h2></div> 
                                   
                    <div class="ml-auto">  
                    <span id="header_img"><img alt='image' class='img-md' src='<?php echo base_url(); ?>assets/img/flaticon/book4.png'></span>
                    </div>            
                </div>
                <div class="h1 mb-1 text-right text-blue">20</div>                        
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card" style="background-color: rgb(226,162,184);">
            <div class="card-body">
                <div class="d-flex">
                    <div><h2>Buku Belum Dikembalikan</h2></div> 
                                   
                    <div class="ml-auto">  
                    <span id="header_img"><img alt='image' class='img-md' src='<?php echo base_url(); ?>assets/img/flaticon/book3.png'></span>
                    </div>            
                </div>
                <div class="h1 mb-1 text-right text-blue">20</div>                        
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <form action="?" method="POST" id="form_search">
            <div class="subheader mb-2">Status</div>
            <div class="mb-3">
                <select id="status" name="status" class="form-select">
                    <option value="0">- ALL -</option>
                    <option value="1">Available</option>
                    <option value="2">Dipinjam</option>
                </select>
            </div>
            <div class="subheader mb-2">Penulis</div>
                <div class="mb-3">
                    <input type="text" name="txt_penulis" id="txt_penulis" class="form-control" name="example-text-input" placeholder="Penulis">
            </div>
            <div class="subheader mb-2">Penerbit</div>
                <div class="mb-3">
                    <input type="text" name="txt_penerbit" id="txt_penerbit" class="form-control" name="example-text-input" placeholder="Penerbit">
            </div>
            <div class="subheader mb-2">Tahun Terbit</div>
                <div class="row row-sm align-items-center mb-3">
                <div class="col">
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><img alt='image' class='img-sm'src='<?php echo base_url(); ?>assets/img/flaticon/calendar1.png'></span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="from" value="">
                    </div>
                </div>
                <div class="col-auto">—</div>
                <div class="col">
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><img alt='image' class='img-sm'src='<?php echo base_url(); ?>assets/img/flaticon/calendar1.png'></span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="to" value="">
                    </div>
                </div>
            </div>
            <div class="subheader mb-2">Category</div>
            <div>
                <select id="category" name="category" class="form-select">
                    <?php 
                        $db = mysqli_connect("localhost", "root", "", "perpustakaan");
                        $sql = "SELECT * FROM tbl_category";
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        echo '<option value="0">- Select Category -</option>';
                        foreach($row as $cat){ ?>
                        <option value="<?=$cat['id']?>"><?=$cat['category']?></option>
                    <?php } ?>
                </select>            
            </div>
            <div class="mt-5">
            <button class="btn btn-primary btn-block">
                Search
            </button>            
            </div>
        </form>
    </div>
    <div class="col-9">
        <div class="row">
            <!-- <div class="row row-deck"> -->
                <?php
                    
                    $status     = isset($_POST['status']);
                    

                    $query      = " WHERE judul IS NOT NULL";

                    
                    if(isset($_POST['category'])){
                        $cat        = $_POST['category'];
                        if($cat > 0){
                            $query .= " AND a.category = $cat";
                        }
                    }

                    if(isset($_POST['from'])){
                        $from       = $_POST['from'];
                        $to         = $_POST['to'];

                        if($from != "" && $to == ""){
                            $query .= " AND a.thn_terbit BETWEEN ''$from'' AND ''$from'' ";
                        }

                    }

                    if(isset($_POST['to'])){
                        $from       = $_POST['from'];
                        $to         = $_POST['to'];

                        if($from != "" && $to != ""){
                            $query .= " AND a.thn_terbit BETWEEN ''$from'' AND ''$to'' ";
                        }
                    }

                    
                    if(isset($_POST['txt_penerbit'])){
                        $penerbit   = $_POST['txt_penerbit'];
                        if($penerbit != ""){
                            $query .= " AND a.penerbit LIKE ''%$penerbit%'' ";                        
                        }
                    }

                    if(isset($_POST['txt_penulis'])){
                        $penulis    = $_POST['txt_penulis'];
                        if($penulis != ""){
                            $query .= " AND a.penulis1 LIKE ''%$penulis%'' ";
                        }
                    }
                    
                    $db = mysqli_connect("localhost", "root", "", "perpustakaan");
                    $sql = "CALL getdatabuku('$query')";
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    $url = base_url();
                    $writer = "";

                    if($result->num_rows>0){
                        foreach ($row as $buku){ 
                            echo '<div class="col-sm-6 col-lg-4">
                                    <div class="card">
                                        <div style="margin:auto;">
                                            <a onclick="show(/'.$buku['id'].'/)"><img src="'.$url.'upload/cover/'.$buku['img_cover'].'" id="'.$buku['id'].'" class="card-img-top" alt="Cover Buku" style="width:200px;height:300px;"></a>
                                        </div>
                                        <div class="card-body" name="details" id="details'.$buku['id'].'">
                                            <h3 style="margin:auto;" class="card-title">'.$buku['judul'].'</h3>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th colspan="3">Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                     
                                                    <tr>
                                                        <td>Category</td>
                                                        <td>:</td>
                                                        <td>'.$buku['cat'].'</td>
                                                    </tr>                     
                                                    <tr>
                                                        <td>Jumlah Halaman</td>
                                                        <td>:</td>
                                                        <td>'.$buku['hal'].'</td>
                                                    </tr>                        
                                                    <tr>
                                                        <td>Penulis</td>
                                                        <td>:</td>';
                                                    ?>
                                                    <?php
                                                        if($buku['penulis2'] != "" && $buku['penulis3'] == ""){
                                                            echo '<td widht="100px">'.$buku['penulis1'] .", ". $buku['penulis2'].'</td>';
                                                        }
                                                        else if($buku['penulis3'] != ""){
                                                            echo '<td widht="100px">'.$buku['penulis1'] .", ". $buku['penulis2']. ", ". $buku['penulis3'].'</td>';
                                                        }else{
                                                            echo '<td>'.$buku['penulis1'].'</td>';
                                                        }
                            
                                                
                                                    echo '</tr> 
                                                    <tr>
                                                        <td>Penerbit</td>
                                                        <td>:</td>
                                                        <td>'.$buku['penerbit'].'</td>
                                                    </tr>                        
                                                    <tr>
                                                        <td>Tahun Penerbit</td>
                                                        <td>:</td>
                                                        <td>'.$buku['thn_terbit'].'</td>
                                                    </tr>                        
                                                    <tr>
                                                        <td>Kota</td>
                                                        <td>:</td>
                                                        <td>'.$buku['kota'].'</td>
                                                    </tr>                        
                                                </tbody>
                                            </table>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th colspan="3">Sinopsis</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3">'.$buku['isi'].'</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    }
                ?>
            <!-- </div> -->
        </div>
    </div>
</div>

<script src="<?php echo base_url();?>assets/dist/js/jquery.min.js"></script>
<script type='text/javascript'>
    $(document).ready(function(){

        var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
        console.log(base_url);

        $('.card-img-top').each(function(){
            var id=this.id;
            $("#details"+id).hide();
        }); 
        
    });

    function show(e){
        var current = e.source;
        $('.card-img-top').each(function(){
            var id=this.id;
            
            if(id==current){
                
                
                $("#details"+current).toggle();
            }
           
                
        });
        
    }

</script>