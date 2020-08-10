<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-auto ml-auto d-print-none">
            <button onclick="new_cat();" class="btn btn-secondary ml-3">
                <img alt="image" class="img-md" src="<?php echo base_url(); ?>assets/img/flaticon/plus2.png">
                Add New Category
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable" id="tabel_category">
            <thead>
                <tr>
                    <th width="2%">no</th>
                    <th width="80%">Category</th>
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
                <form action="#" class="form-horizontal" enctype="multipart/form-data" id="form_cat">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-md-6 col-xl-12">
                                <input name="txt_id" id="txt_id" type="hidden">                                
                                <div class="mb-3">
                                <label class="form-label">Category</label>
                                <input type="text" name="txt_cat" id="txt_cat" class="form-control" name="example-text-input" placeholder="Category">
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

        var form = $('#form_cat').serialize();

             
        $.ajax({
            url:base_url+"category/simpan",
            type:"post",
            data: form,
            success: function(data){
                    
                    $.alert({
                        title: 'Success!',
                        content: 'Data Berhasil Disimpan!',
                    });
                    cancel()
                    $('#tabel_category').DataTable().destroy();
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
            url:base_url+"category/data",
            dataType:"json",
            success:function(data){

                var content_data = "";
                var no = 1;

                for(i=0;i<data.length;i++){

                    param = JSON.stringify({
                        'id'        :data[i].id,
                        'category'  :data[i].category

                    });

                    content_data += "<tr id='"+data[i].id+"'  onmouseover='on_editview("+param+",this.id)'  onmouseout='off_editview(this.id)' class='odd gradeX'>";				
                    content_data += "<td>"+no+"</td>";
                    content_data += "<td>"+data[i].category+"</td>";
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
                $('#tabel_category tbody').html(content_data);
                $('#tabel_category').dataTable({

                });
            }

            }
        });
    }


});

function editdata(e){
    console.log(e);

    $("#txt_id").val(e.id);
    $("#txt_cat").val(e.category);

    $('#modul_createedit').modal('show');
    document.getElementById("title-modal").innerHTML = "Updata Data Category";

}

function deletedata(id){

    console.log(id);

    var str_data	= 'id='+id;
    var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';

    if (confirm('Are you sure want to delete this data?')) {
        $.ajax({
            type: 'POST',
            url:base_url+"category/delete",
            data: str_data,
            success: function (result) {
                
                window.location = base_url+'category/index';
                
            }, 
            error: function (result) {
                alert(result.message);
            }
        })
    }
   

}

function cancel(){
    $('#form_cat')[0].reset();
    $('#modul_createedit').modal('hide');
}

function on_editview(e,b){
    jQuery('#tabel_cat'+b).css('height','20px');
    jQuery('#tabel_cat'+b).css('display','block');
}

function off_editview(e){
    jQuery('#tabel_cat'+e).css('display','none');
}

function new_cat(){
    $("#txt_id").val('');
    $('#modul_createedit').modal('show');
    document.getElementById("title-modal").innerHTML = "Create New Category";

}
</script>