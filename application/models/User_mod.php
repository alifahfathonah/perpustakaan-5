<?php
class User_mod extends CI_model{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    } 

    function cekpriv($user,$url){

        $user   = $this->db->escape($user);
        $url    = $this->db->escape($url);

        
        $sp     = "CALL getprivilege ($user,$url)";
        
        $query = $this->db->query($sp);
        // var_dump($this->db->last_query());
        // exit();

        foreach($query->result() as $row){
            return $row->priv;
        }

    }

    function get_data(){

        $sp = "CALL getdatauser()";
        return $this->db->query($sp)->result();
    }

    function insert($data){

        $this->db->insert('tbl_user',$data);
        
    }

    function update($data,$id){

        $this->db->where('id',$id);
        $this->db->update('tbl_user',$data);
        
    }

    function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('tbl_user');
    }

    function getmenu(){

        $sp = "CALL getmenu()";
        return $this->db->query($sp)->result();


    }
}