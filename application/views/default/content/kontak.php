 <section>
	<div class="container">
        <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>">Home</a></li>
				  <li class="active">Cara Pembelian</li>
				</ol>
			</div><!--/breadcrums-->
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
       
                    <h2 class="title text-center">Kontak Kami</h2>
                    <table class="table table-responsive">
                    <tbody>
                    <tr><td>Alamat : </td><td>Jl Sari Asih no.54 Sarijadi Bandung</td></tr><tr>
                    <td>Kodepos : </td><td>40226</td></tr>
                    <tr>
                    <td>Telepon : </td><td>5411675</td></tr>
                    </tbody>
                    </table>
		</div>
	</div>
</section>
  <div class="end"></div>
