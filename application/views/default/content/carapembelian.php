 <section>
	<div class="container">
        <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>">Home</a></li>
				  <li class="active">Cara Pembelian</li>
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
                    <h2 class="title text-center">Cara Pembelian</h2>
                   1. Pembeli melakukan pemesanan.
                   <br>
                   2. Setelah melakukan pemesanan pembeli akan mempunyai nomor Invoices.
                   <br>
                   3. Setelah itu pembeli melakukan pembayaran via trasfer.
                   <br>
                   4. Setelah melakukan pembayaran, harap Konfirmasi Pembayaran.
                   <br>
                   5. Barang yang sudah di beli tidak dapat ditukar atau dikembalikan.
		</div>
	</div>
</section>
  <div class="end"></div>
  