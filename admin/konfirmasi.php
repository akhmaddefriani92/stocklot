<?php
include "pages/header.php";
?>

<div class="mainpanel">
  <div class="contentpanel">
    <div class="panel panel-primary-head">
      <div class="panel-heading"><strong><font size="+3">Data Konfirmasi</font>
        </strong></div><!-- panel-heading -->
        <?php
          include "config.php";
        ?>

                            
        <table id="basicTable" class="table table-striped table-bordered responsive">
          <thead>
            <tr>
              <th width="20">No</th>
              <th width="68">No. Order</th>
              <th width="97">Nama Pembeli</th>
              <th width="80">Nama Bank</th>
              <th width="122">No. Rekening</th>
              <th width="68">Nominal</th>
              <th width="136">Tanggal Konfirmasi</th>
              <th width="42">Status</th>
              <th width="58">Diskon</th>
              <th width="58">Gambar</th>
              <th width="34">Aksi</th>
            </tr>
          </thead>
            <?php
			 
            if ($_GET[p]) {
                $mulai = $_GET[p] * 1000;
            } else {
                $mulai = 0;
            };
           /*$tampil = mysql_query("SELECT * FROM notifikasi 
				ORDER BY `idkonfirmasi` ASC LIMIT $mulai,1000")or die(mysql_error());*/
               $tampil = mysql_query("SELECT * FROM notifikasi 
        ORDER BY `idkonfirmasi` ")or die(mysql_error());


            $no = 1;
            $ctr = 1;
            ?>
            <tbody>
              <?php
              // while (($r = mysql_fetch_array($tampil)) or ( $ctr < 1000)) {
                while ($r = mysql_fetch_array($tampil)){
               
  						  $ambil = mysql_query("SELECT * FROM `order` where order_id = '".$r['order_id']."'");
  						  $s = mysql_fetch_array($ambil);
						  
    						$ambil1 = mysql_query("SELECT * FROM user inner join level on level.level_id = user.level_id where user_id = '".$r['user_id']."'");
    						$u = mysql_fetch_array($ambil1);
						?>
              <tr class="<?php echo $no % 2 === 0 ? 'alt' : ''; ?>">
                  <td class="right"><?php echo $no; ?></td>
                  <td><?php echo $s['no_order']; ?></td>
                  <td><?php echo $u['firstname'] ?>&nbsp;<?php echo  $u['lastname'];?></td>
                  <td><?php echo $r['namabank']; ?></td>
                  <td><?php echo $r['norekening']; ?></td>
                  <td><?php echo $r['nominal'];?></td>
                  <td class="right"><?php echo $r['tgl_konfirmasi']; ?></td>
            <?php 
						    $tampil5 = mysql_query("SELECT * FROM status where status_id = '".$s['status_id']."'");
						    $v = mysql_fetch_array($tampil5);
						?>
                <td class="right"><?php echo $v['jenis']; ?></td>           
                <td class="right"><?php echo $u['diskon_rupian']; ?></td>
                <td class="right"><?php echo $r['gambar']; ?></td>
                <td>
						<?php 
      						if ($s['status_id'] == '2')
      						{
      							echo " <a href=\web_admin/pages/proses/ubah_status_konfirmasi.php?no=$s[no_order]><font color=\blue\>approve</font></a>";
      						}
      						elseif ($s['status_id'] == '3')
      												{
      							echo " <font color=\Green\>Dikirim</font>";
      						}
      						elseif ($s['status_id'] == '4')
      												{
      							echo " <font color=\Green\>Dikirim</font>";
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
 $(document).ready(function(){
    $("#basicTable").DataTable();
});    

</script>

<?php
include "pages/footer.php";
?>