<?php
class M_pelanggan extends CI_Model {
	
	function __contsruct(){
		parent::Model();
	}
	
	function cek_login($where){
		$data = "";
		$this->db->select("*");
		$this->db->from("pelanggan");
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
					'pelanggan_id' 	=> $data->pelanggan_id,
					'pelanggan_username' 	=> $data->pelanggan_username,
					'pelanggan_nama' 	=> $data->pelanggan_nama,
					'pelanggan_alamat' 	=> $data->pelanggan_alamat,
					'pelanggan_notlp' 	=> $data->pelanggan_noelp,
					'logged_in2'		=> TRUE
					);
		$this->session->set_userdata($session);
	}
	
	function update_log($where){
		$where['pelanggan_id'] = $data->pelanggan_id;
		$where['pelanggan_username'] = $data->pelanggan_username;
		$where['pelanggan_nama'] = $data->pelanggan_nama;
		$this->db->update('pelanggan',$data,$where);
	}
	
	function remov_session() {
		$session = array(
					'pelanggan_id'  =>'',
					'pelanggan_username'  =>'',
					'pelanggan_nama' =>'',
					'pelanggan_alamat'  =>'',
					'pelanggan_notlp' =>'',
					'logged_in2'	  => FALSE
					);
		$this->session->unset_userdata($session);
	}
		
	
}