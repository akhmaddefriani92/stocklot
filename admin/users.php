<?php
include "pages/header.php";
?>

  <div class="mainpanel">
              <div class="contentpanel">
                <div class="panel panel-primary-head">
                  <div class="panel-heading">
                    <p><strong><font size="+3">Data Customers</font></strong></p>
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
        <!-- <a data-toggle="modal" data-id="" title="Tambah admin baru" class="btn btn-info" href="#myModal">Tambah admin baru</a> -->
      
                    <!-- panel-heading -->  
        <table id="basicTable" class="table table-striped table-bordered responsive" style="font-size: smaller;">
        <thead>
          <tr>
            <th>no</th>
            <th width="5%">Username</th>
            <th >Nama</th>
            <th width="8%">Email</th>
            <th>No. Hp</th>
            <!-- <th>Tanggal Lahir</th> -->
            <th>Gender</th>                  
            <th>Alamat</th>
            <th>Kecamatan</th>
            <th>Kota</th>
            <th>Provinsi</th>
            <!-- <th>Kode Pos</th> -->
            <th width="5%">Status</th>
            <th width="5%">Diskon</th>
            <th width="2%">Aktif</th>
            <th width="30%">Aksi</th>
          </tr>  
        </thead>
            <?php
			     include "config.php";
            if ($_GET[p]) {
                $mulai = $_GET[p] * 1000;
            } else {
                $mulai = 0;
            };
            $sql="SELECT * FROM user left JOIN level ON level.level_id = user.level_id
              ORDER BY `user_id` ASC ";
            $tampil = mysql_query($sql)or die(mysql_error());
            $no = 1;
            $ctr = 1;
            ?>
            <tbody>
                <?php
                while ($r = mysql_fetch_array($tampil) ) {
                    ?>
                    <tr class="<?php echo $no % 2 === 0 ? 'alt' : ''; ?>">
                        <td class="right"><?php echo $no; ?></td>
                        <td><?php echo $r['username']; ?></td>
                        <td><?php echo $r['firstname'] ?>&nbsp;<?php echo  $r['lastname'];?></td>
                        <td><?php echo $r['email']; ?></td>                      
                        <td><?php echo $r['hp']; ?></td>
                     <!--    <td><?php echo $r['tanggal_lahir'];?></td> -->
                        <td><?php echo $r['gender'];?></td>
                       
                      <td class="right"><?php echo $r['alamat']; ?></td>
                        <td class="right"><?php echo $r['kecamatan']; ?></td>
                        <td class="right"><?php echo $r['kota']; ?></td>
                        <td class="right"><?php echo $r['provinsi']; ?></td>
                        <!-- <td class="right"><?php echo $r['kode_pos']; ?></td> -->
                        <td class="right"><?php echo $r['level']; ?></td>
                        <td class="right"><?php echo $r['diskon_rupian']; ?></td>
                        <td class="right"><?php echo $r['aktif']; ?></td>
                        <td>
                          <a data-toggle="modal" data-id="<?php echo $r["user_id"];?>" title="edit" class="btn btn-primary btn-xs" href="#myModal"><span class='glyphicon glyphicon-edit'></span></a> <a href="#" id="<?php echo $r["user_id"];?>" title="delete" class="btn btn-danger btn-xs hapus" href="#myModal"><span class='glyphicon glyphicon-trash'></span></a>
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
    <form action="proses_users.php" method="POST">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Users</h4>
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
            url : 'form_users.php', //Here you will fetch records 
            data :  'user_id='+ rowid, //Pass $id
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
    $.post('proses_users.php', {del_id:del_id},function(data){
    $(location).attr('href', 'users.php');
    
     });
})
</script>

<?php
include "pages/footer.php";
?>