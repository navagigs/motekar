
<table width="100%" border="1px">
                            <thead class="primary-emphasis" >
                                    <tr>
                                        <td colspan="5"><center><strong><h2>LAPORAN PEMESANAN MOTEKAR</h2></center></td>
                                    </tr>
                                <tr>
        	                        <th width="30">#</th>
                                    <th>NO.INVOICES</th>
                                    <th>TANGGAL PEMESANAN</th>
                                    <th>NAMA PELANGAGAN</th>
                                    <th>SUB TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>                              
                                <?php
                                $dari = $this->input->post('dari');
                                $sampai = $this->input->post('sampai');
                                ?>
                                <?php
                                    $no=1;             
                                    $query = $this->db->query("SELECT 
                                        invoices.invoices_id  AS invoices_id,
                                        invoices.invoices_date AS invoices_date,
                                        invoices.invoices_subtotal AS invoices_subtotal,
                                        pelanggan.pelanggan_nama AS pelanggan_nama,
                                        pelanggan.pelanggan_username AS pelanggan_username
                                        FROM invoices 
                                        LEFT JOIN pelanggan ON  pelanggan.pelanggan_username=invoices.pelanggan_username
                                         WHERE invoices_date between '$dari' and '$sampai'
                                         ORDER BY invoices.invoices_id DESC");
                                        foreach ($query->result() as $row){ 
                                        ?>
                                <tr>
        	                        <td align="center"><?php echo $no;?></td>
                                    <td><b>#INVOICES-<?php echo $row->invoices_id;?></b></td>
                                    <td><?php echo dateIndo1($row->invoices_date);?></td>
                                    <td><?php echo $row->pelanggan_nama;?></td>
                                    <td><p align="right">Rp.<?php echo number_format($row->invoices_subtotal,0,',','.');?></p></td>
                                   
                                </tr>
                                <?php } ?> 
                                <tr>
                                    <td colspan="4"><p align="right">Total</p></td>
                                    <td><p align="right"><?php   $jumlahkan  = $this->db->query("SELECT SUM(invoices_subtotal) AS invoices_subtotal FROM invoices WHERE invoices_date between '$dari' and '$sampai'
                                         ORDER BY invoices_id DESC ");foreach ($jumlahkan->result() as $row2){}

                                                    echo "<strong>Rp.".format_rupiah($row2->invoices_subtotal)."</strong>";
                                                    ?></p></td>
                                </tr>
                                <tr>
                                    <td colspan="5">Dari tanggal <b><?php echo dateIndo($dari); ?></b> sampai tanggal <b><?php echo dateIndo($sampai); ?></b>
                                </tr>
                            </tbody>
                        </table>