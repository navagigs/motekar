      <script type="text/javascript">
            // To conform clear all data in cart.
            function clear_cart() {
                var result = confirm('Hapus Semua Pesanan di keranjang?');

                if (result) {
                    window.location = "<?php echo base_url(); ?>produk_android/remove/all";
                } else {
                    return false; // cancel button
                }
            }
        </script>
        <div class="page-header bg-white">
            <div class="breadcrumb">
              <a href="<?php echo base_url(); ?>android">Home</a><span>·</span>Keranjang Belanja
            </div>
            <h1 class="page-title">Keranjang Belanja</h1>
            <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                        <?php echo $this->session->flashdata('success'); ?>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                        <?php echo $this->session->flashdata('warning'); ?>
                        <?php } else { ?>
                        <?php echo $this->session->flashdata('error'); ?>
                        <?php } ?>
                    <?php } ?>
                <?php   if($this->cart->total_items() == 0 ) { ?>
            <hr>
                 <a href="<?php echo base_url()?>produk_android" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent border">Mulai Belanja</a>
                <?php } else { ?>
            
          <table class="table-keranjang" width="100%;">
          <hr>
          <tbody>
                  <form action="<?php echo site_url();?>produk_android/update_cart" method='POST' accept-charset="utf-8">
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
                            <td><a href="<?php echo site_url();?>produk_android/remove/<?php echo $item['rowid'];?>"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                      <?php endforeach; ?>
                      <tr>
                        <td align="right" colspan="4">Total </td>
                        <td align="right"><b>Rp.<?php echo number_format($this->cart->total(),0,',','.'); ?></b></td>
                      </tr>
                      <tr>
                        <td colspan="6"><br />
                         <input type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent border" value="Update Cart"> <a href="<?php echo site_url();?>pesanan_android">
                         <a href="<?php echo base_url()?>produk_android" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent border">Lanjut Belanja</a>
                        <a href="<?php echo site_url();?>pesanan_android"> <input class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent border" value='Selesai'></a> <a href="<?php echo site_url();?>android"></a></td>
                      </tr>
            </form>
            </tbody>
      </table>
      </div>
  <?php } ?>