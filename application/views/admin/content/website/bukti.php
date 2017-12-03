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
                 

                     <?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('admin_level') == 'admin') { ?>   <!-- ========== Button ========== -->
                    <form action="" method="post" id="form">
                        <div class='btn-navigation'> 
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>admin/bukti/tambah"><i class="fa fa-plus-circle"></i> Tambah bukti</a>
                            </div>  
                        </div>
                       
                        </div>
                    </form>
                    <!-- ========== End Button ========== -->
                        <div class="table-responsive">
                        <table class="hover">
                            <thead class="primary-emphasis">
                                <tr>
                                    <th width="30">#</th>
                                    <th width="300">UKM NAMA</th>
                                    <th width="300">BUKTI</th>
                                    <th width="300">PENDAPATAN</th>
                                    <th width="200">TANGGAL</th>
                                    <th width="120">AKSI</th>
                               </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i  = $page+1;
                                $like_bukti[$cari]  = $q;
                            if ($jml_data > 0){
                                foreach ($this->ADM->grid_all_bukti2('', 'bukti_tanggal', 'DESC', $batas, $page, '', $like_bukti) as $row){
                                ?>
                                <tr>
                                    <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->ukm_nama;?></td>
                                    <td><img src="<?php echo base_url()."assets/images/bukti/kecil_".$row->bukti_gambar;?>" width="80"></td>
                                    <td><?php echo $row->bukti_pendapatan;?></td>
                                    <td><?php echo dateIndo($row->bukti_tanggal);?></td>
                                    <td align="center">
                                        <!-- ========== EDIT DETAIL HAPUS ========== -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs">Actions</button>
                                            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li>
                                                    <a href="<?php echo site_url();?>admin/bukti/edit/<?php echo $row->bukti_id; ?>" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
                                                </li>
                                                <!--li>
                                                    <a data-toggle="modal" data-target="#mod-info" type="button"   href="<?php echo site_url();?>admin/bukti_detail/<?php echo $row->bukti_id;?>" rel="detail" title="Detail <?php echo $row->bukti_nama; ?>"><i class='fa fa-eye'></i> Detail</a>
                                                </li-->
                                                <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->bukti_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->bukti_nama; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
                                                </li>
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
                                    <td colspan="6">Belum ada data!.</td>
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
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'admin/bukti/view', $id=""); }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
                        <div class="table-responsive">
                        <table class="hover">
                            <thead class="primary-emphasis">
                                <tr>
                                    <th width="30">#</th>
                                    <th width="300">UKM NAMA</th>
                                    <th width="300">BUKTI</th>
                                    <th width="300">PENDAPATAN</th>
                                    <th width="200">TANGGAL</th>
                                    <th width="120">AKSI</th>
                               </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $where_bukti['ukm_nama']  = $this->session->userdata('ukm_nama');
                                $i  = $page+1;
                                $like_bukti[$cari]  = $q;
                            if ($jml_data > 0){
                                foreach ($this->ADM->grid_all_bukti2('', 'bukti_tanggal', 'DESC', $batas, $page, $where_bukti, $like_bukti) as $row){
                                ?>
                                <tr>
                                    <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->ukm_nama;?></td>
                                    <td><img src="<?php echo base_url()."assets/images/bukti/kecil_".$row->bukti_gambar;?>" width="80"></td>
                                    <td><?php echo $row->bukti_pendapatan;?></td>
                                    <td><?php echo dateIndo($row->bukti_tanggal);?></td>
                                    <td align="center">
                                        <!-- ========== EDIT DETAIL HAPUS ========== -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs">Actions</button>
                                            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <!--li>
                                                    <a data-toggle="modal" data-target="#mod-info" type="button"   href="<?php echo site_url();?>admin/bukti_detail/<?php echo $row->bukti_id;?>" rel="detail" title="Detail <?php echo $row->bukti_nama; ?>"><i class='fa fa-eye'></i> Detail</a>
                                                </li-->
                                                <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->bukti_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->bukti_nama; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
                                                </li>
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
                                    <td colspan="6">Belum ada data!.</td>
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
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'admin/bukti/view', $id=""); }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } ?>
                    <!-- ========== Table ========== -->
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
				<a href="javascript:;" class="btn btn-danger" id="hapus-bukti">Ya</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>

		</div>
	</div>
</div>
<!-- ========== End Modal Konfirmasi ========== -->


<!-- ================================================== TAMBAH ================================================== -->
<?php } elseif ($action == 'tambah') { ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Tambah <small><?php echo $breadcrumb; ?></small></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>admin/bukti"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>admin/bukti/tambah" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <input type="hidden" name="bukti_id" value="<?php echo $bukti_id;?>" />
                                    <tr>
                                        <td>
                                            <label for="ukm_nama" class="control-label">UKM Nama<span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM ukm", 'ukm_nama', 'ukm_nama', 'ukm_nama', $ukm_nama);?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <label for="bukti_gambar" class="control-label">Gambar <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="bukti_gambar" id="bukti_gambar" required class="form-control btn-sm input-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="bukti_nama" class="control-label">Tanggal <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="date" name="bukti_tanggal" id="bukti_tanggal" required class="form-control input-sm" value="" size="80" maxlength="100" placeholder="Masukan tanggal"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="bukti_nama" class="control-label">Pendapata <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" name="bukti_pendapatan" id="bukti_pendapatan" required class="form-control input-sm" size="80" maxlength="100" placeholder="Masukan pendapatan"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/bukti'"/>
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
    <h3>Edit <small><?php echo $breadcrumb; ?></small></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>admin/bukti"><?php echo $breadcrumb; ?></a></li>
        <li class="active">Edit</li>
	</ol>	
</div>
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>admin/bukti/edit/<?php echo $bukti_id; ?>" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <input type="hidden" name="bukti_id" value="<?php echo $bukti_id;?>" />
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y"> 
                                    <tr>
                                        <td>
                                            <label for="ukm_nama" class="control-label">Nama UKM <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM ukm ORDER BY ukm_nama ASC", 'ukm_nama', 'ukm_nama', 'ukm_nama', $ukm_nama);?>
                                        </td>
                                    </tr>
                                    
                                <?php if ($bukti_gambar){?>
                                    <tr>
                                        <td>
                                            <label for="bukti_gambar" class="control-label">Gambar</label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/bukti/kecil_".$bukti_gambar;?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="bukti_gambar" class="control-label">Edit Gambar</label>
                                        </td>
                                        <td>
                                            <input type="file" name="bukti_gambar" id="bukti_gambar" class="form-control btn-sm input-sm" />
                                        </td>
                                    </tr>
                               <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="bukti_gambar" class="control-label">Gambar <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="bukti_gambar" id="bukti_gambar" required class="form-control btn-sm input-sm" />
                                        </td>
                                    </tr>
                                <?php } ?>
                                    <tr>
                                        <td width="130">
                                            <label for="bukti_nama" class="control-label">tanggal <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" name="bukti_tanggal" id="bukti_tanggal" required class="form-control input-sm" value="<?php echo $bukti_tanggal ?>"  size="80" maxlength="100" placeholder="Masukan tanggal"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="bukti_nama" class="control-label">Pendapata <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" name="bukti_pendapatan" id="bukti_pendapatan" required class="form-control input-sm" value="<?php echo $bukti_pendapatan ?>"  size="80" maxlength="100" placeholder="Masukan pendapatan"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/bukti'"/>
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
    <h4 class="modal-title">Detail. bukti</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td><strong>Kode</strong></td>
                <td>: <strong><?php echo $bukti->bukti_id;?></strong></td>
            </tr>
            <tr>
                <td width="110">nama</td>
                <td>: <?php echo $bukti->bukti_nama;?></td>
            </tr>
            <tr class="awal">
                <td>ukm</td>
                <td>: <?php echo $bukti->ukm_nama;?></td>
            </tr>
            <tr>
                <td>Ukuran</td>
                <td>: <?php echo $bukti->ukuran_dimensi;?></td>
            </tr>
            <tr class="awal">
                <td>Gambar</td>
                <td>: <img src="<?php echo base_url()."assets/images/bukti/kecil_".$bukti->bukti_gambar;?>"/></td>
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
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.nestable/jquery.nestable.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.slider/js/bootstrap-slider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.icheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.parsley/parsley.js"></script>
