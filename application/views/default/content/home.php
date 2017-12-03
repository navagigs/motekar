<section id="slider">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel" data-slide-to="1"></li>
					</ol>
					<div class="carousel-inner">
						<div class="item active">
							<div class="col-sm-6">
								<h1><span>MOTEKAR</span></h1>
								<h2>Alamat</h2>
								<p>	Jl Sekeloa 21 A, 40226, Bandung , Jawa Barat Indonesia</p>
							</div>
							<div class="col-sm-6">
								<img src="<?php echo base_url();?>templates/default/assets/images/home/responsive.png" class="girl img-responsive" alt="" />
							</div>
						</div>
						<div class="item">
							<div class="col-sm-6">
								<h1><span>MOTEKAR</span></h1>
								<h2>No Telepon</h2>
								<p>022 5402891</p>
							</div>
							<div class="col-sm-6">
								<img src="<?php echo base_url();?>templates/default/assets/images/home/responsive.png" class="girl img-responsive" alt="" />
							</div>
						</div>
					</div>
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
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
            	<div class="category-tab">
                    <h2 class="title text-center">Produk Yang Banyak Dilihat</h2>
						<div class="tab-content">
							<div class="tab-pane fade active in" >
								<?php
            						$jml_data = $this->ADM->count_all_produk();
									if ($jml_data > 0) {
                    					foreach($this->ADM->grid_all_produk('*', 'produk_hits', 'DESC', 3, '', '', '') as $row) {
		            					?>
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="<?php echo base_url()."assets/images/produk/".$row->produk_gambar;?>" alt="" />
														<h2 class="harga">Rp.<?php echo format_rupiah($row->produk_harga);?></h2>
														<p><b>Diskon <?php echo $row->produk_diskon;?>%</b></p>
														<p><?php echo $row->produk_nama;?></p>
														<p><b>Stok (<?php echo $row->produk_stok;?>)</b></p>
														<?php if($row->produk_stok == 0) { ?>
														<a href="#" class="btn btn-info add-to-cart"><i class="fa fa-close"></i>Stok Habis</a>

														<?php } else { ?>
														<a href="<?php echo base_url()?>produk/add_to_cart/<?php echo $row->produk_id;?>" class="btn btn-danger add-to-cart"><i class="fa fa-eye"></i>Add to Chart</a>

														<?php } ?>
                                                		<a href="<?php echo base_url()?>produk/detailproduk/<?php echo $row->produk_id;?>" class="btn btn-info add-to-cart"><i class="fa fa-eye"></i>Detail</a>
													</div>
												</div>
											</div>
										</div>
									<?php
                  						} 
	            					} else {
                					?>
                    				<center><h4>Data Tidak Ada></h4></center>
            					<?php } ?>
							</div>				
						</div>
					</div>
					<div class="category-tab">
                    <h2 class="title text-center">Produk Terbaru</h2>
						<div class="tab-content">
							<div class="tab-pane fade active in" >
								<?php
            						$jml_data = $this->ADM->count_all_produk();
									if ($jml_data > 0) {
                    					foreach($this->ADM->grid_all_produk('*', 'produk_waktu', 'DESC', 3, '', '', '') as $row) {
		            					?>
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="<?php echo base_url()."assets/images/produk/kecil_".$row->produk_gambar;?>" alt="" />
														<h2 class="harga">Rp.<?php echo format_rupiah($row->produk_harga);?></h2>
														<p><b>Diskon <?php echo $row->produk_diskon;?>%</b></p>
														<p><?php echo $row->produk_nama;?></p>
														<p><b>Stok (<?php echo $row->produk_stok;?>)</b></p>
														<a href="<?php echo base_url()?>produk/add_to_cart/<?php echo $row->produk_id;?>" class="btn btn-danger add-to-cart"><i class="fa fa-eye"></i>Add to Chart</a>
<a href="<?php echo base_url()?>produk/detailproduk/<?php echo $row->produk_id;?>" class="btn btn-info add-to-cart"><i class="fa fa-eye"></i>Detail</a>
													</div>
												</div>
											</div>
										</div>
									<?php
                  						} 
	            					} else {
                					?>
                    				<center><h4>Data Tidak Ada></h4></center>
            					<?php } ?>
							</div>				
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="end"></div>
