<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
    }

	public function index()
	{
		$data['body']					= 'page-sub-page';
		$data['title']					= '| 404 Page Not Found';
		$data['boxberita']				= TRUE;	
		$data['boxfakultas']			= TRUE;	
		$data['boxlayanan']				= TRUE;		
		$data['boxvideo']				= TRUE;		
		$this->load->vars($data);
		$this->load->view('error');
	}

	public function front()
	{
		$data['body']					= 'page-sub-page';
		$data['title']					= '| Error';
		$data['content']				= '/default/content/error_front_end';	
		$data['boxberita']				= TRUE;	
		$data['boxfakultas']			= TRUE;	
		$data['boxlayanan']				= TRUE;		
		$data['boxvideo']				= TRUE;		
		$this->load->vars($data);
		$this->load->view('default/home');
	}
	
	
}

/* End of file error.php */
/* Location: ./application/controllers/error.php */