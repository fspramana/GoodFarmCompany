<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_transaksi','transaksi');
    if($this->session->userdata('admin_id_member')==null){
      header("Location:".base_url()."index.php/admin/login");
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  { // done
      $data = $this->transaksi->load_transaksi();
      $container = array();
      $container['data'] = $data;
      $this->load->view('transaksi',$container);
  }

  function detail($id){
  //done
      $this->transaksi->id_transaksi = $id;
      $data = $this->transaksi->load_transaksi_by_id();
      $data2= $this->transaksi->load_detail_transaksi();
      $container = array();
      $container['transaksi'] = $data;
      $container['detail'] = $data2;
      $this->load->view('detail',$container);
  }

}
