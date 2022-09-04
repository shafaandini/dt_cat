<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload extends CI_Controller {

  public function index() {
    $this->load->model('m_posttest');
    $this->load->view('uploadimage');
  }

  public function uploadImage() {
    $this->load->model('m_posttest');

    $file_name = $_FILES['file_respon']['name'];
    $nmfile	   = "pict".$file_name;

    if($file_name == NULL){
    }else{
      $config['upload_path']			= './assets/image/posttest';
      $config['allowed_types']		= 'jpg|png|jpeg';
      $config['file_name']				= $nmfile;

      $this->load->library('upload',$config);
      if(!$this->upload->do_upload('file_respon')){
        echo "upload gagal"; die();
      }else{
        $file = $this->upload->data('file_name');
      }
    }

      $data = array(
        'answer' => $nmfile
      );

      $where = array(
        'number_of_question' => '2'
      );
    $this->m_posttest->updateImage($data, $where);
    redirect('upload');
		}
  }
