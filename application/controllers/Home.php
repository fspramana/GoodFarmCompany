<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
      $this->load->model('m_paket');
      $paket = $this->m_paket->load_paket();
      $barang = $this->m_paket->load_detail();
      $container = array();
      $container['paket'] = $paket;
      $container['barang'] = $barang;
      $this->load->view('home', $container);
  }

}
