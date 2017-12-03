<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
    }

	public function index()
	{
				$where_pelanggan['pelanggan_username']		= $this->session->userdata('pelanggan_username');
		$data['pelanggan']					= $this->ADM->get_pelanggan('',$where_pelanggan);
		$data['title']			= '';
		$data['content']		= '/default/content/signup';
		$data['boxkategori']	= TRUE;	
		$data['boxkeranjang']	= TRUE;	
		$data['boxinformasi']	= TRUE;	
		
				
			
		$this->load->vars($data);
		$this->load->view('default/home');
	}

	public function tambah() {
		$data['pelanggan_nama']		= ($this->input->post('pelanggan_nama'))?$this->input->post('pelanggan_nama'):'';
		$data['pelanggan_username']		= ($this->input->post('pelanggan_username'))?$this->input->post('pelanggan_username'):'';	
		$data['pelanggan_password']		= ($this->input->post('pelanggan_password'))?$this->input->post('pelanggan_password'):'';	
		$data['pelanggan_alamat']		= ($this->input->post('pelanggan_alamat'))?$this->input->post('pelanggan_alamat'):'';	
		$data['pelanggan_notlp']		= ($this->input->post('pelanggan_notlp'))?$this->input->post('pelanggan_notlp'):'';	
				$simpan						= $this->input->post('simpan');
				if($simpan){
					$insert['pelanggan_nama']	= $data['pelanggan_nama'];
					$insert['pelanggan_username']	= $data['pelanggan_username'];
					$insert['pelanggan_password']	= md5($data['pelanggan_password']);
					$insert['pelanggan_alamat']	= $data['pelanggan_alamat'];
					$insert['pelanggan_notlp']	= $data['pelanggan_notlp'];
					$this->ADM->insert_pelanggan($insert);
					$this->session->set_flashdata('success','Telah berhasil diterdaftar!,');
					redirect("login");
				} else {
					$this->session->set_flashdata('warning','Gagal terdaftar!,');
					redirect("signup");

				}
}
}