  <section>
  <div class="container">
        <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Login</li>
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
                    <h2 class="title text-center">Login</h2>
                   <div class="block-flat">
                   <h4>Login Terlebih dahulu</h4><br>
                <div class="content">
                 <?php if ($this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-close sign"></i><?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>login/ceklogin" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr>
                                        <td width="200">
                                            <label for="jenis_nama" class="control-label">Username <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" name="pelanggan_username" id="user" required class="form-control" onblur="clearText(this)" onfocus="clearText(this)" placeholder="Username" autocomplete="off"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="200">
                                            <label for="jenis_nama" class="control-label">Password <span class="required">*</span></label>
                                        </td>
                                        <td>
                                                 <input type="password" name="pelanggan_password" id="pass" required class="form-control" onblur="clearText(this)" onfocus="clearText(this)" placeholder="Password" autocomplete="off"/>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                      <div class='center'>
                            <input class="btn btn-default" type="submit" name="masuk" value="Login">
                            <a class="btn btn-default" href="<?php echo site_url(); ?>signup">Belum Punya Akun?</a>
                        </div>
                    </form>

      </div>
    </div>
  </div>
</section>
  <div class="end"></div>

