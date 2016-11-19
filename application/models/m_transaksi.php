<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_transaksi extends CI_Model{
  public $id_transaksi;
  public $id_member;
  public $nama;
  public $tanggal;
  public $status;
  public $url_mou;
  public $keterangan;
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function load_transaksi(){ //done
      $query = "
      select distinct t.id_transaksi, t.id_member ,t.nama as namapkt, m.nama as nama, t.tanggal, t.status, t.url_mou, t.keterangan,
      (select sum(harga) as harga from detail_transaksi dt where dt.id_transaksi=t.id_transaksi)
      from transaksi t, member m
      where  m.id_member = t.id_member";
      $data = $this->db->query($query);
      return $data->num_rows() > 0 ? $data->result() : NULL;
  }
  public function load_transaksi_by_id(){ //done
    $query = "
    select distinct t.id_transaksi, t.id_member ,t.nama as namapkt, m.nama as nama, t.tanggal, t.status, t.url_mou, t.keterangan,
    (select sum(harga) as harga from detail_transaksi dt where dt.id_transaksi=t.id_transaksi)
    from transaksi t, member m
    where  m.id_member = t.id_member and t.id_transaksi=$this->id_transaksi";
    $data = $this->db->query($query);
    return $data->num_rows() > 0 ? $data->row() : NULL;
  }
  public function load_detail_transaksi(){ //done
  $query = "select * from detail_transaksi where id_transaksi=$this->id_transaksi ";
  $data = $this->db->query($query);
  return $data->num_rows() > 0 ? $data->result() : NULL;
  }
  public function load_transaksi_by_id_member(){
    $query = "
    select distinct t.id_transaksi, t.id_member ,t.nama as namapkt, m.nama as nama, t.tanggal, t.status, t.url_mou, t.keterangan
    from transaksi t, member m
    where  m.id_member = t.id_member";
    $data = $this->db->query($query);
    return $data->num_rows() > 0 ? $data->result() : NULL;
  }
}
