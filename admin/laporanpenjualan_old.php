<!DOCTYPE html>
<html lang="en">
    <head>
    <script src="js/jquery-1.11.1.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Chain Responsive Bootstrap3 Admin</title>

        <link href="css/style.default.css" rel="stylesheet">
        <link href="css/morris.css" rel="stylesheet">
        <link href="css/select2.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">
  <link href="css/jquery.tagsinput.css" rel="stylesheet" />
        <link href="css/toggles.css" rel="stylesheet" />
        <link href="css/bootstrap-timepicker.min.css" rel="stylesheet" />
    
        <link href="css/colorpicker.css" rel="stylesheet" />
        <link href="css/dropzone.css" rel="stylesheet" />
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="index.html" class="logo">
                        <img src="images/logo.png" alt="" /> 
                    </a>
                    <div class="pull-right">
                        <a href="" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                
                <div class="header-right">
                    
                    <div class="pull-right">
                        
                        <form class="form form-search" action="search-results.html">
                            <input type="search" class="form-control" placeholder="Search" />
                        </form>
                        
                        <div class="btn-group btn-group-list btn-group-notification">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-bell-o"></i>
                              <span class="badge">5</span>
                            </button>
                            <div class="dropdown-menu pull-right">
                                <a href="" class="link-right"><i class="fa fa-search"></i></a>
                                <h5>Notification</h5>
                                <ul class="media-list dropdown-list">
                                    <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="images/photos/user1.png" alt="">
                                        <div class="media-body">
                                          <strong>Nusja Nawancali</strong> likes a photo of you
                                          <small class="date"><i class="fa fa-thumbs-up"></i> 15 minutes ago</small>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="images/photos/user2.png" alt="">
                                        <div class="media-body">
                                          <strong>Weno Carasbong</strong> shared a photo of you in your <strong>Mobile Uploads</strong> album.
                                          <small class="date"><i class="fa fa-calendar"></i> July 04, 2014</small>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="images/photos/user3.png" alt="">
                                        <div class="media-body">
                                          <strong>Venro Leonga</strong> likes a photo of you
                                          <small class="date"><i class="fa fa-thumbs-up"></i> July 03, 2014</small>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="images/photos/user4.png" alt="">
                                        <div class="media-body">
                                          <strong>Nanterey Reslaba</strong> shared a photo of you in your <strong>Mobile Uploads</strong> album.
                                          <small class="date"><i class="fa fa-calendar"></i> July 03, 2014</small>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="images/photos/user1.png" alt="">
                                        <div class="media-body">
                                          <strong>Nusja Nawancali</strong> shared a photo of you in your <strong>Mobile Uploads</strong> album.
                                          <small class="date"><i class="fa fa-calendar"></i> July 02, 2014</small>
                                        </div>
                                    </li>
                                </ul>
                                <div class="dropdown-footer text-center">
                                    <a href="" class="link">See All Notifications</a>
                                </div>
                            </div><!-- dropdown-menu -->
                        </div><!-- btn-group -->
                        
                        <div class="btn-group btn-group-list btn-group-messages">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge">2</span>
                            </button>
                            <div class="dropdown-menu pull-right">
                                <a href="" class="link-right"><i class="fa fa-plus"></i></a>
                                <h5>New Messages</h5>
                                <ul class="media-list dropdown-list">
                                    <li class="media">
                                        <span class="badge badge-success">New</span>
                                        <img class="img-circle pull-left noti-thumb" src="images/photos/user1.png" alt="">
                                        <div class="media-body">
                                          <strong>Nusja Nawancali</strong>
                                          <p>Hi! How are you?...</p>
                                          <small class="date"><i class="fa fa-clock-o"></i> 15 minutes ago</small>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <span class="badge badge-success">New</span>
                                        <img class="img-circle pull-left noti-thumb" src="images/photos/user2.png" alt="">
                                        <div class="media-body">
                                          <strong>Weno Carasbong</strong>
                                          <p>Lorem ipsum dolor sit amet...</p>
                                          <small class="date"><i class="fa fa-clock-o"></i> July 04, 2014</small>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="images/photos/user3.png" alt="">
                                        <div class="media-body">
                                          <strong>Venro Leonga</strong>
                                          <p>Do you have the time to listen to me...</p>
                                          <small class="date"><i class="fa fa-clock-o"></i> July 03, 2014</small>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="images/photos/user4.png" alt="">
                                        <div class="media-body">
                                          <strong>Nanterey Reslaba</strong>
                                          <p>It might seem crazy what I'm about to say...</p>
                                          <small class="date"><i class="fa fa-clock-o"></i> July 03, 2014</small>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="images/photos/user1.png" alt="">
                                        <div class="media-body">
                                          <strong>Nusja Nawancali</strong>
                                          <p>Hey I just met you and this is crazy...</p>
                                          <small class="date"><i class="fa fa-clock-o"></i> July 02, 2014</small>
                                        </div>
                                    </li>
                                </ul>
                                <div class="dropdown-footer text-center">
                                    <a href="" class="link">See All Messages</a>
                                </div>
                            </div><!-- dropdown-menu -->
                        </div><!-- btn-group -->
                        
                        <div class="btn-group btn-group-option">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                              <li><a href="#"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-star"></i> Activity Log</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                              <li class="divider"></li>
                              <li><a href="#"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                            </ul>
                        </div><!-- btn-group -->
                        
                    </div><!-- pull-right -->
                    
                </div><!-- header-right -->
                
            </div><!-- headerwrapper -->
        </header>
        
        <section>
            <div class="mainwrapper">
                <div class="leftpanel">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb" href="profile.html">
                            <img class="img-circle" src="images/photos/profile.png" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Elen Adarna</h4>
                            <small class="text-muted">Beach Lover</small>
                        </div>
                    </div><!-- media -->
                    
                    <h5 class="leftpanel-title">Navigation</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="parent"><a href="index.html"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                        
                        <li class="active"><a href=""><i class="fa fa-suitcase"></i>KATALOG<span></span></a>
                            <ul class="children">
                                <li><a href="produk.php">produk</a></li>
                                <li><a href="tambahproduk.php">Tambah Produk</a></li>
                               	<li><a href="supplier.php">Supplier</a></li>
                            </ul>
                        </li>
                        <li class="parent"><a href=""><i class="fa fa-suitcase"></i>Order<span></span></a>
                            <ul class="children">
                                <li><a href="produk.php">Order masuk</a></li>
                                <li><a href="tambahproduk.php">Order Dikonfirmasi</a></li>
                               	
                            </ul>
                        </li>
                        <li class="parent"><a href="user.php"><i class="fa fa-edit"></i> <span>USER</span></a>
                         
                        </li>
                        <li class="parent"><a href="user.php"><i class="fa fa-edit"></i> <span>Konfirmasi Order</span></a></li>
                        <li class="parent"><a href=""><i class="fa fa-suitcase"></i>Kasir<span></span></a>
                            <ul class="children">
                                <li><a href="jualbarang.php">Penjualan Barang</a></li>
                                <li><a href="belibarang.php">Pembelian Barang</a></li>
                               
                            </ul>
                        </li>

                        <li class="parent"><a href=""><i class="fa fa-bars"></i> <span>Laporan</span></a>
                            <ul class="children">
                                <li><a href="basic-tables.html">Basic Tables</a></li>
                                <li><a href="data-tables.html">Data Tables</a></li>
                            </ul>
                        </li>
                        <li><a href="maps.html"><i class="fa fa-map-marker"></i> <span>Maps</span></a></li>
                        <li class="parent"><a href=""><i class="fa fa-file-text"></i> <span>Pages</span></a>
                            <ul class="children">
                                <li><a href="notfound.html">404 Page</a></li>
                                <li><a href="blank.html">Blank Page</a></li>
                                <li><a href="calendar.html">Calendar</a></li>
                                <li><a href="invoice.html">Invoice</a></li>
                                <li><a href="locked.html">Locked Screen</a></li>
                                <li><a href="media-manager.html">Media Manager</a></li>
                                <li><a href="people-directory.html">People Directory</a></li>
                                <li><a href="profile.html">Profile</a></li>                                
                                <li><a href="search-results.html">Search Results</a></li>
                                <li><a href="signin.html">Sign In</a></li>
                                <li><a href="signup.html">Sign Up</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                    
                </div><!-- leftpanel -->
                
               <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-th-list"></i>
                            </div>
                            <div class="media-body">
                                <ul class="breadcrumb">
                                    <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
                                    <li><a href="">Tables</a></li>
                                    <li>Data Tables</li>
                                </ul>
                                <h4>Data Tables</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
                      
                    
                        <div class="panel panel-primary-head">
                            <div class="panel-heading">
                                
                            </div><!-- panel-heading -->
                             <div class="container">
    <label><?php echo "$_GET[tanggalawal] 00000";?></label>
<div class="row">
                            <div class="col-md-6">
                            <form action="laporanpenjualan.php" method="get">
                            <label>dari tanggal</label>
                                        <div class="input-group">
                                            <input   type="text" id="tanggalawal" name="tanggalawal" width="40" class="tanggal" placeholder="mm-dd-yyyy" >
                                            
                                        </div><!-- input-group -->
                                     
                                        <br />   
                                         <label>ke tanggal</label> <div class="input-group">
                                            <input type="text" id="tanggalakhir" name="tanggalakhir" width="40" class="tanggal" placeholder="mm-dd-yyyy" >
                                            
                                        </div>   <button type="submit" class="btn btn-default btn-lg btn-block">TAMBAHKAN</button>     </form>     </div></div>     <br />
                            <table id="basicTable" class="table table-striped table-bordered responsive">
                                <thead class="">
                                    <tr>
                                        <th>No</th>
                                        <th>customer</th>
                                        <th>Tanggal Penjualan</th>
                                        <th>Nomor Struk</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>size</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>diskon(%)</th>
                                        <th>potongan agen (%)</th>
                                        <th>Harga net</th>
                                        <th>qty</th>
                                        <th>total</th>
                                        <th>untung</th>
                                        <th>admin</th>


                                    </tr>
                                </thead>
                         <?php include "config.php";
                                $tanggalawal = $_GET[tanggalawal];
                                $tanggalakhir = $_GET[tanggalakhir];

                               if (empty($_GET)) { $sql = "SELECT * FROM `transaksijual` LEFT JOIN `detail_jual` ON `transaksijual`.`idTransaksiJual` = `detail_jual`.`idTransaksiJual` LEFT JOIN `barang` ON `detail_jual`.`idBarang`=`barang`.`barang_id` LEFT JOIN `size` ON `barang`.`size_id` = `size`.`size_id` LEFT JOIN `user` ON `transaksijual`.`user_id` = `user`.`user_id` LEFT JOIN `level` ON `user`.`level_id` = `level`.`level_id` ORDER BY `detail_jual`.`uid`";
                                $query = mysql_query($sql) or die (mysql_error()); 
                                	# code...
                                }else{ $sql = "SELECT * FROM `transaksijual` LEFT JOIN `detail_jual` ON `transaksijual`.`idTransaksiJual` = `detail_jual`.`idTransaksiJual` LEFT JOIN `barang` ON `detail_jual`.`idBarang`=`barang`.`barang_id` LEFT JOIN `size` ON `barang`.`size_id` = `size`.`size_id` LEFT JOIN `user` ON `transaksijual`.`user_id` = `user`.`user_id` LEFT JOIN `level` ON `user`.`level_id` = `level`.`level_id` WHERE `transaksijual`.`tglTransaksiJual` BETWEEN('{$tanggalawal} 00:00:00') AND ('{$tanggalakhir} 23:59:59') ORDER BY `detail_jual`.`uid`";
                                $query = mysql_query($sql) or die (mysql_error()); }
                               
                                     ?><?php  $no = 1;
                                     
                                 ?>
                                <tbody> <?php while ($r = mysql_fetch_array($query)) {  ?>
                                  <tr class="<?php echo $no % 2 === 0 ? 'alt' : ''; ?>">
                                    <td><?php echo $no; ?></td>
                                        <td><?php echo $r['username']; ?></td>
                                        <td><?php echo $r['tglTransaksiJual']; ?></td>
                                        <td><?php echo $r['nomorStruk']; ?></td>
                                        <td><?php echo $r['kd_brg']; ?></td>
                                        <td><?php echo $r['nm_brg']; ?></td>
                                        <td><?php echo $r['size']; ?></td>
                                        <td><?php echo number_format($r['hargaBeli'], 0, ',', '.'); ?></td>
                                        <td><?php echo number_format($r['harga'], 0, ',', '.'); ?></td>
                                        <td><?php echo $r['diskon']; ?></td>
                                        <td><?php echo number_format($r['diskon_rupian'], 0, ',', '.'); ?></td>
                                        <td><?php echo number_format($r['hargaJual'], 0, ',', '.'); ?></td>
                                        <td><?php echo $r['jumBarang']; ?></td>
                                        <td><?php echo number_format($r['hargaJual'] * $r['jumBarang'], 0, ',', '.'); ?></td>
                                        <td><?php echo number_format(($r['hargaJual'] - $r['hargaBeli']) * $r['jumBarang'], 0, ',', '.'); ?></td>
                                        <td><?php echo $r['admin']; ?></td>
</tr> <?php $no++;
}
?>
                                </tbody>
                                <?php $total ="SELECT (SUM(hargaJual * jumBarang)) as totaljual, (SUM(hargaBeli * jumBarang)) as totalbeli, (SUM(jumBarang)) as totalbarang FROM `transaksijual` LEFT JOIN `detail_jual` ON `transaksijual`.`idTransaksiJual` = `detail_jual`.`idTransaksiJual` LEFT JOIN `barang` ON `detail_jual`.`idBarang`=`barang`.`barang_id` LEFT JOIN `size` ON `barang`.`size_id` = `size`.`size_id` LEFT JOIN `user` ON `transaksijual`.`user_id` = `user`.`user_id` LEFT JOIN `level` ON `user`.`level_id` = `level`.`level_id` WHERE `transaksijual`.`tglTransaksiJual` BETWEEN('{$tanggalawal} 00:00:00') AND ('{$tanggalakhir} 23:59:59') ORDER BY `detail_jual`.`uid`";
                                $query = mysql_query($total) or die (mysql_error()); ?>
                                <tfoot><?php while ($r = mysql_fetch_array($query)) {  ?>
<tr><th>total barang terjual</th>
<td><?php echo number_format($r['totalbarang'], 0, ',', '.');?></td></tr>
<tr><th>total penjualan</th>
<td><?php echo number_format($r['totaljual'], 0, ',', '.');?></td></tr>
<tr><th>total modal</th>
<td><?php echo number_format($r['totalbeli'], 0, ',', '.');?></td></tr>
<tr><th>total keuntungan</th>
<td><?php echo number_format($r['totaljual'] - $r['totalbeli'], 0, ',', '.');?></td></tr>
                                
                                </tfoot>
                                <?php } ?>
                            </table>
                        </div><!-- panel -->
                        <!-- panel -->
                        
                    </div><!-- contentpanel -->
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>
         <script src="js/jquery-ui-1.10.3.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        <script src="//cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.js"></script>
        <script src="js/select2.min.js"></script>

        <script src="js/custom.js"></script>
        <script src="js/jquery.autogrow-textarea.js"></script>
        <script src="js/jquery.mousewheel.js"></script>
        <script src="js/jquery.tagsinput.min.js"></script>
        <script src="js/toggles.min.js"></script>
        <script src="js/bootstrap-timepicker.min.js"></script>
        <script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/colorpicker.js"></script>
        <script src="js/dropzone.min.js"></script>
    
          <script src="js/bootstrap-datepicker.js"></script>
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
