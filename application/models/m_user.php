<?php
class m_user extends CI_Model{

  public function getUser($id_user){
    $where = array(
      'id_user' => $id_user
    );
    return $this->db->get_where('tbl_user',$where)->result();
	}

  public function getLevelPretest($id_user){
    $data = array(
			'id_user' => $id_user
		);
    $this->db->join('tbl_level', 'tbl_level.id_level=tbl_user.result_pretest');
    return $this->db->get_where('tbl_user',$data)->result();
  }

  public function getLevelPosttest($id_user){
    $data = array(
      'id_user' => $id_user
    );
    $this->db->join('tbl_level', 'tbl_level.id_level=tbl_user.result_posttest');
    return $this->db->get_where('tbl_user',$data)->result();
  }

  public function check($username,$password){
		$data = array(
			'username' => $username,
			'password' => $password
		);
		return $this->db->get_where('tbl_user',$data);
	}

  public function updateResult($data, $where) {
    $this->db->set($data);
    $this->db->where($where);
    $this->db->update('tbl_user');
  }

  public function uploadUser($data) {
    $this->db->insert('tbl_user',$data);
  }
}
