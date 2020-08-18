<?php
class Buku_mod extends CI_model{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    } 

    
    function get_data(){

        $where      = " WHERE judul IS NOT NULL";

        $sp = "CALL getdatabuku('$where')";
        return $this->db->query($sp)->result();
    }

    function insert($data){

        $this->db->insert('tbl_buku',$data);
        
    }

    function update($data1,$id){

        $this->db->where('id',$id);
        $this->db->update('tbl_buku',$data1);
        
    }

    function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('tbl_buku');
    }
}