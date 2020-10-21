<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Id extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
        $this->data = array();
	}

	public function index(){
		$data['active_page'] = 'home';
		$data['page'] 		 = 'web/about-us';
		$sql = 'SELECT * FROM about';
		$data['about'] = $this->models->openquery2($sql);
		$this->load->view('web/frame',$data);
	}

	public function product($type=''){
		$data['active_page'] = 'product';
		$loadpage = ($type=='') ? 'web/product' : 'web/product-detail' ;
		$data['page'] 		 = $loadpage;
		$this->load->view('web/frame',$data);
	}

	public function about(){
		$data['active_page'] = 'home';
		$data['page'] 		 = 'web/about-us';
		$this->load->view('web/frame',$data);
	}

	public function certificate(){
		$data['active_page'] = 'certificate';
		$data['page'] 		 = 'web/certificate';
		$this->load->view('web/frame',$data);
	}

	public function development(){
		$data['active_page'] = 'development';
		$data['page'] 		 = 'web/development';
		$this->load->view('web/frame',$data);
	}

	public function contact(){
		$data['active_page'] = 'contact';
		$data['page'] 		 = 'web/contact';
		$this->load->view('web/frame',$data);
	}
}
