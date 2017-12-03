<?php
class M_login extends CI_Model {
	
	function __contsruct(){
		parent::Model();
	}
	
	function cek_login($where){
		$data = "";
		$this->db->select("*");
		$this->db->from("admin");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0) {
			$data = $Q->row();
			$this->set_session($data);
			return true;
		}
		return false;
	}
	
	function set_session(&$data){
		$session = array(
					'admin_username' 	=> $data->admin_username,
					'admin_password' 	=> $data->admin_password,
					'ukm_nama' 			=> $data->ukm_nama,
					'admin_level' 	=> $data->admin_level,
					'logged_in'		=> TRUE
					);
		$this->session->set_userdata($session);
	}
	
	function update_log($where){
		$where['admin_username'] = $data->admin_username;
		$where['ukm_nama'] = $data->ukm_nama;
		$this->db->update('admin',$data,$where);
	}
	
	function remov_session() {
		$session = array(
					'admin_username'  =>'',
					'admin_level' =>'',
					'logged_in'	  => FALSE
					);
		$this->session->unset_userdata($session);
	}
		
	
}