<?php if ($action == 'n' || empty($action)){ ?>
    <section>
  <div class="container">
        <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Konfirmasi Pembayaran</li>
        </ol>
      </div>
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
                    <h2 class="title text-center">Konfirmasi Pembayaran</h2>

      <!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->

                   <div class="block-flat">
                <div class="content">
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>informasi/konfirmasi_post" method="post" enctype="multipart/form-data">
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                <tr>
                                        <td width="200">
                                            <label for="invoices_id" class="control-label">No.Pesanan #INOVICES-<span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" name="invoices_id" id="invoices_id" value="<?php echo $invoices_id; ?>" class="form-control"  maxlength="2" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="200">
                                            <label for="konfirmasi_jumlah" required="" class="control-label">Jumlah Transfer <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="number" name="konfirmasi_jumlah" id="konfirmasi_jumlah" required class="form-control" required="" value="<?php echo $invoices_subtotal; ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="200">
                                            <label for="konfirmasi_bank"  class="control-label">Nama Bank <span class="required">*</span></label>
                                        </td>
                                        <td>
                                                 <input type="text" required="" name="konfirmasi_bank" id="konfirmasi_bank" required class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="200">
                                            <label for="konfirmasi_bukti"  class="control-label">Upload Bukti Transfer <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file"  name="konfirmasi_bukti" id="konfirmasi_bukti" required class="form-control" />
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                      <div class='center'>
                            <input class="btn btn-default" type="submit" name="simpan" value="Kirim">
                        </div>
                    </form>

      </div>
    </div>
  </div>
</section>
  <div class="end"></div>
<?php } ?>