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

		$id_user = $this->session->userdata('id_user');

		$data['getPreScore']			= $this->m_pretest->countScore($id_user);
		$data['getResult']				= $this->m_pretest->getPretestResult($id_user);
		$data['lastResult']				= $this->m_pretest->getLastData($id_user);
		$data['level']						= $this->m_user->getLevelPretest($id_user);
		$data['user']							= $this->m_user->getUser($id_user);
		$data['pretestQuestion'] 	= $this->m_pretest->getFirstQuestion();
		$this->load->view('v_pretest',$data);
	}

	public function questiondisplay($id_question) {
		$this->load->model('m_pretest');

		//cek apakah soal sudah di jawab atau belum
		$id_user   = $this->session->userdata('id_user');
		$data_cek  = $this->m_pretest->checkResult($id_question,$id_user);

		//kalau sudah dijawab
		if($data_cek->num_rows()>0){
			$data 							= $data_cek->result();
			$correct_status 		= $data[0]->correct_status;
			if ($correct_status != NULL) {

				$last	= $this->m_pretest->getLastData($id_user);
				foreach ($last as $key) {
					$lastIDquestion = $key->id_pr_question;
					$lastCorrect    = $key->correct_status;
				}

				if ($lastIDquestion == 3 AND $lastCorrect == 0) {
					$data['question'] = $this->m_pretest->getData($id_question);
					$this->load->view('v_run_pretest',$data);
				}else{
					redirect('pretest/continuetest/'.$id_question);
				}
			} else {
					$data['question'] = $this->m_pretest->getData($id_question);
					$this->load->view('v_run_pretest',$data);
			}
		}else{
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
	}

	public function saveAnswer($id_question) {
		$this->load->model('m_pretest');

		//ambil jawaban dari yang dipilih jika siswa sudah memilih
		if (isset($_POST['pretest']) != NULL) {
			$choices = $_POST['pretest'];

			//ambil data pertanyaan yang tampil
			$getdata = $this->m_pretest->getData($id_question);
			foreach ($getdata as $key) {
				$getAnswer 					 = $key->answer;
				$getLevel 					 = $key->id_level;
				$getScore						 = $key->score;
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

			//kalau jawaban benar
			if ($correct == 1) {
				//update level pencapaian di tabel akun
				$data2 = array (
					'result_pretest' => $getLevel
				);
				$where2 = array (
					'id_user' => $this->session->userdata('id_user')
				);
				$this->m_user->updateResult($data2, $where2);

				//cek nomor terakhir atau bukan
				if ($id_question % 58 == 0 OR $id_question % 59 == 0 OR $id_question % 60 == 0 ) {
					redirect('pretest');
				}
				//kalau bukan cari level sekanjutnya
				else{
					$nextId = $id_question+1;
					while($nextId != NULL) {
						$getNextData = $this->m_pretest->getData($nextId);
						foreach($getNextData as $key) {
							$getNextNumber = $key->number_of_question;
						}
						if($getNextNumber == $getNumberofQuestion+1) {
							break;
						}
						$nextId++;
					}
					redirect('pretest/questiondisplay/'.$nextId);
				}
			}
			//kalau salah turun ke soal yang lebih mudah
			else{
				$nextId = $id_question+1;
				if($id_question % 3 != 0) {
					redirect('pretest/questiondisplay/'.$nextId);
				}else {
					redirect('pretest');
				}
			}
		}
		else{
			redirect('pretest/questiondisplay/'.$id_question);
		}
	}

	public function continuetest($id_question) {
		$this->load->model('m_pretest');

		$id_user = $this->session->userdata('id_user');
		$data['last'] = $this->m_pretest->getLastData($id_user);
		$this->load->view('v_continuepre',$data);
	}

}
