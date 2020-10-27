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
		$data['active_page'] = 'home';
		$data['page'] 		 = 'web/about-us';
		$sql = 'SELECT * FROM about';
		$data['about'] = $this->models->openquery2($sql);
		$this->load->view('web/frame',$data);
	}

	public function product($type=''){
		$data['address'] = $this->get_address();
		$data['contact'] = $this->get_contact();
		$data['active_page'] = 'product';
		$loadpage = ($type=='') ? 'web/product' : 'web/product-detail' ;
		$data['page'] 		 = $loadpage;
		$this->load->view('web/frame',$data);
	}

	public function about(){
		$data['address'] = $this->get_address();
		$data['contact'] = $this->get_contact();
		$data['active_page'] = 'home';
		$data['page'] 		 = 'web/about-us';
		$this->load->view('web/frame',$data);
	}

	public function certificate(){
		$data['address'] = $this->get_address();
		$data['contact'] = $this->get_contact();
		$data['active_page'] = 'certificate';
		$data['page'] 		 = 'web/certificate';
		$this->load->view('web/frame',$data);
	}

	public function development(){
		$data['address'] = $this->get_address();
		$data['contact'] = $this->get_contact();
		$data['active_page'] = 'development';
		$data['page'] 		 = 'web/development';
		$this->load->view('web/frame',$data);
	}

	public function contact(){
		$data['address'] = $this->get_address();
		$data['contact'] = $this->get_contact();
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
