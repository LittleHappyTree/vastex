<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
    }
    
    function index(){
      if(count($this->session->userdata("userlogin")) > 0) {
        $log = $this->session->userdata("userlogin");
        $data['full_name'] = $log['full_name'];
        $data['page'] = 'admin/dashboard';
        $this->load->view('admin/frame',$data);
      } else {
        redirect("id");
      }
    }

    function product($type,$id=""){
      if(count($this->session->userdata("userlogin")) > 0) {
        $array = null;
        if ($type=='master') {
          $log = $this->session->userdata("userlogin");
          $data['full_name'] = $log['full_name'];
          $data['id']        = $id;
          $data['nama_produk'] = '';
          $data['deskripsi']   = '';
          $where             = '';
          if ($id!='') {
            $sql = "SELECT * FROM master_product WHERE id = '".$id."' ORDER BY id";
            $data['nama_produk'] = $this->models->getdata($sql,$array,'nama_master');
            $data['deskripsi']   = $this->models->getdata($sql,$array,'deskripsi');
          }
          $sql = "SELECT * FROM master_product ORDER BY id";
          $data['load']        = $this->models->openquery2($sql);
          $data['page']        = 'admin/master-product';
          $this->load->view('admin/frame',$data);
        }
        if ($type=='detail') {
          # code...
        }
      } else {
        redirect("id");
      }
    }

    function save($var1,$var2=''){
      if(count($this->session->userdata("userlogin")) > 0) {
        $log = $this->session->userdata("userlogin");
        if ($var1=='product') {
          if ($var2=='master') {
            $id          = $this->input->post('id');
            $nama_produk = $this->input->post('nama');
            $deskripsi   = $this->input->post('desc');
            if ($id=='') {
              $array = array(
                    "nama_master" => $nama_produk,
                    "deskripsi"   => $deskripsi,
                    "date_added"  => date('Y-m-d G:i:s'),
                    "user_added"  => $log['uname']
              );
              $this->models->insert('master_product',$array);
            } else {
              $array = array(
                    "nama_master" => $nama_produk,
                    "deskripsi"   => $deskripsi
              );
              $where = array(
                    "id" => $id
              );
              $this->models->update('master_product',$array,$where);
            }
            redirect('admin/product/master');
          }
        }
      } else {
        redirect("id");
      }
    }
}