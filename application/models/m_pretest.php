<?php
class m_pretest extends CI_Model{

  public function getQuestion(){
			return $this->db->get('tbl_pretest_question')->result();
	}
}
