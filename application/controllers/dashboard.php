<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

public function __construct(){
	parent::__construct();
	$this->load->library('session');
	$this->load->model('m_user');
}

	public function index() {
		$data['bio'] 	 = $this->m_user->getUser($this->session->userdata('id_user'))->result();
		$this->load->view('v_dashboard',$data);
	}
}