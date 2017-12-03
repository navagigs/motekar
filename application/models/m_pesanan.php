<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pesanan extends CI_Model {
	   function __contsruct(){
        parent::Model();
        $d= $pelanggan->pelanggan_id;
    }
	public function process()
	{
		
    }
	
    public function all()
    {
        //Get all invoices from Invoices table
        $hasil = $this->db->get('invoices');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function get_invoice_by_id($pesanan_invoice)
    {
        $hasil = $this->db->where('id',$pesanan_invoice)->limit(1)->get('invoices');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return false;
        }
    }

    public function get_orders_by_invoice($pesanan_invoice)
    {
        $hasil = $this->db->where('pesanan_invoice',$pesanan_invoice)->get('orders');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }
}
