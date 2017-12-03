<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesanan extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_pelanggan', 'PEL', TRUE);
		$this->load->model('M_pesanan', 'PES', TRUE);
    }

	public function index()
	{
		if($this->session->userdata('logged_in2') == TRUE){
			$where_pelanggan['pelanggan_username']		= $this->session->userdata('pelanggan_username');
			$data['pelanggan']					= $this->ADM->get_pelanggan('',$where_pelanggan);
			date_default_timezone_set('Asia/Jakarta');
			
			if($cart = $this->cart->contents()):
			foreach($cart as $item):
			endforeach;
			endif;
			 $query = $this->db->query("SELECT *  FROM produk WHERE produk_nama ='$item[name]'");
             foreach ($query->result() as $row){ }
             	echo $row->produk_stok;
             	if($row->produk_stok > $item['qty'] ) {
			$pelanggan_username = $this->session->userdata('pelanggan_username');
			$invoices_subtotal  = $this->cart->total();
			$invoice = array(
						'invoices_date'		=> date('Y-m-d'),
						'invoices_due_date'	=> date('Y-m-d H:i:s', mktime( date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
	                	'pelanggan_username'=> $pelanggan_username,
	                	'invoices_subtotal' => $invoices_subtotal,
						'invoices_status'	=> 'unpaid'
			);
			$this->db->insert('invoices', $invoice);
			$pesanan_invoice = $this->db->insert_id();
			$tanggal_sekarang = date('Y-m-d');
			if($cart = $this->cart->contents()):
			foreach($cart as $item):
			 $query = $this->db->query("SELECT *  FROM produk WHERE produk_nama ='$item[name]'");
             foreach ($query->result() as $row){ }
             	//echo $row->produk_stok;
             	//if($row->produk_stok > $item['qty'] ) {
				$data = array(
					'invoices_id'		=> $pesanan_invoice,
					'produk_id'		    => $item['id'],
					'produk_nama'		=> $item['name'],
					'pesanan_qty'		=> $item['qty'],
					'pesanan_price'		=> $item['price'],
	                'pesanan_subtotal'  => $item['subtotal'],
	                'pesanan_tanggal'	=> $tanggal_sekarang,
	                'pelanggan_username'=> $pelanggan_username,
					'ukm_nama'			=> $row->ukm_nama
				);
				$data2 = array(
					'invoices_id'		=> $pesanan_invoice,
					'pelanggan_nama'	=> $pelanggan_username,
					'pengiriman_noresi'	=> '-',
					'pengiriman_via'	=> '-',
				);
				$this->db->insert('pesanan', $data);
				$this->db->insert('pengiriman', $data2);
			//} else {
			//$this->session->set_flashdata('warning','Stok tidak tersedia!');
			//redirect('pesanan/detail');
			//}
			endforeach;
			endif;
			$this->cart->destroy();
			$this->session->set_flashdata('success','Terimakasih telah melakukan pesanan!');
			redirect('pesanan/detail');
			} else {
			$this->session->set_flashdata('warning','Stok tidak tersedia!');
			redirect('pesanan/detail');
			}
		} else {
		  redirect("login");
		}
	}


	public function detail($pelanggan_username='', $filter1='',  $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
		$where_pelanggan['pelanggan_username']	= $this->session->userdata('pelanggan_username');
		$data['pelanggan']						= $this->ADM->get_pelanggan('',$where_pelanggan);
	    $data['content']    					= '/default/content/pesanan';
			$data['action']					= (empty($filter1))?'detail':$filter1;
	    $data['pelanggan_username']				=  (empty($pelanggan_username))?'':$pelanggan_username;
	    $where_jenis['pelanggan_username']   	= $pelanggan_username;
	    $data['jenis']          			= $this->ADM->get_pelanggan('',$where_jenis);
	    $data['boxkategori']  		= TRUE; 
	    $data['boxkeranjang'] 		= TRUE; 
    	$data['boxinformasi']		= TRUE;	
    	$this->load->vars($data);
    	$this->load->view('default/home');
    } else {
		  redirect("login");
		}
	}

	public function invoices($filter1='',  $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
		$where_pelanggan['pelanggan_username']	= $this->session->userdata('pelanggan_username');
		$data['pelanggan']						= $this->ADM->get_pelanggan('',$where_pelanggan);
	    $data['content']    					= '/default/content/pesanan';
			$data['action']					= (empty($filter1))?'view':$filter1;
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
		} elseif ($data['action']	== 'd') {
			 $where['invoices_id']	=$filter2;
			 $row = $this->ADM->get_invoices('*', $where);
			 $this->ADM->delete_invoices($where);
			 $this->ADM->delete_pesanan($where);
			 $this->session->set_flashdata('warning','Invoices telah berhasil dihapus!,');
			 redirect("pesanan/detail");
		} elseif ($data['action']	== 'p') {
			 $where['invoices_id']	=$filter2;
			 $row = $this->ADM->get_pengiriman('*', $where);
			 $this->ADM->delete_pengiriman($where);
			 $this->session->set_flashdata('warning','Pengiriman telah berhasil dihapus!,');
			 redirect("pesanan/pengiriman");
		}
	    $data['boxkategori']  		= TRUE; 
	    $data['boxkeranjang'] 		= TRUE; 
    	$data['boxinformasi']		= TRUE;	
    	$this->load->vars($data);
    	$this->load->view('default/home');
    } else {
		  redirect("login");
		}
	}

	public function pengiriman($filter1='',  $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
		$where_pelanggan['pelanggan_username']	= $this->session->userdata('pelanggan_username');
		$data['pelanggan']						= $this->ADM->get_pelanggan('',$where_pelanggan);
	    $data['content']    					= '/default/content/pengiriman';
	    
	    $data['boxkategori']  		= TRUE; 
	    $data['boxkeranjang'] 		= TRUE; 
    	$data['boxinformasi']		= TRUE;	
    	$this->load->vars($data);
    	$this->load->view('default/home');
    } else {
		  redirect("login");
		}
	}

	public function hapus_invoices($invoices_id='', $pelanggan_username='', $filter1='',  $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
		$where_pelanggan['pelanggan_username']	= $this->session->userdata('pelanggan_username');
		$data['pelanggan']						= $this->ADM->get_pelanggan('',$where_pelanggan);
	    $data['pelanggan_username']				=  (empty($pelanggan_username))?'':$pelanggan_username;
	    $where_jenis['pelanggan_username']   	= $pelanggan_username;
			$data['action']					= (empty($filter1))?'view':$filter1;
	
    	$this->load->vars($data);
    	$this->load->view('default/home');
    } else {
		  redirect("login");
		}
	}

}