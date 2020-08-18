<?php
class Pinjam_mod extends CI_model{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    } 

    function Insert($no_transaksi,$tgl,$anggota,$buku1,$buku2,$buku3,$user){

        $no_transaksi   = $this->db->escape($no_transaksi);
        $tgl            = $this->db->escape($tgl);
        $anggota        = $this->db->escape($anggota);
        $user           = $this->db->escape($user);

        $sp = "CALL savepinjambuku($no_transaksi,$tgl,$anggota,$buku1,$buku2,$buku3,$user,@result)";
        // return $this->db->query($sp)->result();

        $this->db->query($sp);
        return $query = $this->db->query("SELECT @result AS result")->result();
        // if($query->num_rows() > 0)
        // return $query->result()->result;
        // else
        // return NULL;
        // foreach($query->result() as $row){
        //     return $row->result;
        // }
    }

    function Update($id,$no,$tgl,$anggota,$buku1,$buku2,$buku3,$user){

        $sp = "CALL updatepinjambuku($id,$no,$tgl,$anggota,$buku1,$buku2,$buku3,$user)";
        return $this->db->query($sp)->result();
    }

    
    function mget_last_no(){

        $this->db->where('field','no_transaksi');
        return $this->db->get('tbl_no')->row();
    }
  
    function update_last_no($data){
  
      $this->db->where('field','no_transaksi');
      $this->db->update('tbl_no',$data);
    }

}