<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct(){
      parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
      $this->load->library('upload');
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

    function contact($id=""){
      if(count($this->session->userdata("userlogin")) > 0) {
        $array = null;
        $log = $this->session->userdata("userlogin");
        $data['full_name'] = $log['full_name'];
        $data['id'] = $id;
        $sql = "SELECT * FROM main_address";
        $data['address'] = $this->models->openquery2($sql);
        $sql = "SELECT * FROM contact";
        $data['contact'] = $this->models->openquery2($sql);
        $data['title'] = '';
        $data['icon']   = '';
        $data['description']   = '';
        if (!empty($id)) {
          $sql_edit = $sql." WHERE id = '".$id."'";
          $data['title'] = $this->models->getdata($sql,$array,'title');
          $data['icon']   = $this->models->getdata($sql,$array,'icon');
          $data['description']   = $this->models->getdata($sql,$array,'description');
        }
        $data['page'] = 'admin/contact';
        $this->load->view('admin/frame',$data);
      } else {
        redirect("id");
      }
    }

    function service($id=""){
      if(count($this->session->userdata("userlogin")) > 0) {
        $log = $this->session->userdata("userlogin");
        $array = null;
        $data['full_name'] = $log['full_name'];
        $data['page'] = 'admin/service';
        $data['id'] = $id;
        $data['judul_service'] = '';
        $data['deskripsi']   = '';
        $sql = "SELECT * FROM service";
        $data['load']  = $this->models->openquery2($sql);
        if (!empty($id)) {
          $sql_edit = $sql." WHERE id = '".$id."' ";
          $data['judul_service'] = $this->models->getdata($sql,$array,'judul_service');
          $data['deskripsi']   = $this->models->getdata($sql,$array,'deskripsi');
        }
        $this->load->view('admin/frame',$data);
      } else {
        redirect("id");
      }
    }

    function machinery($id=""){
      if(count($this->session->userdata("userlogin")) > 0) {
        $log = $this->session->userdata("userlogin");
        $array = null;
        $data['full_name'] = $log['full_name'];
        $data['page'] = 'admin/machinery';
        $data['id'] = $id;
        $data['judul_service'] = '';
        $data['deskripsi']   = '';
        $sql = "SELECT * FROM machinery";
        $data['load']  = $this->models->openquery2($sql);
        if (!empty($id)) {
          $sql_edit = $sql." WHERE id = '".$id."' ";
          $data['judul_service'] = $this->models->getdata($sql,$array,'judul_service');
          $data['deskripsi']   = $this->models->getdata($sql,$array,'deskripsi');
        }
        $this->load->view('admin/frame',$data);
      } else {
        redirect("id");
      }
    }

    function about(){
      if(count($this->session->userdata("userlogin")) > 0) {
        $log = $this->session->userdata("userlogin");
        $data['full_name'] = $log['full_name'];
        $data['page'] = 'admin/about';
        $sql = "SELECT * FROM about";
        $data['load']  = $this->models->openquery2($sql);
        $this->load->view('admin/frame',$data);
      } else {
        redirect("id");
      }
    }

    function product($type,$id="",$var1=""){
      if(count($this->session->userdata("userlogin")) > 0) {
        $array = null;
        $log = $this->session->userdata("userlogin");
        $data['full_name'] = $log['full_name'];
        $data['id']        = $id;
        if ($type=='master') {
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
        }
        if ($type=='detail') {
          $data['id']          = ($id=='add') ? '' : $id;
          $data['id_master']   = ($id=='add') ? $var1 : '';
          $data['nama_produk'] = '';
          $data['deskripsi']   = '';
          if ($id!='' and $id!='add') {
            $sql = "SELECT * FROM product_1 WHERE id = '".$id."' ORDER BY id";
            $data['nama_produk']    = $this->models->getdata($sql,$array,'nama_produk');
            $data['deskripsi']      = $this->models->getdata($sql,$array,'deskripsi');
            $data['id_master']      = $this->models->getdata($sql,$array,'id_master');
            $data['thumbnail_img']  = $this->models->getdata($sql,$array,'thumbnail_img');
          }
          $sql = 'SELECT * FROM master_product ORDER BY id';
          $data['master'] = $this->models->openquery2($sql);
          $sql = "SELECT * FROM v_all_product";
          $data['all'] = $this->models->openquery2($sql);
          $data['page'] = 'admin/detail-product';
        }
        $this->load->view('admin/frame',$data);
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
                    "user_added"  => $log['uname'],
                    "slug"        => $this->get_slug('master_product',$nama_produk)
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
          } elseif ($var2=='detail') {
            $id             = $this->input->post('id');
            $nama_produk    = $this->input->post('nama_produk');
            $deskripsi      = $this->input->post('deskripsi');
            $id_master      = $this->input->post('id_master');
            $thumbnail_img  = $this->up_file('thumbnail_img');
            if ($id=='') {
              $array = array(
                "nama_produk"   => $nama_produk,
                "deskripsi"     => $deskripsi,
                "date_added"    => date('Y-m-d G:i:s'),
                "user_added"    => $log['uname'],
                "id_master"     => $id_master,
                "slug"          => $this->get_slug('product_1',$nama_produk),
                "thumbnail_img" => $thumbnail_img
              );
              $this->models->insert('product_1',$array);
            } else {
              $array = array(
                    "nama_produk"   => $nama_produk,
                    "deskripsi"     => $deskripsi,
                    "date_added"    => date('Y-m-d G:i:s'),
                    "user_added"    => $log['uname'],
                    "id_master"     => $id_master
              );
              if (!empty($thumbnail_img)) {
                $array += ["thumbnail_img" => $thumbnail_img];
              }
              $where = array(
                    "id" => $id
              );
              $this->models->update('product_1',$array,$where);
            }
            redirect('admin/product/detail');
          }
        } elseif ($var1=='about') {
          $description = $this->input->post('description');
          $id = $this->input->post('id');
          $array = array(
                "description" => $description,
                "user_modified" => $log['uname'] 
          );
          $where = array(
                "id" => $id
          );
          $this->models->update('about',$array,$where);
          redirect('admin/about');
        } elseif ($var1=='service') {
          $judul_service = $this->input->post('judul_service');
          $deskripsi     = $this->input->post('deskripsi');
          $id            = $this->input->post('id');
          $array = array(
            "judul_service"   => $judul_service,
            "deskripsi"       => $deskripsi,
            "user_modified"   => $log['uname']
          );
          if (empty($id)) {
            $array += ["slug" => $this->get_slug('service',$judul_service)];
            $this->models->insert('service',$array);
          } else {
            $where = array(
              "id" => $id
            );
            $this->models->update('service',$array,$where);
          }
          redirect('admin/service');
        } elseif ($var1=='machinery') {
          $judul_service = $this->input->post('judul_service');
          $deskripsi     = $this->input->post('deskripsi');
          $id            = $this->input->post('id');
          $array = array(
            "judul_service"   => $judul_service,
            "deskripsi"       => $deskripsi,
            "user_modified"   => $log['uname']
          );
          if (empty($id)) {
            $array += ["slug" => $this->get_slug('machinery',$judul_service)];
            $this->models->insert('machinery',$array);
          } else {
            $where = array(
              "id" => $id
            );
            $this->models->update('machinery',$array,$where);
          }
          redirect('admin/machinery');
        } elseif ($var1=='address') {
          $address = $this->input->post('address');
          $maps_location = $this->input->post('maps_location');
          $id = $this->input->post('id');
          $array = array(
                "address" => $address,
                "user_modified" => $log['uname'],
                "maps_location" => $maps_location 
          );
          $where = array(
                "id" => $id
          );
          $this->models->update('main_address',$array,$where);
          redirect('admin/contact');
        } elseif ($var1=='contact') {
          $id           = $this->input->post('id');
          $title        = $this->input->post('title');
          $icon         = $this->input->post('icon');
          $description  = $this->input->post('description');
          $array = array(
            "title"         => $title,
            "icon"          => $icon,
            "description"   => $description,
            "user_modified" => $log['uname']
          );
          if (empty($id)) {
            $this->models->insert('contact',$array);
          } else {
            $where = array(
              "id" => $id
            );
            $this->models->update('contact',$array,$where);
          }
          redirect('admin/contact#contact');
        }
      } else {
        redirect("id");
      }
    }

    function delete($var1,$var2='',$var3=''){
      if(count($this->session->userdata("userlogin")) > 0) {
        $log = $this->session->userdata("userlogin");
        if ($var1=='master'){
          $this->models->delete('master_product', array("id" => $var2) );
          $this->models->delete('product_1', array("id_master" => $var2) );
          redirect('admin/product/master');
        } elseif ($var1=='detail'){
          $this->models->delete('product_1', array("id" => $var2) );
          redirect('admin/product/detail');
        } elseif ($var1=='service') {
          $this->models->delete('service', array("id" => $var2) );
          redirect('admin/service');
        } elseif ($var1=='machinery') {
          $this->models->delete('machinery', array("id" => $var2) );
          redirect('admin/service');
        }
      } else {
        redirect("id");
      }
    }

    function get_slug($table,$title){
      if(count($this->session->userdata("userlogin")) > 0) {
        $array = null;
        $slug = str_replace(' ','-',strtolower($title)) ;
        // echo $slug;
        $sql = "SELECT COUNT(*) AS count FROM ".$table." WHERE slug = '".$slug."' ";
        $countslug = $this->models->getdata($sql,$array,'count');
        // echo $countslug;
        if ($countslug == 0) {
          return $slug;
        } else {
          $j=1;
          $sluga = $slug.'-';
          do {
            $slug = $sluga.$j;
            $sql = "SELECT COUNT(*) AS count FROM ".$table." WHERE slug = '".$slug."' ";
            $countslug = $this->models->getdata($sql,$array,'count');
            $j++;
          } while ($countslug==1);
          return $slug;
        }
      } else {
        redirect("id");
      }
    }

    function up_file($name){
      if(count($this->session->userdata("userlogin")) > 0) {
        $newName = uniqid();
        $config['file_name']            = $newName;
        $config['upload_path']          = './assets/img';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|PNG|JPG|JPEG';

        $this->upload->initialize($config);
        if (!empty(($_FILES[$name]["name"]))) {
          if ($this->upload->do_upload($name)) {
            return $this->upload->data("file_name");
          } else {
            return '';
          }
        } else {
          return '';
        }
        return '';
      } else {
        redirect("id");
      }
    }

    function upload_image(Type $var = null){
      if(count($this->session->userdata("userlogin")) > 0) {
        if(isset($_FILES["image"]["name"])){
          $config['file_name'] = uniqid();
          $config['upload_path'] = './assets/img/about/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $this->upload->initialize($config);
          if(!$this->upload->do_upload('image')){
              $this->upload->display_errors();
              return FALSE;
          }else{
              $data = $this->upload->data();
              $config['image_library']='gd2';
              $config['source_image']='./assets/img/about/'.$data['file_name'];
              $config['create_thumb']= FALSE;
              $config['maintain_ratio']= TRUE;
              $config['new_image']= './assets/img/about/'.$data['file_name'];
              $this->load->library('image_lib', $config);
              $this->image_lib->resize();
              echo base_url().'assets/img/about/'.$data['file_name'];
          }
        }
      } else {
        redirect("id");
      }
    }

    function delete_image(Type $var = null){
      if(count($this->session->userdata("userlogin")) > 0) {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name)){
            echo 'File Delete Successfully';
        }
      } else {
        redirect("id");
      }
    }
}