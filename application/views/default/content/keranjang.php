       <script type="text/javascript">
            // To conform clear all data in cart.
            function clear_cart() {
                var result = confirm('Hapus Semua Pesanan di keranjang?');

                if (result) {
                    window.location = "<?php echo base_url(); ?>produk/remove/all";
                } else {
                    return false; // cancel button
                }
            }
        </script>
  <section>
	<div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Keranjang Belanja</li>
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
  	  <h2 class="title text-center">Keranjang Belanja</h2>
                <?php   if($this->cart->total_items() == 0 ) { ?>
                   <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check sign"></i> Keranjang anda kosong, silakan berbelanja.
                            </div>
                <?php } else { ?>
                  <table class="table-keranjang" width="100%;">
                  <thead><tr class='tab_bg' align='center' height=23>
                      <th><span class='table'>No</th>
                      <th><span class='table'>Nama Produk</th>
                      <th><span class='table'>Qty</th>
                      <th><span class='table'>Harga</th>
                      <th><span class='table'>Sub Total</th>
                      <th><span class='table'></th></tr>

          </thead>
          <tbody>
                  <form action="<?php echo site_url();?>produk/update_cart" method='POST' accept-charset="utf-8">
                    <?php
                    $grand_total = 0;
                    $i = 1;
                    foreach ($this->cart->contents() as $item):
                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                        echo form_hidden('cart[' . $item['id'] . '][ukm_nama]', $item['ukm_nama']);
                        ?>
                        <tr>
                            <td><?php echo $i++; ?> </td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?></td>
                            <td>Rp.<?php echo number_format($item['price'],0,',','.'); ?></td>
                            <td>Rp.<?php echo number_format($item['subtotal'],0,',','.') ?></td>
                            <td><a href="<?php echo site_url();?>produk/remove/<?php echo $item['rowid'];?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                         <?php endforeach; ?>
       
                      <tr>
                        <td align="right" colspan="4">Total </td>
                        <td align="right"><b>Rp.<?php echo number_format($this->cart->total(),0,',','.'); ?></b></td>
                      </tr>
                      <tr>
                        <td colspan="6"><br /><input type="submit" class='btn btn-danger' value="Update Cart"> <a href="<?php echo site_url();?>pesanan"><input class="btn btn-default" value="Selesai"></a> <a href="<?php echo site_url();?>">
                         <a href="<?php echo base_url()?>produk" class="btn btn-default">Lanjut Belanja</a></td>
                      </tr>
            </tbody>
      </table>
  </form>
  <?php } ?>
  </div>
</div>
</div>
</div>
</div>
</section>
<div class="end"></div>