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
		$data['bio'] = $this->m_user->getUser($this->session->userdata('id_user'));

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
			$getCluster					 = $key->cluster;
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

		$nextId = $id_question+1;
		$getNextData = $this->m_pretest->getData($nextId);
		foreach ($getNextData as $key) {
			$getNextNumber = $key->number_of_question;
			$getNextLevel	 = $key->id_level;
			$getNextCluster = $key->cluster;
		}

		//jika jawaban benar
		if($correct == 1){
			//update level pencapaian di tabel akun
			$data2 = array (
				'result_pretest' => $getLevel
			);
			$where2 = array (
				'id_user' => $this->session->userdata('id_user')
			);
			$this->m_user->updateResult($data2, $where2);

			if($getNextCluster == 1) {
				if ($getCluster == $getNextCluster) {
					redirect('pretest/questiondisplay/'.$nextId);
				}
			}else{
				$nextId2 = $id_question+1;
				if($getCluster != $getNextCluster){
					while($nextId2 > 0) {
						$nextId2++;
						$getNextData2 = $this->m_pretest->getData($nextId2);
						foreach($getNextData2 as $key) {
							$getNextCluster2 = $key->cluster;
						}
						$newId = $nextId2;
						if($getCluster == $getNextCluster2) {
							break;
						}
					} redirect('pretest/questiondisplay/'.$nextId2);
				}
			}
		}

		//jika jawaban salah
		else{

			/*if(($getNumberofQuestion == 1) or ($getNumberofQuestion == 2)) {
				$nextId2 = $id_question+1;
				if(strcmp($getLevel,$getNextLevel) != 0) {
					while ($nextId2 > 0) {
						$nextId2++;
						$getNextData2 = $this->m_pretest->getData($nextId2);
						foreach($getNextData2 as $key) {
							$getNextLevel2	= $key->id_level;
						}
						if(strcmp($getLevel,$getNextLevel2) == 0) {
							break;
						}
					}
					if(strcmp($getLevel,$getNextLevel2) == 0) {
						$i=1;
						while ($i > 0) {
							$i++;
							if($i != 3) {
								redirect('pretest/questiondisplay/'.$nextId2);
							}else{
								break;
							}
						}echo "maaf kamu sudah salah 3x berturut-turut";
					}else{
						redirect('pretest/questiondisplay/'.$nextId2);
					}
				}
			}/*else{
				$stepbackId = $id_question-1;
				if(strcmp($getLevel,$getNextLevel) != 0) {
					while ($stepbackId > 0) {
						$stepbackId--;
						$getPrevData = $this->m_pretest->getData($stepbackId);
						foreach($getPrevData as $key) {
							$getPrevLevel	= $key->id_level;
						}
						if(strcmp($getLevel,$getPrevLevel) == 0) {
							break;
						}
					}redirect('pretest/questiondisplay/'.$stepbackId);
				}*/
				//echo $stepbackId;
			}
		}
 }
