<?php
class m_posttest extends CI_Model{

  public function getFirstQuestion(){
    $this->db->from('tbl_posttest_question');
  //  $this->db->join('tbl_cat', 'tbl_cat.id_cat=tbl_posttest_question.id_cat');
    $this->db->join('tbl_level', 'tbl_level.id_level=tbl_posttest_question.id_level');
    $this->db->join('tbl_posttest_answer', 'tbl_posttest_answer.id_ps_answer=tbl_posttest_question.choices');
    return $this->db->get()->result();
	}

  public function getData($id) {
  //  $this->db->join('tbl_cat', 'tbl_cat.id_cat=tbl_posttest_question.id_cat');
    $this->db->join('tbl_level', 'tbl_level.id_level=tbl_posttest_question.id_level');
    $this->db->join('tbl_posttest_answer', 'tbl_posttest_answer.id_ps_answer=tbl_posttest_question.choices');
    return $this->db->get_where('tbl_posttest_question',array('id_ps_question' => $id))->result();
  }

  public function getLastData($id_user){
    $data = array(
			'id_user' => $id_user
		);
  //  $this->db->join('tbl_posttest_question', 'tbl tbl_posttest_question.id_ps_question=tbl_posttest_question.id_ps_question');
  //  $this->db->join('tbl_cat', 'tbl tbl_posttest_question.id_cat=tbl_cat.id_cat');
    $this->db->order_by('tbl_posttest_result.id_ps_question', 'DESC');
    $this->db->limit(1);
    return $this->db->get_where('tbl_posttest_result',$data)->result();
  }

  public function getPosttestResult($id_user)  {
    $data = array(
			'id_user' => $id_user
		);
    return $this->db->get_where('tbl_posttest_result',$data);
  }

  public function countScore($id_user) {
    $this->db->select("(SELECT SUM(correct_status) FROM tbl_posttest_result
                        WHERE correct_status = 1 AND id_user='$id_user') AS count",FALSE);
	  return $this->db->get()->result();
  }

  public function checkResult($id_question,$id_user){
    $data = array(
			'id_ps_question' => $id_question,
			'id_user' => $id_user
		);
    return $this->db->get_where('tbl_posttest_result',$data);
  }

  public function insertAnswer($data) {
    $this->db->insert('tbl_posttest_result',$data);
  }

  public function updateAnswer($updateData, $where) {
    $this->db->set($updateData);
    $this->db->where($where);
    $this->db->update('tbl_posttest_result');
  }

  public function updateImage($data, $where) {
    $this->db->set($data);
    $this->db->where($where);
    $this->db->update('tbl_posttest_answer');
  }
}
