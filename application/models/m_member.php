<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_member extends CI_Model{
  public $id_member;
  public $email;
  public $password;
  public $nama;
  public $alamat;
  public $no_telp;
  public $level;
  public function __construct()
  {
    parent::__construct();
  }

  public function load_member(){ //done
  $query = "select * from member";
  $data = $this->db->query($query);
  return $data->num_rows() > 0 ? $data->result() : NULL;
  }

  public function load_detail_member(){//done
  $query = "select * from member where id_member = $this->id_member";
  $data = $this->db->query($query);
  return $data->num_rows() > 0 ? $data->row() : NULL;
  }

  public function hapus_member(){ //done
  $query = "delete from member where id_member = $this->id_hapus";
  $this->db->query($query);
  }

  public function login(){ //done
  $query = "select id_member from member where email = '$this->email' and password = '$this->password' and level = 0";
  $data = $this->db->query($query);
  return $data->num_rows() > 0 ? $data->row() : null;
  }
  public function login_member(){ //done
  $query = "select id_member from member where email = '$this->email' and password = '$this->password' and level = 1";
  $data = $this->db->query($query);
  return $data->num_rows() > 0 ? $data->row() : null;
  }


  public function tambah_member(){//done
  $query = "insert into member (email,password,nama,no_telp,alamat,level)
  values ('$this->email','$this->password','$this->nama','$this->no_telp','$this->alamat','$this->level')";
  $this->db->query($query);
  }

}
