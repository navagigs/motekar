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
                    <!-- ========== Button ========== -->
                    <form action="" method="post" id="form">
                        <div class='btn-navigation'> 
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>admin/pengiriman/tambah"><i class="fa fa-plus-circle"></i> Tambah pengiriman</a>
                            </div>  
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>admin/pengiriman"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='btn-search'>Cari Berdasarkan :</div>
                            <div class='col-md-3 col-sm-12'>
                                <div class='button-search'><?php array_pilihan('cari', $berdasarkan, $cari);?></div>
                            </div>
                            <div class='col-md-3 col-sm-12'>
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" value="<?php echo $q;?>"/>
                                    <span class="input-group-btn">
                                        <button type="submit" name="kirim" class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- ========== End Button ========== -->
                    <!-- ========== Table ========== -->
                    <div class="table-responsive">
                        <table class="hover">
                            <thead class="primary-emphasis" >
                                <tr>
        	                        <th width="30">#</th>
                                    <th>NO.INVOICES</th>
                                    <th>NAMA PELANGGAN</th>
                                    <th>NORESI</th>
                                    <th>PENGIRIMAN VIA</th>
                                    <th>STATUS</th>
                                    <th width="150">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = $page+1;
		                        $like_pengiriman[$cari] = $q;
                            if ($jml_data > 0) {
                                foreach($this->ADM->grid_all_pengiriman('', 'pengiriman_noresi', 'DESC', $batas, $page , '', $like_pengiriman) as $row) {
		                        ?>
                                <tr>
        	                        <td align="center"><?php echo $i;?></td>
                                    <td><b>#INVOICES<?php echo $row->invoices_id;?></b></td>
                                    <td><?php echo $row->pelanggan_nama;?></td>
                                    <td><?php echo $row->pengiriman_noresi;?></td>
                                    <td><?php echo $row->pengiriman_via;?></td>
                                    <td><?php if($row->pengiriman_status == 'N') { ?>
                                       <a href="#" class="btn btn-danger add-to-cart"><i class="fa fa-share"></i>BELUM DI ACC</a>
                                        <?php } else { ?>
                                        <a href="#" class="btn btn-success add-to-cart"><i class="fa fa-share"></i>SUDAH DI ACC</a>
                                        <?php } ?></td>
                                    <td align="center">
                                        <!-- ========== EDIT DETAIL HAPUS ========== -->
                                        <div class="btn-group">
								            <button type="button" class="btn btn-default btn-xs">Actions</button>
								            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
									            <span class="caret"></span>
									            <span class="sr-only">Toggle Dropdown</span>
								            </button>
								            <ul class="dropdown-menu pull-right" role="menu">
                                              <?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('admin_level') == 'admin') { ?>
                                                <li>
                                                    <a href="<?php echo site_url();?>admin/pengiriman/status/<?php echo $row->pengiriman_id; ?>" title="Status"><i class='fa fa-share'></i> Status</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->pengiriman_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->pengiriman_noresi; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
                                                </li>
                                            <?php } ?>
									            <li>
                                                    <a href="<?php echo site_url();?>admin/pengiriman/edit/<?php echo $row->pengiriman_id; ?>" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
                                                </li>
									            <!--li>
                                                    <a data-toggle="modal" data-target="#mod-info" type="button"  href="<?php echo site_url();?>admin/pengiriman_detail/<?php echo $row->pengiriman_id;?>" rel="detail" title="Detail <?php echo $row->pengiriman_noresi; ?>"><i class='fa fa-eye'></i> Detail</a>
                                                </li-->
								            </ul>
								        </div>	
                                        <!-- ========== End EDIT DETAIL HAPUS ========== -->
                                    </td>
                                </tr>
                                <?php
                                    $i++;
	                            } 
	                        } else {
                                ?>
                                <tr>
                                    <td colspan="7">Belum ada data!.</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <!-- ========== End Table ========== -->
                    </div>
                    <div id='pagination'>
                        <div class='pagination-left'>Total : <?php echo $jml_data;?></div>
                        <div class='pagination-right'>
                            <ul class="pagination">
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'admin/pengiriman/view', $id=""); }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->

<!-- ========== Modal Detail ========== -->
<div class="modal fade" id="mod-info" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
                   
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ========== End Modal Detail ========== -->

<!-- ========== Modal Konfirmasi ========== -->
<div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Konfirmasi</h4>
			</div>

			<div class="modal-body" style="background:#d9534f;color:#fff">
				Apakah Anda yakin ingin menghapus data ini?
			</div>

			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-danger" id="hapus-pengiriman">Ya</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>

		</div>
	</div>
</div>
<!-- ========== End Modal Konfirmasi ========== -->

<!-- ================================================== END VIEW ================================================== -->

<!-- ================================================== TAMBAH ================================================== -->
<?php } elseif ($action == 'tambah') { ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Tambah <small><?php echo $breadcrumb; ?></small></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>admin/pengiriman"><?php echo $breadcrumb; ?></a></li>
        <li class="active">Tambah</li>
	</ol>	
</div>
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>admin/pengiriman/tambah" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr>
                                        <td>
                                            <label for="kategori_id" class="control-label">Nama Pelanggan <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM pelanggan ORDER BY pelanggan_nama ASC", 'pelanggan_nama', 'pelanggan_nama', 'pelanggan_nama', $pelanggan_nama);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="invoices" class="control-label">Nomor Invoices <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM invoices ORDER BY invoices_id ASC", 'invoices_id', 'invoices_id', 'invoices_id', $invoices_id);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="pengiriman_noresi" class="control-label">Noresi<span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" required class="form-control input-sm" placeholder="Masukan noresi pengiriman" size="100" name="pengiriman_noresi" id="pengiriman_noresi" value="<?php echo $pengiriman_noresi; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="pengiriman_noresi" class="control-label">Kirim Via<span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" required class="form-control input-sm" placeholder="Masukan Pengiriman Via" size="100" name="pengiriman_via" id="pengiriman_via" value="<?php echo $pengiriman_via; ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/pengiriman'"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
<!-- ================================================== END TAMBAH ================================================== -->

<!-- ================================================== EDIT ================================================== -->
<?php } elseif ($action == 'edit') { ?> 
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Konfrimasi Pengiriman</small></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>admin/pesanan">pesanan</a></li>
        <li class="active">Konfrimasi Pengiriman</li>
	</ol>	
</div>
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>admin/pengiriman/edit/<?php echo $pengiriman_id; ?>" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <input type="hidden" name="pengiriman_id" value="<?php echo $pengiriman_id;?>">
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
    	                           
                                    <tr>
                                        <td>
                                            <label for="kategori_id" class="control-label">Nama Pelanggan <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" required class="form-control input-sm"  size="100" name="pelanggan_nama" id="pelanggan_nama" value="<?php echo $pelanggan_nama; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="invoices" class="control-label">Nomor Invoices <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" required class="form-control input-sm" size="100" name="invoices_id" id="invoices_id" value="<?php echo $invoices_id; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="pengiriman_noresi" class="control-label">Noresi<span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" required class="form-control input-sm" placeholder="Masukan noresi pengiriman" size="100" name="pengiriman_noresi" id="pengiriman_noresi" value="<?php echo $pengiriman_noresi; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="pengiriman_noresi" class="control-label">Kirim Via<span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" required class="form-control input-sm" placeholder="Masukan Pengiriman Via" size="100" name="pengiriman_via" id="pengiriman_via" value="<?php echo $pengiriman_via; ?>">
                                        </td>
                                    </tr>
                                    <?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('admin_level') == 'admin') { ?>
                                      <tr>
                                        <td>
                                            <label for="pengiriman_status" class="control-label">Status </label>
                                        </td>
                                        <td>
                                            <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" name="pengiriman_status" id="ukm" class="icheck" value="N"  <?php echo $n = ($pengiriman_status=='N')?'checked':'';?>/> BELUM DI ACC
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  name="pengiriman_status" id="admin" class="icheck" value="Y" <?php echo $y = ($pengiriman_status=='Y')?'checked':'';?>/> SUDAH DI ACC
                                                </label> 
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/pesanan'"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content --> 
<!-- ================================================== END EDIT ================================================== -->

<!-- ================================================== DETAIL ================================================== -->
<?php } elseif ($action == 'detail') { ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/css/formstyle.css"/>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail. pengiriman Kasur</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" align="center" id="form_detail">
            <tr class="awal">
                <td><strong>Kode</strong></td>
                <td>: <strong><?php echo $pengiriman->pengiriman_id; ?></strong></td>
    	    </tr>
    	    <tr>
        	    <td width="130">noresi pengiriman</td>
                <td>: <?php echo  $pengiriman->pengiriman_noresi; ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
</div>
<?php } ?>
<!-- ================================================== END DETAIL ================================================== -->
<!-- Include More Js For This Content -->  
<!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.parsley/parsley.js"></script>
