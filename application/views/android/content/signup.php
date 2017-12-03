 <div class="page-header bg-white">
            <div class="breadcrumb">
              <a href="<?php echo site_url();?>android">Home</a><span>·</span>Daftar User
            </div>
            <h1 class="page-title">Daftar User</h1>
			<div class="account-data"> <!-- text fields -->
                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                        <?php echo $this->session->flashdata('success'); ?>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                        <?php echo $this->session->flashdata('warning'); ?>
                        <?php } else { ?>
                        <?php echo $this->session->flashdata('error'); ?>
                        <?php } ?>
                    <?php } ?>
            <form action="<?php echo site_url();?>android/tambah" method="post" enctype="multipart/form-data">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" id="pelanggan_nama" required  name="pelanggan_nama" />
                <label class="mdl-textfield__label" for="pelanggan_nama">Nama</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" id="pelanggan_username" required name="pelanggan_username" />
                <label class="mdl-textfield__label" for="pelanggan_username">Username</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="password" name="pelanggan_password" required  id="password" />
                <label class="mdl-textfield__label" for="pelanggan_password">Password</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" id="pelanggan_alamat" required  name="pelanggan_alamat" />
                <label class="mdl-textfield__label" for="pelanggan_alamat">Alamat</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" id="pelanggan_notlp" required  name="pelanggan_notlp" />
                <label class="mdl-textfield__label" for="pelanggan_notlp">No.Telepon</label>
              </div>
            <input  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary right" type="submit" name="simpan" value="Daftar">
            <div class="clr">
            </form>

            
          </div>