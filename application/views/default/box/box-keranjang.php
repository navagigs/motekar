<div class="left-sidebar margin-top-30">
	<h2>Keranjang Belanja</h2>
	<div class="keranjang">
		<div class="panel-group category-products" id="accordian">
		<div class="panel panel-default">
			<div class="panel-heading">
			<h4 class="panel-title">
						<a href="">Total Item<span class='pull-right'>(<?php echo $this->cart->total_items(); ?>)</span></a>

						
					</h4>	
					<br>
					<h4 class="panel-title">
					
						<a href="">Total Harga<span class='pull-right'>Rp.<?php echo number_format($this->cart->total(),0,',','.'); ?></span></a>
					</h4>	

					</div></div></div>

					<div class="brands_products">
					<a href="<?php echo site_url();?>keranjang">
			<button class="btn btn-default btn-block">Lihat Keranjang Belanja</button>
		</a>
	</div>
	</div>
</div>

  