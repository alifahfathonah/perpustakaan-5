<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam extends CI_Controller {

    function __construct(){

		parent::__construct();
        $CI=&get_instance();
        $this->load->library('session');
		$this->load->helper('url','form');
		$this->load->model('Pinjam_mod');
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

			$data['content']		= $this->load->view('pinjam','',TRUE);
			$data['title_gmbr']		= "bookshelf.png";
			$data['title']			= "Peminjaman Buku";
			$this->load->view('main',$data);
		}

	}
	
	function get_no(){

		$last_no = $this->Pinjam_mod->mget_last_no();
		$last_no = $last_no->no;
				
		if($last_no==null){

			$new_no = "PERPUS".date('ym')."001";
		}
		else{			

			$ym_no 		= date('ym');
			$ym_last 	= substr($last_no,6,4);

			if($ym_no!=$ym_last){

				$new_no = "PERPUS".date('ym')."001";
			}
			else{

				$last_seq 	= substr($last_no,-3);
				$new_seq 	= (int)$last_seq;
				$new_seq  	= ++$new_seq;
				$new_seq 	= str_pad($new_seq, 3, "0", STR_PAD_LEFT);

				$new_no = "PERPUS".date('ym').$new_seq;
			}
		}

		$upd_data = array(

			'no' => $new_no
		);

		$this->Pinjam_mod->update_last_no($upd_data);

		return $new_no;
	}

	public function simpan(){

		$id				= $this->input->post('txt_id');
		$no				= $this->input->post('txt_no');
		$tgl			= $this->input->post('txt_tgl');
		$anggota		= $this->input->post('txt_anggota');
		$buku1			= $this->input->post('txt_buku1');
		$buku2			= $this->input->post('txt_buku2');
		$buku3			= $this->input->post('txt_buku3');
		$no_transaksi 	= $this->get_no();
		$user 			= $this->session->userdata('username');

		if($id == NULL) {   		
			$result		= $this->Pinjam_mod->Insert($no_transaksi,$tgl,$anggota,$buku1,$buku2,$buku3,$user);
		}else{
			$result		= $this->Pinjam_mod->Update($id,$no,$tgl,$anggota,$buku1,$buku2,$buku3,$user);
		}

		echo json_encode($result);
		
	}
}