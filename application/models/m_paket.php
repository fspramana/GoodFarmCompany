<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_paket extends CI_Model{
  public $id_paket;
  public $nama;
  public $keterangan;
  public $stok;
  public function __construct()
  {
    parent::__construct();
  }

  public function load_paket(){ // done
    $query = "Select * from paket";
    $data = $this->db->query($query);
    return $data->num_rows() > 0 ? $data->result() : NULL;
  }
  public function load_detail(){ // done
    $query = "Select * from detail_paket";
    $data = $this->db->query($query);
    return $data->num_rows() > 0 ? $data->result() : NULL;
  }
  public function tambah_paket(){ // done
    $query = "insert into paket (nama,keterangan) values('$this->nama','$this->keterangan')";
    $data = $this->db->query($query);
  }
  public function get_last_id(){ // done
    $query = "select max(id) as last from paket";
    $data = $this->db->query($query);
    $last = $data->num_rows() > 0 ? $data->result() : 0;
    return $data->num_rows() > 0 ? $last->last : 0;
  }
  public function load_paket_by_id(){ // done
    $query = "select * from paket where (id_paket = '$this->id_paket')";
    $data = $this->db->query($query);
    return $data->num_rows() > 0 ? $data->row() : NULL;
  }
  public function update_paket(){ // done
    $query = "update paket set nama = '$this->nama', keterangan = '$this->keterangan', stok = '$this->stok' where id_paket = '$this->id_paket'";
    $this->db->query($query);
  }
  public function tambah_detail_paket($id_paket,$nama,$harga,$jumlah,$stok,$keterangan){
    $query = "insert into detail_paket (id_paket, nama_barang, harga, jumlah, stok, keterangan)
    values ('$id_paket','$nama','$harga','$jumlah', '$stok', '$keterangan')";
    $this->db->query($query);
  }
  public function load_detail_paket($id_paket){
    $query = "select * from detail_paket where id_paket = $id_paket";
    $data=$this->db->query($query);
    return $data->num_rows() > 0 ? $data->result() : NULL;
  }
  public function hapus_detail($id_barang){
    $query = "delete from detail_paket where id_barang ='$id_barang'";
    $this->db->query($query);
  }
  public function refresh_total(){ //done
    $query = "update paket
    set harga = (select sum(harga) from detail_paket where id_paket='$id_paket')
    where id_paket = '$this->id_paket'";
    $this->db->query($query);
  }
  public function hapus_paket($id_paket){
    $query = "delete from paket where id_paket = '$id_paket'";
    $this->db->query($query);
  }

}
