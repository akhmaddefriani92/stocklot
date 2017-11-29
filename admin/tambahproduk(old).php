<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Chain Responsive Bootstrap3 Admin</title>
<link href="css/bootstrap-wysihtml5.css" rel="stylesheet" />
        <link href="css/style.default.css" rel="stylesheet">
        <link href="css/morris.css" rel="stylesheet">
        <link href="css/select2.css" rel="stylesheet" />
        <link href="css/dragdrop.css" rel="stylesheet" />

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
                       <button class="btn btn-primary mb9" data-toggle="modal" data-target="#myModal">
                                            Tambahkan Dengan CSV
                                        </button>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-btns">
                                            <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                            <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <h4 class="panel-title">ISI DATA BARANG</h4>
                                        <p>masukkan info barang pada form yang tersedia</p>
                                    </div><!-- panel-heading -->
                                    
                                    <div class="panel-body nopadding">
          
                                        <form method=POST enctype="multipart/form-data" action='tambahproduk.php' name='tambahbarang' class="form-horizontal form-bordered">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Kode Barang</label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="masukkan kode barang" class="form-control" name="kd_brg" id="kd_brg" />
                                                </div>
                                            </div><!-- form-group -->
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Nama Barang</label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="nama barang" class="form-control" name="namaBarang" id="namaBarang" />
                                                </div>
                                            </div>
                                          <div class="form-group">
                                               <div class="panel-body"> <label class="col-sm-4 control-label">Supplier</label>
                                                <div class="col-sm-8">
                                                     <select id="select-basic" name="supplier" data-placeholder="Choose One" class="width300">
                                           <option value='0'>- Supplier -</option>";
   <?php include "config.php";
$ambilSupplier = mysql_query("select * from supplier order by namaSupplier");
$ambilRak = mysql_query("select * from rak");
$ambilKategoriBarang = mysql_query("select * from kategori");
$ambilSatuanBarang = mysql_query("select * from satuan_barang");
$ambilWarna = mysql_query("select * from warna");
$ambilUkuran = mysql_query("select * from size");
$ambilNama = mysql_query("select * from nm_brg");
$ambilMerk = mysql_query("select * from merk");
$ambilSize = mysql_query("select *from");
    while ($supplier = mysql_fetch_array($ambilSupplier)) {
            echo "<option value='$supplier[supplier_id]'>$supplier[namaSupplier]</option>";
        }
        echo "</select>"; ?>
                                                </div></div>
                                            </div>
                                             <div class="form-group">
                                              <div class="panel panel-default">
                                               <div class="panel-body"> <label class="col-sm-4 control-label">Kategori</label>
                                                <div class="col-sm-8">
                                                     <select id="select-basic" name="kategori_barang" data-placeholder="Choose One" class="width300">
                                           <option value='0'>- Pilih Kategori -</option>";
   <?php 
    while ($kategori = mysql_fetch_array($ambilKategoriBarang)) {
            echo "<option value='$kategori[kategori_id]'>$kategori[nama]</option>";
        }
        echo "</select>"; ?> </div></div></div></div>
        <div class="form-group">
                                               <div class="panel-body"> <label class="col-sm-4 control-label">Merk</label>
                                                <div class="col-sm-8">
                                                     <select id="select-basic" name="merk" data-placeholder="Choose One" class="width300">
                                           <option value='0'>- Pilih Merk -</option>";
   <?php 
    while ($merk = mysql_fetch_array($ambilMerk)) {
            echo "<option value='$merk[merk_id]'>$merk[nama]</option>";
        }
    echo "</select>"; ?> </div></div></div>

       <div class="form-group">
                                                <label class="col-sm-4 control-label">Warna</label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="warna" class="form-control" name="warna" id="warna" />
                                                </div>
                                            </div>
                                            

                                             <div class="form-group">
                                                <label class="col-sm-4 control-label">Berat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="berat" class="form-control" name="berat" id="berat" />
                                                </div>
                                            </div>
                                           
                                    
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
      
                            </div><!-- col-md-6 -->
                            
                            
                            
                            <div class="col-md-6">
                                
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
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="1"> 21</label>
                                                    </div>
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="2"> 22</label>
                                                    </div>
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="3"> 23</label>
                                                    </div>
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="4"> 24</label>
                                                    </div>
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="5"> 25</label>
                                                    </div>
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="6"> 26</label>
                                                    </div>
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="7">27</label>
                                                    </div>
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="8"> 28</label>
                                                    </div>
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="9"> 29</label>
                                                    </div>
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="10"> 30</label>
                                                    </div>
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="11"> 31</label>
                                                    </div>  
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="12"> 32</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="13"> 33</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="14"> 34</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="15"> 35</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="16"> 36</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="17"> 37</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="18"> 38</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="19"> 39</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="20"> 40</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="21"> 41</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="22"> 42</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="23"> 43</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="24"> 44</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="25"> 45</label>
                                                    </div> 
                                                    <div class="checkbox block"><label><input name="size[]" type="checkbox" value="26"> 46 </label>
                                                    </div> 

                                                </div>
                                            </div><!-- form-group -->
                                            

                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                                
                            </div><!-- col-md-6 -->
                        </div><!-- row -->
                       
                    
                    <div class="contentpanel">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Deskripsi kecil produk</h4>
                                <p>Tulis deskripsi pendek tentang produk yang akan ditambahkan !</p>
                            </div>
                            <div class="panel-body">
                              <textarea id="wysiwyg" name="shortdesc" placeholder="Enter text here..." class="form-control" rows="10"></textarea>
                            </div><!-- panel-body -->
                        </div><!-- panel -->
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Deskripsi lengkap produk</h4>
                                <p>Tulis deskripsi lengkap tentang produk yang akan ditambahkan !</p>
                            </div>
                            <div class="panel-body">
                              <textarea id="ckeditor"  name="longdesc" placeholder="Enter text here..." class="form-control" rows="10"></textarea>
                            </div>
                            <p><button type="submit" name="tambahkan" class="btn btn-default btn-lg btn-block">TAMBAHKAN</button><button class="btn btn-primary btn-block" type=button value=Batal onclick=self.history.back()>KEMBALI</button></p>
                       <!-- mainwrapper -->
                                </form>
                            </div><!-- panel-body -->
                        </div><!-- panel -->
                    
                    </div><!-- contentpanel -->
                </div>
            </div><!-- mainwrapper -->
        </section>
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
            
              <div class="fetched-data"></div>
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

              </div>
             
            </div><!-- modal-content -->
          </div><!-- modal-dialog -->
        </div><!-- modal -->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/jquery-ui-1.10.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>
        
        <script src="js/wysihtml5-0.3.0.min.js"></script>
        <script src="js/bootstrap-wysihtml5.js"></script>
        <script src="js/ckeditor/ckeditor.js"></script>
        <script src="js/ckeditor/adapters/jquery.js"></script>

        <script src="js/custom.js"></script>
        <script>
            jQuery(document).ready(function(){
                
              // HTML5 WYSIWYG Editor
              jQuery('#wysiwyg').wysihtml5({color: true,html:true});
              
              // CKEditor
              jQuery('#ckeditor').ckeditor();
              
            });
        </script>
       
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'bbb.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
<?php 
if (isset($_POST['tambahkan'])) {
 $size = $_POST['size'];
 $jumlah_dipilih = count($size);
    
   


//fixme: bagaimana dengan idBarangnya ? generate dulu di tmp_detail_beli ?
   $tgl = date("Y-m-d");
   if (empty($_POST[namaBarang]))
{
   echo "<script type='text/javascript'>alert('nama tidak boleh kosong');";
   header("bacang.php");

}else{

for($x=0;$x<$jumlah_dipilih;$x++){
  $ryRandom = rand(11111111,99999999);
   mysql_query("INSERT INTO barang(nm_brg,kd_brg,
                    kategori_id,merk_id,warna_id,size_id,satuan_id,berat,short_desc,long_desc, last_update,supplier_id, barcode, admin_id)
                    VALUES('$_POST[namaBarang]','$_POST[kd_brg]',
                    '$_POST[kategori_barang]','$_POST[merk]', '$_POST[warna]', '$size[$x]', '$_POST[satuan_barang]', '$_POST[berat]', '$_POST[shortdesc]','$_POST[longdesc]',
                    '$tgl','$_POST[supplier]', '$ryRandom', 'admin')") or die(mysql_error());}
} echo "<script type='text/javascript'>alert('Barang Telah ditambahkan!')</script>";
}
?>