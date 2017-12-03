  <section>
  <div class="container">
        <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Detail Produk</li>
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
                    <h2 class="title text-center">Detail Produk</h2>
                    <h4>Kategori: <a href=''>
                    <?php echo $produk->kategori_nama ?></a></h4>
                  <p>Nama Produk : <?php echo $produk->produk_nama ?></p>
                    <center>
                      
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo2 text-center">
                         <img src='<?php echo base_url()."assets/images/produk/kecil_".$produk->produk_gambar;?>'>
                     <h2 class="harga">Harga : Rp.<?php echo format_rupiah($produk->produk_harga) ?></h2><br>
                     <p><b>Diskon <?php echo $produk->produk_diskon;?>%</b></p>
                     <span> Stok (<?php echo $produk->produk_stok ?>)</span></h2>
                    <h2> <span><?php echo $produk->ukm_nama ?></span></h2>

                  </div>
                     </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                    <?php if($produk->produk_stok == 0) { ?>
                    <li><a href="#" class="btn btn-info add-to-cart"><i class="fa fa-close"></i>Stok Habis</a>
                    </li>
                   <?php } else { ?>
                    <li>
                     <a href="<?php echo base_url()?>produk/add_to_cart/<?php echo $produk->produk_id;?>" class="btn btn-danger add-to-cart"><i class="fa fa-eye"></i>Add to Chart</a>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
              
            </center>
        
                 <h2 class="title text-center">Produk Lainnya</h2>
          <?php
                                    $jml_data = $this->ADM->count_all_produk();
                                    if ($jml_data > 0) {
                                        foreach ($this->ADM->grid_all_produk('', 'produk_waktu', 'DESC', 3, '', '', '') as $row){
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
                                        <h2 class="harga">Rp.<?php echo $row->produk_harga;?>,00</h2>
                                    <p><b>Stok (<?php echo $row->produk_stok;?>)</b></p>
                                        <a href="<?php echo base_url()?>produk/detailproduk/<?php echo $row->produk_id;?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Detail Produk</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                            <?php if($row->produk_stok == 0) { ?>
                                    <li> <a href="#" class="btn btn-info add-to-cart"><i class="fa fa-close"></i>Stok Habis</a>
                                    </li>
                            <?php } else { ?>
                                    <li>
                                        <a href="<?php echo base_url()?>produk/add_to_cart/<?php echo $produk->produk_id;?>" class="btn btn-danger add-to-cart"><i class="fa fa-eye"></i>Add to Chart</a>
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

      </div>
    </div>
  </div>
</section>
  <div class="end"></div>
