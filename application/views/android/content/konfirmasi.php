<?php if ($action == 'n' || empty($action)){ ?>
 <div class="page-header bg-white">
            <div class="breadcrumb">
              <a href="<?php echo site_url();?>android">Home</a><span>·</span>Konfirmasi Pembayaran
            </div>
            <h1 class="page-title">Konfirmasi Pembayaran</h1>
			<div class="account-data"> <!-- text fields -->
 <form role="form" class="form-horizontal" action="<?php echo site_url();?>android/konfirmasi_post" method="post" enctype="multipart/form-data">
  			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" name="invoices_id" id="invoices_id" value="<?php echo $invoices_id; ?>" readonly />
                <label class="mdl-textfield__label" for="username">No.Pesanan #INOVICES-</label>
              </div>
  			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" name="konfirmasi_jumlah" id="konfirmasi_jumlah" required class="form-control" required="" value="<?php echo $invoices_subtotal; ?>" readonly />
                <label class="mdl-textfield__label" for="username">Jumlah Transfer</label>
            </div>
  			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" name="konfirmasi_bank" id="konfirmasi_bank" class="form-control" >
                <label class="mdl-textfield__label" for="username">Nama Bank</label>
            </div>
  			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="file"  name="konfirmasi_bukti" id="konfirmasi_bukti" class="form-control">
                <label class="mdl-textfield__label" for="konfirmasi_bukti">Upload Bukti</label>
            </div>
                      
            <input  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary right" type="submit" name="simpan" value="Kirim">
            <div class="clr">  
                    </form>
</div>
</div>
<?php } ?>