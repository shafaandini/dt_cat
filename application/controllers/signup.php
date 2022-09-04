<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signup extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('m_user');

			if(!$this->session->userdata('id_user')==NULL){
				if($this->session->userdata('id_user')==TRUE){
					redirect('dashboard');
				} else{
					redirect('login');
				}
			}
	}

	public function index() {
		$this->load->view('v_signup');
	}

	public function process(){
		$name			= $this->input->post('name');
		$class    = $this->input->post('class');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$id_user = uniqid();

		$data = array(
			'id_user'		=> $id_user,
			'name' 			=> $name,
			'class' 		=> $class,
			'username'	=> $username,
			'password'  => $password
		);
		$this->m_user->uploadUser($data);
		redirect('login');
	}
}
