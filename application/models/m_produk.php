<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_produk extends CI_Model {

	public function all(){
		//query semua record di table produk
		$hasil = $this->db->get('produk');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}
	
	public function find($produk_id){
		//Query mencari record berdasarkan produk_id-nya
		$hasil = $this->db->where('produk_id', $produk_id)
						  ->limit(1)
						  ->get('produk');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
	public function create($data_produk){
		//Query INSERT INTO
		$this->db->insert('produk', $data_produk);
	}

	public function update($produk_id, $data_produk){
		//Query UPDATE FROM ... WHERE produk_id=...
		$this->db->where('produk_id', $produk_id)
				 ->update('produk', $data_produk);
	}
	
	public function delete($produk_id){
		//Query DELETE ... WHERE produk_id=...
		$this->db->where('produk_id', $produk_id)
				 ->delete('produk');
	}
	
}