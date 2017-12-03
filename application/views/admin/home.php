<?php error_reporting(0); date_default_timezone_set('Asia/Jakarta'); session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>ADMINISTRATOR - Motekar</title>
<link href="<?php echo base_url();?>templates/admin/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
<link href="<?php echo base_url();?>templates/admin/fonts/font-awesome-4/css/font-awesome.min.css" rel="stylesheet" />
<link href='<?php echo base_url();?>templates/admin/fonts/css/fonts.css' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url();?>templates/admin/js/jquery.nanoscroller/nanoscroller.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>templates/admin/css/style.css" rel="stylesheet" type="text/css" />    
<script src="<?php echo base_url();?>templates/admin/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/date/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/date/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/behaviour/general.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.ui/jquery-ui.js"></script>

</head>
    
    <body>
        <!-- ==================== Navbar ==================== -->   
        <div id="head-nav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="fa fa-gear"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span>Motekar</span></a>
                </div>
                <div class="navbar-collapse collapse">
                    <!-- ========== Navbar Left ========== -->
                    <ul class="nav navbar-nav left-nav">
                        <li class="active"><a href="<?php echo base_url();?>admin"><i class="fa fa-home"></i></a></li>
                       <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Large menu <b class="caret"></b></a>
                            <ul class="dropdown-menu col-menu-2">
                                <li class="col-sm-6 no-padding">
                                    <ul>
                                        <li class="dropdown-header"><i class="fa fa-group"></i>Users</li>
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="dropdown-header"><i class="fa fa-gear"></i>Config</li>
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li> 
                                    </ul>
                                </li>
                                <li  class="col-sm-6 no-padding">
                                    <ul>
                                        <li class="dropdown-header"><i class="fa fa-legal"></i>Sales</li>
                                        <li><a href="#">New sale</a></li>
                                        <li><a href="#">Register a product</a></li>
                                        <li><a href="#">Register a client</a></li> 
                                        <li><a href="#">Month sales</a></li>
                                        <li><a href="#">Delivered orders</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>-->
                    </ul>
                    <!-- ========== End Navbar Left ========== -->
                    <!-- ========== Navbar Right ========== -->
                    <ul class="nav navbar-nav navbar-right user-nav">
                        <li class="dropdown profile_menu">
                            <!-- dropdown -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img alt="Avatar" src="<?php echo base_url();?>templates/admin/images/avatar2.jpg" />
                                <span><?php echo $admin->admin_username; ?></span> 
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url();?>" target="_blank">Lihat Website</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url();?>internal/keluar">Logout</a></li>
                            </ul>
                        </li>
                    </ul>			
                    <ul class="nav navbar-nav navbar-right not-nav" >
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.nav-collapse animate-collapse -->
            </div><!-- /.container-fluid -->
        </div><!-- /.navbar -->
        <!-- ==================== End Navbar ==================== -->   
        
        <div id="cl-wrapper" class="fixed-menu">
            <!-- ==================== Sidebar ==================== -->
            <div class="cl-sidebar" data-position="right">
                <div class="cl-toggle"><i class="fa fa-bars"></i></div>
                <div class="cl-navblock">
                    <div class="menu-space">
                        <div class="content">
                            <ul class="cl-vnavigation" >
                                <li> <a href='<?php echo base_url();?>admin'><i class='fa fa-home'></i> <span>Dashboard</span> </a></li>

                            <?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('admin_level') == 'admin') { ?>
                                <li> <a href='<?php echo base_url();?>admin/pegawai'><i class='fa fa-users'></i> <span>Admin</span> </a></li>
                                <li> <a href='<?php echo base_url();?>admin/ukm'><i class='fa fa-folder-open'></i> <span>UKM</span> </a></li>
                                <li> <a href='<?php echo base_url();?>admin/pelanggan'><i class='fa fa-user'></i> <span>Pelanggan</span> </a></li>
                                <li> <a href='<?php echo base_url();?>admin/pesanan'><i class='fa fa-dollar'></i> <span>Pesanan</span> </a></li>
                                <li> <a href='<?php echo base_url();?>admin/konfirmasi'><i class='fa fa-file'></i> <span>Konfirmasi Pembayaran</span></a></li>
                                <!--li> <a href='<?php echo base_url();?>admin/pengiriman'><i class='fa fa-share'></i> <span>Konfirmasi Pengiriman</span></a></li-->
                                <li> <a href='<?php echo base_url();?>admin/transaksi_ukm'><i class='fa fa-bar-chart'></i> <span>Transaksi UKM</span> </a></li>
                                <li> <a href='<?php echo base_url();?>admin/bukti'><i class='fa fa-file'></i> <span>Bukti</span> </a></li>
                                <!--li> <a href='<?php echo base_url();?>admin/laporan'><i class='fa fa-file'></i> <span>Laporan</span> </a></li-->
                            <?php } else { ?> 
                                <li> <a href=''><i class='fa fa-list'></i> <span>Data produk</span> </a>
                                <ul class='sub-menu'>
                                        <li <?php if($breadcrumb == "produk") echo "class='active'"; ?>><a href='<?php echo base_url();?>admin/produk' title='produk'>Produk</a></li>
                                        <li <?php if($breadcrumb == "kategori produk") echo "class='active'"; ?>><a href='<?php echo base_url();?>admin/kategori' title='kategori produk'>Kategori Produk</a></li>
                                </ul>
                                </li>
                                <li> <a href='<?php echo base_url();?>admin/pesanan'><i class='fa fa-dollar'></i> <span>Pesanan</span> </a></li>
                                <li> <a href='<?php echo base_url();?>admin/transaksi_ukm'><i class='fa fa-bar-chart'></i> <span>Transaksi UKM</span> </a></li>
                                <li> <a href='<?php echo base_url();?>admin/bukti'><i class='fa fa-file'></i> <span>Bukti</span> </a></li>
                                <!--li> <a href='<?php echo base_url();?>admin/pengiriman'><i class='fa fa-share'></i> <span>Konfirmasi Pengiriman</span></a></li>
                                <!--li> <a href='<?php echo base_url();?>admin/pelanggan'><i class='fa fa-user'></i> <span>Pelanggan</span> </a></li-->
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="text-center collapse-button" style="padding:7px 9px;">
                        <button id="sidebar-collapse" class="btn btn-default" style="">
                            <i style="color:#fff;" class="fa fa-angle-left"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- ==================== End Sidebar ==================== -->
	        
            <!-- ==================== Content ==================== -->
            <div class="container-fluid" id="pcont">
                <?php $this->load->view($content);?>
			</div>
            <!-- ==================== End Content ==================== -->
        </div>
        <script>
            $(function(){
		        $('#modal-konfirmasi').on('show.bs.modal', function (event) {
                    var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                    // Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
			        var id = div.data('id') 
                    var modal = $(this)
                    // Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal.
                    // MENU UTAMA
                    modal.find('#hapus-kategori').attr("href","<?php echo site_url();?>admin/kategori/hapus/"+id); 
                    modal.find('#hapus-produk').attr("href","<?php echo site_url();?>admin/produk/hapus/"+id);
                    modal.find('#hapus-admin').attr("href","<?php echo site_url();?>admin/pegawai/hapus/"+id);
                    modal.find('#hapus-pelanggan').attr("href","<?php echo site_url();?>admin/pelanggan/hapus/"+id);
                    modal.find('#hapus-pengiriman').attr("href","<?php echo site_url();?>admin/pengiriman/hapus/"+id);
                    modal.find('#hapus-ukm').attr("href","<?php echo site_url();?>admin/ukm/hapus/"+id);
                    modal.find('#hapus-pesanan').attr("href","<?php echo site_url();?>admin/pesanan/hapus/"+id);
                    modal.find('#hapus-bukti').attr("href","<?php echo site_url();?>admin/bukti/hapus/"+id);
                });
            });
        </script>  
        <!-- Include Js Bootstrap -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript">
            $(document).ready(function(){
            //initialize the javascript
            App.init();
            App.dashBoard();        
        
            introJs().setOption('showBullets', false).start();
            });
        </script>
        <script src="<?php echo base_url();?>templates/admin/js/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.flot/jquery.flot.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.flot/jquery.flot.pie.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.flot/jquery.flot.resize.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.flot/jquery.flot.labels.js"></script> 
    </body>
</html>