<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_login extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('m_user');

			if($this->session->userdata('username')!=NULL){
				if($this->session->userdata('username')==TRUE){
					redirect('c_dashboard');
				}else {
					redirect('c_login');
				}
			}
	}

	public function index() {
		$this->load->view('index');
	}

	public function process(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$data_cek = $this->m_user->check($username,$password);
		if($data_cek->num_rows()>0){
			$data 	= $data_cek->result();
			$id 		= $data[0]->id_user;
			$this->session->set_userdata('id_user',$id);
			redirect('c_dashboard');
		}else{
			$this->session->set_flashdata('login_error','Username / Password yang anda masukkan salah');
			redirect('c_login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('c_login');
	}
}
