<!-- ================================================== VIEW ================================================== -->
<?php if ($action == 'view' || empty($action)){ ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3><?php echo $breadcrumb; ?></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>paid"><i class='fa fa-home'></i> Dashboard</a></li>
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
                            <!--div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>paid/invoices/tambah"><i class="fa fa-plus-circle"></i> Tambah invoices</a>
                            </div-->  
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>paid/pesanan"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
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
                                    <th>NAMA PELANGAGAN</th>
                                    <th>ALAMAT</th>
                                    <th>STATUS</th>
                                    <th>TANGGAL PEMESANAN</th>
                                    <th width="150">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = $page+1;
		                        $like_invoices[$cari] = $q;
                            if ($jml_data > 0) {
                                foreach($this->ADM->grid_all_invoices('', 'invoices_id', 'DESC', $batas, $page , '', $like_invoices) as $row) {
		                        ?>
                                <tr>
        	                        <td align="center"><?php echo $i;?></td>
                                    <td><b>#INVOICES-<?php echo $row->invoices_id;?></b></td>
                                    <td><?php echo $row->pelanggan_nama;?></td>
                                    <td><?php echo $row->pelanggan_alamat;?></td>
                                    <td>   <?php if($row->invoices_status == 'unpaid') { ?>
                                       <a href="#" class="btn btn-danger add-to-cart"><i class="fa fa-dollar"></i>BELUM BAYAR</a>
                                        <?php } elseif($row->invoices_status == 'expired') { ?>
                                        <a href="#" class="btn btn-warning add-to-cart"><i class="fa fa-dollar"></i>KADALUARSA</a>
                                        <?php } else { ?>
                                        <a href="#" class="btn btn-success add-to-cart"><i class="fa fa-dollar"></i>SUDAH BAYAR</a>
                                        <?php } ?></td>
                                    <td><?php echo dateIndo1($row->invoices_date);?></td>
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
                                                    <a href="<?php echo site_url();?>admin/pesanan/status/<?php echo $row->invoices_id; ?>" title="Status"><i class='fa fa-dollar'></i> Status</a>
                                                </li>
                                            <?php } ?>
                                                <li>
                                                    <a href="<?php echo site_url();?>admin/pengiriman/edit/<?php echo $row->invoices_id; ?>" title="Konfirmasi Pengiriman"><i class='fa fa-share'></i> Konfirmasi Pengiriman</a>
                                                </li>
									            <li>
                                                    <a  href="<?php echo site_url();?>admin/pesanan/detail/<?php echo $row->invoices_id;?>" rel="detail" title="Detail <?php echo $row->pelanggan_nama; ?>"><i class='fa fa-eye'></i> Detail</a>
                                                </li>
									            <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->invoices_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->invoices_id; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
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
                        <div class='pagination-left'>Total : <?php echo $jml_data;?></div>
                        <div class='pagination-right'>
                            <ul class="pagination">
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'admin/invoices/view', $id=""); }?>
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
				<a href="javascript:;" class="btn btn-danger" id="hapus-pesanan">Ya</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>

		</div>
	</div>
</div>
<!-- ========== End Modal Konfirmasi ========== -->

<!-- ================================================== END VIEW ================================================== -->

<!-- ================================================== TAMBAH ================================================== -->

<?php } elseif ($action == 'detail') { ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Detail Pesanan #INVOICES-<?php echo $invoices_id; ?></h3>
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
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>admin/print_pesanan/<?php echo $invoices_id; ?>"><i class="fa fa-print"></i> Print</a>
                            </div>
                     <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr>
                                        <td>No.Invoices</td>
                                        <td>:</td>
                                        <td><strong>#INVOICES-<?php echo $invoices_id; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pelanggan</td>
                                        <td>:</td>
                                        <td><strong><?php echo $pelanggan_nama;?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><strong><?php echo $pelanggan_alamat;?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>No.Telepon</td>
                                        <td>:</td>
                                        <td><strong><?php echo $pelanggan_notlp;?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pesanan</td>
                                        <td>:</td>
                                        <td><strong><?php echo dateIndo1($invoices_date);?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    
                    <!-- ========== Table ========== -->
                    <div class="table-responsive">
                        <table class="hover">
                            <thead class="primary-emphasis" >
                                <tr>
                                    <th width="30">#</th>
                                    <th>NAMA PESANAN</th>
                                    <th>QTY</th>
                                    <th>HARGA</th>
                                    <th>SUB TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                $query = $this->db->query("SELECT * FROM pesanan WHERE invoices_id='$invoices_id' ORDER BY pesanan_id DESC");
                                foreach ($query->result() as $row){ 
                                ?>
                                <tr>
                                    <td align="center"><?php echo $no;?></td>
                                    <td><?php echo $row->produk_nama;?></td>
                                    <td><p align="center"><?php echo $row->pesanan_qty;?></p></td>
                                    <td><p align="right">Rp.<?php echo number_format($row->pesanan_price,0,',','.');?></p></td>
                                    <td><p align="right">Rp.<?php echo number_format($row->pesanan_subtotal,0,',','.');?></p></td>
                                   
                                </tr>
                                <?php
                                    $no++;
                                } 
                                ?>
                                    <tr>
                                        <td colspan="4"><b>TOTAL</b></td>
                                        <td><p align="right"><strong>Rp.<?php echo number_format($invoices_subtotal,0,',','.'); ?></strong></p></td>
                                    </tr>
                            </tbody>
                        </table>
                        <!-- ========== End Table ========== -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php } elseif ($action == 'status') { ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Edit <small><?php echo $breadcrumb; ?></small></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>admin/pesanan"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>admin/pesanan/status/<?php echo $pesanan_id; ?>" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <input type="hidden" name="invoices_id" value="<?php echo $invoices_id;?>">
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                   <tr>
                                       <td width="130"> 
                                           <label for="pesanan_nama" class="control-label">Status Pesanan <span class="required">*</span></label>
                                       </td>
                                       <td>
                                           
                                        <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $a = ($invoices_status=='paid')?'checked':'';?> name="invoices_status" id="paid" class="icheck" value="paid"> SUDAH DIBAYAR
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  <?php echo $b = ($invoices_status=='unpaid')?'checked':'';?> name="invoices_status" id="unpaid" class="icheck" value="unpaid"> BELUM DIBAYAR
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  <?php echo $b = ($invoices_status=='expired')?'checked':'';?> name="invoices_status" id="expired" class="icheck" value="expired"> KADALUARSA
                                                </label> 
                                         </div>
                                       </td>
                                    </tr>
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
<?php } ?>
<!-- ================================================== END DETAIL ================================================== -->
<!-- Include More Js For This Content -->  
<!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url();?>templates/paid/js/jquery.parsley/parsley.js"></script>
