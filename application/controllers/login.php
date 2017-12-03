<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
		$this->load->model('M_pelanggan', 'PEL', TRUE);
    }

	public function index()
	{
		if($this->session->userdata('logged_in2') == FALSE){
			$data['title']			= '';
			$data['content']		= '/default/content/login';
			$data['boxkategori']	= TRUE;	
			$data['boxkeranjang']	= TRUE;	
			$data['boxinformasi']	= TRUE;	
			$this->load->vars($data);
			$this->load->view('default/home');
		} else {
			  redirect("home");
		}
	}

	public function ceklogin()
	{
		$username		= $this->input->post('pelanggan_username');
		$password		= $this->input->post('pelanggan_password');
		$do				= $this->input->post('masuk');
		
		$where_login['pelanggan_username']	= $username;
		$where_login['pelanggan_password']	= do_hash($password, 'md5');
		
		if ($do && $this->PEL->cek_login($where_login) === TRUE){
			redirect("profile");
		} else {
			$this->session->set_flashdata('warning','Username atau Password tidak cocok!');
            redirect("login");
		}
		
	}
	
	public function keluar()
	{
		$this->PEL->remov_session();
        session_destroy();
		redirect("login");
	}
}
