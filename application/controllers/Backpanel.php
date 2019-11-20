<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backpanel extends MY_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
        $this->data = array();
	}

	public function index(){
        $data['error'] = ($this->session->flashdata('error')=='') ? '' : $this->widget('alert','danger',$this->session->flashdata('error'));
		$this->load->view('admin/login',$data);
    }
    
    function verify(){
        $uname = $this->input->post('uname');
        $pass  = $this->input->post('password');
        if (!empty($uname) and !empty($pass)) {
            $login = $this->models->verify($uname,$pass);
            if (isset($login) and $login != false) {
                $this->session->set_userdata("userlogin",$login);
                redirect("admin");
            } else {
                $this->session->set_flashdata('error','Username atau Password salah');
                redirect("backpanel");
            }
        } else {
			$this->session->set_flashdata('error','Username dan Password tidak boleh kosong');
            redirect("backpanel");
        }
    }

    function logout(){
        $this->session->unset_userdata('userlogin');
        $this->session->sess_destroy();
        redirect('backpanel');
    }
}
