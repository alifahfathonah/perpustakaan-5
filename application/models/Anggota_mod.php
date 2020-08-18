<?php
class Anggota_mod extends CI_model{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    } 

    function get_data(){

        $this->db->select('a.*,b.fakultas as fak,c.prodi as prod');
        $this->db->from('tbl_anggota a');
        $this->db->join('tbl_fakultas b','b.id=a.fakultas','left');
        $this->db->join('tbl_prodi c','c.id=a.prodi','left');
        $this->db->order_by('id','ASC');
        return $this->db->get()->result();
    }

    function insert($data){

        $this->db->insert('tbl_anggota',$data);
        
    }

    function update($data1,$id){

        $this->db->where('id',$id);
        $this->db->update('tbl_anggota',$data1);
        
    }

    function update_status($data,$id){

        $this->db->where('id',$id);
        $this->db->update('tbl_anggota',$data);
        
    }

    function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('tbl_anggota');
    }

    function get_prodi($id){
        $query = $this->db->get_where('tbl_prodi', array('id_fak' => $id));
        return $query;
    }

    function mget_last_no(){

        $this->db->where('field','no_anggota');
        return $this->db->get('tbl_no')->row();
    }
  
    function update_last_no($data){
  
      $this->db->where('field','no_anggota');
      $this->db->update('tbl_no',$data);
    }
}