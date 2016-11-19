<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class member extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('admin_id_member')==null){
      header("Location:".base_url()."index.php/admin/login");
    }
    $this->load->model('m_member','member');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data = $this->member->load_member();
    $container = array();
    $container ['data'] = $data;
    $this->load->view('member',$container);
  }

  function lihat_profil($id_member){
    $this->member->id_member = $id_member;
    $data = $this->member->load_detail_member();
    $container = array();
    $container ['data'] = $data;
    $this->load->view('lihat_profil',$container);
  }

  function hapus($id_member){
   $this->member->id_member = $id_member;
   $this->member->hapus_member();
   header("Location:".base_url()."index.php/member");
  }

}
