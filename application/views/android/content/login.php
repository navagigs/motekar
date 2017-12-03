 <div class="page-header bg-white">
            <div class="breadcrumb">
              <a href="<?php echo site_url();?>android">Home</a><span>·</span>Login
            </div>
            <h1 class="page-title">Login User</h1>
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
            <form action="<?php echo site_url();?>android/ceklogin" method="post" enctype="multipart/form-data">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="text" id="username" required name="pelanggan_username" />
                <label class="mdl-textfield__label" for="username">Username</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                <input class="mdl-textfield__input" type="password" name="pelanggan_password" required id="password" />
                <label class="mdl-textfield__label" for="password">Password</label>
              </div>
            <a class="left" href="<?php echo site_url(); ?>android/signup">belum punya akun?</a>
            <input  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary right" type="submit" name="masuk" value="Login">
            <div class="clr"></div>
            </form>

            
          </div>