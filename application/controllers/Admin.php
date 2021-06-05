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
        $data['akses'] = $log['akses'];
        $data['page'] = 'admin/dashboard';
        $this->load->view('admin/frame',$data);
      } else {
        redirect("id");
      }
    }

    function gallery($var1="",$var2="",$var3=""){
      if(count($this->session->userdata("userlogin")) > 0) {
        $log = $this->session->userdata("userlogin");
        $data['full_name'] = $log['full_name'];
        $data['akses'] = $log['akses'];
        $array = null;
        $sql = "SELECT * FROM gallery";
        if (($var1=='add') or ($var1=='edit')) {
          $data['success'] = (empty($this->session->flashdata('success'))) ? '' : $this->alert('success',$this->session->flashdata('success'));
          $data['failed'] = (empty($this->session->flashdata('failed'))) ? '' : $this->alert('danger',$this->session->flashdata('failed'));
          $data['page'] = 'admin/gallery-add';
          $sql_edit = $sql." WHERE id = '".$var2."' ";
          $data['id'] = ($var1=='add') ? '' : $var2;
          $data['judul'] = $this->models->getdata($sql_edit,$array,'judul');
          $data['deskripsi']   = $this->models->getdata($sql_edit,$array,'deskripsi');
          $data['date_added']   = $this->models->getdata($sql_edit,$array,'date_added');
          if ($var1=='edit') {
            $sql_picture = "SELECT * FROM gallery_picture WHERE gallery_id = '".$data['id']."' ";
            $data['load_picture'] = $this->models->openquery2($sql_picture);
          }
        } else {
          $data['page'] = 'admin/gallery-view';
          $data['load']  = $this->models->openquery2($sql);
        }
        $this->load->view('admin/frame',$data);
      } else {
        redirect("id");
      }
    }

    function banner($var1="", $var2=""){
      if(count($this->session->userdata("userlogin")) > 0) {
        $log = $this->session->userdata("userlogin");
        $data['full_name'] = $log['full_name'];
        $data['akses'] = $log['akses'];
        $data['page'] = 'admin/banner';
        $sql = "SELECT * FROM gallery_banner ORDER BY id";
        $data['load_picture'] = $this->models->openquery2($sql);
        $this->load->view('admin/frame',$data);
      } else {
        redirect("id");
      }
    }

    function customer($id=""){
      if(count($this->session->userdata("userlogin")) > 0) {
        $log = $this->session->userdata("userlogin");
        $data['full_name'] = $log['full_name'];
        $data['akses'] = $log['akses'];
        $data['page'] = 'admin/customer';
        $data['id'] = $id;
        $data['client'] = '';
        $array = null;
        $sql = "SELECT * FROM client";
        $data['load']  = $this->models->openquery2($sql);
        if (!empty($id)) {
          $sql_edit = $sql." WHERE id = '".$id."' ";
          $data['client'] = $this->models->getdata($sql_edit,$array,'client');
          $data['thumbnail_img']   = $this->models->getdata($sql_edit,$array,'thumbnail_img');
        }
        $this->load->view('admin/frame',$data);
      } else {
        redirect("id");
      }
    }

    function certificate($id=""){
      if(count($this->session->userdata("userlogin")) > 0) {
        $log = $this->session->userdata("userlogin");
        $data['full_name'] = $log['full_name'];
        $data['akses'] = $log['akses'];
        $data['page'] = 'admin/certificate';
        $data['id'] = $id;
        $data['judul'] = '';
        $data['deskripsi']   = '';
        $array = null;
        $sql = "SELECT * FROM certificate";
        $data['load']  = $this->models->openquery2($sql);
        if (!empty($id)) {
          $sql_edit = $sql." WHERE id = '".$id."' ";
          $data['judul'] = $this->models->getdata($sql_edit,$array,'judul');
          $data['deskripsi']   = $this->models->getdata($sql_edit,$array,'deskripsi');
          $data['thumbnail_img']   = $this->models->getdata($sql_edit,$array,'thumbnail_img');
        }
        $this->load->view('admin/frame',$data);
      } else {
        redirect("id");
      }
    }

    function user($id=""){
      if(count($this->session->userdata("userlogin")) > 0) {
        $array = null;
        $log = $this->session->userdata("userlogin");
        $data['full_name'] = $log['full_name'];
        $data['akses'] = $log['akses'];
        $data['uname'] = $log['uname'];
        if ($log['akses'] < 2) {
          $sql = "SELECT * FROM v_admin";
          $data['id'] = (empty($id)) ? '' : $id;
          $data['username'] = '';
          $data['icon']   = '';
          $data['role']   = '';
          $data['fname']   = '';
          if (!empty($data['id'])) {
            $sql_edit = $sql." WHERE id = '".$id."' AND akses > 0 AND akses > ".$data['akses']." ";
            if ($this->models->countrows($sql_edit) > 0) {
              $data['id'] = $this->models->getdata($sql_edit,$array,'id');
              $data['username'] = $this->models->getdata($sql_edit,$array,'uname');
              $data['role']   = $this->models->getdata($sql_edit,$array,'akses');
              $data['fname']   = $this->models->getdata($sql_edit,$array,'full_name');
            } else {
              redirect('admin/user');
            }
          }
          $data['list_user'] = $this->models->openquery2($sql." ORDER BY id");
          $data['page'] = 'admin/user';
          $this->load->view('admin/frame',$data);
        } else {
          redirect("admin");
        }
      } else {
        redirect("id");
      }
    }

    function contact($id=""){
      if(count($this->session->userdata("userlogin")) > 0) {
        $array = null;
        $log = $this->session->userdata("userlogin");
        $data['full_name'] = $log['full_name'];
        $data['akses'] = $log['akses'];
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
          $data['title'] = $this->models->getdata($sql_edit,$array,'title');
          $data['icon']   = $this->models->getdata($sql_edit,$array,'icon');
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
        $data['akses'] = $log['akses'];
        $data['page'] = 'admin/service';
        $data['id'] = $id;
        $data['judul_service'] = '';
        $data['deskripsi']   = '';
        $sql = "SELECT * FROM service";
        $data['load']  = $this->models->openquery2($sql);
        if (!empty($id)) {
          $sql_edit = $sql." WHERE id = '".$id."' ";
          $data['judul_service'] = $this->models->getdata($sql_edit,$array,'judul_service');
          $data['deskripsi']   = $this->models->getdata($sql_edit,$array,'deskripsi');
          $data['thumbnail_img']   = $this->models->getdata($sql_edit,$array,'thumbnail_img');
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
        $data['akses'] = $log['akses'];
        $data['page'] = 'admin/machinery';
        $data['id'] = $id;
        $data['judul_service'] = '';
        $data['deskripsi']   = '';
        $sql = "SELECT * FROM machinery";
        $data['load']  = $this->models->openquery2($sql);
        if (!empty($id)) {
          $sql_edit = $sql." WHERE id = '".$id."' ";
          $data['judul_service'] = $this->models->getdata($sql_edit,$array,'judul_service');
          $data['deskripsi']   = $this->models->getdata($sql_edit,$array,'deskripsi');
          $data['thumbnail_img']   = $this->models->getdata($sql_edit,$array,'thumbnail_img');
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
        $data['akses'] = $log['akses'];
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
        $data['akses'] = $log['akses'];
        $data['id']        = $id;
        if ($type=='master') {
          $data['nama_produk'] = '';
          $data['deskripsi']   = '';
          $where             = '';
          if ($id!='') {
            $sql = "SELECT * FROM master_product WHERE id = '".$id."' ORDER BY id";
            $data['nama_produk'] = $this->models->getdata($sql,$array,'nama_master');
            $data['deskripsi']   = $this->models->getdata($sql,$array,'deskripsi');
            $data['thumbnail_img']   = $this->models->getdata($sql,$array,'thumbnail_img');
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
            $thumbnail_img  = $this->up_file('thumbnail_img');
            if ($id=='') {
              $array = array(
                    "nama_master"   => $nama_produk,
                    "deskripsi"     => $deskripsi,
                    "date_added"    => date('Y-m-d G:i:s'),
                    "user_added"    => $log['uname'],
                    "slug"          => $this->get_slug('master_product',$nama_produk),
                    "thumbnail_img" => $thumbnail_img
              );
              $this->models->insert('master_product',$array);
            } else {
              $array = array(
                    "nama_master" => $nama_produk,
                    "deskripsi"   => $deskripsi
              );
              if (!empty($thumbnail_img)) {
                $array += ["thumbnail_img" => $thumbnail_img];
              }
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
          $thumbnail_img = $this->up_file('thumbnail_img');
          $array = array(
            "judul_service"   => $judul_service,
            "deskripsi"       => $deskripsi,
            "user_modified"   => $log['uname']
          );
          if (empty($id)) {
            $array += [ "slug" => $this->get_slug('service',$judul_service), "thumbnail_img" => $thumbnail_img ];
            $this->models->insert('service',$array);
          } else {
            if (!empty($thumbnail_img)) {
              $array += ["thumbnail_img" => $thumbnail_img];
            }
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
          $thumbnail_img = $this->up_file('thumbnail_img');
          $array = array(
            "judul_service"   => $judul_service,
            "deskripsi"       => $deskripsi,
            "user_modified"   => $log['uname']
          );
          if (empty($id)) {
            $array += [ "slug" => $this->get_slug('machinery',$judul_service), "thumbnail_img" => $thumbnail_img ] ;
            $this->models->insert('machinery',$array);
          } else {
            if (!empty($thumbnail_img)) {
              $array += ["thumbnail_img" => $thumbnail_img];
            }
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
        } elseif ($var1=='user') {
          $id         = $this->input->post('id');
          $uname      = $this->input->post('uname');
          $full_name  = $this->input->post('full_name');
          $password   = $this->input->post('password');
          $akses      = $this->input->post('akses');
          $array = array(
            "uname"         => $uname,
            "full_name"     => $full_name,
            "akses"         => $akses,
            "user_modified" => $log['uname']
          );
          if (empty($id)) {
            $sql = "SELECT * FROM admin WHERE uname = '".$uname."' ";
            if ($this->models->countrows($sql) > 0) {
              redirect('admin/user');
            }
            $array += ["aktif"     => 'Y', "password"     => md5($password)];
            $this->models->insert('admin',$array);
          } else {
            if (!empty($password)) {
              $array += ["password"     => md5($password)];
            }
            $where = array(
              "id" => $id
            );
            $this->models->update('admin',$array,$where);
          }
          redirect('admin/user');
        } elseif ($var1=='certificate') {
          $judul         = $this->input->post('judul');
          $deskripsi     = $this->input->post('deskripsi');
          $id            = $this->input->post('id');
          $thumbnail_img = $this->up_file('thumbnail_img');
          $array = array(
            "judul"           => $judul,
            "deskripsi"       => $deskripsi,
            "user_modified"   => $log['uname']
          );
          if (empty($id)) {
            $array += [ "slug" => $this->get_slug('certificate',$judul), "thumbnail_img" => $thumbnail_img ];
            $this->models->insert('certificate',$array);
          } else {
            if (!empty($thumbnail_img)) {
              $array += ["thumbnail_img" => $thumbnail_img];
            }
            $where = array(
              "id" => $id
            );
            $this->models->update('certificate',$array,$where);
          }
          redirect('admin/certificate');
        } elseif ($var1=='customer') {
          $client         = $this->input->post('client');
          $id            = $this->input->post('id');
          $thumbnail_img = $this->up_file('thumbnail_img');
          $array = array(
            "client"           => $client,
            "user_modified"   => $log['uname']
          );
          if (empty($id)) {
            $array += [ "thumbnail_img" => $thumbnail_img ];
            $this->models->insert('client',$array);
          } else {
            if (!empty($thumbnail_img)) {
              $array += ["thumbnail_img" => $thumbnail_img];
            }
            $where = array(
              "id" => $id
            );
            $this->models->update('client',$array,$where);
          }
          redirect('admin/customer');
        } elseif ($var1=='gallery') {
          $judul         = $this->input->post('judul');
          $deskripsi     = $this->input->post('deskripsi');
          $id            = $this->input->post('id');
          $date_added    = date('Y-m-d H:i:s');

          $array = array(
            "judul"   => $judul,
            "deskripsi"       => $deskripsi,
            "user_modified"   => $log['uname']
          );
          if (empty($id)) {
            $array += [ "slug" => $this->get_slug('gallery',$judul), "date_added" => $date_added ];
            $this->models->insert('gallery',$array);
            $id = $this->db->insert_id();
          } else {
            if (!empty($thumbnail_img)) {
              $array += ["thumbnail_img" => $thumbnail_img];
            }
            $where = array(
              "id" => $id
            );
            $this->models->update('gallery',$array,$where);
          }
          redirect('admin/gallery/edit/'.$id);
        } elseif ($var1=='gallery_picture') {
          $gallery_id    = $this->input->post('gallery_id');
          $thumbnail_img = $this->up_file('thumbnail_img');
          $array = array(
            "gallery_id"   => $gallery_id,
            "user_added"   => $log['uname']
          );
          $array += [ "thumbnail_img" => $thumbnail_img ];
          $this->models->insert('gallery_picture',$array);
          redirect('admin/gallery/edit/'.$gallery_id.'#gallery-picture');
        } elseif ($var1=='gallery_banner') {
          $thumbnail_img = $this->up_file('thumbnail_img');
          $array = array(
            "user_added"   => $log['uname']
          );
          $array += [ "thumbnail_img" => $thumbnail_img ];
          $this->models->insert('gallery_banner',$array);
          redirect('admin/banner');
        }
      } else {
        redirect("id");
      }
    }

    function action($var1,$var2="",$var3=""){
      if(count($this->session->userdata("userlogin")) > 0) {
        $array = null;
        $log = $this->session->userdata("userlogin");
        if ($var1=="user") {
          if (($var2=="deactive") or ($var2=="active")) {
            $sql = "SELECT * FROM admin WHERE id = ".$var3." AND akses > 0 AND akses > ".$log['akses']." ";
            $aktif = ($var2=="deactive") ? 'N' : 'Y';
            if ($this->models->countrows($sql) > 0) {
              $array = array(
                "aktif" => $aktif,
                "user_modified" => $log['uname']
              );
              $where = array(
                "id" => $var3
              );
              $this->models->update('admin',$array,$where);
              redirect('admin/user');
            } else {
              redirect('admin/user');
            }
          }
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
          redirect('admin/machinery');
        } elseif ($var1=='certificate') {
          $this->models->delete('certificate', array("id" => $var2) );
          redirect('admin/certificate');
        } elseif ($var1=='customer') {
          $this->models->delete('client', array("id" => $var2) );
          redirect('admin/customer');
        } elseif ($var1=='gallery') {
          $this->models->delete('gallery', array("id" => $var2) );
          redirect('admin/gallery');
        } elseif ($var1=='gallery_picture') {
          $this->models->delete('gallery_picture', array("id" => $var2) );
          redirect('admin/gallery/edit/'.$var3.'#gallery-picture');
        } elseif ($var1=='gallery_banner') {
          $this->models->delete('gallery_banner', array("id" => $var2) );
          redirect('admin/banner');
        }
      } else {
        redirect("id");
      }
    }

    function get_slug($table,$title){
      if(count($this->session->userdata("userlogin")) > 0) {
        $array = null;
        $slug = str_replace(' ','-',strtolower($title)) ;
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
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

    function formatdatetime($var){
      return date('Y-m-d', strtotime($var)).' '.date('H:i:s');
    }

    function alert($type,$msg){
      $alert = '<div class="alert alert-'.$type.' alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  '.$msg.'
                </div>';
      return $alert;
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