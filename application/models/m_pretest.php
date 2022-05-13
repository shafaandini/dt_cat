<?php
class m_pretest extends CI_Model{

  public function getQuestion(){
    $this->db->from('tbl_pretest_question');
    $this->db->join('tbl_cat', 'tbl_cat.id_cat=tbl_pretest_question.id_cat');
    return $this->db->get()->result();
	}

  public function getData($id) {
    return $this->db->get_where('tbl_pretest_question',array('id_pr_question' => $id))->result();
  }

  public function insertAnswer($data) {
    $this->db->insert('tbl_pretest_result',$data);
  }

  public function updateAnswer($updateData, $where) {
    $this->db->set($updateData);
    $this->db->where($where);
    $this->db->update('tbl_pretest_result');
  }
}
