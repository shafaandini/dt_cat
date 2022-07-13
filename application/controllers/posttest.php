<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class posttest extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_user');

		if($this->session->userdata('id_user')==NULL){
				redirect('login');
			}
	}

	public function index() {
		$id_user = $this->session->userdata('id_user');

		$data['bio'] 	 		 = $this->m_user->getUser($id_user);
		$data['posttest']  = $this->m_user->getLevelPosttest($id_user);
		$this->load->view('v_posttest',$data);
	}
}
