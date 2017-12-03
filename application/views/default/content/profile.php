
    <section>
  <div class="container">
        <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Profile</li>
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
                <div class="features_items">
                    <h2 class="title text-center">Profile</h2> 
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>profile/edit" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="pelanggan_id" value="<?php echo $pelanggan->pelanggan_id; ?>">
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr>
                                        <td width="200">
                                            <label for="pelanggan_nama" class="control-label">Nama Pelanggan <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $pelanggan->pelanggan_nama; ?>" name="pelanggan_nama" id="pelanggan_nama" required class="form-control" onblur="clearText(this)" onfocus="clearText(this)" placeholder="Nama Pelanggan" autocomplete="off"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="200">
                                            <label for="pelanggan_username" class="control-label">Username <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="disabled" value="<?php echo $pelanggan->pelanggan_username; ?>" name="pelanggan_username" id="pelanggan_username" required class="form-control" readonly/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="200">
                                            <label for="pelanggan_password" class="control-label">Password <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="password" value="" name="pelanggan_password" id="pelanggan_password" class="form-control" onblur="clearText(this)" onfocus="clearText(this)" placeholder="" autocomplete="off"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="200">
                                            <label for="pelanggan_alamat" class="control-label">Alamat <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea name="pelanggan_alamat" class="form-control"><?php echo $pelanggan->pelanggan_alamat; ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="200">
                                            <label for="pelanggan_notlp" class="control-label">No Telepon <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $pelanggan->pelanggan_notlp; ?>" name="pelanggan_notlp" id="pelanggan_notlp" required class="form-control" onblur="clearText(this)" onfocus="clearText(this)" placeholder="No Telp Pelanggan" autocomplete="off"/>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    
                            <input class="btn btn-default" type="submit" name="simpan" value="Edit Profile">
                      
                    </form>

      </div>
    </div>
  </div>
</section>
  <div class="end"></div>
