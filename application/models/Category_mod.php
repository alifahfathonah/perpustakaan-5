<?php
class Category_mod extends CI_model{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    } 

    function get_data(){

        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->order_by('id','ASC');
        return $this->db->get()->result();
    }

    function insert($data){

        $this->db->insert('tbl_category',$data);
        
    }

    function update($data1,$id){

        $this->db->where('id',$id);
        $this->db->update('tbl_category',$data1);
        
    }

    function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('tbl_category');
    }
}