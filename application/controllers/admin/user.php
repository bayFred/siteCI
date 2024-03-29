<?php

    class User extends Admin_Controller{
        public function __construct() {
            parent::__construct();
        }


        public function index(){
            $this->data['users'] = $this->user_m->get();
            $this->data['subview'] = 'admin/user/index';
            $this->load->view('admin/_layout_main',$this->data);
        }

        public function edit($id=NULL){

                $id == NULL || $this->data['user'] = $this->user_m->get($id);

                $rules = $this->user_m->rules_admin;
                $id== NULL ||  $rules['password']['rules'] .= '|required';
                $this->form_validation->set_rules($rules);
                
            if ($this->form_validation->run() == TRUE) {
           

            }

                $this->data['subview'] = 'admin/user/edit';
                $this->load->view('admin/_layout_main', $this->data);
        }
        public function delete($id){
            echo 'Hello from ' . __FUNCTION__;
        }
        
        public function login(){


            $dashboard = 'admin/dashboard';
            $this->user_m->loggedin() == FALSE || redirect($dashboard);

        	$rules = $this->user_m->rules;
        	$this->form_validation->set_rules($rules);
        	$this->form_validation->set_message(__FUNCTION__,"Other domain Email id are not allowed ");

        	if ($this->form_validation->run() == TRUE) {
        		// We can login and redirect
        		// Вход или перезагрузка
        		if($this->user_m->login()){
                    redirect($dashboard);
                }
                else{
                    $this->session->set_flashdata('eror', 'Пароль или Email введены не верно!!!');
                    redirect('admin/user/login', 'refresh');
                }

        	}

        	// <!-- $subview устанавливается в контроллере User -->
        	// <!-- $subview set in the User controller -->
            $this->data['subview'] = 'admin/user/login';
            $this->load->view('admin/_layout_modal',$this->data);
            
        }
         public function bay(){

            $this->data['subview'] = 'admin/user/bay';
            $this->load->view('admin/_layout_modal',$this->data);
            
        }

        public function logout(){

            $this->user_m->logout();
            redirect('admin/user/login');
        }


        public function _unique_email($str){
            
            $id = $this->uri->segment(4);
            $this->db->where('email', $this->input->post('email'));
            !$id || $this->db->where('id !=', $id);
            $user = $this->user_m->get();

            if (count($user)) {
                $this->form_validation->set_message('unique_email', '%s должен быть уникальным!!!');
                return FALSE;
            }

            return TRUE;
        }
}