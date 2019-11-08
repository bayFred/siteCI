<?php
class Admin_Controller extends BAY_Controller{
	
	public $data = array();
	function __construct(){
		parent::__construct();
		$this->data['meta_title'] = 'BAY CMS';
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');
		

		//Login check

		$exceptions_uris = array(
			'admin/user/login',
			'admin/user/logout'
		);

		if(in_array(uri_string(), $exceptions_uris) == FALSE){
			if ($this->user_m->loggedin() == FALSE) {
				redirect('admin/user/login');
			}
		}
	}
}