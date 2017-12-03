<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
    }

	public function index($filter1='', $filter2='', $filter3='')
	{
		$data['content']		= '/default/content/search';
		$data['title']			= 'Hasil pencarian produk |';
		$data['q']						= ($this->input->post('q'))?$this->input->post('q'):'';
		$data['halaman']				= (empty($filter1))?1:$filter1;
		$data['batas']					= 6;
		$data['page']					= ($data['halaman']-1) * $data['batas'];
		$like_pencarian['produk_nama']		= $data['q'];
		$data['jml_data']				= $this->ADM->count_all_pencarian('',$like_pencarian);
		$data['jml_halaman'] 			= ceil($data['jml_data']/$data['batas']);
		$data['action']					= '';
		
		$data['boxkategori']	= TRUE;	
		$data['boxkeranjang']	= TRUE;	
		$data['boxinformasi']	= TRUE;	

		$this->load->vars($data);
		$this->load->view('default/home');
	}
	
		
}

