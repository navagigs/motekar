<?php
class M_admin extends CI_Model  {

    public function __contsruct(){
        parent::Model();
    }
	 // FUNGSI PENCARIAN
    public function grid_all_pencarian($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("produk p");
        $this->db->join('kategori k', 'p.kategori_id= k.kategori_id', 'left');
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->or_like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
    
    public function count_all_pencarian($where="", $like=""){
        $this->db->select("*");
        $this->db->from("produk p");
        $this->db->join('kategori k', 'p.kategori_id= k.kategori_id', 'left');
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->or_like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }   

    // ================================================== MENU UTAMA ================================================== //    

    // KONFIGURASI TABEL pengiriman
    public function insert_pengiriman($data){
        $this->db->insert("pengiriman",$data);
    }
    
    public function update_pengiriman($where,$data){
        $this->db->update("pengiriman",$data,$where);
    }

    public function delete_pengiriman($where){
        $this->db->delete("pengiriman", $where);
    }

    public function get_pengiriman($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("pengiriman");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_pengiriman($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("pengiriman");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_pengiriman($where="", $like=""){
        $this->db->select("*");
        $this->db->from("pengiriman");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    

     // KONFIGURASI TABEL pesanan
    public function insert_pesanan($data){
        $this->db->insert("pesanan",$data);
    }
    
    public function update_pesanan($where,$data){
        $this->db->update("pesanan",$data,$where);
    }

    public function delete_pesanan($where){
        $this->db->delete("pesanan", $where);
    }

    public function get_pesanan($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("pesanan");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_pesanan($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("pesanan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_pesanan($where="", $like=""){
        $this->db->select("*");
        $this->db->from("pesanan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    
    
    // KONFIGURASI TABEL ukm
    public function insert_ukm($data){
        $this->db->insert("ukm",$data);
    }
    
    public function update_ukm($where,$data){
        $this->db->update("ukm",$data,$where);
    }

    public function delete_ukm($where){
        $this->db->delete("ukm", $where);
    }

    public function get_ukm($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("ukm");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_ukm($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("ukm");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_ukm($where="", $like=""){
        $this->db->select("*");
        $this->db->from("ukm");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    
    // KONFIGURASI TABEL kategori
	public function insert_kategori($data){
        $this->db->insert("kategori",$data);
    }
    
    public function update_kategori($where,$data){
        $this->db->update("kategori",$data,$where);
    }

    public function delete_kategori($where){
        $this->db->delete("kategori", $where);
    }

	public function get_kategori($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("kategori");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_kategori($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("kategori");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_kategori($where="", $like=""){
        $this->db->select("*");
        $this->db->from("kategori");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    
    //KONFIGURASI TABEL produk
	public function insert_produk($data){
        $this->db->insert("produk",$data);
    }
    
    public function update_produk($where,$data){
        $this->db->update("produk",$data,$where);
    }
	
	public function update_hits_produk($where){		
        $this->db->query("UPDATE produk SET produk_hits=produk_hits+1 WHERE produk_id=$where");
    }

    public function delete_produk($where){
        $this->db->delete("produk", $where);
    }

	public function get_produk($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("produk b");
		$this->db->join('kategori k', 'b.kategori_id= k.kategori_id', 'left');
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
	 public function grid_all_produk1($select, $sidx,$sord,$limit,$start,$where="", $like=""){
			$data = "";
			$this->db->select($select);
			$this->db->from("produk b");
			$this->db->join('kategori k', 'b.kategori_id= k.kategori_id', 'left');
            $this->db->join('ukuran u', 'b.ukuran_id= u.ukuran_id', 'left');
			if ($where){$this->db->where($where);}
			if ($like){
				foreach($like as $key => $value){ 
				$this->db->like($key, $value); 
				}
			}
			$names = array('nava', 'admin');
			$this->db->where_not_in('ukm_nama', $names);
			$this->db->order_by($sidx,$sord);
			$this->db->limit($limit,$start);
			$Q = $this->db->get();
			if ($Q->num_rows() > 0){
				$data=$Q->result();
			}
			$Q->free_result();
			return $data;
		}
		
    public function grid_all_produk($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("produk b");
		$this->db->join('kategori k', 'b.kategori_id= k.kategori_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
    public function grid_all_produk2($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "1";
        $this->db->select($select);
        $this->db->from("produk");
        if ($where){$this->db->where($where);}
        $this->db->order_by($sidx,"ASC");
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_produk($where="", $like=""){
        $this->db->select("*");
        $this->db->from("produk b");
		$this->db->join('kategori k', 'b.kategori_id= k.kategori_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
 
    public function count_all_produk2($where="", $like=""){
        $this->db->select("*");
        $this->db->from("produk");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
	
    //KONFIGURASI TABEL bukti
    public function insert_bukti($data){
        $this->db->insert("bukti",$data);
    }
    
    public function update_bukti($where,$data){
        $this->db->update("bukti",$data,$where);
    }
    

    public function delete_bukti($where){
        $this->db->delete("bukti", $where);
    }

    public function get_bukti($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("bukti b");
        $this->db->join('ukm u', 'b.ukm_nama= u.ukm_nama', 'left');
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }
     public function grid_all_bukti1($select, $sidx,$sord,$limit,$start,$where="", $like=""){
            $data = "";
            $this->db->select($select);
            $this->db->from("bukti b");
        $this->db->join('ukm u', 'b.ukm_nama= u.ukm_nama', 'left');
            if ($where){$this->db->where($where);}
            if ($like){
                foreach($like as $key => $value){ 
                $this->db->like($key, $value); 
                }
            }
            $names = array('nava', 'admin');
            $this->db->where_not_in('ukm_nama', $names);
            $this->db->order_by($sidx,$sord);
            $this->db->limit($limit,$start);
            $Q = $this->db->get();
            if ($Q->num_rows() > 0){
                $data=$Q->result();
            }
            $Q->free_result();
            return $data;
        }
        
    public function grid_all_bukti($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("bukti b");
        $this->db->join('ukm u', 'b.ukm_nama= u.ukm_nama', 'left');
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
    public function grid_all_bukti2($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "1";
        $this->db->select($select);
        $this->db->from("bukti");
        if ($where){$this->db->where($where);}
        $this->db->order_by($sidx,"ASC");
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_bukti($where="", $like=""){
        $this->db->select("*");
        $this->db->from("bukti b");
        $this->db->join('ukm u', 'b.ukm_nama= u.ukm_nama', 'left');
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
 
    public function count_all_bukti2($where="", $like=""){
        $this->db->select("*");
        $this->db->from("bukti");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    
     //KONFIGURASI TABEL Pelanggan
    public function insert_pelanggan($data){
        $this->db->insert("pelanggan",$data);
    }
    
    public function update_pelanggan($where,$data){
        $this->db->update("pelanggan",$data,$where);
    }
    
    public function delete_pelanggan($where){
        $this->db->delete("pelanggan", $where);
    }

    public function get_pelanggan($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("pelanggan p");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }
    public function grid_all_pelanggan($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("pelanggan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
   
        }
        
    public function count_all_pelanggan($where="", $like=""){
        $this->db->select("*");
        $this->db->from("pelanggan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    

	//CONFIGURATION TABLE admin
 // KONFIGURASI TABEL admin
    public function insert_admin($data){
        $this->db->insert("admin",$data);
    }
    
    public function update_admin($where,$data){
        $this->db->update("admin",$data,$where);
    }

    public function delete_admin($where){
        $this->db->delete("admin", $where);
    }

    public function get_admin($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("admin");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_admin($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("admin");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_admin($where="", $like=""){
        $this->db->select("*");
        $this->db->from("admin");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

      // KONFIGURASI TABEL invoices
    public function insert_invoices($data){
        $this->db->insert("invoices",$data);
    }
    
    public function update_invoices($where,$data){
        $this->db->update("invoices",$data,$where);
    }

    public function delete_invoices($where){
        $this->db->delete("invoices", $where);
    }

    public function get_invoices($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("invoices s");
        $this->db->join('pelanggan p', 's.pelanggan_username= p.pelanggan_username', 'left');
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_invoices($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("invoices s");
        $this->db->join('pelanggan p', 's.pelanggan_username= p.pelanggan_username', 'left');
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_invoices($where="", $like=""){
        $this->db->select("*");
        $this->db->from("invoices");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    // KONFIGURASI TABEL konfirmasi
    public function insert_konfirmasi($data){
        $this->db->insert("konfirmasi",$data);
    }
    
    public function update_konfirmasi($where,$data){
        $this->db->update("konfirmasi",$data,$where);
    }

    public function delete_konfirmasi($where){
        $this->db->delete("konfirmasi", $where);
    }

    public function get_konfirmasi($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("konfirmasi");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_konfirmasi($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("konfirmasi");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_konfirmasi($where="", $like=""){
        $this->db->select("*");
        $this->db->from("konfirmasi");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    
    // CONFIGURATION COMBO BOX WITH DATABASE WITH VALIDASI
	public function combo_box($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
		echo "<select name='$name' id='$name' onchange='$js' required class='form-control input-sm' style='width:$width'>";
		echo "<option value=''>".$label."</option>";
		$query = $this->db->query($table);
		foreach ($query->result() as $row){
			if ($pilihan == $row->$value){
				echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
			} else {
				echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
			}
		}
		echo "</select>";
	}
    
    // CONFIGURATION COMBO BOX WITH DATABASE NO VALIDASI
	public function combo_box2($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
		echo "<select name='$name' id='$name' onchange='$js' class='form-control input-sm' style='width:$width'>";
		echo "<option value=''>".$label."</option>";
		$query = $this->db->query($table);
		foreach ($query->result() as $row){
			if ($pilihan == $row->$value){
				echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
			} else {
				echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
			}
		}
		echo "</select>";
	}
	
	//CONFIGURATION CHECKBOX ARRAY WITH DATABASE
	public function checkbox($table, $name, $value, $name_value, $pilihan=''){
		$query = $this->db->query($table);
		$array_tag = explode(',', $pilihan);
		$ceked = "";
		foreach ($query->result() as $row){
			$ceked = (array_search($row->tag_id, $array_tag) === false)? '' : 'checked';
			echo "<label for='".$row->$value."'><input type='checkbox' class='icheck' name='$name' id='".$row->$value."' value='".$row->$value."' ".$ceked."/> ".$row->$name_value."</label> ";
		}
	}
	
	//CONFIGURATION CHECKBOX ARRAY WITH DATABASE
	public function checkbox_status($table, $name, $value, $name_value, $pilihan=''){
		$query = $this->db->query($table);
		$array_tag = explode(',', $pilihan);
		$ceked = "";
		foreach ($query->result() as $row){
			$ceked = (array_search($row->status_perkawinan_kode, $array_tag) === false)? '' : 'checked';
			echo "<input type='checkbox' name='$name' id='".$row->$value."' style='display: inline-block;' value='".$row->$value."' ".$ceked."/><label for='".$row->$value."' style='display: inline-block; margin-right: 10px;'>".$row->$name_value."</label>";
		}
	}
	
	//CONFIGURATION LIST ARRAY WITH DATABASE AND EXPLODE
	public function listarray($table, $name, $value, $name_value, $pilihan=''){
		$query = $this->db->query($table);
		$array_tag = explode(',', $pilihan);
		$ceked = "";
		foreach ($query->result() as $row){
			if (array_search($row->tag_id, $array_tag) === false) {
			} else {
			echo $row->$name_value.", ";
			}
		}
	}
	
	//CONFIGURATION LIST ARRAY WITH DATABASE AND EXPLODE
	public function tagsproduk($table, $name, $value, $name_value, $pilihan=''){
		$query = $this->db->query($table);
		$array_tag = explode(',', $pilihan);
		$ceked = "";
		foreach ($query->result() as $row){
			if (array_search($row->tag_id, $array_tag) === false) {
			} else {
			echo "<a href='".site_url()."news/tags/".$row->tag_id."' class='tag'>".$row->$name_value."</a> ";
			}
		}
	}
}