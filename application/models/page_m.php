<?php
class Page_m extends BAY_Model {
	protected $_table_name = 'pages';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'order';
	protected $_rules = array();
	protected $_timestamps = FALSE;
    
   /* function __construct() {
		parent::__construct();
	}
    
    public function index($tablename){
        //print_r($this->db->get($tablename));
    }*/
}