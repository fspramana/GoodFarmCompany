<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class akun extends CI_Controller{

  public function __construct()
  {

    parent::__construct();
    $this->load->model('m_member','member');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    if($this->session->userdata('id_member') == null){
        header("Location:".base_url()."index.php/akun/login");
    }else{
      $this->member->id_member = $this->session->userdata('id_member');
      $data = $this->member->load_detail_member();
      $this->load->model('m_transaksi','transaksi');
      $this->transaksi->id_member = $this->member->id_member;
      $data2 = $this->transaksi->load_transaksi_by_id_member();
      $container = array();
      $container ['data'] = $data;
      $container ['data2'] = $data2;
      $this->load->view('profil',$container);
    }
  }
  function buat_akun(){
    $this->member->email = $this->input->post('email');
    $this->member->nama = $this->input->post('nama');
    $this->member->password = $this->input->post('password');
    $this->member->alamat = $this->input->post('alamat');
    $this->member->no_telp = $this->input->post('no_telp');
    $this->member->level = 1;
    $this->member->tambah_member();
    header("Location:".base_url()."index.php/");
  }
  function register(){
    if($this->session->userdata('id_member')!=null){
      header("Location:".base_url()."index.php/");
    }else{
      $this->load->view('register');
    }
  }
  function login(){
    $this->load->view('login');
  }
  function do_login(){
    $this->member->email = $this->input->post('email');
    $this->member->password = $this->input->post('password');
    $member = $this->member->login_member();
    if($member->id_member != null){
      $this->session->set_userdata('id_member',$member->id_member);
      header("Location:".base_url()."index.php/");
    }else{
      header("Location:".base_url()."index.php/akun/login");
    }
  }
  function do_logout(){
    $this->session->unset_userdata('id_member');
    header("Location:".base_url()."index.php/");
  }

}
