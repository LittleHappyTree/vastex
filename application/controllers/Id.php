<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Id extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data = array();
	}

	public function index(){
		$data['address'] = $this->get_address();
		$data['contact'] = $this->get_contact();
		$data['costumers'] = $this->models->opentable('client','ORDER BY id DESC');
		$data['master_product'] = $this->models->opentable('master_product','ORDER BY id');
		$data['detail_product'] = $this->models->opentable('product_1','ORDER BY id');
		$data['service'] = $this->models->opentable('service','ORDER BY id');
		$data['machinery'] = $this->models->opentable('machinery','ORDER BY id');
		$data['gallery_picture'] = $this->models->opentable('v_gallery_picture','LIMIT 8');
		$data['active_page'] = 'home';
		$data['page'] 		 = 'web/about-us';
		$sql = 'SELECT * FROM about';
		$data['about'] = $this->models->openquery2($sql);
		$this->load->view('web/frame',$data);
	}

	public function product($var1='',$var2=''){
		$data['address'] = $this->get_address();
		$data['contact'] = $this->get_contact();
		$data['gallery_picture'] = $this->models->opentable('v_gallery_picture','LIMIT 8');
		$data['master_product'] = $this->models->opentable('master_product','ORDER BY id');
		$data['detail_product'] = $this->models->opentable('product_1','ORDER BY id');
		$data['master_product_inside'] = $data['master_product'];
		$data['id'] = $var1;
		$data['page'] 		 = 'web/product';
		if (!empty($var1)) {
			$data['master_product_inside'] = $this->models->opentable('master_product',"AND slug = '".$var1."' ORDER BY id");
			if (count($data['master_product_inside']) == 0) {
				redirect('id/product');
			}
		}
		if (!empty($var2)) {
			$data['detail_product_inside'] = $this->models->opentable('product_1',"AND slug = '".$var2."' ORDER BY id");
			if (count($data['detail_product_inside']) == 0) {
				redirect('id/product/'.$var1);
			}
			$data['page'] 		 = 'web/product-detail';
		}
		$data['active_page'] = 'product';
		$this->load->view('web/frame',$data);
	}

	public function service($var1=""){
		$data['address'] = $this->get_address();
		$data['contact'] = $this->get_contact();
		$data['gallery_picture'] = $this->models->opentable('v_gallery_picture','LIMIT 8');
		$data['master_product'] = $this->models->opentable('master_product','ORDER BY id');
		$data['detail_product'] = $this->models->opentable('product_1','ORDER BY id');
		$data['service'] = $this->models->opentable('service','ORDER BY id');
		$data['service_inside'] = $data['service'];
		$data['id']      = $var1;
		if (!empty($var1)) {
			$data['service_inside'] = $this->models->opentable('service',"AND slug = '".$var1."' ORDER BY id");
			if (count($data['service_inside']) == 0) {
				redirect('id/service');
			}
		}
		$data['page']    = 'web/service';
		$data['active_page'] = 'service';
		$this->load->view('web/frame',$data);
	}

	public function machinery($var1=""){
		$data['address'] = $this->get_address();
		$data['contact'] = $this->get_contact();
		$data['gallery_picture'] = $this->models->opentable('v_gallery_picture','LIMIT 8');
		$data['master_product'] = $this->models->opentable('master_product','ORDER BY id');
		$data['detail_product'] = $this->models->opentable('product_1','ORDER BY id');
		$data['machinery'] = $this->models->opentable('machinery','ORDER BY id');
		$data['machinery_inside'] = $data['machinery'];
		$data['id']      = $var1;
		if (!empty($var1)) {
			$data['machinery_inside'] = $this->models->opentable('machinery',"AND slug = '".$var1."' ORDER BY id");
			if (count($data['machinery_inside']) == 0) {
				redirect('id/machinery');
			}
		}
		$data['page']    = 'web/machinery';
		$data['active_page'] = 'machinery';
		$this->load->view('web/frame',$data);
	}

	public function about(){
		$data['address'] = $this->get_address();
		$data['contact'] = $this->get_contact();
		$data['gallery_picture'] = $this->models->opentable('v_gallery_picture','LIMIT 8');
		$data['master_product'] = $this->models->opentable('master_product','ORDER BY id');
		$data['detail_product'] = $this->models->opentable('product_1','ORDER BY id');
		$data['active_page'] = 'home';
		$data['active_page'] = 'home';
		$data['page'] 		 = 'web/about-us';
		$this->load->view('web/frame',$data);
	}

	public function certificate($var1=""){
		$data['address'] = $this->get_address();
		$data['contact'] = $this->get_contact();
		$data['gallery_picture'] = $this->models->opentable('v_gallery_picture','LIMIT 8');
		$data['master_product'] = $this->models->opentable('master_product','ORDER BY id');
		$data['detail_product'] = $this->models->opentable('product_1','ORDER BY id');
		$data['certificate'] = $this->models->opentable('certificate','ORDER BY id');
		$data['certificate_inside'] = $data['certificate'];
		$data['id']      = $var1;
		if (!empty($var1)) {
			$data['certificate_inside'] = $this->models->opentable('certificate',"AND slug = '".$var1."' ORDER BY id");
			if (count($data['certificate_inside']) == 0) {
				redirect('id/certificate');
			}
		}
		$data['active_page'] = 'certificate';
		$data['page'] 		 = 'web/certificate';
		$this->load->view('web/frame',$data);
	}

	public function gallery($var1=''){
		$data['address'] = $this->get_address();
		$data['contact'] = $this->get_contact();
		$data['gallery_picture'] = $this->models->opentable('v_gallery_picture','LIMIT 8');
		$data['master_product'] = $this->models->opentable('master_product','ORDER BY id');
		$data['detail_product'] = $this->models->opentable('product_1','ORDER BY id');
		$data['gallery_view'] = $this->models->opentable('v_gallery','');
		$data['id']      = $var1;
		if (!empty($var1)) {
			$data['gallery_view'] = $this->models->opentable('v_gallery',"AND slug = '".$var1."' ORDER BY id");
			if (count($data['gallery_view']) == 0) {
				redirect('id/gallery');
			}
			$data['gallery_picture_in'] = $this->models->opentable('v_gallery_picture',"AND slug = '".$var1."' ORDER BY id");
		}
		$data['active_page'] = 'gallery';
		$data['page'] 		 = 'web/gallery';
		$this->load->view('web/frame',$data);
	}

	public function contact(){
		$data['address'] = $this->get_address();
		$data['contact'] = $this->get_contact();
		$data['gallery_picture'] = $this->models->opentable('v_gallery_picture','LIMIT 8');
		$data['master_product'] = $this->models->opentable('master_product','ORDER BY id');
		$data['detail_product'] = $this->models->opentable('product_1','ORDER BY id');
		$data['about']   = $this->models->opentable('about','ORDER BY id DESC');
		$data['active_page'] = 'contact';
		$data['page'] 		 = 'web/contact';
		$this->load->view('web/frame',$data);
	}

	function get_address(){
		$sql = "SELECT * FROM main_address";
		return $this->models->openquery2($sql);
	}

	function get_contact(){
		$sql = "SELECT * FROM contact ORDER BY id";
		return $this->models->openquery2($sql);
	}
}
