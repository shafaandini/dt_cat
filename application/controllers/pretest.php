<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pretest extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');

		if($this->session->userdata('id_user')==NULL){
				redirect('login');
		}
	}

	public function index() {
		$this->load->model('m_user');
		$this->load->model('m_pretest');

		$data['bio'] 	 						= $this->m_user->getUser($this->session->userdata('id_user'))->result();
		$data['pretestQuestion'] 	= $this->m_pretest->getQuestion();
		$this->load->view('v_pretest',$data);
	}

	public function questionstart($id_question) {
		$this->load->model('m_pretest');

		$id_result = uniqid();

		$data = array(
			'id_pr_result' 		=> $id_result,
			'id_pr_question' 	=> $id_question,
			'id_user'				 	=> $this->session->userdata('id_user'),
		);
		$this->m_pretest->insertAnswer($data);

		$data['question'] = $this->m_pretest->getQuestion();
		redirect('pretest/questiondisplay/'.$id_question);
	}

	public function questiondisplay() {
		$this->load->model('m_pretest');

		$data['question'] = $this->m_pretest->getQuestion();
		$this->load->view('v_run_pretest',$data);
	}

	public function saveAnswer($id_question) {
		$this->load->model('m_pretest');

		//ambil jawaban dari yang dipilih
		if (isset($_POST['pretest'])) {
			$choices = $_POST['pretest'];
			//echo $choices;
		}

		//ambil data di kolom answer yang ada di db
		$getAnswerfromDB = $this->m_pretest->getData($id_question);
		foreach ($getAnswerfromDB as $key) {
			$getFromDB = $key->answer;
			//echo $key->answer;
		}

		//bandingkan jawaban dari db dan yang dijawab
		if (strcmp($choices,$getFromDB) == 0){
			$correct = 1;
		}else {
			$correct = 0;
		}

		//masukkan ke pretest result
		$data = array(
			'answer' 				 => $choices,
			'correct_status' => $correct,
		);

		$where = array(
			'id_pr_question' => $id_question,
			'id_user'				 => $this->session->userdata('id_user')
		);

		$this->m_pretest->updateAnswer($data, $where);

		//update level pencapaian di tabel akun
		//ambil id level dari tabel tbl_pretest_question
		$getLevel = $this->m_pretest->getData($id_question);
		foreach ($getLevel as $key) {
			$getLevelfromDB = $key->id_level;
		}

		//update level tbl_user
		$data2 = array (
			'result' => $getLevelfromDB
		);

		$where2 = array (
			'id_user' => $this->session->userdata('id_user')
		);

		if($correct == 1){
			$this->m_user->updateResult($data2, $where2);
		}
		
		echo "data berhasil di update";
	}

}
