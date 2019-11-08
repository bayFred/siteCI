<?php
class BAY_Model extends CI_Model {
	
	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	public $rules = array();
	protected $_timestamps = FALSE;
	
	function __construct() {
		parent::__construct();
	}
	
	public function get($id = NULL, $single = FALSE){
		
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		}
		elseif($single == TRUE) {
			$method = 'row';
		}
		else {
			$method = 'result';
		}
		        
        if(!count($this->db->order_by($this->_order_by))) {
            $this->db->order_by($this->_order_by);
        }
		return $this->db->get($this->_table_name)->$method();
	}
	
	public function get_by($where, $single = FALSE){
		//$res = $this->db->where($where);
		$this->db->where($where);
		return $this->get(NULL, $single);
		//return $res;
	}
    
    
    /*
    *   Если функции save передать второй параметр(id),
    *   то запись в БД обновится по id
    *   
    *   Иначе - запишется новая запись
    *
    *
    **/
    
	public function save($data, $id = NULL){
		
		// Установка времени
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
			$id || $data['created'] = $now;
			$data['modified'] = $now;
		}
        
        
		
		// Вставка
		if ($id === NULL) {
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
            echo("<h2>Данные в таблицу ". $this->_table_name. " добавлены!!!</h2>");
		}
		// Обновление
		else {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
            echo("<h2>Данные в таблице ". $this->_table_name. " обновились!!!</h2>");
		}
		
		return $id;
	}
	
	public function delete($id){
		$filter = $this->_primary_filter;
		$id = $filter($id);
		
		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
        echo("<h2>Запись из таблицы ". $this->_table_name. " удалена!!!</h2>");
	}
}