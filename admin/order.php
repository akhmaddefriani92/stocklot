<?php
include "pages/header.php";
?>
<div class="mainpanel">
  <div class="contentpanel">
    <div class="panel panel-primary-head">
      <div class="panel-heading"><strong><font size="+3">Data Order</font>
        </strong></div>
        <!-- panel-heading -->
        <table id="basicTable" class="table table-striped table-bordered responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No. Order</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah Beli</th>
                    <th>Subtotal</th>                  
                    <th>Tanggal Transaksi</th>
                    <th>Status</th>
                    <th>Diskon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
             
            if ($_GET[p]) {
                $mulai = $_GET[p] * 1000;
            } else {
                $mulai = 0;
            };
           
            $sql = "SELECT a.*, b.nm_brg, c.no_order,c.tanggal, c.status_id, d.firstname, d.lastname, e.jenis, f.diskon_rupian from order_detail a 
                inner join barang b on a.barang_id = b.barang_id 
                inner JOIN `order` c on a.order_detail_id=c.order_id 
                left join user d on c.user_id=d.user_id 
                left join status e on c.status_id=e.status_id 
                LEFT  join `level` f on d.level_id=f.level_id 
                order BY a.order_detail_id asc";

           $tampil = mysql_query($sql)or die(mysql_error());
            $no = 1;
            $ctr = 1;
            ?>
            <tbody>
                <?php
                while ($r = mysql_fetch_array($tampil)) {
                ?>
                    <tr class="<?php echo $no % 2 === 0 ? 'alt' : ''; ?>">
                        <td class="right"><?php echo $no; ?></td>
                        <td>
                        <?php echo $r['no_order']; ?></td>
                        <td><?php echo $r['firstname'] ?>&nbsp;<?php echo  $r['lastname'];?></td>
                        <td><?php echo $r['nm_brg']; ?></td>
                        <td><?php echo $r['harga']; ?></td>
                        <td><?php echo $r['qty'];?></td>
                        <td><?php echo $r['sub_total'];?></td>
                        <td class="right"><?php echo $r['tanggal']; ?></td>
                        <td class="right"><?php echo $r['jenis']; ?></td>
                        <td class="right"><?php echo $r['diskon_rupian']; ?></td>
                        <td>
                        <?php 
                        if ($r['status_id'] == '1')
                        {
                            echo " <a href=\web_admin/pages/proses/ubah_status.php?no=$s[no_order]><font color=\blue\>approve</font></a>";
                        }
                        elseif ($r['status_id'] == '2')
                                                {
                            echo " <font color=\Green\>Proses</font>";
                        }
                        elseif ($r['status_id'] == '3') {
                            echo " <font color=\Green\>Proses</font>";
                        }
                        elseif ($r['status_id'] == '4') {
                            echo " <font color=\Green\>Proses</font>";
                        }
                        ?>
                        </td>
                    </tr>
                    <?php
                    $no++;
                    $ctr++;
                }
                ?>
            </tbody>
        </table>
    </div><!-- panel -->
    <br />
    </div><!-- contentpanel -->
</div><!-- mainpanel -->



        <script type="text/javascript">
            $(document).ready(function () {
                $("#basicTable").DataTable();
                $('.tanggal').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                });
            });
        </script>
      

    </body>
</html>
