<?php
class Login_mod extends CI_model{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    } 

    function login($user,$pass){

        $user   = $this->db->escape($user);
        $pass   = $this->db->escape($pass);

        return $this->db->query("SELECT * FROM tbl_user WHERE username=$user AND password=$pass")->result();
    }
}