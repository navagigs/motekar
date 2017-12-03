
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
                           <table class="table">
                            <thead class="primary-emphasis" >
                                <tr>
                                    <th width="30">#</th>
                                    <th>TANGGAL TRANSAKSI</th>
                                    <th>NAMA PESANAN</th>
                                    <th>QTY</th>
                                    <th>HARGA</th>
                                    <th>SUB TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                $query = $this->db->query("SELECT * FROM pesanan WHERE ukm_nama='$pesanan->ukm_nama' ORDER BY pesanan_id DESC");
                                foreach ($query->result() as $row){ 
                                    error_reporting(0);
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
                                        <td colspan="5"><b>TOTAL TRANSAKSI DARI UKM <strong>(<?php echo $pesanan->ukm_nama; ?>)</strong></b></td>
                                        <td><p align="right"><strong>Rp.<?php echo number_format($total,0,',','.'); ?></strong></p></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</body>