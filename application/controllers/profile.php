<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
    }

	public function index()
	{
		if($this->session->userdata('logged_in2') == TRUE){
			$where_pelanggan['pelanggan_username']		= $this->session->userdata('pelanggan_username');
			$data['pelanggan']					= $this->ADM->get_pelanggan('',$where_pelanggan);
			$data['content']		= '/default/content/profile';
			$data['boxkategori']	= TRUE;	
			$data['boxkeranjang']	= TRUE;	
			$data['boxinformasi']	= TRUE;	
			
			$this->load->vars($data);
			$this->load->view('default/home');
		} else {
		  redirect("login");
		}
	}

	public function edit($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
			$where_pelanggan['pelanggan_username']		= $this->session->userdata('pelanggan_username');
			$data['pelanggan']					= $this->ADM->get_pelanggan('',$where_pelanggan);
			$where['pelanggan_id'] 				= $filter2;
			$data['onload']						= 'pelanggan_nama';
			$where_pelanggan['pelanggan_id']	= $filter2;
			$pelanggan							= $this->ADM->get_pelanggan('', $where_pelanggan);
			$data['pelanggan_id']				= ($this->input->post('pelanggan_id'))?$this->input->post('pelanggan_id'):$pelanggan->pelanggan_id;
			$data['pelanggan_nama']				= ($this->input->post('pelanggan_nama'))?$this->input->post('pelanggan_nama'):$pelanggan->pelanggan_nama;
			$data['pelanggan_password']			= ($this->input->post('pelanggan_password'))?$this->input->post('pelanggan_password'):$pelanggan->pelanggan_password;
			$data['pelanggan_alamat']			= ($this->input->post('pelanggan_alamat'))?$this->input->post('pelanggan_alamat'):$pelanggan->pelanggan_alamat;
			$data['pelanggan_notlp']			= ($this->input->post('pelanggan_notlp'))?$this->input->post('pelanggan_notlp'):$pelanggan->pelanggan_notlp;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$where_edit['pelanggan_id']	= validasi_sql($data['pelanggan_id']);
					if($data['pelanggan_password'] == $data['pelanggan_password']) {
					$where_edit['pelanggan_id']	= validasi_sql($data['pelanggan_id']);
						if($data['pelanggan_password'] <> '') {
							$edit['pelanggan_password']		= validasi_sql(do_hash(($data['pelanggan_password']), 'md5')); 
						}
					}
					$edit['pelanggan_nama']			= validasi_sql($data['pelanggan_nama']);
					$edit['pelanggan_alamat']		= validasi_sql($data['pelanggan_alamat']);
					$edit['pelanggan_notlp']		= validasi_sql($data['pelanggan_notlp']);
					$this->ADM->update_pelanggan($where_edit, $edit);
					$this->session->set_flashdata('success','pelanggan telah berhasil diedit!,');
					redirect("profile");
				}
		} else {
		  redirect("login");
		}
	}
}
