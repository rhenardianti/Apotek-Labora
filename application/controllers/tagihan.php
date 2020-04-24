<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   class tagihan extends CI_Controller {
     function __construct()
      {
        parent::__construct();
        $this->load->model('m_tagihan');
        $this->load->model('m_login');
        // $this->load->model('m_apoteker');
      }
     public function index(){
      $session = $this->session->userdata('log_in');
      if ($session == TRUE) {
          $data['apoteker'] = $this->m_tagihan->getApoteker();
          $data['pemesanan'] = $this->m_tagihan->getPemesanan();
          $user_akun  = $this->m_login->ambilUser($this->session->userdata('username'));
          $data['user'] = $user_akun;
          $this->load->view('header',$data);
          $data['kode'] = $this->m_tagihan->buat_kode();
          $data['tagihan'] = $this->m_tagihan->select();
          $this->load->view('v_tagihan', $data);
          $this->load->view('footer');
        } else {
          redirect(base_url('hal_utama'));
      }
     }

     function tambahTagihan(){
       $data = array(
            'id_tagihan' => $this->input->post('id_tagihan') ,
            'id_apoteker' =>$this->input->post('id_apoteker') ,
            'id_pemesanan' =>$this->input->post('id_pemesanan') ,
            'tanggal_transaksi' =>$this->input->post('tanggal_transaksi') ,
            'keterangan' => $this->input->post('keterangan') ,
            'status_pembayaran' =>$this->input->post('status_pembayaran')
            );
       $this->m_tagihan->insert($data);
       $this->session->set_flashdata("tambah", "Data Berhasil Ditambahkan");
       redirect('tagihan', 'refresh');
     }

     function editTagihan(){
       $id_pemesanan = $this->input->post('id_pemesanan');
       $data = array(
            'id_apoteker' =>$this->input->post('id_apoteker') ,
            'id_pemesanan' =>$this->input->post('id_pemesanan') ,
            'tanggal_transaksi' =>$this->input->post('tanggal_transaksi') ,
            'keterangan' => $this->input->post('keterangan') ,
            'status_pembayaran' =>$this->input->post('status_pembayaran')
        );
       $where = array ('id_tagihan' => $this->input->post('id_tagihan'));
       $this->m_tagihan->update($data, $where);
       $this->session->set_flashdata("edit", "Data Berhasil Diubah");
       redirect('tagihan','refresh');
     }

     function hapusTagihan(){
       $id_tagihan = $this->input->post('id');
       $where = array ('id_tagihan' => $id_tagihan );
       $this->m_tagihan->delete($where);
       $this->session->set_flashdata("hapus", "Berhasil dihapus");
       redirect('tagihan','refresh');
     }
  }
 ?>