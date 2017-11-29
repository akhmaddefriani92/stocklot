<?php
include "pages/header.php";
?>
<div class="mainpanel">
  <div class="contentpanel">
    <div class="panel panel-primary-head">
      <div class="panel-heading"><strong><font size="+3">Data Konfirmasi</font>
        </strong></div>
                <!-- panel-heading -->
        <table id="basicTable" class="table table-striped table-bordered responsive">
            <thead>
               <tr>
                    <th width="20">No</th>
                    <th width="68">No. Order</th>
                    <th width="97">Nama Pembeli</th>
                    <th width="97">Alamat</th>
                    <th width="97">No.Telp</th>
                    <th width="68">Nominal</th>
                    <th width="122">Tanggal Kirim</th>
                    <th width="56">Status</th>
                </tr>
            </thead>
            <?php
             
            if ($_GET[p]) {
                $mulai = $_GET[p] * 1000;
            } else {
                $mulai = 0;
            };
            $sql = "SELECT a.*, b.user_id, b.nominal,b.tgl_kirim ,c.*, f.jenis from `order` a 
                    left join notifikasi b on a.order_id=b.order_id
                    left join user c on b.user_id=c.user_id
                    left join level e on c.level_id=e.level_id
                    left join status f on a.status_id=f.status_id";

           $tampil = mysql_query($sql)or die(mysql_error());

            $no = 1;
            $ctr = 1;
            ?>
            <tbody>
                <?php
                while ($r = mysql_fetch_array($tampil)) {
                    //untuk mewarnai tabel menjadi selang-seling
                ?>
                    <tr class="<?php echo $no % 2 === 0 ? 'alt' : ''; ?>">
                        <td class="right"><?php echo $no; ?></td>
                        <td>
                        <?php echo $r['no_order']; ?></td>
                        <td><?php echo $r['firstname'] ?>&nbsp;<?php echo  $r['lastname'];?></td>
                        <td><?php echo $r['alamat'];?>&nbsp;<?php echo $s['kecamatan'];?>&nbsp;<?php echo $r['kota'];?>&nbsp;<?php echo $r['provinsi'];?></td>
                        <td><?php echo $r['hp'];?></td>
                        <td><?php echo $r['nominal'];?></td>
                      <td class="right"><?php echo $r['tgl_kirim']; ?></td>
                        <td class="right"><?php echo $r['jenis']; ?></td>
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
