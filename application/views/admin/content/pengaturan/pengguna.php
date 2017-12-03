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
                                <a class="btn btn-primary" href="<?php echo site_url();?>pengaturan/pengguna/tambah"><i class="fa fa-plus-circle"></i> Tambah Pengguna</a>
                            </div>  
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>pengaturan/pengguna"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
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
                            <thead class="primary-emphasis">
                                <tr>
    	                            <th width="30">#</th>
                                    <th width="200">USERNAME</th>
                                    <th width="200">NAMA LENGKAP</th>
                                    <th width="150">TELEPON</th>
                                    <th width="150">KELOMPOK</th>
                                    <th width="150">AKSI</th>
	                           </tr>
                            </thead>
                            <tbody>
                                <?php 
	                            $i	= $page+1;
	                            $where_admin['admin_status']	= 'A';
	                            $like_admin[$cari]			= $q;
	                        if ($jml_data > 0){
	                            foreach ($this->ADM->grid_all_admin('', 'admin_level_nama', 'ASC', $batas, $page, $where_admin, $like_admin) as $row){
	                            ?>
                                <tr>
    	                            <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->admin_user;?></td>
				                    <td><?php echo $row->ukm_nama;?></td>
                                    <td><?php echo $row->admin_telepon;?></td>
				                    <td><?php echo $row->admin_level_nama;?></td>
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
                                                    <a href="<?php echo site_url();?>pengaturan/pengguna/edit/<?php echo $row->admin_user; ?>" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
                                                </li>
                                                <li>
                                                    <a data-toggle="modal" data-target="#mod-info" type="button"  href="<?php echo site_url();?>pengaturan/pengguna_detail/<?php echo $row->admin_user;?>" rel="detail" title="Detail <?php echo $row->ukm_nama; ?>"><i class='fa fa-eye'></i> Detail</a>
                                                </li>
									            <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->admin_user;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->ukm_nama; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
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
                                    <td colspan="7">Belum ada data!.</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <!-- ========== End Table ========== -->
                    </div>
                    <div id='pagination'>
                        <!--div class='pagination-left'>Total : <?php echo $jml_data;?></div-->
                        <div class='pagination-right'>
                            <ul class="pagination">
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'pengaturan/pengguna/view', $id=""); }?>
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
				<a href="javascript:;" class="btn btn-danger" id="hapus-pengguna">Ya</a>
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
        <li><a href="<?php echo base_url();?>pengaturan/menu"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>pengaturan/pengguna/tambah" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <input type="hidden" name="admin_user" value="<?php echo $admin_user;?>" />
                                <tbody class="no-border-y"> 
                                    <tr>
                                        <td>
                                            <label for="admin_user" class="control-label" >Username <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="admin_user" type="text" required class="form-control input-sm"  id="admin_user" value="<?php echo $admin_user; ?>" placeholder="Masukan Username"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="admin_pass" class="control-label" >Password <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="admin_pass" type="password" required class="form-control input-sm" id="admin_pass" value="<?php echo $admin_pass; ?>" placeholder="Masukan Password"/>
                                        </td>
                                    </tr>
                                    <!-- 
                                    <tr>
                                        <td width="130">
                                            <label for="admin_pass_ulang" class="control-label">Ulangi Kata Kunci <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="admin_pass_ulang" type="password" required class="form-control input-sm" id="admin_pass_ulang" value="" size="30" maxlength="50"/>
                                        </td>
                                    </tr>
                                    -->	
                                    <tr>
                                        <td width="130">
                                            <label for="ukm_nama" class="control-label">Nama Lengkap <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="ukm_nama" type="text" id="ukm_nama" required class="form-control input-sm"  value="<?php echo $ukm_nama; ?>" size="30" maxlength="30" placeholder="Masukan Nama Lengkap"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="admin_alamat" class="control-label" >Alamat <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="admin_alamat" type="text" id="admin_alamat" required class="form-control input-sm"  value="<?php echo $admin_alamat; ?>" size="50" maxlength="255" placeholder="Masukan Alamat"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="admin_telepon" class="control-label" >Telepon <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="admin_telepon" type="text" required class="form-control input-sm"  id="admin_telepon" value="<?php echo $admin_telepon; ?>" size="15" maxlength="15" placeholder="Masukan No.Telepon"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="admin_level_kode" class="control-label">Kelompok <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM admin_level WHERE admin_level_status='A' AND admin_level_nama!='Public'", 'admin_level_kode', 'admin_level_kode', 'admin_level_nama', $admin_level_kode,'submit();');?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>pengaturan/pengguna'"/>
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
        <li><a href="<?php echo base_url();?>pengaturan/pengguna"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>pengaturan/pengguna/edit" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <input type="hidden" name="admin_user" value="<?php echo $admin_user;?>" />
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr>
                                        <td>
                                            <label for="admin_user" class="control-label">Username <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="admin_user" type="text" required class="form-control input-sm" id="admin_user" value="<?php echo $admin_user; ?>" readonly="readonly" placeholder="Masukan Username"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="admin_pass" class="control-label" >Password</label>
                                        </td>
                                        <td>
                                            <input name="admin_pass" type="password" class="form-control input-sm" id="admin_pass" value="" placeholder="Masukan Password Bila Diubah"/>
                                        </td>
                                    </tr>
                                    <!-- 
                                    <tr>
                                        <td width="130">
                                            <label for="admin_pass_ulang" class="required">Ulangi Kata Kunci <span class="required">*</span></label>
                                        </td>
    <td><input name="admin_pass_ulang" type="password" id="admin_pass_ulang" value="" size="30" maxlength="50"/></td>
                                    </tr>
                                    -->	
                                    <tr>
                                        <td width="130">
                                            <label for="ukm_nama" class="control-label" >Nama Lengkap <span class="required">*</span></label>
                                        </td>

                                        <td>
                                            <input name="ukm_nama" type="text" required class="form-control input-sm" id="ukm_nama" value="<?php echo $ukm_nama; ?>" size="" placeholder="Masukan Nama Lengkap"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="admin_alamat" class="control-label">Alamat <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="admin_alamat" type="text" required class="form-control input-sm" id="admin_alamat" value="<?php echo $admin_alamat; ?>" size="50" maxlength="255" placeholder="Masukan Alamat"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="admin_telepon" class="control-label">Telepon <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="admin_telepon" type="text" required class="form-control input-sm" id="admin_telepon" value="<?php echo $admin_telepon; ?>" placeholder="Masukan No.Telepon"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="admin_level_kode" class="control-label">Kelompok <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM admin_level WHERE admin_level_status='A'", 'admin_level_kode', 'admin_level_kode', 'admin_level_nama', $admin_level_kode, 'submit();');?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>pengaturan/pengguna'"/>
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
    <h4 class="modal-title">Detail. Pengguna</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td><strong>Nama Pengguna</strong></td>
                <td>: <strong><?php echo $admin->admin_user;?></strong></td>
            </tr>
            <tr>
                <td width="150">Nama Lengkap</td>
                <td>: <?php echo $admin->ukm_nama;?></td>
            </tr>
            <tr class="awal">
                <td>Alamat</td>
                <td>: <?php echo $admin->admin_alamat;?></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>: <?php echo $admin->admin_telepon;?></td>
            </tr>
            <tr class="awal">
                <td>Kelompok</td>
                <td>: <?php echo $admin->admin_level_nama;?></td>
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