<div class="left-sidebar">
	<h2>Kategori</h2>
	<div class="panel-group category-products" id="accordian">
		<div class="panel panel-default">
			<div class="panel-heading">
			<?php
            	$jml_data = $this->ADM->count_all_kategori();
				if ($jml_data > 0) {
                    foreach($this->ADM->grid_all_kategori('*', 'kategori_nama', 'DESC', $jml_data, '', '', '') as $row) {
		            ?>
					<h4 class="panel-title">
						<a href="<?php echo base_url();?>produk/detailkategori/<?php echo $row->kategori_id;?>"><?php echo $row->kategori_nama;?><span class='pull-right'><i class="fa fa-angle-right"></i></span></a>
					</h4>
				   <?php
                   } 
	            } else {
                ?>
                    <h4 class="panel-title"><a href="">Data Tidak Ada></a></h4>
            <?php } ?>
			</div>
		</div>
	</div>
	<div class="brands_products">
		<a href="<?php echo site_url();?>produk">
			<button class="btn btn-default btn-block">Lihat Semua Produk</button>
		</a>
	</div>
</div>

