<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informasi extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
    $this->load->model('M_admin', 'ADM', TRUE);
    $this->load->model('M_config', 'CONF', TRUE);
    }

  public function index ()
  {
    $where_pelanggan['pelanggan_username']    = $this->session->userdata('pelanggan_username');
    $data['pelanggan']          = $this->ADM->get_pelanggan('',$where_pelanggan);
    $data['title']      = '';
    $data['content']    = '/default/content/tentangkami';
    $data['boxkategori']  = TRUE; 
    $data['boxkeranjang'] = TRUE; 
    $this->load->vars($data);
    $this->load->view('default/home');
  }

  public function tentang ()
  {
        $where_pelanggan['pelanggan_username']    = $this->session->userdata('pelanggan_username');
    $data['pelanggan']          = $this->ADM->get_pelanggan('',$where_pelanggan);
    $data['title']      = '';
    $data['content']    = '/default/content/tentang';
    $data['boxkategori']  = TRUE; 
    $data['boxkeranjang'] = TRUE; 
      $data['boxinformasi'] = TRUE; 
    $this->load->vars($data);
    $this->load->view('default/home');
  }

  public function kontak ()
  {
        $where_pelanggan['pelanggan_username']    = $this->session->userdata('pelanggan_username');
    $data['pelanggan']          = $this->ADM->get_pelanggan('',$where_pelanggan);
    $data['title']      = '';
    $data['content']    = '/default/content/kontak';
    $data['boxkategori']  = TRUE; 
    $data['boxkeranjang'] = TRUE; 
      $data['boxinformasi'] = TRUE; 
    $this->load->vars($data);
    $this->load->view('default/home');
  }

  public function carapembelian ()
  {
        $where_pelanggan['pelanggan_username']    = $this->session->userdata('pelanggan_username');
    $data['pelanggan']          = $this->ADM->get_pelanggan('',$where_pelanggan);
    $data['title']      = '';
    $data['content']    = '/default/content/carapembelian';
    $data['boxkategori']  = TRUE; 
    $data['boxkeranjang'] = TRUE; 
      $data['boxinformasi'] = TRUE; 
    $this->load->vars($data);
    $this->load->view('default/home');
  }

  public function konfirmasi ($filter1='',  $filter2='', $filter3='')
  {
    if($this->session->userdata('logged_in2') == TRUE){
      $where_pelanggan['pelanggan_username']    = $this->session->userdata('pelanggan_username');
      $data['pelanggan']          = $this->ADM->get_pelanggan('',$where_pelanggan);
    $data['content']    = '/default/content/konfirmasi';
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
    $data['boxkategori']  = TRUE; 
    $data['boxkeranjang'] = TRUE; 
      $data['boxinformasi'] = TRUE; 
    $this->load->vars($data);
    $this->load->view('default/home');
    } else {
      redirect("login");
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
          $this->session->set_flashdata('success','Konfirmasi pembayaran telah berhasil dikirim!,');
          redirect("pesanan/detail/".$this->session->userdata('pelanggan_username'));
        } elseif ($simpan && $jml_invoices < 1 ){
          $this->session->set_flashdata('warning','No Invoice tidak ada dalam pesanan atau salah!,');
          redirect("pesanan/detail/".$this->session->userdata('pelanggan_username'));
        } else {
          $this->session->set_flashdata('warning','Gagal dikirim!,');
          redirect("pesanan/detail/".$this->session->userdata('pelanggan_username'));

        }
    $this->load->vars($data);
    $this->load->view('default/home');
  }

}
