<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_user');
		$this->load->model('m_pretest');
		$this->load->model('m_posttest');

		if($this->session->userdata('id_user')==NULL){
				redirect('login');
			}
	}

	public function index() {
		$id_user = $this->session->userdata('id_user');

		$data['getPostPoints']		= $this->m_posttest->countScore($id_user);
		$data['getPreScore']			= $this->m_pretest->countScore($id_user);
		$data['bio'] 	    				= $this->m_user->getUser($id_user);
		$data['pretest']  				= $this->m_user->getLevelPretest($id_user);
		$data['posttest']					= $this->m_user->getLevelPosttest($id_user);
		$data['lastPretest']			= $this->m_pretest->getLastData($id_user);
		$data['lastPosttest']			= $this->m_posttest->getLastData($id_user);
		$this->load->view('v_dashboard',$data);
	}
}
