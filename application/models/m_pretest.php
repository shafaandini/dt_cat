<?php
class m_pretest extends CI_Model{

  public function getFirstQuestion(){
    $this->db->from('tbl_pretest_question');
  //  $this->db->join('tbl_cat', 'tbl_cat.id_cat=tbl_pretest_question.id_cat');
    $this->db->join('tbl_level', 'tbl_level.id_level=tbl_pretest_question.id_level');
    $this->db->join('tbl_pretest_answer', 'tbl_pretest_answer.id_pr_answer=tbl_pretest_question.choices');
    return $this->db->get()->result();
	}

  public function getData($id) {
  //  $this->db->join('tbl_cat', 'tbl_cat.id_cat=tbl_pretest_question.id_cat');
    $this->db->join('tbl_level', 'tbl_level.id_level=tbl_pretest_question.id_level');
    $this->db->join('tbl_pretest_answer', 'tbl_pretest_answer.id_pr_answer=tbl_pretest_question.choices');
    return $this->db->get_where('tbl_pretest_question',array('id_pr_question' => $id))->result();
  }

  public function getLastData($id_user){
    $data = array(
			'id_user' => $id_user
		);
  //  $this->db->join('tbl_pretest_question', 'tbl_pretest_result.id_pr_question=tbl_pretest_question.id_pr_question');
//    $this->db->join('tbl_cat', 'tbl_pretest_question.id_cat=tbl_cat.id_cat');
    $this->db->order_by('tbl_pretest_result.id_pr_question', 'DESC');
    $this->db->limit(1);
    return $this->db->get_where('tbl_pretest_result',$data)->result();
  }

  public function getPretestResult($id_user)  {
    $data = array(
			'id_user' => $id_user
		);
    return $this->db->get_where('tbl_pretest_result',$data);
  }

  public function countScore($id_user) {
    $this->db->select("(SELECT SUM(correct_status) FROM tbl_pretest_result
                        WHERE correct_status = 1 AND id_user='$id_user') AS count",FALSE);
	  return $this->db->get()->result();
  }

  public function checkResult($id_question,$id_user){
    $data = array(
			'id_pr_question' => $id_question,
			'id_user' => $id_user
		);
    return $this->db->get_where('tbl_pretest_result',$data);
  }

  public function insertAnswer($data) {
    $this->db->insert('tbl_pretest_result',$data);
  }

  public function updateAnswer($updateData, $where) {
    $this->db->set($updateData);
    $this->db->where($where);
    $this->db->update('tbl_pretest_result');
  }

  public function updateImage($data, $where) {
    $this->db->set($data);
    $this->db->where($where);
    $this->db->update('tbl_pretest_answer');
  }
}
