
    <section>
  <div class="container">
        <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Daftar</li>
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
                    <h2 class="title text-center">Daftar</h2>
                   <div class="block-flat">
                <div class="content">
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>signup/tambah" method="post">
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                <tr>
                                        <td width="200">
                                            <label for="pelanggan_nama" class="control-label">Nama Pelanggan <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" name="pelanggan_nama" id="pelanggan_nama" required class="form-control" required="" onblur="clearText(this)" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="200">
                                            <label for="pelanggan_username" required="" class="control-label">Username <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" name="pelanggan_username" id="pelanggan_username" required class="form-control" required="" onblur="clearText(this)" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="200">
                                            <label for="pelanggan_password"  class="control-label">Password <span class="required">*</span></label>
                                        </td>
                                        <td>
                                                 <input type="password" required="" name="pelanggan_password" id="pelanggan_password" required class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="200">
                                            <label for="pelanggan_alamat"  class="control-label">Alamat <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            
                                            <textarea name="pelanggan_alamat" required="" class="form-control"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="200">
                                            <label for="pelanggan_notlp"  class="control-label">No Telepon <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text"  required="" name="pelanggan_notlp" id="pelanggan_notlp" required class="form-control" onblur="clearText(this)" onfocus="clearText(this)"  autocomplete="off"/>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                      <div class='center'>
                            <input class="btn btn-default" type="submit" name="simpan" value="Signup">
                            <a class="btn btn-default" href='<?php echo site_url(); ?>login'>Sudah Punya Akun?</a>
                        </div>
                    </form>

      </div>
    </div>
  </div>
</section>
  <div class="end"></div>
