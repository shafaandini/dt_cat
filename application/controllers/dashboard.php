<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_user');

		if($this->session->userdata('id_user')==NULL){
				redirect('login');
			}
	}

	public function index() {
		$data['bio'] 	 = $this->m_user->getUser($this->session->userdata('id_user'));

		$where = array(
			'id_user' => $this->session->userdata('id_user')
		);
		$data['pretest']  = $this->m_user->getLevelPretest($where);
		$data['posttest'] = $this->m_user->getLevelPosttest($where);
		$this->load->view('v_dashboard',$data);
	}
}
