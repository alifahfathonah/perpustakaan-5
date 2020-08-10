<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	function __construct(){

		parent::__construct();
        $CI=&get_instance();
        $this->load->library('session');
		$this->load->helper('url','form');
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

			$data['content']		= $this->load->view('user','',TRUE);
			$data['title_gmbr']		= "team.png";
			$data['title']			= "Management User";
			$this->load->view('main',$data);
		}

	}

	public function data(){

		$data	= $this->User_mod->get_data();

		if($data != NULL){

			foreach($data as $row){

				switch($row->status){
					case '0':
						$istatus = 'Aktif';
						break;
					case '1':
						$istatus = 'Non Aktif';
						break;
				}

				switch($row->priv){
					case '1':
						$ipriv = 'Administrator';
						break;
					case '2':
						$ipriv = 'Petugas';
						break;
				}

				$array_item[] = array(
					'id'		=> $row->id,
					'username'	=> $row->username,
					'password'	=> $row->password,
					'nama'		=> $row->nama,
					'status'	=> $istatus,
					'priv'		=> $ipriv,
					'privilege'	=> $row->priv
				);
	
			}
		}else{
			$array_item = array();
		}

		echo json_encode($array_item);

	}

	public function simpan(){

		$id				= $this->input->post('txt_id');
		$username 		= $this->input->post('txt_user');
		$pass			= $this->input->post('txt_pass');
		$name			= $this->input->post('txt_name');
		$priv			= $this->input->post('txt_priv');
		$customFile		= $this->input->post('nameFile');
		$now			= date('Y-m-d h:i:s');

		$count			= strlen($pass);
		if($count > 10){
			$ipass		= $pass;
		}else{
			$ipass		= MD5($pass);
		}

		$data = array(

			'username'		=> $username,
			'password'		=> $ipass,
			'nama'			=> $name,
			'priv'			=> $priv,
			'status'		=> 0,
			'img'			=> $customFile,
			'last_login'	=> null,
			'create_date'	=> $now	

		);

		if(isset($_FILES['upload_form'])){		
				
		
			$temp						= explode(".",$_FILES['upload_form']['name']);			
			$filename 					= date('YmdHis');
			$fix_filename 				= $filename.".".end($temp);
			$config['upload_path']   	= './upload/';			
			$config['allowed_types'] 	= 'jpg|png|jpeg';
			$config['file_name'] 		= $filename;
			$config['overwrite'] 		= true;
	
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);
	
			if($this->upload->do_upload('upload_form')){
	
				$data['img'] = $fix_filename;
			}
			else{
				
				echo $this->upload->display_errors();
			}		
		}

		if($id == NULL) {   		
			$result		= $this->User_mod->Insert($data);
		}else{
			$result		= $this->User_mod->Update($data,$id);
		}



	}

	public function delete(){

		$id			= $this->input->post('id');
		$result 	= $this->User_mod->delete($id);

		return $result;
	}
}
