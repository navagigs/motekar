<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']		= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['dashboard_info']			= TRUE;
            $data['breadcrumb']             = 'Dashboard';
			$data['dashboard']				= 'admin/dashboard/statistik';
			$data['content']				= 'admin/dashboard/statistik';
			$data['jml_data_produk']			= $this->ADM->count_all_produk('');
			$data['jml_data_kategori']			= $this->ADM->count_all_kategori('');
			$data['jml_data_admin']		= $this->ADM->count_all_admin('');
			$data['jml_data_invoices']		= $this->ADM->count_all_invoices('');
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("internal"); }
	 }

	  // produk
    public function produk($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_username']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'produk';
			$data['content']				= 'admin/content/website/produk';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '79';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('produk_nama' => 'nama',
													'kategori_id'  => 'kategori',
													'produk_gambar' => 'Gambar');
			if($data['action']	== 'view') {	
				$data['berdasarkan']		= array('produk_nama'=>'Nama Produk');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'produk_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_produk[$data['cari']]	= $data['q'];			
				$data['jml_data']			= $this->ADM->count_all_produk('', $like_produk);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'produk_nama';
				$data['produk_id']			= ($this->input->post('produk_id'))?$this->input->post('produk_id'):'';
				$data['produk_nama']		= ($this->input->post('produk_nama'))?$this->input->post('produk_nama'):'';
				$data['produk_harga']		= ($this->input->post('produk_harga'))?$this->input->post('produk_harga'):'';
				$data['produk_diskon']		= ($this->input->post('produk_diskon'))?$this->input->post('produk_diskon'):'';
				$data['produk_stok']		= ($this->input->post('produk_stok'))?$this->input->post('produk_stok'):'';
				$data['produk_gambar']		= ($this->input->post('produk_gambar'))?$this->input->post('produk_gambar'):'';
				//$data['produk_deskripsi']		= ($this->input->post('produk_deskripsi'))?$this->input->post('produk_deskripsi'):'';
				$data['kategori_id']		= ($this->input->post('kategori_id'))?$this->input->post('kategori_id'):'';
				$data['ukm_nama']			= $this->session->userdata('ukm_nama');
				$data['produk_waktu']		= date("Y-m-d H:i:s");	
				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$total_diskon = (($data['produk_harga'] * $data['produk_diskon']) / 100);
                     $total = $data['produk_harga'] - $total_diskon;
					$gambar = upload_image("produk_gambar", "./assets/images/produk/", "230x160", seo($data['produk_nama']));
					$data['produk_gambar']		 = $gambar;
					$insert['produk_nama']		 = $data['produk_nama'];
					$insert['produk_harga']	 	 = $total;
					$insert['produk_diskon']	 = $data['produk_diskon'];
					$insert['produk_stok']	 	= $data['produk_stok'];
					if ($data['produk_gambar']) { $insert['produk_gambar'] = $data['produk_gambar']; }
					$insert['produk_waktu']		 = $data['produk_waktu'];
					$insert['kategori_id']		 = $data['kategori_id'];
				//	$insert['produk_deskripsi']	 	= $data['produk_deskripsi'];
					$insert['ukm_nama']		 = $data['ukm_nama'];
					$this->ADM->insert_produk($insert);
					$this->session->set_flashdata('success','produk telah berhasil ditambahkan!,');
					redirect("admin/produk");
				}
			} elseif ($data['action']	== 'edit') {
				$where['produk_id'] 			= $filter2;
				$data['onload']				= 'produk_nama';
				$where_produk['produk_id']	= $filter2;
				$produk 					= $this->ADM->get_produk('*', $where_produk);
				$data['produk_id']			= ($this->input->post('produk_id'))?$this->input->post('produk_id'):$produk->produk_id;	
				$data['produk_nama']		= ($this->input->post('produk_nama'))?$this->input->post('produk_nama'):$produk->produk_nama;
				$data['produk_harga']			= ($this->input->post('produk_harga'))?$this->input->post('produk_harga'):$produk->produk_harga;
				$data['produk_diskon']			= ($this->input->post('produk_diskon'))?$this->input->post('produk_diskon'):$produk->produk_diskon;	
				$data['produk_stok']			= ($this->input->post('produk_stok'))?$this->input->post('produk_stok'):$produk->produk_stok;	
				$data['produk_waktu']		= ($this->input->post('produk_waktu'))?$this->input->post('produk_waktu'):$produk->produk_waktu;	
				$data['produk_gambar']		= ($this->input->post('produk_gambar'))?$this->input->post('produk_gambar'):$produk->produk_gambar;	
				$data['kategori_id']		= ($this->input->post('kategori_id'))?$this->input->post('kategori_id'):$produk->kategori_id;	
				//$data['produk_deskripsi']		= ($this->input->post('produk_deskripsi'))?$this->input->post('produk_deskripsi'):$produk->produk_deskripsi;	
				$simpan						= $this->input->post('simpan');
				if ($simpan) {

					$total_diskon = (($data['produk_harga'] * $data['produk_diskon']) / 100);
                     $total = $data['produk_harga'] - $total_diskon;
					$gambar = upload_image("produk_gambar", "./assets/images/produk/", "230x160", seo($data['produk_nama']));
					$data['produk_gambar']		= $gambar;
					$where_edit['produk_id']	= $data['produk_id'];
					$edit['produk_nama']		= $data['produk_nama'];
					$edit['produk_harga']			= $total;
					$edit['produk_diskon']			= $data['produk_diskon'];
					//$edit['produk_deskripsi']			= $data['produk_deskripsi'];
					$edit['produk_stok']			= $data['produk_stok'];
					if ($data['produk_gambar']) {
						$row = $this->ADM->get_produk('*', $where_edit);
						@unlink('./assets/images/produk/'.$row->produk_gambar);
						@unlink('./assets/images/produk/kecil_'.$row->produk_gambar);
						$edit['produk_gambar']	= $data['produk_gambar']; 
					}
					$edit['kategori_id']		= $data['kategori_id'];
					$this->ADM->update_produk($where_edit, $edit);
					$this->session->set_flashdata('success','produk telah berhasil diedit!,');
					redirect('admin/produk');	
					}	
		 } elseif ($data['action']	== 'hapus') {
			 $where['produk_id']	=$filter2;
			 $row = $this->ADM->get_produk('*', $where);
			 @unlink ('./assets/images/produk/'.$row->produk_gambar);
			 @unlink ('./assets/images/produk/kecil_'.$row->produk_gambar);
			 $this->ADM->delete_produk($where);
			 $this->session->set_flashdata('warning','produk telah berhasil dihapus!,');
			 redirect("admin/produk");
	     }
			 $this->load->vars($data);
			 $this->load->view('admin/home');
	  } else {
		  redirect("internal");
	  }
	}


    public function produk_detail($produk_id='')
    {
        if($this->session->userdata('logged_in') == TRUE) {
            $where_admin['admin_username']  = $this->session->userdata('admin_username');
            $data['admin']              = $this->ADM->get_admin('', $where_admin);
            $where_produk['produk_id']  = $produk_id;
            $data['produk']             = $this->ADM->get_produk('*', $where_produk);
            $data['action']             = 'detail';
            $this->load->vars($data);
            $this->load->view('admin/content/website/produk');
      } else {
          redirect("internal");
      }
    }
    
     public function kategori($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_username']		= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'kategori produk';
			$data['content']				= 'admin/content/website/kategori';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('kategori_nama'=>'nama');
			if($data['action'] == 'view') {
				$data['berdasarkan']		= array('kategori_nama'=>'Nama');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'kategori_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_kategori[$data['cari']]	= $data['q'];			
				$data['jml_data']			= $this->ADM->count_all_kategori('', $like_kategori);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
			
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'kategori_nama';
				$data['kategori_nama']		= ($this->input->post('kategori_nama'))?$this->input->post('kategori_nama'):'';	
				$simpan						= $this->input->post('simpan');
				if($simpan){
					$insert['kategori_nama']	= $data['kategori_nama'];
					$this->ADM->insert_kategori($insert);
					$this->session->set_flashdata('success','kategori produk telah berhasil ditambahkan!,');
					redirect("admin/kategori");
				}
			} elseif ($data['action']	== 'edit') {
				$where['kategori_id'] 		= $filter2;
				$data['onload']					= 'kategori_nama';
				$where_kategori['kategori_id']	= $filter2;
				$kategori						= $this->ADM->get_kategori('', $where_kategori);
				$data['kategori_id']			= ($this->input->post('kategori_id'))?$this->input->post('kategori_id'):$kategori->kategori_id;
				$data['kategori_nama']			= ($this->input->post('kategori_nama'))?$this->input->post('kategori_nama'):$kategori->kategori_nama;
				$simpan							= $this->input->post('simpan');
				
				if($simpan) {
					$where_edit['kategori_id']	= $data['kategori_id'];
					$edit['kategori_nama']		= $data['kategori_nama'];
					$this->ADM->update_kategori($where_edit, $edit);
					$this->session->set_flashdata('success','kategori produk telah berhasil diedit!,');
					redirect("admin/kategori");
				}
			} elseif ($data['action'] == 'hapus') {
				$where_delete['kategori_id'] = $filter2;
				$this->ADM->delete_kategori($where_delete);
				$this->session->set_flashdata('warning','kategori produk telah berhasil dihapus!,');
				redirect("admin/kategori");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("internal");		 	
			}
				
	}

	  public function kategori_detail($kategori_id='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']						= $this->ADM->get_admin('',$where_admin);
			$where_kategori['kategori_id']		= $kategori_id;
			$data['kategori']					= $this->ADM->get_kategori('',$where_kategori);
			$data['action']						= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/website/kategori');
		} else {
			redirect("internal");
		}
	}


	

	//FUNGSI admin
    public function pegawai ($filter1='', $filter2='', $filter3='')
    {
        if($this->session->userdata('logged_in') == TRUE){
            $where_admin['admin_username']  = $this->session->userdata('admin_username');
            $data['admin']                    = $this->ADM->get_admin('',$where_admin);
            $data['dashboard_info']         	= FALSE;
            $data['breadcrumb']             	= 'admin';
            $data['content']                    = '/admin/content/website/admin';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('kategori_nama'=>'nama');
			if($data['action'] == 'view') {
				$data['berdasarkan']		= array('ukm_nama'=>'Nama');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'ukm_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_admin[$data['cari']]	= $data['q'];			
				$data['jml_data']			= $this->ADM->count_all_admin('', $like_admin);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
			
			} elseif ($data['action']   == 'tambah') {
                $data['onload']             = 'ukm_nama';
                $data['admin_id']          = ($this->input->post('admin_id'))?$this->input->post('admin_id'):'';
                $data['admin_username']     = ($this->input->post('admin_username'))?$this->input->post('admin_username'):'';               
                $data['admin_password']     = ($this->input->post('admin_password'))?$this->input->post('admin_password'):'';          
                $data['ukm_nama']         = ($this->input->post('ukm_nama'))?$this->input->post('ukm_nama'):'';          
                $data['admin_level']            = ($this->input->post('admin_level'))?$this->input->post('admin_level'):'';     
                $simpan                     = $this->input->post('simpan');
                if($simpan){
                    $insert['admin_id']    = $data['admin_id'];
                    $insert['admin_username']    = $data['admin_username'];
                    $insert['admin_password']= md5($data['admin_password']);
                    $insert['ukm_nama']   = $data['ukm_nama'];
                    $insert['admin_level']  = $data['admin_level'];
                    $this->ADM->insert_admin($insert);
                    $this->session->set_flashdata('success','admin telah berhasil ditambahkan!,');
                    redirect("admin/pegawai");
                }
            } elseif ($data['action']   == 'edit') {
                $where['admin_id']         = $filter2;
                $data['onload']             = 'ukm_nama';
                $admin                      = $this->ADM->get_admin('', $where);
                $data['admin_id']          = ($this->input->post('admin_id'))?$this->input->post('admin_id'):$admin->admin_id;
                $data['admin_username']     = ($this->input->post('admin_username'))?$this->input->post('admin_username'):$admin->admin_username;
                $data['admin_password']     = ($this->input->post('admin_password'))?$this->input->post('admin_password'):$admin->admin_password;
                $data['ukm_nama']         = ($this->input->post('ukm_nama'))?$this->input->post('ukm_nama'):$admin->ukm_nama;
                $data['admin_level']            = ($this->input->post('admin_level'))?$this->input->post('admin_level'):$admin->admin_level;
                $simpan                         = $this->input->post('simpan');
                if($simpan) {
                    $where_edit['admin_id']    = $data['admin_id'];
                    if($data['admin_password'] == $data['admin_password']) {
                    $where_edit['admin_id']    = $data['admin_id'];
                        if($data['admin_password'] <> '') {
                            $edit['admin_password']     = do_hash(($data['admin_password']), 'md5'); 
                        }
                    }
                    $edit['admin_username']        = $data['admin_username'];
                    $edit['ukm_nama']            = $data['ukm_nama'];
                    $edit['admin_level']           =$data['admin_level'];
                    $this->ADM->update_admin($where_edit, $edit);
                    $this->session->set_flashdata('success','admin telah berhasil diedit!,');
                    redirect("admin/pegawai");
                }
            } elseif ($data['action'] == 'hapus') {
                $where_delete['admin_id'] = $filter2;
                $this->ADM->delete_admin($where_delete);
                $this->session->set_flashdata('warning','admin telah berhasil dihapus!,');
                redirect("admin/pegawai");
            }
            $this->load->vars($data);
            $this->load->view('admin/home');
         } else {
             redirect("internal");           
            }
        }


    public function pelanggan ($filter1='', $filter2='', $filter3='')
    {
        if($this->session->userdata('logged_in') == TRUE){
            $where_admin['admin_username']  = $this->session->userdata('admin_username');
            $data['admin']                    = $this->ADM->get_admin('',$where_admin);
            $data['dashboard_info']         	= FALSE;
            $data['breadcrumb']             	= 'Pelanggan';
            $data['content']                    = '/admin/content/website/pelanggan';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('kategori_nama'=>'nama');
			if($data['action'] == 'view') {
				$data['berdasarkan']		= array('pelanggan_nama'=>'Nama');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'pelanggan_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_pelanggan[$data['cari']]	= $data['q'];			
				$data['jml_data']			= $this->ADM->count_all_pelanggan('', $like_pelanggan);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
			
			} elseif ($data['action']   == 'tambah') {
                $data['onload']             = 'pelanggan_nama';
                $data['pelanggan_id']          = ($this->input->post('pelanggan_id'))?$this->input->post('pelanggan_id'):'';
                $data['pelanggan_username']     = ($this->input->post('pelanggan_username'))?$this->input->post('pelanggan_username'):'';               
                $data['pelanggan_password']     = ($this->input->post('pelanggan_password'))?$this->input->post('pelanggan_password'):'';          
                $data['pelanggan_nama']         = ($this->input->post('pelanggan_nama'))?$this->input->post('pelanggan_nama'):'';       
                $data['pelanggan_alamat']        = ($this->input->post('pelanggan_alamat'))?$this->input->post('pelanggan_alamat'):'';     
                $data['pelanggan_notlp']            = ($this->input->post('pelanggan_notlp'))?$this->input->post('pelanggan_notlp'):'';     
                $simpan                     = $this->input->post('simpan');
                if($simpan){
                    $insert['pelanggan_id']    		= $data['pelanggan_id'];
                    $insert['pelanggan_username']   = $data['pelanggan_username'];
                    $insert['pelanggan_password']	= md5($data['pelanggan_password']);
                    $insert['pelanggan_nama']   	= $data['pelanggan_nama'];
                    $insert['pelanggan_alamat']  	= $data['pelanggan_alamat'];
                    $insert['pelanggan_notlp']  	= $data['pelanggan_notlp'];
                    $this->ADM->insert_pelanggan($insert);
                    $this->session->set_flashdata('success','pelanggan telah berhasil ditambahkan!,');
                    redirect("admin/pelanggan");
                }
            } elseif ($data['action']   == 'edit') {
                $where['pelanggan_id']         = $filter2;
                $data['onload']             = 'pelanggan_nama';
                $pelanggan                      = $this->ADM->get_pelanggan('', $where);
                $data['pelanggan_id']          = ($this->input->post('pelanggan_id'))?$this->input->post('pelanggan_id'):$pelanggan->pelanggan_id;
                $data['pelanggan_username']     = ($this->input->post('pelanggan_username'))?$this->input->post('pelanggan_username'):$pelanggan->pelanggan_username;
                $data['pelanggan_password']     = ($this->input->post('pelanggan_password'))?$this->input->post('pelanggan_password'):$pelanggan->pelanggan_password;
                $data['pelanggan_nama']         = ($this->input->post('pelanggan_nama'))?$this->input->post('pelanggan_nama'):$pelanggan->pelanggan_nama;
                $data['pelanggan_alamat']        = ($this->input->post('pelanggan_alamat'))?$this->input->post('pelanggan_alamat'):$pelanggan->pelanggan_alamat;
                $data['pelanggan_notlp']            = ($this->input->post('pelanggan_notlp'))?$this->input->post('pelanggan_notlp'):$pelanggan->pelanggan_notlp;
                $simpan                         = $this->input->post('simpan');
                if($simpan) {
                    $where_edit['pelanggan_id']    = $data['pelanggan_id'];
                    if($data['pelanggan_password'] == $data['pelanggan_password']) {
                    $where_edit['pelanggan_id']    = $data['pelanggan_id'];
                        if($data['pelanggan_password'] <> '') {
                            $edit['pelanggan_password']     = do_hash(($data['pelanggan_password']), 'md5'); 
                        }
                    }
                    $edit['pelanggan_username']     = $data['pelanggan_username'];
                    $edit['pelanggan_nama']         = $data['pelanggan_nama'];
                    $edit['pelanggan_alamat']       = $data['pelanggan_alamat'];
                    $edit['pelanggan_notlp']        = $data['pelanggan_notlp'];
                    $this->ADM->update_pelanggan($where_edit, $edit);
                    $this->session->set_flashdata('success','pelanggan telah berhasil diedit!,');
                    redirect("admin/pelanggan");
                }
            } elseif ($data['action'] == 'hapus') {
                $where_delete['pelanggan_id'] = $filter2;
                $this->ADM->delete_pelanggan($where_delete);
                $this->session->set_flashdata('warning','pelanggan telah berhasil dihapus!,');
                redirect("admin/pelanggan");
            }
            $this->load->vars($data);
            $this->load->view('admin/home');
         } else {
             redirect("internal");           
            }
        }
    
    public function pesanan($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_username']		= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Pesanan';
			$data['content']				= 'admin/content/website/pesanan';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('invoices_id'=>'NO.INVOICES');
			if($data['action'] == 'view') {
				$data['berdasarkan']		= array('invoices_id'=>'NO.INVOICES');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'invoices_id';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_invoices[$data['cari']]	= $data['q'];			
				$data['jml_data']			= $this->ADM->count_all_invoices('', $like_invoices);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
			
			} elseif($data['action'] == 'detail') {
				$where['invoices_id']         = $filter2;
                $data['onload']             = 'invoices_id';
                $invoices                     = $this->ADM->get_invoices('', $where);
                $data['invoices_id']          = ($this->input->post('invoices_id'))?$this->input->post('invoices_id'):$invoices->invoices_id;
                $data['invoices_subtotal']          = ($this->input->post('invoices_subtotal'))?$this->input->post('invoices_subtotal'):$invoices->invoices_subtotal;
                $data['invoices_date']          = ($this->input->post('invoices_date'))?$this->input->post('invoices_date'):$invoices->invoices_date;
                $data['pelanggan_nama']          = ($this->input->post('pelanggan_nama'))?$this->input->post('pelanggan_nama'):$invoices->pelanggan_nama;
                $data['pelanggan_alamat']          = ($this->input->post('pelanggan_alamat'))?$this->input->post('pelanggan_alamat'):$invoices->pelanggan_alamat;
                $data['pelanggan_notlp']          = ($this->input->post('pelanggan_notlp'))?$this->input->post('pelanggan_notlp'):$invoices->pelanggan_notlp;
			
			}elseif ($data['action'] == 'status'){
				$where['invoices_id'] 			= $filter2;
				$data['onload']					= 'invoices_status';
				$where_invoices['invoices_id']	= $filter2;
				$invoices					= $this->ADM->get_invoices('', $where_invoices);
				$data['invoices_id']			= ($this->input->post('invoices_id'))?$this->input->post('invoices_id'):$invoices->invoices_id;
				$data['invoices_status']			= ($this->input->post('invoices_status'))?$this->input->post('invoices_status'):$invoices->invoices_status;
				$simpan							= $this->input->post('simpan');
				
				if($simpan) {
					$where_edit['invoices_id']	= $data['invoices_id'];
					$edit['invoices_status']		= $data['invoices_status'];
					$this->ADM->update_invoices($where_edit, $edit);
					$this->session->set_flashdata('success','Status invoices telah berhasil diedit!,');
					redirect("admin/pesanan");
				}
			} elseif ($data['action']	== 'hapus') {
			 $where['invoices_id']	=$filter2;
			 $row = $this->ADM->get_invoices('*', $where);
			 $this->ADM->delete_invoices($where);
			 $this->session->set_flashdata('warning','Pesanan telah berhasil dihapus!,');
			 redirect("admin/pesanan");
	     }
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("internal");		 	
			}
				
	}


	 public function konfirmasi($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_username']		= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Konfirmasi Pembayaran';
			$data['content']				= 'admin/content/website/konfirmasi';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('invoices_id'=>'NO.INVOICES');
			if($data['action'] == 'view') {
				$data['berdasarkan']		= array('invoices_id'=>'NO.INVOICES');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'invoices_id';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_invoices[$data['cari']]	= $data['q'];			
				$data['jml_data']			= $this->ADM->count_all_konfirmasi('', $like_invoices);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
			
			} elseif($data['action'] == 'detail') {
				 $where['invoices_id']         = $filter2;
                $data['onload']             = 'invoices_id';
                $invoices                     = $this->ADM->get_invoices('', $where);
                $data['invoices_id']          = ($this->input->post('invoices_id'))?$this->input->post('invoices_id'):$invoices->invoices_id;
                $data['invoices_subtotal']          = ($this->input->post('invoices_subtotal'))?$this->input->post('invoices_subtotal'):$invoices->invoices_subtotal;
                $data['invoices_date']          = ($this->input->post('invoices_date'))?$this->input->post('invoices_date'):$invoices->invoices_date;
                $data['pelanggan_nama']          = ($this->input->post('pelanggan_nama'))?$this->input->post('pelanggan_nama'):$invoices->pelanggan_nama;
                $data['pelanggan_alamat']          = ($this->input->post('pelanggan_alamat'))?$this->input->post('pelanggan_alamat'):$invoices->pelanggan_alamat;
                $data['pelanggan_notlp']          = ($this->input->post('pelanggan_notlp'))?$this->input->post('pelanggan_notlp'):$invoices->pelanggan_notlp;
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("internal");		 	
			}
				
	}


	  public function pengiriman($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_username']		= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'pengiriman produk';
			$data['content']				= 'admin/content/website/pengiriman';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('pelanggan_nama'=>'nama');
			if($data['action'] == 'view') {
				$data['berdasarkan']		= array('pelanggan_nama'=>'Nama');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'pelanggan_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_pengiriman[$data['cari']]	= $data['q'];			
				$data['jml_data']			= $this->ADM->count_all_pengiriman('', $like_pengiriman);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
			
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'pelanggan_nama';
				$data['pelanggan_nama']		= ($this->input->post('pelanggan_nama'))?$this->input->post('pelanggan_nama'):'';	
				$data['pengiriman_noresi']	= ($this->input->post('pengiriman_noresi'))?$this->input->post('pengiriman_noresi'):'';	
				$data['pengiriman_via']		= ($this->input->post('pengiriman_via'))?$this->input->post('pengiriman_via'):'';	
				$data['invoices_id']	= ($this->input->post('invoices_id'))?$this->input->post('invoices_id'):'';	
				$simpan						= $this->input->post('simpan');
				if($simpan){
					$insert['pelanggan_nama']		= $data['pelanggan_nama'];
					$insert['pengiriman_noresi']	= $data['pengiriman_noresi'];
					$insert['pengiriman_via']		= $data['pengiriman_via'];
					$insert['invoices_id']			= $data['invoices_id'];
					$this->ADM->insert_pengiriman($insert);
					$this->session->set_flashdata('success','pengiriman produk telah berhasil ditambahkan!,');
					redirect("admin/pengiriman");
				}
			} elseif ($data['action']	== 'edit') {
				$where['pengiriman_id'] 		= $filter2;
				$data['onload']					= 'pelanggan_nama';
				$where_pengiriman['invoices_id']	= $filter2;
				$pengiriman						= $this->ADM->get_pengiriman('', $where_pengiriman);
				$data['pengiriman_id']			= ($this->input->post('pengiriman_id'))?$this->input->post('pengiriman_id'):$pengiriman->pengiriman_id;
				$data['pelanggan_nama']			= ($this->input->post('pelanggan_nama'))?$this->input->post('pelanggan_nama'):$pengiriman->pelanggan_nama;
				$data['pengiriman_noresi']			= ($this->input->post('pengiriman_noresi'))?$this->input->post('pengiriman_noresi'):$pengiriman->pengiriman_noresi;
				$data['pengiriman_via']			= ($this->input->post('pengiriman_via'))?$this->input->post('pengiriman_via'):$pengiriman->pengiriman_via;
				$data['pengiriman_status']			= ($this->input->post('pengiriman_status'))?$this->input->post('pengiriman_status'):$pengiriman->pengiriman_status;
				$data['invoices_id']			= ($this->input->post('invoices_id'))?$this->input->post('invoices_id'):$pengiriman->invoices_id;
				$simpan							= $this->input->post('simpan');
				
				if($simpan) {
					$where_edit['pengiriman_id']	= $data['pengiriman_id'];
					$edit['pelanggan_nama']			= $data['pelanggan_nama'];
					$edit['pengiriman_noresi']		= $data['pengiriman_noresi'];
					$edit['pengiriman_via']			= $data['pengiriman_via'];
					$edit['pengiriman_status']		= $data['pengiriman_status'];
					$this->ADM->update_pengiriman($where_edit, $edit);
					$this->session->set_flashdata('success','pengiriman produk telah berhasil ditambahkan!,');
					redirect("admin/pesanan");
				}
			} elseif ($data['action'] == 'hapus') {
				$where_delete['pengiriman_id'] = $filter2;
				$this->ADM->delete_pengiriman($where_delete);
				$this->session->set_flashdata('warning','pengiriman produk telah berhasil dihapus!,');
				redirect("admin/pengiriman");

			}elseif ($data['action'] == 'status'){
				$where_edit['pengiriman_id']	= $filter2; 
				if ($filter3 == 'Y') {
					$edit['pengiriman_status'] = 'N';
				} else {
 					$edit['pengiriman_status']= 'Y';
				}
				$this->ADM->update_pengiriman($where_edit, $edit);
				$this->session->set_flashdata('success','Status Pengiriman telah berhasil diedit!,');
				redirect("admin/pengiriman");
			}

			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("internal");		 	
			}
				
	}

	  public function pengiriman_detail($pengiriman_id='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']						= $this->ADM->get_admin('',$where_admin);
			$where_pengiriman['pengiriman_id']		= $pengiriman_id;
			$data['pengiriman']					= $this->ADM->get_pengiriman('',$where_pengiriman);
			$data['action']						= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/website/pengiriman');
		} else {
			redirect("internal");
		}
	}


	  public function ukm($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_username']		= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'ukm produk';
			$data['content']				= 'admin/content/website/ukm';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('ukm_nama'=>'nama');
			if($data['action'] == 'view') {
				$data['berdasarkan']		= array('ukm_nama'=>'Nama');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'ukm_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_ukm[$data['cari']]	= $data['q'];			
				$data['jml_data']			= $this->ADM->count_all_ukm('', $like_ukm);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
			
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'ukm_nama';
				$data['ukm_nama']		= ($this->input->post('ukm_nama'))?$this->input->post('ukm_nama'):'';	
				$simpan						= $this->input->post('simpan');
				if($simpan){
					$insert['ukm_nama']	= $data['ukm_nama'];
					$this->ADM->insert_ukm($insert);
					$this->session->set_flashdata('success','ukm produk telah berhasil ditambahkan!,');
					redirect("admin/ukm");
				}
			} elseif ($data['action']	== 'edit') {
				$where['ukm_id'] 		= $filter2;
				$data['onload']					= 'ukm_nama';
				$where_ukm['ukm_id']	= $filter2;
				$ukm						= $this->ADM->get_ukm('', $where_ukm);
				$data['ukm_id']			= ($this->input->post('ukm_id'))?$this->input->post('ukm_id'):$ukm->ukm_id;
				$data['ukm_nama']			= ($this->input->post('ukm_nama'))?$this->input->post('ukm_nama'):$ukm->ukm_nama;
				$simpan							= $this->input->post('simpan');
				
				if($simpan) {
					$where_edit['ukm_id']	= $data['ukm_id'];
					$edit['ukm_nama']		= $data['ukm_nama'];
					$this->ADM->update_ukm($where_edit, $edit);
					$this->session->set_flashdata('success','ukm produk telah berhasil diedit!,');
					redirect("admin/ukm");
				}
			} elseif ($data['action'] == 'hapus') {
				$where_delete['ukm_id'] = $filter2;
				$this->ADM->delete_ukm($where_delete);
				$this->session->set_flashdata('warning','ukm produk telah berhasil dihapus!,');
				redirect("admin/ukm");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("internal");		 	
			}
				
	}
	
	   public function transaksi_ukm($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_username']		= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Transaksi yang terjual UKM';
			$data['content']				= 'admin/content/website/transaksi_ukm';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('ukm_nama'=>'nama');
			if($data['action'] == 'view') {
				$data['berdasarkan']		= array('ukm_nama'=>'Nama');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'ukm_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_transaksi_ukm[$data['cari']]	= $data['q'];			
				$data['jml_data']			= $this->ADM->count_all_ukm('', $like_transaksi_ukm);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
		
			} elseif ($data['action'] == 'detail') {
				$where['ukm_nama']         = $filter2;
                $data['onload']             = 'ukm_nama';
                $pesanan                     = $this->ADM->get_pesanan('', $where);
                $data['ukm_nama']          = ($this->input->post('ukm_nama'))?$this->input->post('ukm_nama'):$pesanan->ukm_nama;
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("internal");		 	
			}
				
	}

	  // bukti
    public function bukti($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_username']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'bukti';
			$data['content']				= 'admin/content/website/bukti';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '79';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('ukm_nama' => 'nama',
													'bukti_deskripsi' => 'Deskripsi',
													'bukti_gambar' => 'Gambar');
			if($data['action']	== 'view') {	
				$data['berdasarkan']		= array('bukti_id'=>'Nama UKM');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'bukti_id';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_bukti[$data['cari']]	= $data['q'];			
				$data['jml_data']			= $this->ADM->count_all_bukti('', $like_bukti);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'ukm_nama';
				$data['bukti_id']			= ($this->input->post('bukti_id'))?$this->input->post('bukti_id'):'';
				$data['bukti_gambar']		= ($this->input->post('bukti_gambar'))?$this->input->post('bukti_gambar'):'';
				$data['ukm_nama']		= ($this->input->post('ukm_nama'))?$this->input->post('ukm_nama'):'';
				$data['bukti_pendapatan']		= ($this->input->post('bukti_pendapatan'))?$this->input->post('bukti_pendapatan'):'';
				$data['bukti_tanggal']		= date("Y-m-d H:i:s");	
				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$total_diskon = (($data['bukti_harga'] * $data['bukti_diskon']) / 100);
                     $total = $data['bukti_harga'] - $total_diskon;
					$gambar = upload_image("bukti_gambar", "./assets/images/bukti/", "230x160", seo($data['ukm_nama']));
					$data['bukti_gambar']		 = $gambar;
					if ($data['bukti_gambar']) { $insert['bukti_gambar'] = $data['bukti_gambar']; }
					$insert['bukti_tanggal']		 = $data['bukti_tanggal'];
					$insert['bukti_pendapatan']		 = $data['bukti_pendapatan'];
					$insert['ukm_nama']		 = $data['ukm_nama'];
					$this->ADM->insert_bukti($insert);
					$this->session->set_flashdata('success','bukti telah berhasil ditambahkan!,');
					redirect("admin/bukti");
				}
			} elseif ($data['action']	== 'edit') {
				$where['bukti_id'] 			= $filter2;
				$data['onload']				= 'ukm_nama';
				$where_bukti['bukti_id']	= $filter2;
				$bukti 					= $this->ADM->get_bukti('*', $where_bukti);
				$data['bukti_id']			= ($this->input->post('bukti_id'))?$this->input->post('bukti_id'):$bukti->bukti_id;	
				$data['bukti_tanggal']		= ($this->input->post('bukti_tanggal'))?$this->input->post('bukti_tanggal'):$bukti->bukti_tanggal;	
				$data['bukti_gambar']		= ($this->input->post('bukti_gambar'))?$this->input->post('bukti_gambar'):$bukti->bukti_gambar;	
				$data['bukti_pendapatan']		= ($this->input->post('bukti_pendapatan'))?$this->input->post('bukti_pendapatan'):$bukti->bukti_pendapatan;	
				$data['ukm_nama']		= ($this->input->post('ukm_nama'))?$this->input->post('ukm_nama'):$bukti->ukm_nama;	
				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("bukti_gambar", "./assets/images/bukti/", "230x160", seo($data['ukm_nama']));
					$data['bukti_gambar']		= $gambar;
					$where_edit['bukti_id']	= $data['bukti_id'];
					if ($data['bukti_gambar']) {
						$row = $this->ADM->get_bukti('*', $where_edit);
						@unlink('./assets/images/bukti/'.$row->bukti_gambar);
						@unlink('./assets/images/bukti/kecil_'.$row->bukti_gambar);
						$edit['bukti_gambar']	= $data['bukti_gambar']; 
					}
					$edit['ukm_nama']		= $data['ukm_nama'];
					$edit['bukti_pendapatan']		= $data['bukti_pendapatan'];
					$this->ADM->update_bukti($where_edit, $edit);
					$this->session->set_flashdata('success','bukti telah berhasil diedit!,');
					redirect('admin/bukti');	
					}	
		 } elseif ($data['action']	== 'hapus') {
			 $where['bukti_id']	=$filter2;
			 $row = $this->ADM->get_bukti('*', $where);
			 @unlink ('./assets/images/bukti/'.$row->bukti_gambar);
			 @unlink ('./assets/images/bukti/kecil_'.$row->bukti_gambar);
			 $this->ADM->delete_bukti($where);
			 $this->session->set_flashdata('warning','bukti telah berhasil dihapus!,');
			 redirect("admin/bukti");
	     }
			 $this->load->vars($data);
			 $this->load->view('admin/home');
	  } else {
		  redirect("internal");
	  }
	}

    
		//EXPORT KE EXCEL
	public function print_pesanan($invoices_id='')
    {
		if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_username']		= $this->session->userdata('admin_username');
			$data['admin']						= $this->ADM->get_admin('*',$where_admin);

            $where_invoices['invoices_id']      =$invoices_id;
            $data['invoices']                  	= $this->ADM->get_invoices('',$where_invoices);
			$this->load->vars($data);
			$this->load->view('admin/content/website/print_pesanan');
	  } else {
			redirect("admin");
	  }
	}
	public function print_transaksi($ukm_nama='')
    {
		if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_username']		= $this->session->userdata('admin_username');
			$data['admin']						= $this->ADM->get_admin('*',$where_admin);

            $where_pesanan['ukm_nama']     		=$ukm_nama;
            $data['pesanan']                  	= $this->ADM->get_pesanan('',$where_pesanan);
			$this->load->vars($data);
			$this->load->view('admin/content/website/print_transaksi');
	  } else {
			redirect("admin");
	  }
	}

    public function laporan($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_username']		= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Laporan';
			$data['content']				= 'admin/content/website/laporan';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$this->load->vars($data);
			$this->load->view('admin/home');
	 	} else {
			redirect("admin");
		}
	  }

	public function laporanexcel($filter1='', $filter2='', $filter3='')
    {
		if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_username']	= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			$data['action']						= (empty($filter1))?'view':$filter1;
				        header("Pragma: public");
				        header("Expires: 0");
				        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
				        header("Content-Type: application/force-download");
				        header("Content-Type: application/octet-stream");
				        header("Content-Type: application/download");
				        header("Content-Disposition: attachment;filename=Laporan.xls");
				        header("Content-Transfer-Encoding: binary ");
			$this->load->vars($data);
			$this->load->view('admin/content/website/laporan_excel');
	  } else {
			redirect("admin");
	  }
	}
}