 <div class="page-header bg-white">
            <div class="breadcrumb">
              <a href="<?php echo site_url();?>android">Home</a> <span>·</span> <a href="<?php echo site_url();?>produk_android">Produk</a><span>·</span>Kategori <?php echo $kategori->kategori_nama ?>
            </div>
            <h1 class="page-title">Kategori : <?php echo $kategori->kategori_nama ?></h1>
          </div>
         <?php
                     error_reporting(0);
                     $where_kategori['k.kategori_id'] = $kategori_id;
              $where            = (empty($kategori_id))?'': $where_kategori;
                                    $jml_data = $this->ADM->count_all_produk();
                                    if ($jml_data > 0) {
                                        foreach ($this->ADM->grid_all_produk('*', 'produk_waktu', 'DESC', $batas, $page, $where , '') as $row){
                                        ?>
          <div class="container padding-top-0">
            <img class="margin-bottom-16" src="<?php echo base_url()."assets/images/produk/".$row->produk_gambar;?>" alt="">
            <span class="light-text small-text"><?php echo $row->ukm_nama;?></span>
            <h1><?php echo $row->produk_nama;?></h1>
            <p><b>Diskon <?php echo $row->produk_diskon;?>%</b></p>
            <p>Stok (<?php echo $row->produk_stok;?>)</p>
            <span class="price mdl-color-text--accent">Rp.<?php echo format_rupiah($row->produk_harga);?></span>
            
            <?php if($row->produk_stok == 0) { ?>
            <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent border">
              Stok Habis
            </a>
            <?php } else { ?>
            <a href="<?php echo base_url()?>produk_android/add_to_cart/<?php echo $row->produk_id;?>" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent border">
              Beli
            </a>
            <?php } ?>
          </div>
          <?php   } } else { ?>
          <center><h4>Data Tidak Ada></h4></center>
          <?php } ?>