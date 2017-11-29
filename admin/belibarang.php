<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Chain Responsive Bootstrap3 Admin</title>

        <link href="css/style.default.css" rel="stylesheet">
        <link href="css/morris.css" rel="stylesheet">
        <link href="css/select2.css" rel="stylesheet" />

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
                        <li class="active"><a href="index.html"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                        
                        <li class="parent"><a href=""><i class="fa fa-suitcase"></i>KATALOG<span></span></a>
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
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="media-body">
                                <ul class="breadcrumb">
                                    <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
                                    <li>Dashboard</li>
                                </ul>
                                <h4>Dashboard</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
                        
                        <div class="row row-stat">
                            <?php include "config.php";
include "/pages/function.php";
include "/pages/library.php";?>
<link rel="stylesheet" type="text/css" href="css/jquery-ui-ac.min.css" />
            <link rel="stylesheet" type="text/css" href="css/style.css" />
            <link rel="stylesheet" type="text/css" href="css/jquery.simple-dtpicker.css" />

            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="js/interface.js"></script>
            <script type="text/javascript" src="js/jquery.form.min.js"></script>
            <script type="text/javascript" src="js/jquery.simple-dtpicker.js"></script>
           <link rel="stylesheet"
    href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
 
    
<link href='css/style.css' rel='stylesheet' type='text/css'>
<script>
$(function() {  
        $( "#kdbrg" ).autocomplete({
         source: "searchnama.php",  
           minLength:1, 
        });
    });
</script>
<script type="text/javascript">
   $(document).ready(function ()
   {
      $('#layer1').Draggable(
              {
                 zIndex: 60,
                 ghosting: false,
                 opacity: 0.7,
                 handle: '#layer1_handle'
              }
      );
      $('#layer1_form').ajaxForm({
         target: '#frmTambahBarang',
         success: function ()
         {
            $("#layer1").hide();
         }
      });
      $("#layer1").hide();
      $('#tambahbarang').click(function ()
      {
         $("#layer1").show();
         $("#barcode").focus();
      });
      $('#close').click(function ()
      {
         $("#layer1").hide();
      });
   });
   function popupform(myform, windowname)
   {
      if (!window.focus)
         return true;
      window.open('', windowname, 'type=fullWindow,fullscreen,scrollbars=yes');
      myform.target = windowname;
      return true;
   }

</script>

<style type="text/css">

   #layer1
   {
      position: absolute;
      left:200px;
      top:200px;
      width:450px;
      background-color:#eef4d2;
      border: 1px solid #000;
      z-index: 50;
   }
   #layer1_handle
   {
      background-color:#265180;
      padding:0px;
      text-align:center;
      font-weight:bold;
      color: #FFFFFF;
      vertical-align:middle;
   }
   #layer1_content
   {
      padding:5px;
   }
   #close
   {
      float:right;
      text-decoration:none;
      color:#FFFFFF;
   }
</style>
<?php

switch ($_GET[act]) {
    
    
     case "carisupplier": // ====================================================================================================================

               if (isset($_POST['supplier_id'])) {
                  $x = findSupplier($_POST['supplier_id']);
               } else {
                  $x = findSupplier($_GET['supplier_id']);
               };

               //echo "POST : ".$_POST['idSupplier']." GET : ".$_GET['idSupplier']." SESSION"; var_dump($_SESSION);
               ?>
               <h2>Pembelian Barang</h2>Pembelian Barang dari supplier : <?php echo $_SESSION['namaSupplier']; ?>
               <table>
                  <tr>
                  <form method="POST" action="?act=carisupplier&action=cek&supplier_id=<?php echo $_SESSION['supplier_id']; ?>">

                     <br /><br /> 
                     <div class="ui-widget">                      <td height="68">masukkan KODE barang </td>
                     
<td>: <div class="col-sm-8">
                                                    <input type="text" placeholder="kodebarang" class="form-control" name="kdbrg" id="kdbrg" />
                                                </div>
                     </td></div>
                     <td>
                        <input type="submit" value="Cari !" accesskey="2" />
                        <input type="hidden" name="xppn" value="<?php echo $_POST['xppn']; ?>">
                        <input type="hidden" name="xDiskonPersen" value="<?php echo $_POST['xDiskonPersen']; ?>">
                        <input type="hidden" name="persenprofit" value="<?php echo $_POST['persenprofit']; ?>">
                     </td>
                  </form>
                  </tr>
                  <tr>
                  <form method="POST" action="">

                     <br /> <td height="45">Kode Barang </td>
                     <?php
                     // Pilihan barang disortir berdasarkan nama barang
                     $sql1 = mysql_query("SELECT DISTINCT barang.barcode, barang.nm_brg
                                FROM barang WHERE supplier_id=".$_SESSION['supplier_id']." AND (non_aktif!=1 or non_aktif is null) ORDER BY nm_brg ASC");
                     ?>
                     <td>:
                        <select name="kd_brg" accesskey="3">
                           <?php
                           while ($data = mysql_fetch_array($sql1)) {
                              echo "<option value=$data[kd_brg]>$data[barcode] :: $data[kd_brg]";
                           };
                           ?>
                        </select>
                     </td>
                     <td>
                        <input type=submit value="(4) Pilih barang !" accesskey="4" />
                     </td>
                     <input type="hidden" name="xppn" value="<?php echo $_POST['xppn']; ?>">
                     <input type="hidden" name="xDiskonPersen" value="<?php echo $_POST['xDiskonPersen']; ?>">
                     <input type="hidden" name="persenprofit" value="<?php echo $_POST['persenprofit']; ?>">
                  </form>
                  </tr>
                  <tr>
                     <td></td>
                     <td></td>
                     <td>
                        <?php
                        //HS tombol "Tambah Barang" akan memunculkan form dialog jQuery
                        echo "  <form method=POST action='belibarang.php?act=carisupplier&action=cek&supplier_id=".$_SESSION['supplier_id']."'>
        <input type=\"button\" id=\"tambahbarang\" accesskey='b' value='(b) Tambah Barang Baru' />
        <input type='hidden' name='xppn' value='$_POST[xppn]'>
        </form>";
                        ?>
                     </td>
                  </tr>
               </table>
               <?php
              
               if ($_GET[action] == 'cek') { // ===============================================================================================================
                  $barang = cekBarang($_POST["kdbrg"]);
                  $kd_brg = $_POST['kdbrg'];
                  //tambahan untuk harga banded
                  $query = "SELECT qty, harga FROM harga_banded WHERE kd_brg = '{$_POST['kd_brg']}'";
                  $hasil = mysql_query($query);
                  $hargaBanded = mysql_fetch_array($hasil, MYSQL_ASSOC);

                  $dataPenjualan = null;

                  if (!$barang) {
                     echo "Data belum ada !";
                   break;
                  } else {
                     /* Data penjualan .. jika ada */
                     $showTable = mysql_query("show tables like 'data_penjualan'");
                     $rowNum = mysql_num_rows($showTable);
                     if ($rowNum > 0) {
                        $sql = "SELECT barcode, penjualan, rata_rata_mingguan, jumlah_bulan_terakhir FROM data_penjualan 
                                WHERE barcode = '{$barang['barcode']}'";
                        $hasil = mysql_query($sql);
                        $dataPenjualan = mysql_fetch_array($hasil, MYSQL_ASSOC);
                     }
                  }
               }
               ?>
               <script>
                  function RecalcHargaBarangLama() {
                     var HargaBeli = 0;
                     var HargaJual = 0;
                     var Subtotal = parseInt(document.getElementById("xsubtotal").value);
                     var PPN = parseInt(document.getElementById("xppn").value);
                     var JumlahBarang = parseInt(document.getElementById("jumBarang").value);
                     var PersenProfit = parseInt(document.getElementById("xPersenProfit").value);
                     var DiskonPersen = parseFloat(document.getElementById("xDiskonPersen").value);
                     var DiskonRupiah = parseInt(document.getElementById("xDiskonRupiah").value);
                     if (Subtotal) {
                        HargaBeli = (Subtotal / JumlahBarang)
                        // hitung diskon dulu !
                        HargaBeli = HargaBeli - ((HargaBeli / 100) * DiskonPersen) - DiskonRupiah;
                        // baru kemudian hitung PPN
                        HargaBeli = HargaBeli + ((HargaBeli / 100) * PPN);
                        HargaJual = HargaBeli + ((HargaBeli / 100) * PersenProfit);
                     }

                     // mencegah keliru input barcode di kolom JumlahBarang
                     if (JumlahBarang > 2000) {
                        JumlahBarang = 0;
                     }


                     document.getElementById("hargaBeliBaru").value = HargaBeli;
                     document.getElementById("hargaJualBaru").value = HargaJual;
                     document.getElementById("jumBarang").value = JumlahBarang;
                  }

               </script>
               <?php
               // inisialisasi variabel xppn dan diskon
               if (!$_POST[xppn]) {
                  $_POST[xppn] = 0;
                  $_POST['xDiskonPersen'] = 0;
                  $_POST['persenprofit'] = 0;
               };
               ?>
               <?php
               if ($barang) {
                  ?>
                  <p style="background-color: #EEF4D2; padding: 2px 5px; width: 705px; text-align: right">
                     <?php
                     if (!is_null($dataPenjualan)) {
                        ?>
                        Rata-rata penjualan perminggu, selama <?php echo $dataPenjualan['jumlah_bulan_terakhir']; ?> bulan terakhir: <?php echo number_format($dataPenjualan['rata_rata_mingguan'], 2, ',', '.'); ?><br />
                        <?php
                     }
                     ?>
                     Stok tercatat: <?php echo $barang['qty']; ?><br/>
                  </p>
                  <?php
               }
               ?>
                <div id="frmTambahBarang">
                  <form method="POST" action="?act=carisupplier&action=tambah">
                     <?php // this button will be default (when press enter) and invisible button     ?>
                     <input type=submit value='(t) Tambah' name=btTambah style="position: absolute; left: -100%;">
                     <table width="1000">
                        <tr>
                           <td>KODE BARANG</td>
                           <td> <div class="col-sm-11">
                        
                                                <input type="text" class="form-control" name="kdbrg" value="<?php echo $barang['kd_brg']; ?>" readonly="readonly" /></div>
                              <input type="hidden" name="idBarang" value="<?php echo $barang['barang_id']; ?>" /></td>
                           <td><a name='#jumlah'>  <u>J</u>umlah yang dibeli </a></td>
                           <td><div class="col-sm-12"><input type=text class="form-control" name='jumBarang' id='jumBarang' tabindex=1 accesskey='j'/></td>
                        </tr>
                        <tr>
                           <td>Nama Barang</td>
                           <td><input type=text  class="form-control" name='namaBarang' value='<?php echo $barang['nm_brg']; ?>' readonly='readonly' /></td>
                           <td>Subtotal (Rp)</td>
                           <td><input type=text  class="form-control" name='subtotal' value='0' id='xsubtotal'  tabindex=2 /></td>
                        </tr>
                        <tr>
                           <td>Diskon (%)</td>
                           <td> <div class="col-sm-12"> <input type=text class="form-control" name='xDiskonPersen' value='<?php echo $_POST['xDiskonPersen']; ?>' id='xDiskonPersen' tabindex="3" /></div></td>
                           <td>PPN (%)</td>
                           <td><div class="col-sm-12"> <input type=text class="form-control" name='xppn' value='<?php echo $_POST['xppn']; ?>' id='xppn'  tabindex=5 /></div></td>
                        </tr>
                        <tr>
                           <td>Diskon (Rp)</td>
                           <td><input type=text class="form-control" name='xDiskonRupiah' value='0' id='xDiskonRupiah' tabindex="4"/></td>
                           <td>Profit (%)</td>
                           <td><input type=text class="form-control" name='persenprofit' value='<?php echo $_POST['persenprofit']; ?>' id='xPersenProfit' tabindex=6 /></td>
                        </tr>
                        <tr>
                           <td colspan="4"></td>
                        </tr>
                        <tr>
                           <td>Harga Beli Sekarang</td>
                           <td><input type=text class="form-control" name='hargaBeliLama' value='<?php echo $barang['hargaBeli']; ?>' readonly='readonly' /></td>
                           <td>Harga Beli Barang</td>
                           <td><input type=text class="form-control" name='hargaBeliBaru' id='hargaBeliBaru' tabindex="8" value='<?php echo $barang['hargaBeli']; ?>' /></td>
                        </tr>
                        <tr>
                           <td>Harga Jual Sekarang</td>
                           <td><input type=text class="form-control" name='hargaJualLama' value='<?php echo $barang['harga']; ?>' readonly='readonly' /></td>
                           <td>Harga Jual Barang</td>
                           <td><input type=text class="form-control" name='hargaJualBaru' id='hargaJualBaru' value='<?php echo $barang['harga']; ?>' tabindex=9 /></td>
                        </tr>
                        
                        <tr>
                           <td>Harga Banded</td>
                           <td> : <input type=text class="form-control" name='hargaBanded' size=10 tabindex=11 id="hargaBanded" value = "<?php echo isset($hargaBanded) ? $hargaBanded['qty'] * $hargaBanded['harga'] : ''; ?>"/></td>
                           <td>Harga Banded Satuan</td>
                           <td> : <input type=text class="form-control" name='hargaBandedSatuan' size=10 tabindex=13 id="hargaBandedSatuan" value="<?php echo $hargaBanded['harga'] ?>"/></td>
                        </tr>
                        <tr>
                           <td>Qty Banded</td>
                           <td> : <input type="text" class="form-control" name="qtyBanded" tabindex=12 id="qtyBanded" value="<?php echo $hargaBanded['qty']; ?>"/></td>
                        </tr>
                        <tr>

                           <td align=left colspan=4>
                           <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-btns">
                                            <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                            <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <h5 class="panel-title">PILIH SIZE YANG AKAN DI TAMBAHKAN</h5>
                                        <p>pilih size yang ingin ditambahkan didalam satu kode barang</p>
                                    </div><!-- panel-heading -->
                                    <div class="panel-body">
                                        <form class="form-bordered">
                                            <!-- form-group -->
                                        
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">SIZE</label>
                                                <div class="col-sm-8">
                                                <?php $carisize = mysql_query("SELECT * FROM barang LEFT JOIN warna ON barang.warna_id = warna.warna_id WHERE barang.kd_brg = '$barang[kd_brg]' GROUP BY barang.warna_id");
                                                        while ($result = mysql_fetch_array($carisize)) {?>
                                                    <div class="checkbox block"><label><input name="warna[]" type="checkbox" value="<?php echo $result[warna_id];?>"><?php echo $result['warna'];?></label>
                                                    </div>
                                                    <?php } ?>                                             
                                                </div>
                                            </div>
                              <input type=submit accesskey='t' value='(t) Tambah' name=btTambah tabindex=14 >
                              <input type='hidden' name='supplier_id' value='<?php echo $_SESSION['supplier_id
                              ']; ?>'>
                           </td>
                        </tr>
                     </table> 
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-btns">
                                            <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                            <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <h5 class="panel-title">PILIH SIZE YANG AKAN DI TAMBAHKAN</h5>
                                        <p>pilih size yang ingin ditambahkan didalam satu kode barang</p>
                                    </div><!-- panel-heading -->
                                    <div class="panel-body nopadding">
                                        <form class="form-bordered">
                                            <!-- form-group -->
                                        
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">SIZE</label>
                                                <div class="col-sm-8">
                                                <?php $carisize = mysql_query("SELECT * FROM barang LEFT JOIN size ON barang.size_id = size.size_id WHERE barang.kd_brg = '$barang[kd_brg]' GROUP BY barang.size_id");
                                                        while ($result = mysql_fetch_array($carisize)) {?>
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="<?php echo $result[size_id];?>"><?php echo $result['size'];?></label>
                                                    </div>
                                                    <?php } ?>                                             
                                                </div>
                                            </div><!-- form-group -->
                                            

                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                         <!-- col-md-6 -->
                            <button type="submit" class="btn btn-default btn-lg btn-block">TAMBAHKAN</button>
                  </form>
               </div>

              <script>
                  var txtBox = document.getElementById("jumBarang");
                  if (txtBox != null)
                     txtBox.focus();

                  $("#hargaBanded").keyup(function () {
                     updateHargaBandedSatuan();
                  });

                  $("#qtyBanded").keyup(function () {
                     updateHargaBandedSatuan();
                  });

                  $("#hargaBandedSatuan").keyup(function () {
                     updateHargaBanded();
                  });

                  function updateHargaBandedSatuan() {
                     var harga = parseInt($("#hargaBanded").val()) / parseInt($("#qtyBanded").val());
                     $("#hargaBandedSatuan").val(harga);
                  }

                  function updateHargaBanded() {
                     var harga = parseInt($("#hargaBandedSatuan").val()) * parseInt($("#qtyBanded").val());
                     $("#hargaBanded").val(harga);
                  }
               </script>
               <?php
               //fixme : perlu validasi input
               //   # tidak boleh kosong jumlah barang
               //   # tidak boleh kosong harga beli
               //   # tidak boleh kosong harga jual
               // bisa pakai fasilitas dari jQuery : http://www.position-absolute.com/articles/jquery-form-validator-because-form-validation-is-a-mess/

  if ($_GET[action] == 'tambah') { // =============================================================================================================
                  //fixme: item dg barcode "0" pasti selalu ikut terinput - cek dari log query MySQL
                  $session = $_SESSION['supplier_id'];
                  $kdbrg = $_POST['kdbrg'];
                  $qtybrg = $_POST['jumBarang'];
                  $hargajualbaru = $_POST['hargaJualBaru'];
                  $hargabelibaru = $_POST['hargaBeliBaru'];
                  $expired = $_POST['tglExpire'];
                  $size = $_POST['size'];
                  $warna = $_POST['warna'];
                  $jumlahwarna = count($warna);
 $jumlah_dipilih = count($size);
 for($i=0;$i<$jumlahwarna;$i++){
 for($x=0;$x<$jumlah_dipilih;$x++){
                    $true = cekBarangTemp($session, $kdbrg, $size[$x],$warna[$i]);
                  $ambilBarcode =  mysql_query("SELECT barcode FROM barang WHERE supplier_id = $session and kd_brg = '$kdbrg' and size_id = '$size[$x]' and warna_id = '$warna[$i]'") or die (mysql_error());
                  $hasilbarcode = mysql_fetch_array($ambilBarcode);
                  $barcode = $hasilbarcode['barcode'];
                     if ($true != 0) {

                       $ambilJumBarang = mysql_query("SELECT qty FROM tmp_detail_beli WHERE supplier_id = $session and kd_brg = '$kdbrg' and size_id = '$size[$x]' and warna_id = '$warna[$i]'") or die (mysql_error());
   $dataJum = mysql_fetch_array($ambilJumBarang);
   $jumlah = $dataJum[qty] + $qtybrg;
   mysql_query("UPDATE tmp_detail_beli SET qty = '$jumlah' WHERE supplier_id = '$session' and kd_brg = '$kdbrg' and size_id = '$size[$x]' and warna_id = '$warna[$i]'");
                     } else { 
                         $tgl = date("Y-m-d");
   mysql_query("INSERT into tmp_detail_beli(supplier_id, tglTransaksi,
                        barcode,tglExpire,qty,hargaBeli,hargaJual,admin_id,size_id,warna_id,kd_brg)
                    VALUES('$session','$tgl','$barcode','$expired',
                        '$qtybrg','$hargabelibaru','$hargajualbaru','1','$size[$x]','$warna[$i]', '$kdbrg')") or die (mysql_error());
                     }
                     // harga banded
                     if (isset($_POST['qtyBanded']) && isset($_POST['hargaBandedSatuan'])) {
                        $qty = $_POST['qtyBanded'];
                        $barcode = $_POST['barcode'];
                        $harga = $_POST['hargaBandedSatuan'];
                        if ($qty > 0) {
                           $sql = "INSERT INTO tmp_harga_banded (barcode, user_name, supplier_id,kd_brg,size_id, qty, harga_satuan) "
                                   ."VALUES('{$barcode}','admin','{$session}',  {$qty},{$harga},'{$kdbrg}',{$size[$x]}) "
                                   ."ON DUPLICATE KEY UPDATE qty={$qty}, harga_satuan={$harga}";
                        } else {
                           $sql = "DELETE FROM tmp_harga_banded WHERE barcode = '{$barcode}' AND user_name='admin'";
                        }
                        mysql_query($sql) or die(mysql_error());
                     }}
                  }
               
}


              
               if ($_GET[action] == 'ubahjumlah') {
                  echo "Ubah Jumlah  :  $_SESSION[supplier_id],  $_POST[jumlahBarang], $_POST[kdbrg],$_POST[size]";

                  $true = cekBarangTemp($_SESSION[supplier_id], $_POST[kdbrg],$_POST[size]);
                  if ($true != 0) {
                     ubahJumlahBarangBeliTemp($_SESSION[supplier_id],  $_POST[jumlahBarang], $_POST[kdbrg],$_POST[size]);
                  }
               }
               $sql = "SELECT *
                                from tmp_detail_beli tdb, barang b LEFT JOIN size as s ON b.size_id=s.size_id
                                where tdb.barcode = b.barcode and tdb.supplier_id = '$_SESSION[supplier_id]' and tdb.admin_id = '1'";
               //echo $sql;
               $query = mysql_query($sql) or die (mysql_error());

               $r = mysql_fetch_row($query);
               echo "<hr/>";

               if ($r) { // -------------------- tampilkan data yang sudah di input sejauh ini ---------
                  //echo "Ada $r[0] data";
                  ?>
                   <table id="basicTable" class="table table-striped table-bordered responsive">
<thead>
                     <tr><th>Barcode</th>
                     <th>Kode barang</th>
                        <th>Nama Barang</th>
                        <th>size</th>
                        <th>warna</th>
                        <th>Tgl Expire</th>
                        <th>Jumlah</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Total</th>
                        <th>Aksi</th>
                     </tr> </thead>
                     <?php
                     $no = 1;
                     $tot_pembelian;
                     $sql = "SELECT tdb.barcode,tdb.kd_brg, tdb.idBarang,tdb.size_id, tdb.hargaJual, s.size,w.warna, tglExpire, tdb.qty, hargaBeli,nm_brg
                                FROM  barang b , tmp_detail_beli tdb  LEFT JOIN size as s
                                    ON tdb.size_id = s.size_id LEFT JOIN warna as w ON tdb.warna_id = w.warna_id
                                   
                                WHERE tdb.barcode = b.barcode AND tdb.supplier_id = '$_SESSION[supplier_id]' AND tdb.admin_id = '1'
                ORDER BY idBarang"; 
                     //echo $sql;
                     $query2 = mysql_query($sql) or die (mysql_error()); ?>
                     <?php
                     while ($data = mysql_fetch_array($query2)) {
                        $total = $data[hargaBeli] * $data[qty];
                        ?>
                        <tr <?php echo $no % 2 === 0 ? 'class="alt"' : ''; ?>>
                        <form method=POST action='belibarang.php?act=carisupplier&action=ubahjumlah'>
                           <td><?php echo $data['barcode']; ?></td>
                           <td><?php echo $data['kd_brg']; ?></td>
                           <td><?php echo $data['nm_brg']; ?></td>
                           <td><?php echo $data['size']; ?></td>
                           <td><?php echo $data['warna']; ?></td>
                           <td><?php echo $data['tglExpire']; ?></td>
                           <td align=right><input type=text name=jumlahBarang value="<?php echo $data['qty']; ?>" size=5></td>
                           <td align=right><?php echo $data['hargaBeli']; ?></td>
                           <td align=right><?php echo $data['hargaJual']; ?></td>

                           <input type=hidden name=barcode value="<?php echo $data['barcode']; ?>">
                           <input type=hidden name=kdbrg value="<?php echo $data['kd_brg']; ?>">
                           <input type=hidden name=size value="<?php echo $data['size_id']; ?>">
                           <input type=hidden name=idBarang value="<?php echo $data['idBarang']; ?>">
                           <input type=hidden name=warna value="<?php echo $data['warna_id']; ?>">

                           <td align=right><?php echo number_format($total, 0, ',', '.'); ?></td>
                           <td width=120><input type=submit name=update value=Update></form> |
                        <a href='./aksi.php?module=pembelian_barang&act=hapus_detil&id=<?php echo $data['idBarang']; ?>'>Hapus</a></td>
                        </tr>
                        <?php
                        $tot_pembelian += $total;
                        $no++;
                     }

//fixme: tombol update membuat jumlah stok jadi sama semua
                     //HS total invoice :
                     // subtotal - (DiskonPersen x subtotal) - (DiskonRupiah) + PPN
                     if (empty($_POST[DiskonPersen])) {
                        $_POST[DiskonPersen] = 0;
                     };
                     if (empty($_POST[DiskonRupiah])) {
                        $_POST[DiskonPersen] = 0;
                     };
                     if (empty($_POST[PPN])) {
                        $_POST[PPN] = 0;
                     };
                     $tot_pembelian = $tot_pembelian - ($_POST[DiskonPersen] * $tot_pembelian) - $_POST[DiskonRupiah] + $_POST[PPN];
                     ?>
                     <script>
                        function Recalc() {
                           var total = 0;
                           var GrandTotal = parseInt(document.getElementById("tot_pembayaran").value);
                           var PPN = parseInt(document.getElementById("ppn").value);
                           var DiskonPersen = parseInt(document.getElementById("diskonpersen").value);
                           var DiskonRupiah = parseInt(document.getElementById("diskonrupiah").value);

                           if (GrandTotal) {
                              total = GrandTotal;
                              total = total - (GrandTotal / 100 * DiskonPersen);
                              total = total - DiskonRupiah;
                              total = total + (GrandTotal / 100 * PPN);
                           }
                           document.getElementById("grandtotal").value = total;
                           document.getElementById("tot_pembayaran").value = total;
                        }

                     </script>
</tbody>
                  </table>
                  <?php
                  $pmbyrn = mysql_query("SELECT * from pembayaran");
                  echo "<form method=POST action='./aksi.php?module=pembelian_barang&act=input'>
                        <input type=hidden name='tot_pembayaran' value='$tot_pembelian' id='tot_pembayaran'>
                    <table class=tableku width=600>
                        <tr><td width=65% align=right><a name='#total'>Total Pembelian</a><br />
                <a href='#total' onclick=\"Recalc();\" accesskey='u'>Hitung (U)lang</a></td><td align=right><input id='grandtotal' readonly='readonly' value='".number_format($tot_pembelian, 0, ',', '.')."' tabindex=15></td></tr>
                        <tr><td width=65% align=right>Tipe Pembayaran</td>
                            <td align=right><select name='tipePembayaran' tabindex=16>
                                        <option value='0'>-Tipe Pembayaran-</option>";
                  while ($pembayaran = mysql_fetch_array($pmbyrn)) {
                     echo "<option value='$pembayaran[idTipePembayaran]'>$pembayaran[tipePembayaran]</option>";
                  }
                  echo "</select></td></tr>
                        <tr><td width=65% align=right>Tanggal Pembayaran (hutang)</td><td align=right><input type=text name='tglBayar' tabindex=17></td></tr>
                        <tr><td width=65% align=right>Nomor Invoice</td><td align=right><input type=text name='NomorInvoice' value=0 tabindex=18></td></tr>
                        <tr><td width=65% align=right>Tanggal Invoice</td><td align=right><input type=text name='TanggalInvoice'
            value='".date("Y-m-d")."' tabindex=19></td></tr>
            <tr><td width=65% align=right>Diskon (%)</td><td align=right><input type=text id='diskonpersen' name='DiskonPersen' value=0 tabindex=20></td></tr>
            <tr><td width=65% align=right>Diskon (Rp)</td><td align=right><input type=text id='diskonrupiah' name='DiskonRupiah' value=0 tabindex=21></td></tr>
            <tr><td width=65% align=right>PPn (%)</td><td align=right><input type=text id='ppn' name='PPN' value=0 tabindex=22></td></tr>";



                  echo "
                        <tr><td colspan=2>&nbsp;</td></tr>
                        <tr>
                <td><a href='aksi.php?module=pembelian_barang&act=batal'>BATAL</a></td>

                <td>
                    <input type='hidden' name='supplier_id' value='".$_SESSION['supplier_id']."'>
                    <input type=submit value='Simpan' tabindex=23>
                </td>
            </tr>
                        </table></form>
            ";

                  //fixme : Pembatalan Nota (code di atas & bawah komentar ini) perlu merujuk ke user ybs,
                  // agar jangan keliru menghapus nota yang sedang di input oleh user yang lainnya
               } else {

                  echo "Belum ada barang yang dibeli<br /><a href='aksi.php?module=pembelian_barang&act=batal'>BATAL</a>";
               }

               break;
               default :
     $sql1 = getSupplier();
      ?>
               <h2>Pembelian Barang</h2>
               <form method=POST action='belibarang.php?act=carisupplier'>
                  <select name="supplier_id" style="width:30%">
                     <?php
                     while ($data = mysql_fetch_array($sql1)) :
                        ?>
                        <option value="<?php echo $data['supplier_id']; ?>">
                           <?php
                           echo $data['namaSupplier'];
                           echo trim($data['alamatSupplier']) === '' ? '' : ' :: '.$data['alamatSupplier'];
                           ?>
                        </option>
                        <?php
                     endwhile;
                     ?>
                  </select>
                  <input type=submit value='(c) Cari' accesskey='c' name='cariSupplier' />
               </form>
               <?php
    break;
}?><!-- panel -->
                                    
                                </div><!-- panel-group -->
                            </div>
                        </div><!-- row -->
                        
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
        
        <script src="js/flot/jquery.flot.min.js"></script>
        <script src="js/flot/jquery.flot.resize.min.js"></script>
        <script src="js/flot/jquery.flot.spline.min.js"></script>
        <script src="js/jquery.sparkline.min.js"></script>
        <script src="js/morris.min.js"></script>
        <script src="js/raphael-2.1.0.min.js"></script>
        <script src="js/bootstrap-wizard.min.js"></script>
        <script src="js/select2.min.js"></script>

        <script src="js/custom.js"></script>
        <script src="js/dashboard.js"></script>

    </body>
</html>
