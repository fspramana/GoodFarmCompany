<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class paket extends CI_Controller{
    // paket done -> model_detail_paket
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_paket', 'paket');
    if($this->session->userdata('admin_id_member')==null){
      header("Location:".base_url()."index.php/admin/login");
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
      $data = $this->paket->load_paket();
      $container = array();
      $container ['data'] = $data;
      $this->load->view('admin_paket',$container);
  }
  function tambah_paket(){ // done
      $this->paket->nama = $this->input->post('nama');
      $this->paket->keterangan = $this->input->post('keterangan');
      $this->paket->tambah_paket();
      header("Location: ".base_url()."index.php/paket");
      $this->paket = null;
  }
  function edit_paket($id_paket){// done
      $this->paket->id_paket = $id_paket;
      $data = $this->paket->load_paket_by_id();
      $data_detail = $this->paket->load_detail_paket($id_paket);
      $container = array();
      $container['data'] = $data;
      $container['detail'] = $data_detail;
      $this->load->view('admin_edit_paket',$container);
      $this->paket = null;
  }
  function update_paket(){
      $this->paket->id_paket = $this->input->post('id_paket');
      $this->paket->nama = $this->input->post('nama');
      $this->paket->keterangan = $this->input->post('keterangan');
      $this->paket->stok = $this->input->post('stok');
      $this->paket->update_paket();
      header("Location: ".base_url()."index.php/paket/edit_paket/".$this->paket->id_paket);
      $this->paket = null;
  }
  function tambah_barang(){
     $this->paket->id_paket = $this->input->post('id_paket');
     $nama = $this->input->post('nama');
     $harga = $this->input->post('harga');
     $jumlah = $this->input->post('jumlah');
     $keterangan = $this->input->post('keterangan');
     $stok = $this->input->post('stok');
     $this->paket->tambah_detail_paket($this->paket->id_paket,$nama,$harga,$jumlah,$stok,$keterangan);
     $this->paket->refresh_total($this->paket->id_paket);
     header("Location: ".base_url()."index.php/paket/edit_paket/".$this->paket->id_paket);
  }
  function hapus_barang($id_barang,$id_paket){
    $this->paket->id_paket = $id_paket;
    $this->paket->hapus_detail($id_barang);
    $this->paket->refresh_total();
    header("Location: ".base_url()."index.php/paket/edit_paket/".$this->paket->id_paket);
  }


}
