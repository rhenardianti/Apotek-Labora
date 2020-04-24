<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   class hal_user extends CI_Controller {
     function __construct()
      {
        parent::__construct();
        $this->load->model('m_login');
      }
     public function index(){
        $session = $this->session->userdata('log_in');
        if ($session == TRUE) {
          $user_akun  = $this->m_login->ambilUser($this->session->userdata('username'));
          $data['user'] = $user_akun;
          $id_user = $user_akun['nama'];
          $this->load->view('header',$data);
          $this->load->view('hal_admin',$data);
          $this->load->view('footer');
        }
        else {
          redirect(base_url('hal_utama'));
        }
     }
   }
 ?>
