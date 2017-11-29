<?php
include"pages/header.php";
?>
<div class="mainpanel">
              <div class="contentpanel">
                <div class="panel panel-primary-head">
                  <div class="panel-heading"><strong><font size="+3">Data Supplier</font></strong></div>
                  <p>&nbsp;</p>
                 <!--  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left" bgcolor="#0066FF"><form action="home.php?page=tambahSupplier"><div class="box"><button><font color="#000000"><img src="images/ico/TAMBAH.png" title="Tambah Supplier">TAMBAH SUPPLIER BARU</font></button></div></form></td>
                      <td align="right" bgcolor="#0066FF"><form action="home.php?page=cetakSupplier"><div class="box"><button><font color="#000000"><img src="images/ico/cetak.png" title="Cetak Data Supplier">CETAK DATA SUPPLIER</font></button></div></form></td>
                    </tr>
                  </table> -->
                  <p>
                    <!-- panel-heading -->
                    <a data-toggle="modal" data-id="" title="Tambah Supllier baru" class="btn btn-info" href="#myModal">Tambah Supplier baru</a>
                    
                  </p>
                  <table id="basicTable" class="table table-striped table-bordered responsive">
                  <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Supplier</th>
                            <th>Alamat Supplier</th>
                            <th>Nomor Telp</th>
                            <th>Keterangan</th>
                            <th>Tanggal Kerjasama</th>
                            <th>Aksi</th>
                        </tr>
            </thead>
            <?php
			 
            if ($_GET[p]) {
                $mulai = $_GET[p] * 100;
            } else {
                $mulai = 0;
            };

//HS query terlampir buggy !! dan juga amat lambat
//    $tampil=mysql_query("SELECT idBarang,namaBarang,namaKategoriBarang,
//                        namaSatuanBarang,jumBarang,hargaJual, barcode
//                        FROM barang b, kategori_barang kb, satuan_barang sb
//                        ORDER BY b.namaBarang ASC LIMIT $mulai,100 ");
//    $tampil=mysql_query("SELECT b.idBarang,b.namaBarang,b.jumBarang,b.hargaJual,b.barcode, k.namaKategoriBarang, s.namaSatuanBarang
//                        FROM barang AS b, kategori_barang AS k, satuan_barang AS s
//			WHERE b.idKategoriBarang = k.idKategoriBarang AND b.idSatuanBarang = s.idSatuanBarang
//                        ORDER BY namaBarang ASC LIMIT $mulai,100 ");
            // query ini lebih cepat & rapi
            // credit : Insan Fajar
           $tampil = mysql_query("SELECT * FROM supplier
				ORDER BY `supplier_id` ASC LIMIT $mulai,100")or die(mysql_error());


            $no = 1;
            $ctr = 1;
            ?>
            <tbody>
                <?php
                while (($r = mysql_fetch_array($tampil))) {
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
                        <td><?php echo $r['namaSupplier']; ?></td>
                        <td><?php echo $r['alamatSupplier']; ?></td>
                        <td><?php echo $r['telpSupplier']; ?></td>                      
                        <td><?php echo $r['Keterangan']; ?></td>
                        <td><?php echo $r['last_update'];?></td>
                        <td>
                          <a data-toggle="modal" data-id="<?php echo $r["supplier_id"];?>" title="edit" class="btn btn-primary btn-xs" href="#myModal"><span class='glyphicon glyphicon-edit'></span></a> <a href="#" id="<?php echo $r["supplier_id"];?>" title="delete" class="btn btn-danger btn-xs hapus" href="#myModal"><span class='glyphicon glyphicon-trash'></span></a>
                          <!-- 
                          <a href=home.php?page=edit&id=<?php echo $r['supplier_id']; ?>>Ubah</a> | <a href=hapus_supplier.php?hapus=<?php echo $r['supplier_id'];?> >Hapus</a>                                     -->                                                                                                                                 
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
    <form action="proses_supplier.php" method="POST">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form supllier</h4>
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
            url : 'form_supplier.php', //Here you will fetch records 
            data :  'supplier_id='+ rowid, //Pass $id
            success : function(data){

              $('.fetch-data').html(data);//Show fetched data from database
             /* $('.tanggal').datepicker({
                    format: "yyyy-mm-dd"
              }); */
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
    $.post('proses_supplier.php', {del_id:del_id},function(data){
    $(location).attr('href', 'supplier.php');
    
     });
})
</script>

<?php
include "pages/footer.php";
?>