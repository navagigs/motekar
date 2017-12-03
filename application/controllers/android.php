<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Android extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
		$this->load->model('M_pelanggan', 'PEL', TRUE);
    }

	public function index()
	{
		$where_pelanggan['pelanggan_username']		= $this->session->userdata('pelanggan_username');
		$data['pelanggan']					= $this->ADM->get_pelanggan('',$where_pelanggan);
		$data['title']			= '';
		$data['content']		= '/android/content/home';
		$data['boxkategori']	= TRUE;	
		$data['boxkeranjang']	= TRUE;	
		$data['boxinformasi']	= TRUE;	
		$this->load->vars($data);
		$this->load->view('android/home');
	}

	public function login()
	{
			$data['content']		= '/android/content/login';
			$this->load->vars($data);
			$this->load->view('android/home');
	}

	public function ceklogin()
	{
		$username		= $this->input->post('pelanggan_username');
		$password		= $this->input->post('pelanggan_password');
		$do				= $this->input->post('masuk');
		
		$where_login['pelanggan_username']	= $username;
		$where_login['pelanggan_password']	= do_hash($password, 'md5');
		
		if ($do && $this->PEL->cek_login($where_login) === TRUE){
			redirect("keranjang_android");
		} else {
			$this->session->set_flashdata('warning','Username atau Password tidak cocok!');
            redirect("android/login");
		}
		
	}
	
	public function keluar()
	{
		$this->PEL->remov_session();
		$this->cart->destroy();
        session_destroy();
		redirect("android");
	}

	public function signup()
	{
		$where_pelanggan['pelanggan_username']		= $this->session->userdata('pelanggan_username');
		$data['pelanggan']							= $this->ADM->get_pelanggan('',$where_pelanggan);
		$data['content']							= '/android/content/signup';
		$this->load->vars($data);
		$this->load->view('android/home');
	}

	public function tambah() {
		$data['pelanggan_nama']			= ($this->input->post('pelanggan_nama'))?$this->input->post('pelanggan_nama'):'';
		$data['pelanggan_username']		= ($this->input->post('pelanggan_username'))?$this->input->post('pelanggan_username'):'';	
		$data['pelanggan_password']		= ($this->input->post('pelanggan_password'))?$this->input->post('pelanggan_password'):'';	
		$data['pelanggan_alamat']		= ($this->input->post('pelanggan_alamat'))?$this->input->post('pelanggan_alamat'):'';	
		$data['pelanggan_notlp']		= ($this->input->post('pelanggan_notlp'))?$this->input->post('pelanggan_notlp'):'';	
				$where['pelanggan_nama']	= $data['pelanggan_username'];
				$jml_pelanggan				= $this->ADM->count_all_pelanggan($where);

				$simpan						= $this->input->post('simpan');
				if($simpan && $jml_pelanggan < 1 ){
					$insert['pelanggan_nama']	= $data['pelanggan_nama'];
					$insert['pelanggan_username']	= $data['pelanggan_username'];
					$insert['pelanggan_password']	= md5($data['pelanggan_password']);
					$insert['pelanggan_alamat']	= $data['pelanggan_alamat'];
					$insert['pelanggan_notlp']	= $data['pelanggan_notlp'];
					$this->ADM->insert_pelanggan($insert);
					$this->session->set_flashdata('success','Telah berhasil diterdaftar!,');
					redirect("android/login");
					} elseif ($simpan && $jml_pelanggan > 0 ){
					$this->session->set_flashdata('warning','Username Pelanggan telah terdaftar!,');
					redirect("android/signup");
				} else {
					$this->session->set_flashdata('warning','Gagal terdaftar!,');
					redirect("android/signup");

				}
	}


	public function konfirmasi ($filter1='',  $filter2='', $filter3='')
  	{
	    if($this->session->userdata('logged_in2') == TRUE){
	      	$where_pelanggan['pelanggan_username']    = $this->session->userdata('pelanggan_username');
	      	$data['pelanggan']          = $this->ADM->get_pelanggan('',$where_pelanggan);
	    	$data['content']    = '/android/content/konfirmasi';
	        $data['action']         = 'n';
	 		if($data['action'] == 'n') {
	         $where['invoices_id']         = $filter2;
	                $data['onload']             = 'invoices_id';
	                $invoices                     = $this->ADM->get_invoices('', $where);
	                $data['invoices_id']          = ($this->input->post('invoices_id'))?$this->input->post('invoices_id'):$invoices->invoices_id;
	                $data['invoices_subtotal']          = ($this->input->post('invoices_subtotal'))?$this->input->post('invoices_subtotal'):$invoices->invoices_subtotal;
	                $data['invoices_date']          = ($this->input->post('invoices_date'))?$this->input->post('invoices_date'):$invoices->invoices_date;
	                $data['pelanggan_nama']          = ($this->input->post('pelanggan_nama'))?$this->input->post('pelanggan_nama'):$invoices->pelanggan_nama;
	                $data['pelanggan_alamat']          = ($this->input->post('pelanggan_alamat'))?$this->input->post('pelanggan_alamat'):$invoices->pelanggan_alamat;
	                $data['pelanggan_notlp']          = ($this->input->post('pelanggan_notlp'))?$this->input->post('pelanggan_notlp'):$invoices->pelanggan_notlp;
	                $data['invoices_status']          = ($this->input->post('invoices_status'))?$this->input->post('invoices_status'):$invoices->invoices_status;
	      	}
	    $data['title']      = '';
	    $this->load->vars($data);
	    $this->load->view('android/home');
	    } else {
	      redirect("android/login");
	    }
  } 

  public function konfirmasi_post ()
  {
        $data['invoices_id']         = ($this->input->post('invoices_id'))?$this->input->post('invoices_id'):'';
        $data['konfirmasi_jumlah']   = ($this->input->post('konfirmasi_jumlah'))?$this->input->post('konfirmasi_jumlah'):'';
        $data['konfirmasi_bank']     = ($this->input->post('konfirmasi_bank'))?$this->input->post('konfirmasi_bank'):'';
        $data['konfirmasi_bukti']    = ($this->input->post('konfirmasi_bukti'))?$this->input->post('konfirmasi_bukti'):'';
        $data['konfirmasi_post']     = date("Y-m-d H:i:s");

        $where['invoices_id']    = $data['invoices_id'];
        $jml_invoices            = $this->ADM->count_all_invoices($where);

        $simpan           = $this->input->post('simpan');

        if($simpan && $jml_invoices  > 0 ){
          $gambar = upload_image("konfirmasi_bukti", "./assets/images/buktipembayaran/", "230x160", seo($data['invoices_id']));
          $data['konfirmasi_bukti']     = $gambar;
          $insert['invoices_id']        = $data['invoices_id'];
          $insert['konfirmasi_jumlah']  = $data['konfirmasi_jumlah'];
          $insert['konfirmasi_bank']    = $data['konfirmasi_bank'];
          if ($data['konfirmasi_bukti']) { $insert['konfirmasi_bukti'] = $data['konfirmasi_bukti']; }
          $insert['konfirmasi_post']    = $data['konfirmasi_post'];
          $this->ADM->insert_konfirmasi($insert);
          $this->session->set_flashdata('success','Konfirmasi pembayaran telah berhasil dikirim, Pesanan Anda sedang diproses penjual !,');
          redirect("pesanan_android/detail/".$this->session->userdata('pelanggan_username'));
        } elseif ($simpan && $jml_invoices < 1 ){
          $this->session->set_flashdata('warning','No Invoice tidak ada dalam pesanan atau salah!,');
          redirect("pesanan_android/detail/".$this->session->userdata('pelanggan_username'));
        } else {
          $this->session->set_flashdata('warning','Gagal dikirim!,');
          redirect("pesanan_android/detail/".$this->session->userdata('pelanggan_username'));

        }
    $this->load->vars($data);
    $this->load->view('android/home');
  }

  public function info ()
  {
    $where_pelanggan['pelanggan_username']    = $this->session->userdata('pelanggan_username');
    $data['pelanggan']          = $this->ADM->get_pelanggan('',$where_pelanggan);
    $data['title']      = '';
    $data['content']    = '/android/content/info';
    $data['boxkategori']  = TRUE; 
    $data['boxkeranjang'] = TRUE; 
      $data['boxinformasi'] = TRUE; 
    $this->load->vars($data);
    $this->load->view('android/home');
  }

  public function kontak ()
  {
    $where_pelanggan['pelanggan_username']    = $this->session->userdata('pelanggan_username');
    $data['pelanggan']          = $this->ADM->get_pelanggan('',$where_pelanggan);
    $data['title']      = '';
    $data['content']    = '/android/content/kontak';
    $data['boxkategori']  = TRUE; 
    $data['boxkeranjang'] = TRUE; 
      $data['boxinformasi'] = TRUE; 
    $this->load->vars($data);
    $this->load->view('android/home');
  }

}
