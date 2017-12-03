<?php if ($action == 'detail' || empty($action)){ ?>
<section>
	<div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Pesanan</li>
        </ol>
      </div><!--/breadcrums-->
		<div class="row">
			<div class="col-sm-3">
			  <?php 
                    if ($boxkategori == TRUE) {
                        $this->load->view('default/box/box-kategori');
                    } 
                    if ($boxkeranjang == TRUE) {
                        $this->load->view('default/box/box-keranjang');
                    } 
                      if ($boxinformasi == TRUE) {
                        $this->load->view('default/box/box-informasi');
                    } 
                  ?>
    
			</div>
			<div class="col-sm-9 padding-right">
  	  <h2 class="title text-center">Pesanan</h2>
      <!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
       <table class="table-keranjang" width="100%;">
          <tbody>
            <tr  class='tab_bg' align=center height=23>
        		  <th><span class='table'>No</span></th>
        		  <th><span class='table'>Tanggal Pesanan</span></th>
        		  <th><span class='table'>No.Invoice</span></th>
        		  <th><span class='table'>Total Pembayaran</span></th>
              <th><span class='table'></span></th>
            </tr>
		  <?php  
		 	$no=1;
            $query = $this->db->query("SELECT * FROM invoices WHERE pelanggan_username='$pelanggan->pelanggan_username' ORDER BY invoices_id DESC");
            foreach ($query->result() as $row){ 
      ?>
			<tr class='tab_bg2' align=center>
				  <td><span class='table2'><?php echo $no; ?></td>
				  <td><span class='table2'><?php echo dateIndo1($row->invoices_date); ?></span></td>
				  <td><span class='table2'><b>#INVOICES-<?php echo $row->invoices_id; ?></b></span></td>
				  <td><span class='table2'>Rp.<?php echo number_format($row->invoices_subtotal,0,',','.'); ?></span></td>
          <td><span class='table2'><a href="<?php echo base_url()?>pesanan/invoices/n/<?php echo $row->invoices_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Detail Pesanan</a>
          <span class='table2'><a href="<?php echo base_url()?>pesanan/invoices/d/<?php echo $row->invoices_id; ?>" class="btn btn-danger add-to-cart"><i class="fa fa-trash-o"></i>Hapus</a></td>
			</tr>
		  <?php $no++; } ?>
  </tbody>
  </table>
  </div>
</div>
</div>
</div>
</div>
</section>
<div class="end"></div>
<?php } elseif ($action == 'n') { ?>
<section>
  <div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li><a href="<?php echo base_url();?>pesanan/detail/<?php echo $pelanggan->pelanggan_username; ?>">Pesanan</a></li>
          <li class="active">#INVOICES-<?php echo $invoices_id; ?></li>
        </ol>
      </div><!--/breadcrums-->
    <div class="row">
      <div class="col-sm-3">
        <?php 
                    if ($boxkategori == TRUE) {
                        $this->load->view('default/box/box-kategori');
                    } 
                    if ($boxkeranjang == TRUE) {
                        $this->load->view('default/box/box-keranjang');
                    } 
                      if ($boxinformasi == TRUE) {
                        $this->load->view('default/box/box-informasi');
                    } 
                  ?>
    
      </div>
      <div class="col-sm-9 padding-right">
      <h2 class="title text-center">#INVOICES-<?php echo $invoices_id; ?></h2>
      <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr>
                                        <td>No.Invoices</td>
                                        <td>:</td>
                                        <td><strong>#INVOICES-<?php echo $invoices_id; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pesanan</td>
                                        <td>:</td>
                                        <td><strong><?php echo dateIndo1($invoices_date);?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Status Pembayaran</td>
                                        <td>:</td>
                                        <?php if($invoices_status == 'unpaid') { ?>
                                        <td><a href="<?php echo site_url();?>informasi/konfirmasi/n/<?php echo $invoices_id; ?>" class="btn btn-danger add-to-cart"><i class="fa fa-dollar"></i>BELUM BAYAR</a></td>
                                        <?php } elseif($invoices_status == 'expired') { ?>
                                        <td><a href="#" class="btn btn-yellow add-to-cart"><i class="fa fa-dollar"></i>KADALUARSA</a></td>
                                        <?php } else { ?>
                                        <td><a href="#" class="btn btn-green add-to-cart"><i class="fa fa-dollar"></i>SUDAH BAYAR</a></td>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
       <table class="table-keranjang" width="100%;">
          <tbody>
            <tr class='tab_bg' align=center height=23>
                <th width="30">#</th>
                <th>PRODUK</th>
                <th>NAMA PESANAN</th>
                <th>QTY</th>
                <th>HARGA</th>
                <th>SUB TOTAL</th>
            </tr>
      <?php
        $no=1;
        $query = $this->db->query("SELECT 
          produk.produk_id AS produk_id,
          produk.produk_nama AS produk_nama,
          produk.produk_gambar AS produk_gambar,
          pesanan.produk_id AS produk_id,
          pesanan.produk_nama AS produk_nama,
          pesanan.pesanan_qty AS pesanan_qty,
          pesanan.pesanan_price AS pesanan_price,
          pesanan.pesanan_subtotal AS pesanan_subtotal

         FROM pesanan
         LEFT JOIN produk ON pesanan.produk_id = produk.produk_id
          WHERE pesanan.invoices_id='$invoices_id' ORDER BY pesanan.pesanan_id DESC");
        foreach ($query->result() as $row){ 
      ?>
      <tr class='tab_bg2' align=center>
        <td align="center"><?php echo $no;?></td>
        <td><img src="<?php echo base_url(); ?>assets/images/produk/<?php echo $row->produk_gambar ?>" alt="" width="80px" /></td>
        <td><?php echo $row->produk_nama;?></td>
        <td><p><?php echo $row->pesanan_qty;?></p></td>
        <td><p>Rp.<?php echo number_format($row->pesanan_price,0,',','.');?></p></td>
        <td><p >Rp.<?php echo number_format($row->pesanan_subtotal,0,',','.');?></p></td>
      </tr>
      <?php $no++; } ?>
    <tr>
        <td colspan="5"><b>TOTAL</b></td>
        <td><p><strong>Rp.<?php echo number_format($invoices_subtotal,0,',','.'); ?></strong></p></td>
    </tr>
  </tbody>
  </table>
  </div>
</div>
</div>
</div>
</div>
</section>
<div class="end"></div>
<?php } ?>