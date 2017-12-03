<!-- Breadcrumb -->
<div class="page-head">
    <h3>Dashboard <small>Control Panel</small></h3>
    <ol class="breadcrumb">
        <li class="active"><i class='fa fa-home'></i> Dashboard</li>
    </ol>	
</div> 
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class='row'>
        <div class="col-md-12">
            <div class="block-flat">
                <div class="header">
				    <h4>Selamat datang di Halaman Administrator <?php echo $web->identitas_website;?></h4>
				</div>
				<div class="content">
                    <div class='blockquote'>
				        <div class='text-orange'><h5>Hallo, Sitenav</h5></div>
                        <p>Sistem informasi ini untuk administrator atau operator menjalankan data yang akan dibuat</p>
                    </div>
                </div>
            </div>
        </div><!-- /.col-md-12 --> 	
                    <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?php echo $jml_data_berita;?></h3>
                                    <p>Berita</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-newspaper-o"></i>
                                </div>
                                <a href="<?php echo site_url();?>website/berita" class="small-box-footer">
                                    Lihat Berita <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3> <?php echo $jml_data_agenda;?></h3>
                                    <p> Agenda</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <a href="<?php echo site_url();?>website/agenda" class="small-box-footer">
                                    Lihat Agenda <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?php echo $jml_data_testimonial;?></h3>
                                    <p> Testimonial</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-group"></i>
                                </div>
                                <a href="<?php echo site_url();?>website/testimonial" class="small-box-footer">
                                    Lihat Testimonial <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?php echo $jml_data_komentar;?> </h3>
                                    <p>Komentar</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <a href="<?php echo site_url();?>website/komentar" class="small-box-footer">
                                    Lihat Komentar <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
    		</div>
        <div class="row">
        
        <div class="dash-cols">
            <div class="col-sm-6 col-md-6">
                <div class="widget-block white-box calendar-box">
                    <div class="col-md-6 blue-box calendar no-padding">
                        <div class="padding ui-datepicker"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="padding">
                            <h2 class="text-center"><?php echo hari_ini();?></h2>
                            <h1 class="day"><?php echo tanggal_sekarang();?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="widget-block photo white-box weather-box">
                    <div class="col-md-6 padding photo">
                        <h2 class="text-center"><?php echo hari_ini();?></h2>
                        <h1 class="day"><?php echo dateNow();?></h1>
                    </div>
                    <div class="col-md-6 blue-box">
                        <div class="padding text-center">
                            <canvas id="sun-icon" width="130" height="215"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-md-6 -->
        </div> <!-- /.dash-col --> 
        <div class="col-sm-12 col-md-12">
			<div class="block-flat">
                <div class="header">
                    <h3>Google Maps <?php echo $web->identitas_website;?></h3>
				</div>
                <div class="content" id="map" style="height: 300px;"></div>
            </div> 
        </div><!-- /.col-md-6 -->
    </div>
</div>
<!-- End Content -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/jquery.easypiechart/jquery.easy-pie-chart.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/bootstrap.switch/bootstrap-switch.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/jquery.select2/select2.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/bootstrap.slider/css/slider.css" />

	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.easypiechart/jquery.easy-pie-chart.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.switch/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?php echo base_url();?>templates/admin/js/jquery.select2/select2.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>templates/admin/js/skycons/skycons.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>templates/admin/js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>templates/admin/js/intro.js/intro.js" type="text/javascript"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>templates/admin/css/calendar.css" />

  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
              
//              menentukan koordinat titik tengah peta
              var myLatlng = new google.maps.LatLng(<?php echo $web->identitas_maps;?>);

//              pengaturan zoom dan titik tengah peta
              var myOptions = {
                  zoom: 15,
                  center: myLatlng
              };
              
//              menampilkan output pada element
              var map = new google.maps.Map(document.getElementById("map"), myOptions);
              
//              menambahkan marker
              var marker = new google.maps.Marker({
                   position: myLatlng,
                   map: map,
                   title:"Monas"
              });
        </script> 

  