<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Internal extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login', 'LOG', TRUE);
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
	}
	
	public function index()
	{
        if ($this->session->userdata('logged_in') == TRUE){       
            redirect('admin/','refresh');
        } else {     
		$this->load->view('admin/login');
		 }
	}
	
	public function ceklogin()
	{
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');
		$do				= $this->input->post('masuk');
		
		$where_login['admin_username']	= $username;
		$where_login['admin_password']	= do_hash($password, 'md5');
		
		if ($do && $this->LOG->cek_login($where_login) === TRUE){
			redirect("admin/");
		} else {
			$this->session->set_flashdata('warning','Username atau Password tidak cocok!');
            redirect("internal");
		}
		
	}
	
	public function keluar()
	{
		$this->LOG->remov_session();
        session_destroy();
		redirect("internal");
	}

	public function daftar()
	{
        if ($this->session->userdata('logged_in') == TRUE){       
            redirect('admin/','refresh');
        } else {     
		$this->load->view('admin/daftar');
		 }
	}
	
	public function tambah() {
		$data['ukm_nama']		= ($this->input->post('ukm_nama'))?$this->input->post('ukm_nama'):'';
		$data['admin_username']		= ($this->input->post('admin_username'))?$this->input->post('admin_username'):'';	
		$data['admin_password']		= ($this->input->post('admin_password'))?$this->input->post('admin_password'):'';	
				$simpan						= $this->input->post('simpan');
				if($simpan){
					$insert['ukm_nama']	= $data['ukm_nama'];
					$insert['admin_username']	= $data['admin_username'];
					$insert['admin_password']	= md5($data['admin_password']);
					$insert['admin_level']	= 'ukm';
					$this->ADM->insert_admin($insert);
					$this->session->set_flashdata('success','Telah berhasil diterdaftar!,');
					redirect("internal/daftar");
				} else {
					$this->session->set_flashdata('warning','Gagal terdaftar!,');
					redirect("internal/daftar");

				}
	}
}