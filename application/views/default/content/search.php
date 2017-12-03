<section>
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active"><?php echo $q; ?></li>
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
                    <h2 class="title text-center"><?php echo $q; ?></h2> 
                     <?php 
                            $i  = $page+1;
                            $like_pencarian['produk_nama'] = $q;
                            if ($jml_data > 0){                         
                            foreach ($this->ADM->grid_all_pencarian('*', 'produk_waktu', 'DESC', $batas, $page, '', $like_pencarian) as $row){
                            ?>  
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                           
                                <div class="productinfo text-center">
                                    <img src='<?php echo base_url()."assets/images/produk/kecil_".$row->produk_gambar;?>'>
                                    <h2 class="harga">Rp.<?php echo format_rupiah($row->produk_harga);?></h2>
                                    <p><b>Diskon <?php echo $row->produk_diskon;?>%</b></p>
                                    <p><?php echo $row->produk_nama;?></p>                        
                                    <p><b><?php echo $row->ukm_nama;?></b></p>
                                    <p><b>Stok (<?php echo $row->produk_stok;?>)</b></p>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2 class="harga">Rp.<?php echo format_rupiah($row->produk_harga);?></h2>
                                        <p><b>Diskon <?php echo $row->produk_diskon;?>%</b></p>
                                        <p><?php echo $row->produk_nama;?></p>                   
                                        <p><b><?php echo $row->ukm_nama;?></b></p> 
                                    <p><b>Stok (<?php echo $row->produk_stok;?>)</b></p>                 
                                        <a href="<?php echo base_url()?>produk/detailproduk/<?php echo $row->produk_id;?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Detail Produk</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li>
                                        <a href="<?php echo base_url()?>produk/add_to_cart/<?php echo $row->produk_id;?>" class="btn btn-danger add-to-cart"><i class="fa fa-eye"></i>Add to Chart</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                     <?php 
                         $i++; 
                        }                                               
                        ?> 
                    <?php   } else {?>
                     <center><h4>Data Tidak Ada</h4></center>
                    <?php } ?>
                </div>
                <div class="center">
                        <div id='pagination'>
                        <div class='pagination-left'>Total : <?php echo $jml_data;?></div>
                        <div class='pagination-right'>
                            <ul class="pagination">
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'produk/index', $id=""); }?>
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
