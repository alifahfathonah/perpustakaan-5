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
					'priv'		=> $ipriv
				);
	
			}
		}else{
			$array_item = array();
		}

		echo json_encode($array_item);

	}
}
