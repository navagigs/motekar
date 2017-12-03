<section>
  <div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Detail Kategori <?php echo $kategori->kategori_nama ?></li>
        </ol>
      </div>
    <div class="row">
        <div class="col-sm-3">
         <?php 
                    if ($boxkategori == TRUE) {
                        $this->load->view('default/box/box-kategori');
                    } 
                    if ($boxkeranjang == TRUE) {
                        $this->load->view('default/box/box-keranjang');
                    } 
                                        if ($boxinformasi == TRUE) {
                        $this->load->view('default/box/box-informasi');
                    } 
        ?>
      </div>

     <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Kategori <?php echo $kategori->kategori_nama ?></h2> 
                     <?php
                     error_reporting(0);
                     $where_kategori['k.kategori_id'] = $kategori_id;
              $where            = (empty($kategori_id))?'': $where_kategori;
                                    $jml_data = $this->ADM->count_all_produk();
                                    if ($jml_data > 0) {
                                        foreach ($this->ADM->grid_all_produk('*', 'produk_waktu', 'DESC', $batas, $page, $where , '') as $row){
                                        ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                     <img src='<?php echo base_url()."assets/images/produk/kecil_".$row->produk_gambar;?>'>
                                    <h2 class="harga">Rp.<?php echo format_rupiah($row->produk_harga); ?></h2>
                                    
                                    <p><b>Diskon <?php echo $row->produk_diskon;?>%</b></p>
                                    <p><?php echo $row->produk_nama;?></p>                        
                                    <p><b><?php echo $row->ukm_nama;?></b></p>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2 class="harga">Rp.<?php echo format_rupiah($row->produk_harga); ?></h2>
                                        
                                    <p><b>Diskon <?php echo $row->produk_diskon;?>%</b></p>
                                    <p><?php echo $row->produk_nama;?></p>                        
                                    <p><b><?php echo $row->ukm_nama;?></b></p>
                            <?php if($row->produk_stok == 0) { ?>
                                    <a href="#" class="btn btn-info add-to-cart"><i class="fa fa-close"></i>Stok Habis</a>
                            <?php } else { ?>
                                        <a href="<?php echo base_url()?>produk/add_to_cart/<?php echo $produk->produk_id;?>" class="btn btn-danger add-to-cart"><i class="fa fa-eye"></i>Add to Chart</a>
                            <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                            <?php if($row->produk_stok == 0) { ?>
                            <li>
                                    <a href="#" class="btn btn-info add-to-cart"><i class="fa fa-close"></i>Stok Habis</a>
                            </li>
                            <?php } else { ?>
                                    <li>
                                        <a href="<?php echo base_url()?>produk/add_to_cart/<?php echo $row->produk_id;?>" class="btn btn-danger add-to-cart"><i class="fa fa-eye"></i>Add to Chart</a>
                                    </li>
                            <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                           <?php
                                        } 
                                    } else {
                                    ?>
                                    <center><h4>Data Tidak Ada></h4></center>
                                <?php } ?>
                </div>
   <div class="center">
   <div id='pagination'>
                        <div class='pagination-left'>Total : <?php echo $jml_data;?></div>
                        <div class='pagination-right'>
                            <ul class="pagination">
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'produk/produk', $id=""); }?>
                            </ul>
                        </div>
                    </div>
  </div>


        </div>
      </div> 
    </div>
  </div>
</section>
  <div class="end"></div>
