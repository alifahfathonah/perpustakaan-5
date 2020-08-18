<?php
defined('BASEPATH') OR exit('No direct srcipt access allowed');

class login extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $CI=&get_instance();
        $this->load->library('session');
        $this->load->helper('url','form');
        $this->load->model('Login_mod');
    }

    public function index(){
        $data['title']          = "Login";
        $this->load->view('login',$data);
    }

    public function login(){

        $user   = $this->input->post('username');
        $pass   = $this->input->post('password');

        $cek    = $this->Login_mod->login($user,$pass);

        if($cek){

            foreach($cek as $data){
                $datalogin = array(
                    'id'        => $data->id,
                    'username'  => $data->username,
                    'nama'      => $data->nama,
                    'priv'      => $data->priv,
                    'status'    => $data->status,
                    'img'       => $data->img
                );

                $this->session->set_userdata($datalogin);
                redirect('home/index');
            }

            $result = true;
        }else{
            $this->session->set_flashdata('pesan','Username dan Password Salah');
            redirect('login');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('login');
	}

}