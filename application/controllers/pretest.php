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

		$data['bio'] 						 = $this->m_user->getUser($this->session->userdata('id_user'));
		$data['pretestQuestion'] = $this->m_pretest->getFirstQuestion();

		$where = array(
			'id_user' => $this->session->userdata('id_user')
		);
		$data['pretest']  = $this->m_user->getLevelPretest($where);
		$this->load->view('v_pretest',$data);
	}

	public function questiondisplay($id_question) {
		$this->load->model('m_pretest');

		$id_result = uniqid();

		$data = array(
			'id_pr_result' 		=> $id_result,
			'id_pr_question' 	=> $id_question,
			'id_user'				 	=> $this->session->userdata('id_user'),
		);
		$this->m_pretest->insertAnswer($data);

		$data['question'] = $this->m_pretest->getData($id_question);
		$this->load->view('v_run_pretest',$data);
	}

	public function saveAnswer($id_question) {
		$this->load->model('m_pretest');

		//ambil jawaban dari yang dipilih
		if (isset($_POST['pretest'])) {
			$choices = $_POST['pretest'];
		}

		//ambil data yang ada di tbl_pretest_question
		$getdata = $this->m_pretest->getData($id_question);
		foreach ($getdata as $key) {
			$getAnswer 					 = $key->answer;
			$getLevel 					 = $key->id_level;
			$getNumberofQuestion = $key->number_of_question;
		}

		//bandingkan jawaban dari db dan yang dijawab
		if (strcmp($choices,$getAnswer) == 0){
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

		if ($correct == 1) {
			//update level pencapaian di tabel akun
			$data2 = array (
				'result_pretest' => $getLevel
			);
			$where2 = array (
				'id_user' => $this->session->userdata('id_user')
			);
			$this->m_user->updateResult($data2, $where2);

			$nextId = $id_question+1;
			while($nextId > 0) {
				$nextId++;
				$getNextData = $this->m_pretest->getData($nextId);
				foreach($getNextData as $key) {
					$getNextNumber = $key->number_of_question;
				}
				if($getNextNumber == $getNumberofQuestion+1) {
					break;
				}
			} redirect('pretest/questiondisplay/'.$nextId);
		}
		else{
			$nextId = $id_question+1;
			if($id_question % 3 !=0) {
				redirect('pretest/questiondisplay/'.$nextId);
			}else {
				echo "die";
			}
		}
	}
}
