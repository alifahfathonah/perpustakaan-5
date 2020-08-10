<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    function __construct(){

		parent::__construct();
        $CI=&get_instance();
        $this->load->library('session');
		$this->load->helper('url','form');
		$this->load->model('Category_mod');
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

			$data['content']		= $this->load->view('category','',TRUE);
			$data['title_gmbr']		= "list.png";
			$data['title']			= "Category Buku";
			$this->load->view('main',$data);
		}

    }
    
    public function data(){

		$data	= $this->Category_mod->get_data();

		if($data != NULL){

			foreach($data as $row){				

				$array_item[] = array(
					'id'		=> $row->id,
					'category'	=> $row->category
				);
	
			}
		}else{
			$array_item = array();
		}

		echo json_encode($array_item);

    }
    
    public function simpan(){

		$id				= $this->input->post('txt_id');
		$category 		= $this->input->post('txt_cat');
        $now			= date('Y-m-d h:i:s');
        $user           = $this->session->userdata('username');

		$data = array(

			'category'		=> $category,
			'create_date'	=> $now,
			'create_user'	=> $user,
			'update_date'	=> NULL,
			'update_user'	=> NULL
			

        );
        
		$data1 = array(

			'category'		=> $category,
			'update_date'	=> $now,
			'update_user'	=> $user
			

        );


		if($id == "") {            
            $result		= $this->Category_mod->Insert($data);
		}else{
			$result		= $this->Category_mod->Update($data1,$id);
		}



    }
    
    public function delete(){

		$id			= $this->input->post('id');
		$result 	= $this->Category_mod->delete($id);

		return $result;
	}
}