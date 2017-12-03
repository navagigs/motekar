<?php error_reporting(0); date_default_timezone_set('Asia/Jakarta'); session_start();?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Motekar </title>
    <link href="<?php echo base_url();?>templates/default/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/default/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/default/assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/default/assets/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/default/assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/default/assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/default/assets/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="">
</head>
<body>
    <header id="header">
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="social-icons pull-left">
                            <ul class="nav navbar-nav">
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a href=""><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo site_url();?>keranjang"><i class="fa fa-shopping-cart"></i> (<?php echo $this->cart->total_items(); ?>) Keranjang Belanja</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <h2><a href="<?php echo site_url();?>home">MOTEKAR</a></h2>
                        </div>
                
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                            <?php if ($this->session->userdata('logged_in2') == FALSE) { ?>
                                <li><a href="<?php echo site_url();?>login"><i class="fa fa-sign-in"></i> Login</a></li>
                                 <li><a href="<?php echo site_url();?>signup"><i class="fa fa-plus"></i> Daftar</a></li>
                                <?php } else { ?>
                                <li><a href="<?php echo site_url();?>profile"><i class="fa fa-user"></i> <?php echo $pelanggan->pelanggan_nama; ?></a></li>
                                 <li><a href="<?php echo site_url();?>pesanan/detail/<?php echo $pelanggan->pelanggan_username; ?>"><i class="fa fa-list"></i> Pesanan</a></li>

                                 <li><a href="<?php echo site_url();?>pesanan/pengiriman"><i class="fa fa-share"></i> Pengiriman</a></li>

                                 <li><a href="<?php echo site_url();?>login/keluar"><i class="fa fa-sign-in"></i> Logout</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href='<?php echo site_url();?>home'>Home</a></li>
                                <li><a href='<?php echo site_url();?>produk'>Produk</a></li>
                                <li><a href='<?php echo site_url();?>keranjang'>Keranjang Belanja</a></li>
                                <li>
                                    <a href=''>Informasi<i class="fa fa-angle-down"></i></a>
                                    <ul class='sub-menu'>
                                        <li class='dropdown'><a href='<?php echo site_url();?>informasi/tentang'>Tentang Kami</a></li>
                                        <li class='dropdown'><a href='<?php echo site_url();?>informasi/kontak'>Kontak Kami</a></li>
                                        <li class='dropdown'><a href='<?php echo site_url();?>informasi/carapembelian'>Cara Pembelian</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <form action="<?php echo site_url(); ?>search" method="post"">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-default search-button" value="" ><i class="fa fa-search"></i></button>
                            </div>
                            <div class="pull-right">
                                <input type="text" name="q" class="form-control search-input" placeholder="Cari semua barang disini"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <?php echo $this->load->view($content); ?>

    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="companyinfo">
                            <h2><span>MOTEKAR</span></h2>
                        </div>
                    </div>
                    <div class="col-sm-5">
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="<?php echo base_url();?>templates/default/assets/images/home/map.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2017 MOTEKAR. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="#" href="">MOTEKAR</a></span></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?php echo base_url();?>templates/default/assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>templates/default/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>templates/default/assets/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url();?>templates/default/assets/js/price-range.js"></script>
    <script src="<?php echo base_url();?>templates/default/assets/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>templates/default/assets/js/main.js"></script>
</body>
</html>