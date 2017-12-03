<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keranjang extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
    }

	public function index()
	{
		$where_pelanggan['pelanggan_username']		= $this->session->userdata('pelanggan_username');
		$data['pelanggan']							= $this->ADM->get_pelanggan('',$where_pelanggan);
		$data['title']			= '';
		$data['content']		= '/default/content/keranjang';
		$data['boxkategori']	= TRUE;	
		$data['boxkeranjang']	= TRUE;	
		$data['boxinformasi']	= TRUE;	
		$this->load->vars($data);
		$this->load->view('default/home');
	}
}
