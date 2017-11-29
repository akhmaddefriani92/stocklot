<?php
include "pages/header.php";
?>
                
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="media-body">
                                <!-- <ul class="breadcrumb">
                                    <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
                                    <li>Dashboard</li>
                                </ul> -->
                                <h3>&nbsp;Tambah Produk</h3>
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
include "pages/footer.php";
?>
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