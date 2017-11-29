<?php
include "pages/header.php";
?>

  <div class="mainpanel">
              <div class="contentpanel">
                <div class="panel panel-primary-head">
                  <div class="panel-heading">
                    <p><strong><font size="+3">Data Admin dan Kasir</font></strong></p>
                      <!-- Trigger the modal with a button -->
                    

                 <!--    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left" bgcolor="#0066FF"><form action="home.php?page=tambahAdmin"><div class="box">
                        <button><font color="#000000"><img src="images/ico/TAMBAH.png" title="Tambah Supplier">TAMBAH ADMIN BARU</font></button></div></form></td>
                      <td align="right" bgcolor="#0066FF"><form action="home.php?page=cetakAdmin"><div class="box">
                        <button><font color="#000000"><img src="images/ico/cetak.png" title="Cetak Data Supplier">CETAK DATA ADMIN</font></button></div></form></td>
                    </tr>
                  </table> -->
                  </div>
        <br><!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Tambah Admin Baru</button>     -->
        <a data-toggle="modal" data-id="" title="Tambah admin baru" class="btn btn-info" href="#myModal">Tambah admin baru</a>
      
                    <!-- panel-heading -->                      
       <table id="basicTable" class="table table-striped table-bordered responsive">
        <thead>
                <tr>
                    <th width="20">No</th>
                  <th width="44">Nama </th>
                  <th width="48">Alamat</th>
                    <th width="48">No. Hp</th>
                    <th width="38">Email</th>
                    <th width="68">Username</th>                  
                  <th width="57">Status</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <?php
			 include "config.php";
            if ($_GET[p]) {
                $mulai = $_GET[p] * 1000;
            } else {
                $mulai = 0;
            };
           /*$tampil = mysql_query("SELECT * FROM admin
				ORDER BY `admin_id` ASC LIMIT $mulai,1000")or die(mysql_error());*/
           $tampil = mysql_query("SELECT * FROM admin
                ORDER BY `admin_id` ASC ")or die(mysql_error());


            $no = 1;
            $ctr = 1;
            ?>
            <tbody>
                <?php
                while ($r = mysql_fetch_array($tampil) ) {
                    //untuk mewarnai tabel menjadi selang-seling
                    /*
                      if (($no % 2) == 0) {
                      $warna = "#EAF0F7";
                      } else {
                      $warna = "#FFFFFF";
                      }
                     *
                     */
                    // Mewarnai tabel diganti dengan css agar lebih fleksibel
                    ?>
                    <tr class="<?php echo $no % 2 === 0 ? 'alt' : ''; ?>">
                        <td class="right"><?php echo $no; ?></td>
                        <td><?php echo $r['nama'] ?></td>
                        <td><?php echo $r['alamat']; ?></td>
                        <td><?php echo $r['hp']; ?></td>
                        <td><?php echo $r['email'];?></td>
                        <td><?php echo $r['username'];?></td>
                        <td>
                        <?php 
						if ($r['level'] == '1')
						{
							echo " <font color=\Green\>ADMIN</font>";
						}
						elseif ($r['level'] == '2')
												{
							echo " <font color=\Green\>KASIR</font>";
						}
						?>
                        </td>
                        <td>
                        <a data-toggle="modal" data-id="<?php echo $r["admin_id"];?>" title="edit" class="btn btn-primary btn-xs" href="#myModal"><span class='glyphicon glyphicon-edit'></span></a> <a href="#" id="<?php echo $r["admin_id"];?>" title="delete" class="btn btn-danger btn-xs hapus" href="#myModal"><span class='glyphicon glyphicon-trash'></span></a>
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


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="proses_users_admin.php" method="POST">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Pengguna</h4>
      </div>
      <div class="modal-body">
        <!-- <p>Some text in the modal.</p> -->
        <div class="fetch-data">
           
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>

                      


<script type="text/javascript">
 $(document).ready(function(){
    $("#basicTable").DataTable();
       

      $('#myModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
         // alert(rowid);
        $.ajax({
            type : 'POST',
            url : 'form_users_admin.php', //Here you will fetch records 
            data :  'admin_id='+ rowid, //Pass $id
            success : function(data){
              $('.fetch-data').html(data);//Show fetched data from database
            }
        });
      });             
});    

</script>
<script type="text/javascript">
  $(document).on('click', " tr td .hapus", function() {
    var del_id = $(this).attr('id')    ;
    // alert(del_id);

    confirm('are you sure delete this row ?');
    $.post('proses_users_admin.php', {del_id:del_id},function(data){
    $(location).attr('href', 'users_admin.php');
    
     });
})
</script>

<?php
include "pages/footer.php";
?>