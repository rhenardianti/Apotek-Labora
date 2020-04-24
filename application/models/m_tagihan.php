<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class m_tagihan extends CI_Model
  {

    function __construct()
    {
      parent::__construct();
      $this->table="tagihan";
    }
    function select($where =null){
      if ($where !=null) {
        $this->db->where($where);
      }
      $sql = "SELECT * FROM tagihan inner join apoteker on tagihan.id_apoteker=apoteker.id_apoteker";
      $query=$this->db->query($sql);
      return $query->result_array();
    }
    function insert($data){
      $this->db->insert($this->table, $data);
    }
    function update($data, $where){
      $this->db->where($where);
      $this->db->update($this->table, $data);
    }
    public function getApoteker(){
        return $this->db->get("apoteker");
    }
    public function getPemesanan(){
        return $this->db->get("pemesanan");
    }
    function delete($where){
      $this->db->where($where);
      $this->db->delete($this->table);
    }
    public function buat_kode()
    {
        $this->db->select('RIGHT(tagihan.id_tagihan,4) as kode', FALSE);
        $this->db->order_by('id_tagihan','DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->table);
        //cek dulu apakah ada sudah ada kode di tabel.
        if($query->num_rows() <> 0){
        //jika kode ternyata sudah ada.
        $data = $query->row();
        $kode = intval($data->kode) + 1;
        }else{
        //jika kode belum ada
        $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "T".$kodemax;
        return $kodejadi;
    }
  }

 ?>
