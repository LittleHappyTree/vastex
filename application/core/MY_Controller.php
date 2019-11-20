<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    function coba(){
        return 'asdasd';
    }
    
    function widget($var1='',$var2='',$var3=''){
        if ($var1=='alert') {
            return '<div class="alert alert-'.$var2.' alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    '.$var3.'
                    </div>
                   ';
        }
    }

}