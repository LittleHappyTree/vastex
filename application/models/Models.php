<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Models extends CI_Model{

    function __construct(){
      parent::__construct();
      //my models
    }
    
    public function verify($uname,$pass){
      $query = $this->db->query("SELECT * FROM admin WHERE uname = ? AND password = ? AND aktif = ? ",array($uname,md5($pass),'Y'));
      $data = array();
      if ($query->num_rows() == 1) {
          foreach ($query->result() as $row) {
          $data['full_name'] = $row->full_name;
          $data['uname']     = $row->uname;
          $data['akses']     = $row->akses;
          $data['id']        = $row->id;
          }
        return $data;
      } else {
          return false;
      }
    }

    function insert($table,$datas){
      $this->db->insert($table,$datas);
      $insert = ($this->db->affected_rows() > 0) ? $this->session->set_flashdata('success', 'Success to Save Data') : $this->session->set_flashdata('failed', 'Failed to Save Data');
      return $insert;
    }

    function update($table,$datas,$where){
      $this->db->update($table,$datas,$where);
      $update = ($this->db->affected_rows() > 0) ? $this->session->set_flashdata('success', 'Success to Update Data') : $this->session->set_flashdata('failed', 'Failed to Update Data');
      return $update;
    }

    function delete($table,$where){
      return $this->db->delete($table,$where);
    }

    function countrows($sql){
      $query	= $this->db->query($sql);
      return	$query->num_rows();
    }

    function openquery($sql,$darray){
      $query	= $this->db->query($sql, $darray);
      return	$query->result();
    }

    function openquery2($sql){
      $query	= $this->db->query($sql);
      return	$query->result();
    }

    function opentable($table,$where){
      $sql = "SELECT * FROM ".$table." WHERE 1=1 ".$where." ";
      $query	= $this->db->query($sql);
      return	$query->result();
    }

    function getdata($sql,$data,$field){
      $var	= $this->openquery($sql, $data);
      $rs		= null;
      foreach($var AS $dt){$rs = $dt->$field;}
      return $rs;
    }

}