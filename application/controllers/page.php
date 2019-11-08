<?php

class Page extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('page_m');
    }

    public function index() {
        
        
    }
}
    	//$pages = $this->page_m->get_by(array('slug' => 'about'));
    	//$this->page_m->index('users');
    	//$page = $this->page_m->get_by(array('slug'=>'/'));
    /*	$page = $this->page_m->get_by(array('slug'=>'/'));
        var_dump($page);
    	
    }
    public function save() {
    	$data = array(
            
	    	'title' => 'Fifth row',
	    	'slug' => 'fifth',
	    	'order' => '5',
	    	'body' => 'Fifth row body',
            
    	);
        //Если функции save передать второй параметр(id),
        //то запись в БД обновится по id
        // Иначе - запишется новая запись
    	$id = $this->page_m->save($data);
    	//var_dump($id);
    }
	public function delete() {
    	$this->page_m->delete(6);
    }
}*/