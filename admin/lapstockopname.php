<?php
include "pages/header.php";
?>
<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-file"></i>
            </div>
        <div class="media-body">
                <h3 style="margin-top: 20px;">Laporan Stock Opname</h3>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
                    
    <div class="contentpanel">
      <?php $tanggal = date('Y-m-d'); ?>
        <div class="panel panel-primary-head">
        <div class="container">
            <!-- <label><?php echo $tanggal; ?></label> -->
            <div class="row">
                <div class="col-xs-3">
                    <form action="" method="POST">
                        <label>Dari tanggal</label>
                           <input   type="text" id="tanggalawal" name="tanggalawal" width="40" class="tanggal form-control" placeholder="mm-dd-yyyy" >
                </div>
                <div class="col-xs-3">
                    <label>Sampai tanggal</label> 
                       <input type="text" id="tanggalakhir" name="tanggalakhir" width="40" class="tanggal form-control" placeholder="mm-dd-yyyy" >
                </div>
                <div class="col-xs-3">
                    <button style="margin-top: 25px;" type="submit" name="cari" class="btn btn-primary btn-md btn-block">Cari</button> 
                    </form> 
                 </div>
             </div>
                  <br />
            <table id="basicTable" class="table table-striped table-bordered responsive" style="font-size: small;">
                <thead class="">
                    <tr>
                        <th>No</th>
                        <th width="5%">tanggal SO</th>
                        <th>SKU</th>
                        <th>barcode</th>
                        <th>Item</th>
                        <th>size</th>
                        <th>warna</th>
                        <th>merk</th>
                        <th width="5%">Harga Beli</th>
                        <th width="5%">stock tercatat</th>
                        <th width="5%">Stock Fisik</th>
                        <th>Selisih</th>
                        <th>total ganti</th>
                        <th width="5%">AKSI</th>
                    </tr>
                </thead>
         <?php include "config.php";
                

               if (isset($_POST["cari"])) { 
                    $tanggalawal = $_POST["tanggalawal"];
                    $tanggalakhir = $_POST["tanggalakhir"];
                    $sql = "SELECT barang.kd_brg, barang.barcode, barang.nm_brg,barang.size_id,size.size,warna.warna,merk.nama,detail_beli.hargaBeli, barang.qty,fast_stock_opname.jmlTercatat,fast_stock_opname.selisih,fast_stock_opname.tanggalSO FROM barang 
                        LEFT JOIN warna on barang.warna_id = warna.warna_id
                        LEFT JOIN size on barang.size_id = size.size_id
                        LEFT JOIN merk on barang.merk_id = merk.merk_id
                        LEFT JOIN fast_stock_opname ON barang.barang_id = fast_stock_opname.barang_id
                        LEFT JOIN detail_beli ON barang.barang_id = detail_beli.barang_id 
                        WHERE fast_stock_opname.tanggalSO BETWEEN '$tanggalawal' and '$tanggalakhir'
                        order BY fast_stock_opname.tanggalSO desc";
                    $query = mysql_query($sql) or die (mysql_error());
                    # code...
                }else{ 
                    
                     $sql = "SELECT barang.kd_brg, barang.barcode, barang.nm_brg,barang.size_id,size.size,warna.warna,merk.nama,detail_beli.hargaBeli, barang.qty,fast_stock_opname.jmlTercatat,fast_stock_opname.selisih,fast_stock_opname.tanggalSO FROM barang 
                        LEFT JOIN warna on barang.warna_id = warna.warna_id
                        LEFT JOIN size on barang.size_id = size.size_id
                        LEFT JOIN merk on barang.merk_id = merk.merk_id
                        LEFT JOIN fast_stock_opname ON barang.barang_id = fast_stock_opname.barang_id
                        LEFT JOIN detail_beli ON barang.barang_id = detail_beli.barang_id 
                        order BY fast_stock_opname.tanggalSO desc";
                $query = mysql_query($sql) or die (mysql_error()); 
                 }
               
                  $no = 1;
                     
                 ?>

                <tbody>
                <?php 
                $jum_total=0;
                while ($r = mysql_fetch_array($query)) {  
                // $total_ganti= number_format($r['hargaBeli'] * $r['selisih'], 0, ',', '.');
                    $total_ganti= number_format($r['hargaBeli'] * $r['selisih']);
                    $total_ganti1= $r['hargaBeli'] * $r['selisih'];
                ?>
                    <tr class="<?php echo $no % 2 === 0 ? 'alt' : ''; ?>">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $r['tanggalSO']; ?></td>
                        <td><?php echo $r['kd_brg']; ?></td>
                        <td><?php echo $r['barcode']; ?></td>
                        <td><?php echo $r['nm_brg']; ?></td>
                        <td><?php echo $r['size']; ?></td>
                        <td><?php echo $r['warna']; ?></td>
                        <td><?php echo $r['nama']; ?></td>
                        <td><?php echo number_format($r['hargaBeli'], 0, ',', '.'); ?></td>
                         <td><?php echo $r['qty']; ?></td>
                        <td><?php echo $r['jmlTercatat']; ?></td>
                         <td><?php echo $r['selisih']; ?></td>
                          <!-- <td><?php echo number_format($r['hargaBeli'] * $r['selisih'], 0, ',', '.'); ?></td> -->
                          <td><?php echo $total_ganti; ?></td>
                        <form method="POST" action="" >  <input type="hidden" name="barcode" value="<?php echo $r['barcode']; ?>">
                        <input type="hidden" name="qty" value="<?php echo $r['jmlTercatat']; ?>"> <input type="hidden" name="tanggal" value="<?php echo $tanggal; ?>">

                        <td><button name="update" type="submit">input</button></td></form>
                    </tr> 
                <?php
                $jum_total = $jum_total+$total_ganti1;
                     $no++;
                }
                ?>
            </tbody>
            <tr>
                <td colspan="12" align="right">Total Keseluruhan </td>
                <td ><?php echo number_format($jum_total);?></td>
                <td></td>
            </tr>
        </table>
                             
<?php
if (isset($_POST['update'])) {
                                   
                                
     $barcode = $_POST['barcode'];
    $tgl = $_POST['tanggal'];
    $qty = $_POST['qty'];
    mysql_query("UPDATE barang SET qty = '$qty' WHERE barcode = '$barcode'");
     mysql_query("UPDATE fast_stock_opname SET  approved = 1 WHERE barcode = '$barcode' AND tanggalSO = '$tgl'");
    header("Refresh:0");                  
}
?> 
                             
                            </div><!-- panel -->
                        <!-- panel -->
                        
                    </div><!-- contentpanel -->
                </div><!-- mainpanel -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                });
            });
        </script>
      
<script type="text/javascript">
// Maintain array of dates
var dates = new Array();

function addDate(date) {
    if (jQuery.inArray(date, dates) < 0) 
        dates.push(date);
}

function removeDate(index) {
    dates.splice(index, 1);
}

// Adds a date if we don't have it yet, else remove it
function addOrRemoveDate(date) {
    var index = jQuery.inArray(date, dates);
    if (index >= 0) 
        removeDate(index);
    else 
        addDate(date);
}

// Takes a 1-digit number and inserts a zero before it
function padNumber(number) {
    var ret = new String(number);
    if (ret.length == 1) 
        ret = "0" + ret;
    return ret;
}

jQuery(function () {
    jQuery("#datepicker").datepicker({
        onSelect: function (dateText, inst) {
            addOrRemoveDate(dateText);
        },
        beforeShowDay: function (date) {
            var year = date.getFullYear();
            // months and days are inserted into the array in the form, e.g "01/01/2009", but here the format is "1/1/2009"
            var month = padNumber(date.getMonth() + 1);
            var day = padNumber(date.getDate());
            // This depends on the datepicker's date format
            var dateString = year + "-" + month + "-" + day;

            var gotDate = jQuery.inArray(dateString, dates);
            if (gotDate >= 0) {
                // Enable date so it can be deselected. Set style to be highlighted
                return [true, "ui-state-highlight"];
            }
            // Dates not in the array are left enabled, but with no extra style
            return [true, ""];
        }
    });
});
</script>
        <script>
        
      
         
            jQuery(document).ready(function(){
                
            jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });
                jQuery('#basicTable').DataTable({
                    responsive: true
                });
                
                var shTable = jQuery('#shTable').DataTable({
                    "fnDrawCallback": function(oSettings) {
                        jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
                    },
                    responsive: true
                });
                
                // Show/Hide Columns Dropdown
                jQuery('#shCol').click(function(event){
                    event.stopPropagation();
                });
                
                jQuery('#shCol input').on('click', function() {

                    // Get the column API object
                    var column = shTable.column($(this).val());
 
                    // Toggle the visibility
                    if ($(this).is(':checked'))
                        column.visible(true);
                    else
                        column.visible(false);
                });
                
                var exRowTable = jQuery('#exRowTable').DataTable({
                    responsive: true,
                    "fnDrawCallback": function(oSettings) {
                        jQuery('#exRowTable_paginate ul').addClass('pagination-active-success');
                    },
                    "ajax": "load.php",
                    "columns": [
                        {
                            "class":          'details-control',
                            "orderable":      false,
                            "data":           null,
                            "defaultContent": 'detail'
                        },
                        { "data": "kd_brg" },
                        { "data": "nm_brg" },
                        { "data": "merk" },
                        { "data": "size" },
                        { "data": "warna" },
                        { "data": "qty" }
                    ],
                    "order": [[1, 'asc']] 
                });
                
                // Add event listener for opening and closing details
                jQuery('#exRowTable tbody').on('click', 'td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var row = exRowTable.row( tr );
             
                    if ( row.child.isShown() ) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    }
                    else {
                        // Open this row
                        row.child( format(row.data()) ).show();
                        tr.addClass('shown');
                    }
                });
               
                
                // DataTables Length to Select2
                jQuery('div.dataTables_length select').removeClass('form-control input-sm');
                jQuery('div.dataTables_length select').css({width: '60px'});
                jQuery('div.dataTables_length select').select2({
                    minimumResultsForSearch: -1
                });
    
            });
            
            function format (d) {
                // `d` is the original data object for the row
                return '<table class="table table-bordered nomargin">'+
                    '<tr>'+
                        '<td>Full name:</td>'+
                        '<td>'+d.barcode+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Extension number:</td>'+
                        '<td>'+d.nm_brg+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Ukuran:</td>'+
                        '<td>'+d.size+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Warna:</td>'+
                        '<td>'+d.warna+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Gambar:</td>'+
                        '<td><img src="../img/' + d.gambar + '" width="200" height="250" title="' + d.nm_brg + '""/></td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Extra info:</td>'+
                        '<td><a href="#myModal" class="btn btn-default btn-small" id="custId" data-toggle="modal" data-id="' + d.id + '">Detail</a></td>'+
                    '</tr>'+
                '</table>';
            }
        </script>
        
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Barang</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
     <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'editbarang.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
    </body>
</html>
