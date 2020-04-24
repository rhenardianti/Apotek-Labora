<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class m_login extends CI_Model
  {

    public function __construct()
    {
      parent::__construct();
      $this->table="apoteker";
    }
    public function cek_user($username, $password){
      $this->db->from('apoteker');
      $this->db->where('nama', $username);
      $this->db->where('password', $password);
      $query = $this->db->get();
      return $query->result_array();
    }
    public function ambilUser($user)
    {
      $this->db->select('*');
      $query = $this->db->get_where($this->table, array('nama' => $user ));
      $query = $query->result_array();
      if($query){
        return $query[0];
      }
    }
  }

 ?>
