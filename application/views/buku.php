<style>
.borderless td, .borderless th, .borderless tr {
    border: none;
    padding: 2px;
    margin: 0;
}
.bgcolor {
    border: 1px;
    text-align:justify; 
    text-justify:auto; 
}
.bgcolor:hover {
    color: blue;
}
</style>

<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-auto ml-auto d-print-none">
            <button onclick="new_buku();" class="btn btn-secondary ml-3">
                <img alt="image" class="img-md" src="<?php echo base_url(); ?>assets/img/flaticon/plus2.png">
                Add New Data Buku
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable" id="tabel_buku">
            <thead>
                <tr>
                    <th width="2%">no</th>
                    <th width="3%">Judul</th>
                    <th>Category</th>
                    <th width="2%">Hal</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Kota</th>
                    <th>Tahun</th>
                    <th>Cover Buku</th>
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
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-blue text-white" >
               <span id="title-modal"></span>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="#" class="form-horizontal" enctype="multipart/form-data" id="form_buku">
                <div class="row">
                        <div class="col-12">
                            <input name="txt_id" id="txt_id" type="hidden">
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Judul Buku</label></div>
                                :
                                <div class="col-8">
                                    <input type="text" name="txt_judul" id="txt_judul" class="form-control" name="example-text-input" placeholder="Judul Buku">
                                </div>                                
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Category</label></div>
                                :
                                <div class="col-8">
                                    <select class="form-select" name="txt_cat" id="txt_cat">
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
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Penulis 1</label></div>
                                :
                                <div class="col-8">
                                    <input type="text" name="txt_penulis1" id="txt_penulis1" class="form-control" name="example-text-input" placeholder="Penulis 1">
                                </div>                                
                            </div>                            
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Penulis 2</label></div>
                                :
                                <div class="col-8">
                                    <input type="text" name="txt_penulis2" id="txt_penulis2" class="form-control" name="example-text-input" placeholder="Penulis 2">
                                </div>                                
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Penulis 3</label></div>
                                :
                                <div class="col-8">
                                    <input type="text" name="txt_penulis3" id="txt_penulis3" class="form-control" name="example-text-input" placeholder="Penulis 3">
                                </div>                                
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Penerbit</label></div>
                                :
                                <div class="col-8">
                                    <input type="text" name="txt_penerbit" id="txt_penerbit" class="form-control" name="example-text-input" placeholder="Penerbit">
                                </div>                                
                            </div>                            
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Halaman</label></div>
                                :
                                <div class="col-8">
                                    <input type="text" name="txt_hal" id="txt_hal" class="form-control" name="example-text-input" placeholder="Jumlah Halaman">
                                </div>                                
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Tahun Terbit</label></div>
                                :
                                <div class="col-8">
                                    <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><img alt='image' class='img-sm'src='<?php echo base_url(); ?>assets/img/flaticon/calendar1.png'></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Tahun Terbit" name="txt_tahun" id="txt_tahun" value="">
                                    </div>
                                </div>                         
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Kota</label></div>
                                :
                                <div class="col-8">
                                    <input type="text" name="txt_kota" id="txt_kota" class="form-control" name="example-text-input" placeholder="Kota">
                                </div>                                
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Sinopsis</label></div>
                                :
                                <div class="col-8">
                                    <textarea class="form-control" name="txt_isi" id="txt_isi" rows="7" placeholder="Sinopsis Buku"></textarea>                                
                                </div>                                
                            </div>                           
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Cover Buku</label></div>
                                :
                                <div class="col-8">
                                    <div class="form-file">
                                    <input type="file" class="form-file-input" id="upload_form" name="upload_form">
                                    <label class="form-file-label" >
                                        <input type="text" class="form-control" for="upload_form" id="nameFile" name="nameFile">
                                        <span class="form-file-button">Browse</span>
                                    </label>
                                    </div>
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


<div id="modul_details" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue text-white" >
               <span id="title-modal2"></span>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table borderless" style="border: 0px;">
                    <thead>
                        <tr>
                            <th colspan="4">
                        </tr>
                    </thead>
                    <tbody>                     
                        <tr>
                            <td width="220px" rowspan="7"><img id="td_img" class="card-img-top" alt="Cover Buku" style="width:200px;height:300px;"></td>
                            <td colspan="6"><h2 id="td_judul"></h2></td>
                        </tr>
                        <tr>
                            <td width="50px">Category</td>
                            <td>:</td>
                            <td width="100px" id="td_cat"></td>
                            <td colspan="3" style="border:1px;"><b>Sinopsis Buku</b></td>
                        </tr>
                        <tr>
                            <td>Hal</td>
                            <td>:</td>
                            <td id="td_hal"></td>
                            <td colspan="3" rowspan="6" class="bgcolor" id="td_isi"></td>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <td>:</td>
                            <td id="td_penulis"></td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td>:</td>
                            <td id="td_penerbit"></td>
                        </tr>
                        <tr>
                            <td>Kota</td>
                            <td>:</td>
                            <td id="td_kota"></td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td>:</td>
                            <td id="td_tahun"></td>
                        </tr>
                    </tbody>  
                </table>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo base_url(); ?>assets/dist/js/jquery.form.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery.min.js"></script>
<script type='text/javascript'>
$(document).ready(function(){

    var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
    console.log(base_url);

    get_data()
    $("#loading").hide();

    $('#btn_save').click(function(){

        $("#loading").show();

        var file = document.getElementById("upload_form").value.replace('C:\\fakepath\\','');
            
        var iform 		    = $('#form_buku')[0];
        var data		    = new FormData(iform);

        data.append('upload_form',$('#upload_form')[0].files[0]);
        data.append('txt_id',$('#txt_id').val());
        data.append('txt_judul',$('#txt_judul').val());
        data.append('txt_cat',$('#txt_cat').val());
        data.append('txt_penulis1',$('#txt_penulis1').val());
        data.append('txt_penulis2',$('#txt_penulis2').val());
        data.append('txt_penulis3',$('#txt_penulis3').val());
        data.append('txt_penerbit',$('#txt_penerbit').val());
        data.append('txt_hal',$('#txt_hal').val());
        data.append('txt_tahun',$('#txt_tahun').val());
        data.append('txt_kota',$('#txt_kota').val());
        data.append('txt_isi',$('#txt_isi').val());
        data.append('nameFile',$('#nameFile').val());

            
        $.ajax({
            url:base_url+"buku/simpan",
            type:"post",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data){
                    
                    $.alert({
                        title: 'Success!',
                        content: 'Data Berhasil Disimpan!',
                    });
                    cancel()
                    $('#tabel_buku').DataTable().destroy();
                    get_data()
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

    function get_data(){

        $.ajax({
            type:"POST",
            url:base_url+"buku/data",
            dataType:"json",
            success:function(data){

                var content_data = "";
                var no = 1;

                for(i=0;i<data.length;i++){

                    param = JSON.stringify({
                
                        'id'			:data[i].id,
                        'judul'		    :data[i].judul,
                        'category'		:data[i].category,
                        'cat'			:data[i].cat,
                        'isi'			:data[i].isi,
                        'img_cover'		:data[i].img_cover,
                        'hal'			:data[i].hal,
                        'penerbit'		:data[i].penerbit,
                        'penulis1'		:data[i].penulis1,
                        'penulis2'		:data[i].penulis2,
                        'penulis3'		:data[i].penulis3,
                        'thn_terbit'	:data[i].thn_terbit,
                        'kota'			:data[i].kota


                    });

                    if(data[i].img_cover !=''){
                        $img = "<a href='<?php echo base_url(); ?>upload/cover/"+data[i].img_cover+"'>"+data[i].img_cover+"</a>";
                    }else{
                        $img = "-";
                    }

                    content_data += "<tr id='"+data[i].id+"'  onmouseover='on_editview("+param+",this.id)'  onmouseout='off_editview(this.id)' class='odd gradeX'>";				
                    content_data += "<td>"+no+"</td>";
                    content_data += "<td>"+data[i].judul+"</td>";
                    content_data += "<td>"+data[i].cat+"</td>";
                    content_data += "<td>"+data[i].hal+"</td>";
                    content_data += "<td>"+data[i].penulis1+"</td>";
                    content_data += "<td>"+data[i].penerbit+"</td>";
                    content_data += "<td>"+data[i].kota+"</td>";
                    content_data += "<td>"+data[i].thn_terbit+"</td>";
                    content_data += "<td>"+$img+"</td>";
                    content_data += "<td><a href='#' onclick='deletedata("+data[i].id+")'";
                    content_data += "	class='btn btn-secondary' title='Delete Data'><img alt='image' class='img-md' ";
                    content_data += " src='<?php echo base_url(); ?>assets/img/flaticon/delete.png'></a> ";
                    content_data += "   <a href='#' onclick='editdata("+param+")'";
                    content_data += "	class='btn btn-secondary' title='Edit Data'><img alt='image' class='img-md' ";
                    content_data += " src='<?php echo base_url(); ?>assets/img/flaticon/pencil.png'> </a>";
                    content_data += "   <a href='#' onclick='viewdata("+param+")'";
                    content_data += "	class='btn btn-secondary' title='View Data'><img alt='image' class='img-md' ";
                    content_data += " src='<?php echo base_url(); ?>assets/img/flaticon/search.png'> </a></td>";
                    content_data += "</tr>";

                    no++;
                }

                if(content_data!=''){
                $('#tabel_buku tbody').html(content_data);
                $('#tabel_buku').dataTable({

                });
            }

            }
        });
    }
    
});

function new_buku(){
    $("#txt_id").val('');
    $('#modul_createedit').modal('show');
    document.getElementById("title-modal").innerHTML = "Create New Data Buku";
}

function on_editview(e,b){
    jQuery('#tabel_cat'+b).css('height','20px');
    jQuery('#tabel_cat'+b).css('display','block');
}

function off_editview(e){
    jQuery('#tabel_cat'+e).css('display','none');
}

function editdata(e){
    console.log(e);

    $("#txt_id").val(e.id);
    $("#txt_judul").val(e.judul);
    $("#txt_cat").val(e.category).trigger('change');
    $("#txt_penulis1").val(e.penulis1);
    $("#txt_penulis2").val(e.penulis2);
    $("#txt_penulis3").val(e.penulis3);
    $("#txt_penerbit").val(e.penerbit);
    $("#txt_hal").val(e.hal);
    $("#txt_tahun").val(e.thn_terbit);
    $("#txt_kota").val(e.kota);
    $("#txt_isi").val(e.isi);
    $("#nameFile").val(e.img_cover);

    $('#modul_createedit').modal('show');
    document.getElementById("title-modal").innerHTML = "Updata Data Buku";
}

function cancel(){
    $('#form_buku')[0].reset();
    $('#modul_createedit').modal('hide');
}

function deletedata(id){

    console.log(id);

    var str_data	= 'id='+id;
    var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';

    if (confirm('Are you sure want to delete this data?')) {
        $.ajax({
            type: 'POST',
            url:base_url+"buku/delete",
            data: str_data,
            success: function (result) {
                
                window.location = base_url+'buku/index';
                
            }, 
            error: function (result) {
                alert(result.message);
            }
        })
    }

}

function viewdata(e){
    $('#modul_details').modal('show');
    document.getElementById("title-modal2").innerHTML = "Details Data Buku";
    var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
    var src = base_url + 'upload/cover/' + e.img_cover ;

    document.getElementById("td_judul").innerHTML = e.judul;
    document.getElementById("td_cat").innerHTML = e.cat;
    document.getElementById("td_hal").innerHTML = e.hal;
    document.getElementById("td_penerbit").innerHTML = e.penerbit;
    document.getElementById("td_penulis").innerHTML = e.penulis1;
    document.getElementById("td_kota").innerHTML = e.kota;
    document.getElementById("td_tahun").innerHTML = e.thn_terbit;
    document.getElementById("td_isi").innerHTML = e.isi;
    $("#td_img").attr("src",src);
}


</script>