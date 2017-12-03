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
       
                    <h2 class="title text-center">Tentang Kami</h2>
                    
                    <div class="recommended_items">
                  <h4 class='heading colr'>Motekar</h4>
  <div class='carabeli'><div></div>

				</div>
			</div>
		</div>
	</div>
</section>
  <div class="end"></div>
  