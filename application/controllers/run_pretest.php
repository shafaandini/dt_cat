<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class run_pretest extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_pretest');

    if($this->session->userdata('id_user')==NULL){
				redirect('login');
			}
	}

	public function index() {
		$data['question'] = $this->m_pretest->getQuestion();
		$this->load->view('v_run_pretest', $data);
	}
}
