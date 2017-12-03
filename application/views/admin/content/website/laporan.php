<!-- Include More Css For This Content -->
<link href="<?php echo base_url();?>templates/admin/js/jquery.icheck/skins/square/blue.css" rel="stylesheet">
<!-- ================================================== VIEW ================================================== -->
<?php if ($action == 'view' || empty($action)){ ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3><?php echo $breadcrumb; ?></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li class="active"><?php echo $breadcrumb; ?></li>
	</ol>	
</div>
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="block-flat">
                <div class="content">
                     <form role="form" action="<?php echo base_url();?>admin/laporanexcel" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <div class="form-group">
                                            <label>Dari Tanggal <span class="required">*</span></label>
                                            <input type="date"  name="dari" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Sampai Tanggal <span class="required">*</span></label>
                                            <input type="date"  name="sampai" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" name="buat" value="Buat Laporan">
                                </div>
                                       
                                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->

<?php }  ?>