<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    function __construct(){

		parent::__construct();
        $CI=&get_instance();
        $this->load->library('session');
		$this->load->helper('url','form');
		$this->load->model('Anggota_mod');
		$this->load->model('User_mod');
		
		if($this->session->userdata('username')== ""){
			redirect('login');
		}

    }
    
	public function index()
	{
		
		$user = $this->session->userdata('username');
		$url  = $this->router->class;

		$priv = $this->User_mod->cekpriv($user,$url);

		if($priv==0){
			redirect('login');
		}else{

			$data['content']		= $this->load->view('anggota','',TRUE);
			$data['title_gmbr']		= "girl.png";
			$data['title']			= "Management Anggota";
			$this->load->view('main',$data);
		}

    }
    
    public function data(){

		$data	= $this->Anggota_mod->get_data();

		if($data != NULL){

			foreach($data as $row){				

				$array_item[] = array(
					'id'			=> $row->id,
					'no_anggota'	=> $row->no_anggota,
					'nama'			=> $row->nama,
					'usia'			=> $row->usia,
					'alamat'		=> $row->alamat,
					'fakultas'		=> $row->fakultas,
					'prodi'			=> $row->prodi,
					'hp'			=> $row->hp,
					'email'			=> $row->email,
					'ava'			=> $row->ava,
					'status'		=> $row->status,
					'fak'			=> $row->fak,
					'prod'			=> $row->prod
				);
	
			}
		}else{
			$array_item = array();
		}

		echo json_encode($array_item);

	}
	
	function get_prodi(){
        $id 	= $this->input->post('id',TRUE);
        $data 	= $this->Anggota_mod->get_prodi($id)->result();
        echo json_encode($data);
	}
	
	function get_no(){

		$last_no = $this->Anggota_mod->mget_last_no();
		$last_no = $last_no->no;
				
		if($last_no==null){

			$new_no = "APS-".date('ym')."-001";
		}
		else{			

			$ym_no 		= date('ym');
			$ym_last 	= substr($last_no,4,4);

			if($ym_no!=$ym_last){

				$new_no = "APS-".date('ym')."-001";
			}
			else{

				$last_seq 	= substr($last_no,-3);
				$new_seq 	= (int)$last_seq;
				$new_seq  	= ++$new_seq;
				$new_seq 	= str_pad($new_seq, 3, "0", STR_PAD_LEFT);

				$new_no = "APS-".date('ym')."-".$new_seq;
			}
		}

		$upd_data = array(

			'no' => $new_no
		);

		$this->Anggota_mod->update_last_no($upd_data);

		return $new_no;
	}
    
    public function simpan(){

		$id				= $this->input->post('txt_id');
		$no_anggota 	= $this->get_no();
		$nama 			= $this->input->post('txt_nama');
		$fak			= $this->input->post('txt_fak');
		$prodi			= $this->input->post('txt_prodi');
		$ttl			= $this->input->post('txt_ttl');
		$alamat			= $this->input->post('txt_alamat');
		$hp				= $this->input->post('txt_hp');
		$email			= $this->input->post('txt_email');
		$customFile		= $this->input->post('nameFile');
		$now			= date('Y-m-d h:i:s');
		$user 			= $this->session->userdata('username');

		$data = array(

			'no_anggota'	=> $no_anggota,
			'nama'			=> $nama,
			'usia'			=> $ttl,
			'alamat'		=> $alamat,
			'fakultas'		=> $fak,
			'prodi'			=> $prodi,
			'hp'			=> $hp,
			'email'			=> $email,
			'ava'			=> $customFile,
			'status'		=> 0,			
			'create_date'	=> $now,
			'create_user'	=> $user,
			'update_date'	=> null,
			'update_user'	=> null	

		);

		$data1 = array(

			'nama'			=> $nama,
			'usia'			=> $ttl,
			'alamat'		=> $alamat,
			'fakultas'		=> $fak,
			'prodi'			=> $prodi,
			'hp'			=> $hp,
			'email'			=> $email,
			'ava'			=> $customFile,
			'status'		=> 0,			
			'update_date'	=> $now,
			'update_user'	=> $user

		);

		if(isset($_FILES['upload_form'])){		
				
		
			$temp						= explode(".",$_FILES['upload_form']['name']);			
			$filename 					= date('YmdHis');
			$fix_filename 				= $filename.".".end($temp);
			$config['upload_path']   	= './upload/ava/';			
			$config['allowed_types'] 	= 'jpg|png|jpeg';
			$config['file_name'] 		= $filename;
			$config['overwrite'] 		= true;
	
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);
	
			if($this->upload->do_upload('upload_form')){
	
				$data['ava'] = $fix_filename;
				$data1['ava'] = $fix_filename;
			}
			else{
				
				echo $this->upload->display_errors();
			}		
		}

		if($id == NULL) {   		
			$result		= $this->Anggota_mod->Insert($data);
		}else{
			$result		= $this->Anggota_mod->Update($data1,$id);
		}

	}

	public function status(){

		$id			= $this->input->post('id');
		$status		= $this->input->post('status');
		$now		= date('Y-m-d h:i:s');
		$user 		= $this->session->userdata('username');

		$data = array(

			
			'status'		=> $status,
			'update_date'	=> $now,
			'update_user'	=> $user

		);

		$result 	= $this->Anggota_mod->update_status($data,$id);

		return $result;
	}

}