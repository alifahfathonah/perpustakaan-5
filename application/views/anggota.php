<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-auto ml-auto d-print-none">
            <button onclick="new_anggota();" class="btn btn-secondary ml-3">
                <img alt="image" class="img-md" src="<?php echo base_url(); ?>assets/img/flaticon/plus2.png">
                Add New Anggota
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable" id="tabel_anggota">
            <thead>
                <tr>
                    <th width="2%">no</th>
                    <th>Nama</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Status</th>
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
                <form action="#" class="form-horizontal" enctype="multipart/form-data" id="form_anggota">
                <div class="row">
                        <div class="col-12">
                            <input name="txt_id" id="txt_id" type="hidden">
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Nama</label></div>
                                :
                                <div class="col-8">
                                    <input type="text" name="txt_nama" id="txt_nama" class="form-control" name="example-text-input" placeholder="Nama">
                                </div>                                
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Fakultas</label></div>
                                :
                                <div class="col-8">
                                    <select class="form-select" name="txt_fak" id="txt_fak">
                                    <?php 
                                        $db = mysqli_connect("localhost", "root", "", "perpustakaan");
                                        $sql = "SELECT * FROM tbl_fakultas";
                                        $result = mysqli_query($db, $sql);
                                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                        echo '<option value="0">- Select Fakultas -</option>';
                                        foreach($row as $cat){ ?>
                                        <option value="<?=$cat['id']?>"><?=$cat['fakultas']?></option>
                                    <?php } ?>                                    
                                    </select>
                                 </div>                                
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Prodi</label></div>
                                :
                                <div class="col-8">
                                    <select class="form-select" name="txt_prodi" id="txt_prodi">
                                        <option value="0">- Select Prodi -</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Tanggal Lahir</label></div>
                                :
                                <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><img alt='image' class='img-sm'src='<?php echo base_url(); ?>assets/img/flaticon/calendar1.png'></span>
                                    </div>
                                        <input type="date" id="txt_ttl" name="txt_ttl" class="form-control">
                                    </div>                             
                                </div>
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Alamat</label></div>
                                :
                                <div class="col-8">
                                    <textarea class="form-control" name="txt_alamat" id="txt_alamat" rows="2" placeholder="Alamat"></textarea>                                
                                </div>                                
                            </div>                             
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">No. HP</label></div>
                                :
                                <div class="col-8">
                                    <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><img alt='image' class='img-sm'src='<?php echo base_url(); ?>assets/img/flaticon/handphone.png'></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="No. HP" name="txt_hp" id="txt_hp" value="">
                                    </div>
                                </div>                         
                            </div>
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Email</label></div>
                                :
                                <div class="col-8">
                                    <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><img alt='image' class='img-sm'src='<?php echo base_url(); ?>assets/img/flaticon/email.png'></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Email" name="txt_email" id="txt_email" value="">
                                    </div>
                                </div>                         
                            </div>                                              
                            <div class="input-group mb-1">                                
                                <div class="col-3"><label class="form-label">Foto</label></div>
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




<script src="<?php echo base_url(); ?>assets/dist/js/jquery.form.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery.min.js"></script>
<script type='text/javascript'>
$(document).ready(function(){

    var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';

    console.log(base_url);
    
    get_data();
    $("#loading").hide();

    $('#txt_fak').change(function(){ 
        var id=$(this).val();
        $.ajax({
            url :base_url+"anggota/get_prodi",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success: function(data){
                    
                var html = '<option value=0 selected="selected">- Select Prodi -</option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id+'>'+data[i].prodi+'</option>';
                }
                $('#txt_prodi').html(html);

            }
        });
        return false;
    }); 

    function get_data(){

        $.ajax({
            type:"POST",
            url:base_url+"anggota/data",
            dataType:"json",
            success:function(data){

                var content_data = "";
                var no = 1;

                for(i=0;i<data.length;i++){

                    param = JSON.stringify({
                        'id'        :data[i].id,
                        'nama'		:data[i].nama,
                        'usia'		:data[i].usia,
                        'alamat'	:data[i].alamat,
                        'fakultas'	:data[i].fakultas,
                        'prodi'		:data[i].prodi,
                        'hp'		:data[i].hp,
                        'email'		:data[i].email,
                        'ava'		:data[i].ava,
                        'status'	:data[i].status

                    });

                    if(data[i].ava !=''){
                        img = "<span class='avatar' style='background-image: url(<?php echo base_url(); ?>upload/ava/"+data[i].ava+")'></span>";
                    }else{
                        img = "<span class='avatar' style='background-image: url(<?php echo base_url(); ?>assets/img/flaticon/userava.png)'></span>";
                    }

                    content_data += "<tr id='"+data[i].id+"'  onmouseover='on_editview("+param+",this.id)'  onmouseout='off_editview(this.id)' class='odd gradeX'>";				
                    content_data += "<td>"+no+"</td>";
                    content_data += "<td>"+data[i].nama+"</td>";
                    content_data += "<td>"+data[i].fak+"</td>";
                    content_data += "<td>"+data[i].prod+"</td>";
                    content_data += "<td>"+data[i].hp+"</td>";
                    content_data += "<td>"+data[i].email+"</td>";
                    content_data += "<td>"+img+"</td>";
                    if(data[i].status == 1){
                        content_data += "<td><span class='badge bg-red'>Pending</span></td>";
                    }else{
                        content_data += "<td><span class='badge bg-green'>Active</span></td>";
                    }
                    content_data += "<td><a href='#' onclick='deletedata("+data[i].id+")'";
                    content_data += "	class='btn btn-secondary' title='Delete Data'><img alt='image' class='img-md' ";
                    content_data += " src='<?php echo base_url(); ?>assets/img/flaticon/delete.png'></a> ";
                    content_data += "   <a href='#' onclick='editdata("+param+")'";
                    content_data += "	class='btn btn-secondary' title='Edit Data'><img alt='image' class='img-md' ";
                    content_data += " src='<?php echo base_url(); ?>assets/img/flaticon/pencil.png'> </a></td>";
                    content_data += "</tr>";

                    no++;
                }

                if(content_data!=''){
                $('#tabel_anggota tbody').html(content_data);
                $('#tabel_anggota').dataTable({

                });
            }

            }
        });
    }

    $('#btn_save').click(function(){

        $("#loading").show();

        var file = document.getElementById("upload_form").value.replace('C:\\fakepath\\','');
            
        var iform 		    = $('#form_buku')[0];
        var data		    = new FormData(iform);

        data.append('upload_form',$('#upload_form')[0].files[0]);
        data.append('txt_id',$('#txt_id').val());
        data.append('txt_nama',$('#txt_nama').val());
        data.append('txt_fak',$('#txt_fak').val());
        data.append('txt_prodi',$('#txt_prodi').val());
        data.append('txt_ttl',$('#txt_ttl').val());
        data.append('txt_alamat',$('#txt_alamat').val());
        data.append('txt_hp',$('#txt_hp').val());
        data.append('txt_email',$('#txt_email').val());
            
        $.ajax({
            url:base_url+"anggota/simpan",
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
                    $('#tabel_anggota').DataTable().destroy();
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

});

function new_anggota(){
    $("#txt_id").val('');
    $("#txt_fak").val("0").trigger('change');
    $('#form_anggota')[0].reset();
    $('#modul_createedit').modal('show');
    document.getElementById("title-modal").innerHTML = "Create New Data Anggota";
}

function editdata(e){
    cancel()
    $("#txt_id").val(e.id);
    $("#txt_nama").val(e.nama);    
    $("#txt_fak").val(e.fakultas).trigger('change');
    var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
    $.ajax({
        url :base_url+"anggota/get_prodi",
        method : "POST",
        data : {id: e.fakultas},
        async : true,
        dataType : 'json',
        success: function(data){
                
            var html = '<option value=0>- Select Prodi -</option>';
            var i;
            for(i=0; i<data.length; i++){
                if(data[i].id==e.prodi){
                    html += '<option value='+data[i].id+' selected>'+data[i].prodi+'</option>';
                    console.log(data[i].id==e.prodi);
                }else{
                    html += '<option value='+data[i].id+'>'+data[i].prodi+'</option>';
                }
            }
            $('#txt_prodi').html(html);

        }
    });

    $("#txt_prodi").change();
    $("#txt_ttl").val(e.usia);
    $("#txt_alamat").val(e.alamat);
    $("#txt_hp").val(e.hp);
    $("#txt_email").val(e.email);
    $("#nameFile").val(e.ava);

    $('#modul_createedit').modal('show');
    document.getElementById("title-modal").innerHTML = "Updata Data Anggota";

}

function cancel(){
    $("#txt_fak").val("0").trigger('change');
    $("#txt_prodi").val("0").trigger('change');
    $('#form_anggota')[0].reset();
    $('#modul_createedit').modal('hide');
}

function on_editview(e,b){
    jQuery('#tabel_anggota'+b).css('height','20px');
    jQuery('#tabel_anggota'+b).css('display','block');
}

function off_editview(e){
    jQuery('#tabel_anggota'+e).css('display','none');
}

</script>