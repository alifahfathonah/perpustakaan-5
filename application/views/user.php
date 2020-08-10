<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-auto ml-auto d-print-none">
            <button onclick="new_user();" class="btn btn-secondary ml-3">
                <img alt="image" class="img-md" src="<?php echo base_url(); ?>assets/img/flaticon/plus2.png">
                Add New User
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable" id="tabel_user">
            <thead>
                <tr>
                    <th width="2%">no</th>
                    <th>username</th>
                    <th>Password</th>
                    <th>Nama</th>
                    <th>Role</th>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue text-white" >
               <span id="title-modal"></span>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="#" class="form-horizontal" enctype="multipart/form-data" id="form_user">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-md-6 col-xl-12">
                                 <input name="txt_id" id="txt_id" type="hidden">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                        <input type="text" name="txt_user" id="txt_user" class="form-control" placeholder="username" value="">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="txt_pass" id="txt_pass" class="form-control" name="example-password-input" maxlength="8" placeholder="Password">
                                    <span class="badge bg-red">Maks 8 character</span>
                                </div>
                                <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="txt_name" id="txt_name" class="form-control" name="example-text-input" placeholder="Nama Lengkap">
                                </div>
                                <div class="mb-3">
                                <div class="form-label">Privilege</div>
                                <select class="form-select" name="txt_priv" id="txt_priv">
                                    <option value="1">Administrator</option>
                                    <option value="2">Petugas</option>
                                </select>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Photo Profile</div>
                                    <div class="form-file">
                                    <input type="file" class="form-file-input" id="upload_form" name="upload_form">
                                    <label class="form-file-label" >
                                        <input type="text" class="form-control" for="upload_form" id="nameFile" name="nameFile">
                                        <span class="form-file-button">Browse</span>
                                    </label>
                                    </div>
                            </div>
                            <div class="input-group">
                                    <a href="#" id="btn_save" class="btn btn-primary btn-block">
                                        <span class="spinner-border spinner-border-sm mr-2" role="status" id="loading">
                                            <span class="sr-only">loading&hellip;</span>
                                        </span>
                                    Save
                                    </a>
                                    <a href="#" onclick="cancel()" class="btn btn-secondary btn-block">
                                    Cancel
                                    </a>
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

    $('#btn_save').click(function(){

        $("#loading").show();

        var file = document.getElementById("upload_form").value.replace('C:\\fakepath\\','');
			
		var iform 		    = $('#form_user')[0];
        var data		    = new FormData(iform);

        data.append('upload_form',$('#upload_form')[0].files[0]);
        data.append('txt_id',$('#txt_id').val());
        data.append('txt_user',$('#txt_user').val());
        data.append('txt_name',$('#txt_name').val());
        data.append('txt_priv',$('#txt_priv').val());
        data.append('nameFile',$('#nameFile').val());

             
        $.ajax({
            url:base_url+"user/simpan",
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
                    $('#tabel_user').DataTable().destroy();
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
            url:base_url+"user/data",
            dataType:"json",
            success:function(data){

                var content_data = "";
                var no = 1;

                for(i=0;i<data.length;i++){

                    param = JSON.stringify({
                        'id'        :data[i].id,
                        'username'  :data[i].username,
                        'password'  :data[i].password,
                        'nama'      :data[i].nama,
                        'status'    :data[i].status,
                        'priv'      :data[i].priv,
                        'privilege' :data[i].privilege

                    });

                    content_data += "<tr id='"+data[i].id+"'  onmouseover='on_editview("+param+",this.id)'  onmouseout='off_editview(this.id)' class='odd gradeX'>";				
                    content_data += "<td>"+no+"</td>";
                    content_data += "<td>"+data[i].username+"</td>";
                    content_data += "<td>"+data[i].password+"</td>";				
                    content_data += "<td>"+data[i].nama+"</td>";
                    content_data += "<td>"+data[i].priv+"</td>";
                    content_data += "<td>"+data[i].status+"</td>";
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
                $('#tabel_user tbody').html(content_data);
                $('#tabel_user').dataTable({

                });
            }

            }
        });
    }


});

function editdata(e){
    console.log(e);

    $("#txt_id").val(e.id);
    $("#txt_user").val(e.username);
    $("#txt_pass").val(e.password);
    $("#txt_name").val(e.nama);
    $("#txt_priv").val(e.privilege);
    $("#txt_priv").trigger('change');

    $('#modul_createedit').modal('show');
    document.getElementById("title-modal").innerHTML = "Updata Data User";

}

function deletedata(id){

    console.log(id);

    var str_data	= 'id='+id;
    var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';

    if (confirm('Are you sure want to delete this data?')) {
        $.ajax({
            type: 'POST',
            url:base_url+"user/delete",
            data: str_data,
            success: function (result) {
                
                // $("#alert").show();
                // document.getElementById("message").innerHTML = "Data Berhasil Dihapus!!!";
                
                // $('#tabel_user').DataTable().destroy();
                // $('#tabel_user tbody').html('');
                // get_data();  
                
                window.location = base_url+'user/index';
                
            }, 
            error: function (result) {
                alert(result.message);
            }
        })
    }
   

}

function cancel(){
    $('#form_user')[0].reset();
    $('#modul_createedit').modal('hide');
}

function on_editview(e,b){
    jQuery('#tabel_user'+b).css('height','20px');
    jQuery('#tabel_user'+b).css('display','block');
}

function off_editview(e){
    jQuery('#tabel_user'+e).css('display','none');
}

function new_user(){
    $("#txt_id").val('');
    $('#modul_createedit').modal('show');
    document.getElementById("title-modal").innerHTML = "Create New User";

}
</script>