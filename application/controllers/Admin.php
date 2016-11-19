<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
      if($this->session->userdata('admin_id_member')==null){
        header("Location:".base_url()."index.php/admin/login");
      }else{
        $this->load->view('admin_home');
      }
  }

  function login(){
      if($this->session->userdata('admin_id_member')!=null){
        header("Location:".base_url()."index.php/admin");
      }else{
        $this->load->view("admin_login");
      }
  }

  function do_login(){
    $this->load->model('m_member','member');
    $this->member->email = $this->input->post('email');
    $this->member->password = $this->input->post('password');
    $member = $this->member->login();
    if($member->id_member != null){
      $this->session->set_userdata('admin_id_member',$member->id_member);
      header("Location:".base_url()."index.php/admin");
    }else{
      header("Location:".base_url()."index.php/admin/login");
    }
  }

  function do_logout(){
    $this->session->unset_userdata('admin_id_member');
    header("Location:".base_url()."index.php/admin/login");
  }

}
