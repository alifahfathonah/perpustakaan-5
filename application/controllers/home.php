<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

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
		$menu					= $this->User_mod->getmenu();
		$data['content']		= $this->load->view('dashboard','',TRUE);
		$data['title']			= "Dashboard";
		$data['title_gmbr']		= "real-estate.png";

		$this->load->view('main',$data);
	}
}
