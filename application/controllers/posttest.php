<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class posttest extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');

		if($this->session->userdata('id_user')==NULL){
				redirect('login');
		}
	}

	public function index() {
		$this->load->model('m_user');
		$this->load->model('m_posttest');

		$id_user = $this->session->userdata('id_user');

		$data['getPostPoints']			= $this->m_posttest->countPoints($id_user);
		$data['getResult']					= $this->m_posttest->getPosttestResult($id_user);
		$data['lastResult']					= $this->m_posttest->getLastData($id_user);
		$data['level']							= $this->m_user->getLevelPosttest($id_user);
		$data['user']						 		= $this->m_user->getUser($id_user);
		$data['posttestQuestion'] 	= $this->m_posttest->getFirstQuestion();
		$this->load->view('v_posttest',$data);
	}

	public function questiondisplay($id_question) {
		$this->load->model('m_posttest');

		//cek apakah soal sudah di jawab atau belum
		$id_user   = $this->session->userdata('id_user');
		$data_cek  = $this->m_posttest->checkResult($id_question,$id_user);

		//kalau sudah dijawab
		if($data_cek->num_rows()>0){
			$data 							= $data_cek->result();
			$correct_status 		= $data[0]->correct_status;
			if ($correct_status != NULL) {

				$last	= $this->m_posttest->getLastData($id_user);
				foreach ($last as $key) {
					$lastIDquestion = $key->id_ps_question;
					$lastCorrect    = $key->correct_status;
				}

				if ($lastIDquestion == 3 AND $lastCorrect == 0) {
					$data['question'] = $this->m_posttest->getData($id_question);
					$this->load->view('v_run_posttest',$data);
				}else{
					redirect('posttest/continuetest/'.$id_question);
				}
			} else {
					$data['question'] = $this->m_posttest->getData($id_question);
					$this->load->view('v_run_posttest',$data);
			}
		}else{
			$id_result = uniqid();

			$data = array(
				'id_ps_result' 		=> $id_result,
				'id_ps_question' 	=> $id_question,
				'id_user'				 	=> $this->session->userdata('id_user'),
			);
			$this->m_posttest->insertAnswer($data);

			$data['question'] = $this->m_posttest->getData($id_question);
			$this->load->view('v_run_posttest',$data);
		}
	}

	public function saveAnswer($id_question) {
		$this->load->model('m_posttest');

		//ambil jawaban dari yang dipilih jika siswa sudah memilih
		if (isset($_POST['posttest'])) {
			$choices = $_POST['posttest'];

			//ambil data pertanyaan yang tampil
			$getdata = $this->m_posttest->getData($id_question);
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
				'id_ps_question' => $id_question,
				'id_user'				 => $this->session->userdata('id_user')
			);
			$this->m_posttest->updateAnswer($data, $where);

			//kalau jawaban benar
			if ($correct == 1) {
				//update level pencapaian di tabel akun
				$data2 = array (
					'result_posttest' => $getLevel
				);
				$where2 = array (
					'id_user' => $this->session->userdata('id_user')
				);
				$this->m_user->updateResult($data2, $where2);

				//cek nomor terakhir atau bukan
				if ($id_question % 28 == 0 OR $id_question % 29 == 0 OR $id_question % 30 == 0 ) {
					redirect('posttest');
				}
				//kalau bukan cari level sekanjutnya
				else{
					$nextId = $id_question+1;
					while($nextId != NULL) {
						$getNextData = $this->m_posttest->getData($nextId);
						foreach($getNextData as $key) {
							$getNextNumber = $key->number_of_question;
						}
						if($getNextNumber == $getNumberofQuestion+1) {
							break;
						}
						$nextId++;
					}
					redirect('posttest/questiondisplay/'.$nextId);
				}
			}
			//kalau salah turun ke soal yang lebih mudah
			else{
				$nextId = $id_question+1;
				if($id_question % 3 != 0) {
					redirect('posttest/questiondisplay/'.$nextId);
				}else {
					redirect('posttest');
				}
			}
		}
		else{
			redirect('posttest/questiondisplay/'.$id_question);
		}
	}

	public function continuetest($id_question) {
		$this->load->model('m_posttest');

		$id_user = $this->session->userdata('id_user');
		$data['last'] = $this->m_posttest->getLastData($id_user);
		$this->load->view('v_continuepost',$data);
	}
}
