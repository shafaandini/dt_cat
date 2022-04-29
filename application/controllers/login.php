<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

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
			redirect('dashboard');
		}else{
			$this->session->set_flashdata('login_error','Username / Password yang Anda Masukkan Salah');
			redirect('login');
		}
	}
}
