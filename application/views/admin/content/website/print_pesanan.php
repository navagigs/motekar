
<body onload="javascript:window.print()">
<style type="text/css">
body {
    font-family:Times New Roman;
}
    .table {
        width: 100%;
        border-collapse: collapse;
        border:1px solid #000;
    }

    .table tr {
        border:1px solid #000;
    }
    .table  th {      
        border:1px solid #000;
    }

    .table tr td{
        border:1px solid #000;
    }
</style>
<h2 align="center">MOTEKAR</h2><br>
<div class="cl-mcont">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="block-flat">
                <div class="content">
                     <div class="table-responsive">
                            <table>
                                <tbody class="no-border-y">
                                    <tr>
                                        <td>No.Invoices</td>
                                        <td>:</td>
                                        <td><strong>#INVOICES-<?php echo $invoices->invoices_id; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pelanggan</td>
                                        <td>:</td>
                                        <td><strong><?php echo  $invoices->pelanggan_nama;?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><strong><?php echo  $invoices->pelanggan_alamat;?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>No.Telepon</td>
                                        <td>:</td>
                                        <td><strong><?php echo $invoices->pelanggan_notlp;?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pesanan</td>
                                        <td>:</td>
                                        <td><strong><?php echo dateIndo1($invoices->invoices_date);?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    
                    <!-- ========== Table ========== -->
                    <div class="table-responsive">
                        <table class="table">
                                <tr>
                                    <th width="30">#</th>
                                    <th>NAMA PESANAN</th>
                                    <th>QTY</th>
                                    <th>HARGA</th>
                                    <th>SUB TOTAL</th>
                                </tr>
                            <tbody>
                                <?php
                                $no=1;
                                $query = $this->db->query("SELECT * FROM pesanan WHERE invoices_id='$invoices->invoices_id' ORDER BY pesanan_id DESC");
                                foreach ($query->result() as $row){ 
                                ?>
                                <tr>
                                    <td align="center"><?php echo $no;?></td>
                                    <td><?php echo $row->produk_nama;?></td>
                                    <td><p align="center"><?php echo $row->pesanan_qty;?></p></td>
                                    <td  align="right">Rp.<?php echo number_format($row->pesanan_price,0,',','.');?></td>
                                    <td align="right">Rp.<?php echo number_format($row->pesanan_subtotal,0,',','.');?></td>
                                   
                                </tr>
                                <?php
                                    $no++;
                                } 
                                ?>
                                    <tr>
                                        <td  align="right" colspan="4"><b>TOTAL</b></td>
                                        <td  align="right"><strong>Rp.<?php echo number_format($invoices->invoices_subtotal,0,',','.'); ?></strong></td>
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
</body>