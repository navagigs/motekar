     <div class="page-header bg-white">
            <div class="breadcrumb">
              <a href="<?php echo site_url();?>android">Home</a><span>·</span>Pengiriman
            </div>
            <h1 class="page-title">Pengiriman</h1>
       <table class="table-keranjang" width="100%;">
          <tbody>
            <tr  class='tab_bg' align=center height=23>
        		  <th><span class='table'>No.Invoices</span></th>
              <th><span class='table'>No.Resi</span></th>
              <th><span class='table'>VIA</span></th>
              <th><span class='table'>Status</span></th>
              <th><span class='table'></span></th>
            </tr>
		  <?php  
		 	$no=1;
            $query = $this->db->query("SELECT * FROM pengiriman WHERE pelanggan_nama='$pelanggan->pelanggan_nama' AND pengiriman_status='Y' ORDER BY pengiriman_id DESC");
            foreach ($query->result() as $row){ 
      ?>
			<tr class='tab_bg2' align=center>
				  <td><span class='table2'><b>#INVOICES-<?php echo $row->invoices_id; ?></b></td>
          <td><span class='table2'><b><?php echo $row->pengiriman_noresi; ?></b></span></td>
          <td><span class='table2'><b><?php echo $row->pengiriman_via; ?></b></span></td>
          <td><span class='table2'><?php if($row->pengiriman_status == 'N') { ?>
                                       <a href="#" class="btn btn-danger add-to-cart"><i class="fa fa-share"></i>BELUM DIKIRIM</a>
                                        <?php } else { ?>
                                        <a href="#" class="btn btn-success add-to-cart"><i class="fa fa-share"></i>SUDAH DIKIRIM</a>
                                        <?php } ?></td>
          <td><span class='table2'>
            <?php if($row->pengiriman_acc == 'N') { ?>
            <a href="<?php echo site_url();?>produk_android/pengiriman_acc/d/<?php echo $row->pengiriman_id; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary right" >SUDAH DITERIMA ?</a>
            <?php }  else { ?>
            SUDAH
            <?php } ?></td>
			</tr>
		  <?php $no++; } ?>
  </tbody>
  </table>
  </span>