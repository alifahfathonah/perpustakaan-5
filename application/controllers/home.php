<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->session->userdata('username')== ""){
			redirect('login');
		}
	}
	public function index()
	{
		$data['content']		= $this->load->view('dashboard','',TRUE);
		$data['title']			= "Dashboard";
		$this->load->view('main',$data);
	}
}
