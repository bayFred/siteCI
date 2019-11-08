<?php
class User_M extends BAY_Model {
	
	protected $_table_name = 'users';
	protected $_order_by = 'name';

	public $rules = array(
		'email' => array(
			'field' =>'email',
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|xss_clean'
		),
		'password' => array(
			'field' =>'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		)
	);

	public $rules_admin = array(
		'name' => array(
			'field' =>'name',
			'label' => 'Name', 
			'rules' => 'trim|required|xss_clean'
		),
		'order' => array(
			'field' =>'order',
			'label' => 'Order', 
			'rules' => 'trim|is_natural'
		),
		'email' => array(
			'field' =>'email',
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
		),
		'password' => array(
			'field' =>'password', 
			'label' => 'Password', 
			'rules' => 'trim|matches[password_confirm]|required'
		),
		'password_confirm' => array(
			'field' =>'password_confirm', 
			'label' => 'Confirm password', 
			'rules' => 'trim|matches[password]'
		)
	);
	
	function __construct() {
		parent::__construct();
	}

		public function login ()
	{

		$this->session->unset_userdata('__ci_last_regenerate');   

		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			//'password' => $this->hash($this->input->post('password')),
			'password' => $this->input->post('password'),
		), TRUE);
		
		if (count($user)) {
			// Log in user
			$data = array(
				'name' => $user->name,
				'email' => $user->email,
				'id' => $user->id,
				'loggedin' => TRUE,
			);

			$this->session->mark_as_flash(array('name','email'));

			$this->session->set_userdata($data);
			redirect('admin/user/login', 'location');
		}
	}

	public function logout ()
	{
		$this->session->sess_destroy();
	}

	public function loggedin ()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
}