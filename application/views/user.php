<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-auto ml-auto d-print-none">
            <a href="#" class="btn btn-primary ml-3">
            Create new User
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-nowrap" id="tabel_user">
            <thead>
                <tr>
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

<script src="<?php echo base_url();?>assets/dist/js/jquery.min.js"></script>
<script type='text/javascript'>
$(document).ready(function(){

    var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';

    get_data()

    function get_data(){

        $.ajax({
            type:"POST",
            url:base_url+"user/data",
            dataType:"json",
            success:function(data){

                console.log(data);

                var content_data = "";

                for(i=0;i<data.length;i++){

                    param = JSON.stringify({
                        'id'        :data[i].id,
                        'username'  :data[i].username,
                        'password'  :data[i].password,
                        'nama'      :data[i].nama,
                        'status'    :data[i].status

                    });

                    content_data += "<tr id='"+data[i].id+"'  onmouseover='on_editview("+param+",this.id)'  onmouseout='off_editview(this.id)' class='odd gradeX'>";				
                    content_data += "<td>"+data[i].username+"</td>";
                    content_data += "<td>"+data[i].password+"</td>";				
                    content_data += "<td>"+data[i].nama+"</td>";
                    content_data += "<td>"+data[i].priv+"</td>";
                    content_data += "<td>"+data[i].status+"</td>";
                    content_data += "<td><a href='#' onclick='cetakdata("+param+")'";
                    content_data += "	class='btn btn-light'>Edit&nbsp;<i class=''></i></a>"
                    content_data += "   <a href='#' onclick='cetakdata("+param+")'";
                    content_data += "	class='btn btn-danger'>Hapus&nbsp;<i class=''></i></a></td>"
                    content_data += "</tr>";
                }

                if(content_data!=''){
				$('#tabel_user tbody').html(content_data);
				$('#tabel_user').dataTable({
					// "paging":   false,
					// "ordering": false,
					// "info":     false
				});
			}

            }
        });
    }

});
</script>