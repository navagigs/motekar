<?php error_reporting(0); date_default_timezone_set('Asia/Jakarta'); session_start();?>
<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title>Motekar</title>
    <meta name="description" content="">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,500" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo base_url();?>templates/android/css/animsition.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/android/css/sweetalert.css">
    <link rel="stylesheet" href="<?php echo base_url();?>templates/android/css/material.blue-light_blue.min.css">  
    <link rel="stylesheet" href="<?php echo base_url();?>templates/android/css/swipebox.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>templates/android/css/style.css">
</head>

  <body>
    <div>
      
      <!-- Header -->
      <div class="mdl-layout mdl-js-layout mdl-layout--overlay-drawer-button">
        <header class="mdl-layout__header mdl-shadow--1dp bg-white">
          <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">MOTEKAR</span>
            <!-- Spacer -->
            <div class="mdl-layout-spacer"></div>
            <!-- Right Menu -->
        </header>
        <!-- Sidebar -->
        <div class="mdl-layout__drawer">

          <!-- Top -->
          <div class="drawer-header">
            <img src="<?php echo base_url();?>templates/android/img/user.jpg" alt="">
          </div>
          
          <!-- Main Navigation -->
          <nav class="mdl-navigation">
            <div class="mdl-collapse first">
           <?php if ($this->session->userdata('logged_in2') == TRUEE) { ?>
                <a class="mdl-navigation__link mdl-collapse__button">
                    <i class="material-icons mdl-collapse__icon mdl-animation--default">arrow_drop_down</i>
                    <span> <?php echo $pelanggan->pelanggan_nama; ?></span>
                </a>
                <div class="mdl-collapse__content-wrapper">
                  <div class="mdl-collapse__content mdl-animation--default" style="margin-top: -156px;">
                    <a class="mdl-navigation__link" href="<?php echo site_url();?>pesanan_android/detail/<?php echo $pelanggan->pelanggan_username; ?>">Pesanan</a>
                    <a class="mdl-navigation__link" href="<?php echo site_url();?>pesanan_android/pengiriman">Pengriman</a>
                    <a class="mdl-navigation__link" href="<?php echo site_url();?>android/keluar">Logout</a>
                  </div>
                </div>
            <?php } else { ?>
            <br><br><br>
            <?php } ?>
            </div>
            <a class="mdl-navigation__link animsition-link" href="<?php echo site_url();?>android"><i class="material-icons">home</i><span>Home</span></a>
            <a class="mdl-navigation__link animsition-link" href="<?php echo site_url();?>produk_android"><i class="material-icons">store</i><span>Produk</span></a>
             <div class="mdl-collapse">
                <a class="mdl-navigation__link mdl-collapse__button"><i class="material-icons">book</i>
                    <i class="material-icons mdl-collapse__icon mdl-animation--default">expand_more</i>
                    <span>Kategori</span>
                </a>
                <div class="mdl-collapse__content-wrapper">
                  <div class="mdl-collapse__content mdl-animation--default" style="margin-top: -156px;">
                  <?php
                  $jml_data = $this->ADM->count_all_kategori();
                  if ($jml_data > 0) {
                  foreach($this->ADM->grid_all_kategori('*', 'kategori_nama', 'DESC', $jml_data, '', '', '') as $row) {?>
                    <a class="mdl-navigation__link animsition-link" href="<?php echo base_url();?>produk_android/detailkategori/<?php echo $row->kategori_id;?>"><?php echo $row->kategori_nama;?></a>
                  <?php }  } else {?>
                    <h4 class="panel-title"><a href="">Data Tidak Ada></a></h4>
                 <?php } ?>
                  </div>
                </div>
            </div>

            <a class="mdl-navigation__link animsition-link" href="<?php echo site_url();?>keranjang_android"><i class="material-icons">shopping_cart</i><span>Keranjang (<?php echo $this->cart->total_items(); ?>)</span></a>
            <div class="drawer-separator"></div>
            <a class="mdl-navigation__link animsition-link" href="<?php echo site_url();?>android/info"><i class="material-icons">info</i><span>Info</span></a>
            <a class="mdl-navigation__link animsition-link" href="<?php echo site_url();?>android/kontak"><i class="material-icons">contacts</i><span>Kontak</span></a>
            <div class="mdl-collapse">
                <a class="mdl-navigation__link mdl-collapse__button"><i class="material-icons">dashboard</i>
                    <i class="material-icons mdl-collapse__icon mdl-animation--default">expand_more</i>
                    <span>Account</span>
                </a>
                <div class="mdl-collapse__content-wrapper">
                  <div class="mdl-collapse__content mdl-animation--default" style="margin-top: -156px;">
                    <a class="mdl-navigation__link animsition-link" href="<?php echo site_url();?>android/signup">Daftar User</a>
                    <a class="mdl-navigation__link animsition-link" href="<?php echo site_url();?>android/login">Login User</a>
                    <a class="mdl-navigation__link animsition-link" href="<?php echo site_url();?>internal">Login</a>
                  </div>
                </div>
            </div>
          </nav>
        </div>
        
        <!-- Page Content -->
        <main class="mdl-layout__content">
         <?php echo $this->load->view($content); ?>
        </main>
      </div>
    </div>
    <script src="<?php echo base_url();?>templates/android/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url();?>templates/android/js/jquery.animsition.js"></script>
    <script src="<?php echo base_url();?>templates/android/js/sweetalert.min.js"></script> 
    <script src="<?php echo base_url();?>templates/android/js/material.min.js"></script>
    <script src="<?php echo base_url();?>templates/android/js/jquery.swipebox.min.js"></script>
    <script src="<?php echo base_url();?>templates/android/js/function.js"></script>
  </body>
</html>
