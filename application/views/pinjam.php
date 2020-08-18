<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-auto ml-auto d-print-none">
            <button onclick="new_pinjam();" class="btn btn-secondary ml-3">
                <img alt="image" class="img-md" src="<?php echo base_url(); ?>assets/img/flaticon/plus2.png">
                Add Book Transaction
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable" id="tabel_pinjam">
            <thead>
                <tr>
                    <th width="2%">no</th>
                    <th>No Transaksi</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal</th>
                    <th>Akhir Tanggal</th>
                    <th>Jumlah Buku</th>
                    <th>No HP</th>
                    <th>Batas Waktu</th>
                    <th>Jumlah Denda</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modul_createedit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue text-white" >
               <span id="title-modal"></span>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="#" class="form-horizontal" enctype="multipart/form-data" id="form_pinjam">
                <div class="row">
                        <div class="col-12">
                            <input name="txt_id" id="txt_id" type="hidden">
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">No Transaksi</label></div>
                                :
                                <div class="col-8">
                                    <input type="text" name="txt_no" id="txt_no" class="form-control" name="example-text-input" placeholder="No Transaksi" readonly>
                                </div>                                
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Tanggal Pinjam</label></div>
                                :
                                <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><img alt='image' class='img-sm'src='<?php echo base_url(); ?>assets/img/flaticon/calendar1.png'></span>
                                    </div>
                                        <input type="date" id="txt_tgl" name="txt_tgl" class="form-control" readonly value="<?php echo date('Y-m-d'); ?>">
                                    </div>                             
                                </div>
                            </div>                            
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Anggota</label></div>
                                :
                                <div class="col-8">
                                    <select class="form-select" name="txt_anggota" id="txt_anggota">
                                    <?php 
                                        $db = mysqli_connect("localhost", "root", "", "perpustakaan");
                                        $sql = "SELECT * FROM tbl_anggota";
                                        $result = mysqli_query($db, $sql);
                                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                        echo '<option value="0">- Select Anggota -</option>';
                                        foreach($row as $anggota){ ?>
                                        <option value="<?=$anggota['no_anggota']?>">(<?=$anggota['no_anggota']?>) <?=$anggota['nama']?></option>
                                    <?php } ?>                                    
                                    </select>
                                 </div>                                
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Pinjam Buku (I)</label></div>
                                :
                                <div class="col-8">
                                    <select class="form-select" name="txt_buku1" id="txt_buku1">
                                    <?php 
                                        $db = mysqli_connect("localhost", "root", "", "perpustakaan");
                                        $sql = "SELECT * FROM tbl_buku";
                                        $result = mysqli_query($db, $sql);
                                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                        echo '<option value="0">- Select Buku -</option>';
                                        foreach($row as $buku){ ?>
                                        <option value="<?=$buku['id']?>"><?=$buku['judul']?> (<?=$buku['penulis1']?>)</option>
                                    <?php } ?>                                    
                                    </select>
                                 </div>                                
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Pinjam Buku (II)</label></div>
                                :
                                <div class="col-8">
                                    <select class="form-select" name="txt_buku2" id="txt_buku2">
                                    <?php 
                                        $db = mysqli_connect("localhost", "root", "", "perpustakaan");
                                        $sql = "SELECT * FROM tbl_buku";
                                        $result = mysqli_query($db, $sql);
                                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                        echo '<option value="0">- Select Buku -</option>';
                                        foreach($row as $buku){ ?>
                                        <option value="<?=$buku['id']?>"><?=$buku['judul']?> (<?=$buku['penulis1']?>)</option>
                                    <?php } ?>                                    
                                    </select>
                                 </div>                                
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Pinjam Buku (III)</label></div>
                                :
                                <div class="col-8">
                                    <select class="form-select" name="txt_buku3" id="txt_buku3">
                                    <?php 
                                        $db = mysqli_connect("localhost", "root", "", "perpustakaan");
                                        $sql = "SELECT * FROM tbl_buku";
                                        $result = mysqli_query($db, $sql);
                                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                        echo '<option value="0">- Select Buku -</option>';
                                        foreach($row as $buku){ ?>
                                        <option value="<?=$buku['id']?>"><?=$buku['judul']?> (<?=$buku['penulis1']?>)</option>
                                    <?php } ?>                                    
                                    </select>
                                 </div>                                
                            </div>
                        </div>                  
                        <div class="input-group mb-1">
                            <div class="col-3"><label class="form-label"></label></div>
                            <div class="col-9">
                                <div class="input-group">
                                    <div class="col-4">
                                        <a href="#" id="btn_save" class="btn btn-primary btn-block">
                                            <span class="spinner-border spinner-border-sm mr-2" role="status" id="loading">
                                                <span class="sr-only">loading&hellip;</span>
                                            </span>
                                        Save
                                        </a>
                                    </div>
                                    <div class="col-4">                                        
                                        <a href="#" onclick="cancel()" class="btn btn-secondary btn-block">
                                        Cancel
                                        </a>
                                    </div>
                                </div>
                            </div>                                
                        </div>                       
                </div>                 
                </form>
                    
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/dist/js/jquery.form.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery.min.js"></script>
<script type='text/javascript'>
$(document).ready(function(){

    var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';

    $("#loading").hide();

    $('#btn_save').click(function(){

        $("#loading").show();

        var form = $('#form_pinjam').serialize();
            
        $.ajax({
            url:base_url+"pinjam/simpan",
            type:"post",
            data: form,
            success: function(data){
                var obj = JSON.parse(data);
                console.log(obj[0].result);
                $("#txt_no").val(obj[0].result);
                    
                    // $.alert({
                    //     title: 'Success!',
                    //     content: 'Data Berhasil Disimpan!',
                    // });
                    // cancel()
                    // $('#tabel_pinjam').DataTable().destroy();
                    // get_data()
                    $("#loading").hide();
                    
            },
            error: function(){

                $.alert({
                    title: 'Failed!',
                    content: 'Data Gagal Disimpan!',
                });

                $("#loading").hide();
            }

        });
    });

});

function new_pinjam(){
    $("#txt_id").val('');
    $("#txt_fak").val("0").trigger('change');
    $('#form_pinjam')[0].reset();
    $('#modul_createedit').modal('show');
    document.getElementById("title-modal").innerHTML = "Create New Book Transaction";
}

function cancel(){
    $('#form_pinjam')[0].reset();
    $('#modul_createedit').modal('hide');
}

</script>