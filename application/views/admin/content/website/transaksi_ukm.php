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
                                <a class="btn btn-primary" href="<?php echo site_url();?>admin/ukm"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
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
                                    <th>NAMA</th>
                                    <th width="150">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = $page+1;
		                        $like_ukm[$cari] = $q;
                            if ($jml_data > 0) {
                                foreach($this->ADM->grid_all_ukm('', 'ukm_nama', 'DESC', $batas, $page , '', $like_ukm) as $row) {
		                        ?>
                                <tr>
        	                        <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->ukm_nama;?></td>
                                    <td align="center">
                                        <div class='pull-right'>
                                            <a class="btn btn-primary" href="<?php echo site_url();?>admin/transaksi_ukm/detail/<?php echo $row->ukm_nama;?>"><i class="fa fa-dollar"></i> Detail Transaksi</a>
                                        </div> 
                                    </td>
                                </tr>
                                <?php
                                    $i++;
	                            } 
	                        } else {
                                ?>
                                <tr>
                                    <td colspan="3">Belum ada data!.</td>
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
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'admin/ukm/view', $id=""); }?>
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
				<a href="javascript:;" class="btn btn-danger" id="hapus-ukm">Ya</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>

		</div>
	</div>
</div>
<!-- ========== End Modal Konfirmasi ========== -->

<!-- ================================================== END VIEW ================================================== -->

<!-- ================================================== TAMBAH ================================================== -->
<?php } elseif ($action == 'detail') { ?>
<?php if($ukm_nama == '') { ?>
<script>alert('Belum ada Transaksi!');top.window.location="<?php echo site_url();?>admin/transaksi_ukm/";</script>
<?php } else { ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Detail Transaksi UKM <b><?php echo $ukm_nama; ?></b></h3>
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
                                <a class="btn btn-primary" href="<?php echo site_url();?>admin/print_transaksi/<?php echo $ukm_nama; ?>"><i class="fa fa-print"></i> Print</a>
                            </div>

                    <!-- ========== Table ========== -->
                    <div class="table-responsive">
                        <table class="hover">
                            <thead class="primary-emphasis" >
                                <tr>
                                    <th width="30">#</th>
                                    <th>TANGGAL</th>
                                    <th>NAMA PESANAN</th>
                                    <th>QTY</th>
                                    <th>HARGA</th>
                                    <th>SUB TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                $query = $this->db->query("SELECT * FROM pesanan WHERE ukm_nama='$ukm_nama' ORDER BY pesanan_id DESC");
                                foreach ($query->result() as $row){ 

                                   $total += $row->pesanan_subtotal;
                                ?>
                                <tr>
                                    <td align="center"><?php echo $no;?></td>
                                    <td><?php echo dateIndo($row->pesanan_tanggal);?></td>
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
                                        <td colspan="5"><b>TOTAL</b></td>
                                        <td><p align="right"><strong>Rp.<?php echo number_format($total,0,',','.'); ?></strong></p></td>
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
<?php } ?>
<?php } ?>
<!-- ================================================== END DETAIL ================================================== -->
<!-- Include More Js For This Content -->  
<!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.parsley/parsley.js"></script>
