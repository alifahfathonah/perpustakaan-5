<?php
class Login_mod extends CI_model{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    } 

    function login($user,$pass){

        $encrypted_mypassword = MD5($pass);
        $user   = $this->db->escape($user);


        return $this->db->query("SELECT * FROM tbl_user WHERE username=$user AND password='$encrypted_mypassword'")->result();
    }
}