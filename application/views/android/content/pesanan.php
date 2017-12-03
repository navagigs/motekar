<?php if ($action == 'detail' || empty($action)){ ?>
 <div class="page-header bg-white">
            <div class="breadcrumb">
              <a href="<?php echo site_url();?>android">Home</a><span>·</span>Pesanan
            </div>
            <h1 class="page-title">Pesanan</h1>
            <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                        <?php echo $this->session->flashdata('success'); ?>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                        <?php echo $this->session->flashdata('warning'); ?>
                        <?php } else { ?>
                        <?php echo $this->session->flashdata('error'); ?>
                        <?php } ?>
                    <?php } ?>
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
          <td><span class='table2'><a href="<?php echo base_url()?>pesanan_android/invoices/n/<?php echo $row->invoices_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Detail Pesanan</a></td>
			</tr>
		  <?php $no++; } ?>
  </tbody>
  </table>
</span>
<?php } elseif ($action == 'n') { ?>
 <div class="page-header bg-white">
            <div class="breadcrumb">
              <a href="<?php echo site_url();?>android">Home</a><span>·</span>Detail Pesanan
            </div>
            <h1 class="page-title">Detail Pesanan</h1>
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
                                        <td><a href="<?php echo site_url();?>android/konfirmasi/n/<?php echo $invoices_id; ?>" class="btn btn-danger add-to-cart"><i class="fa fa-dollar"></i>BELUM BAYAR</a></td>
                                        <?php } elseif($invoices_status == 'expired') { ?>
                                        <td><a href="#" class="btn btn-green add-to-cart"><i class="fa fa-dollar"></i>EXPIRED</a></td>
                                        <?php } else {?>
                                        <td><a href="#" class="btn btn-green add-to-cart"><i class="fa fa-dollar"></i>SUDAH BAYAR</a></td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td>Maximal Pembayaran</td>
                                        <td>:</td>
                                        <td><strong>5 Hari setelah pemesanan</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
       <table class="table-keranjang" width="100%;">
          <tbody>
            <tr class='tab_bg' align=center height=23>
                <th width="30">#</th>
                <th>NAMA PESANAN</th>
                <th>QTY</th>
                <th>HARGA</th>
                <th>SUB TOTAL</th>
            </tr>
      <?php
        $no=1;
        $query = $this->db->query("SELECT * FROM pesanan WHERE invoices_id='$invoices_id' ORDER BY pesanan_id DESC");
        foreach ($query->result() as $row){ 
      ?>
      <tr class='tab_bg2' align=center>
        <td align="center"><?php echo $no;?></td>
        <td><?php echo $row->produk_nama;?></td>
        <td><p><?php echo $row->pesanan_qty;?></p></td>
        <td><p>Rp.<?php echo number_format($row->pesanan_price,0,',','.');?></p></td>
        <td><p >Rp.<?php echo number_format($row->pesanan_subtotal,0,',','.');?></p></td>
      </tr>
      <?php $no++; } ?>
    <tr>
        <td colspan="4"><b>TOTAL</b></td>
        <td><p><strong>Rp.<?php echo number_format($invoices_subtotal,0,',','.'); ?></strong></p></td>
    </tr>
  </tbody>
  </table>
  </div>
  </div>
<?php } ?>