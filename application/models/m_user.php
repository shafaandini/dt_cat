<?php
class m_user extends CI_Model{

  public function getUser($id_user){
		$where = array(
			'id_user' => $id_user
		);
		return $this->db->get_where('tbl_user',$where);
	}

  public function check($username,$password){
		$data = array(
			'username' => $username,
			'password' => $password
		);
		return $this->db->get_where('tbl_user',$data);
	}
}
