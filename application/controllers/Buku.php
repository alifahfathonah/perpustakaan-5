<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    function __construct(){

		parent::__construct();
        $CI=&get_instance();
        $this->load->library('session');
		$this->load->helper('url','form');
		$this->load->model('Buku_mod');
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

			$data['content']		= $this->load->view('buku','',TRUE);
			$data['title_gmbr']		= "icons8.png";
			$data['title']			= "Data Buku";
			$this->load->view('main',$data);
		}

	}
	
	public function data(){

		$data	= $this->Buku_mod->get_data();

		if($data != NULL){

			foreach($data as $row){				

				$array_item[] = array(
					'id'			=> $row->id,
					'judul'			=> $row->judul,
					'category'		=> $row->category,
					'cat'			=> $row->cat,
					'isi'			=> $row->isi,
					'img_cover'		=> $row->img_cover,
					'hal'			=> $row->hal,
					'penerbit'		=> $row->penerbit,
					'penulis1'		=> $row->penulis1,
					'penulis2'		=> $row->penulis2,
					'penulis3'		=> $row->penulis3,
					'thn_terbit'	=> $row->thn_terbit,
					'kota'			=> $row->kota
				);
	
			}
		}else{
			$array_item = array();
		}

		echo json_encode($array_item);

	}
	
	public function simpan(){

		$id				= $this->input->post('txt_id');
		$judul 			= $this->input->post('txt_judul');
		$cat			= $this->input->post('txt_cat');
		$penulis1		= $this->input->post('txt_penulis1');
		$penulis2		= $this->input->post('txt_penulis2');
		$penulis3		= $this->input->post('txt_penulis3');
		$penerbit		= $this->input->post('txt_penerbit');
		$hal			= $this->input->post('txt_hal');
		$tahun			= $this->input->post('txt_tahun');
		$kota			= $this->input->post('txt_kota');
		$isi			= $this->input->post('txt_isi');
		$customFile		= $this->input->post('nameFile');
		$now			= date('Y-m-d h:i:s');
		$user 			= $this->session->userdata('username');

		$data = array(

			'judul'			=> $judul,
			'category'		=> $cat,
			'isi'			=> $isi,
			'img_cover'		=> $customFile,
			'hal'			=> $hal,
			'penerbit'		=> $penerbit,
			'penulis1'		=> $penulis1,
			'penulis2'		=> $penulis2,
			'penulis3'		=> $penulis3,
			'thn_terbit'	=> $tahun,
			'kota'			=> $kota,
			'user_created'	=> $user,
			'date_created'	=> $now,
			'user_updated'	=> null,
			'date_updated'	=> null	

		);

		if(isset($_FILES['upload_form'])){		
				
		
			$temp						= explode(".",$_FILES['upload_form']['name']);			
			$filename 					= date('YmdHis');
			$fix_filename 				= $filename.".".end($temp);
			$config['upload_path']   	= './upload/cover/';			
			$config['allowed_types'] 	= 'jpg|png|jpeg';
			$config['file_name'] 		= $filename;
			$config['overwrite'] 		= true;
	
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);
	
			if($this->upload->do_upload('upload_form')){
	
				$data['img_cover'] = $fix_filename;
			}
			else{
				
				echo $this->upload->display_errors();
			}		
		}

		if($id == NULL) {   		
			$result		= $this->Buku_mod->Insert($data);
		}else{
			$result		= $this->Buku_mod->Update($data,$id);
		}



	}

	public function delete(){

		$id			= $this->input->post('id');
		$result 	= $this->Buku_mod->delete($id);

		return $result;
	}
}

