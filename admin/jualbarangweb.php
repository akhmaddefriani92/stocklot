<?php
include"pages/header.php";
?>
<div class="mainpanel">
  <div class="contentpanel">
    <div class="panel panel-primary-head">
      <div class="panel-heading"><strong><font size="+3">Jual Barang</font></strong></div>
      <p>&nbsp;</p>
    </div> 
  </div>             
                    
  <div class="contentpanel">
    <div class="row">
        <div class="col-md-offset-2 col-md-6">
          <div class="panel panel-default" style="float:middle;padding: 5px;">
              <div class="panel-heading">
                
                <h4 class="panel-title">Masukkan username customer yang akan melakukan pembelian</h4>
                <!-- <p>masukkan username customer yang akan melakukan pembelian</p> -->
              </div><!-- panel-heading -->
              <div class="panel-body">
              <?php 
            include "function.php";
            ?>

            <?php
            // ambil daftar customer yang bukan member saja
            // Untuk member, nanti dientry di tampilan POS
            $sql = "SELECT idCustomer, namaCustomer
                  FROM customer WHERE member=0 ORDER BY idCustomer ASC";
            $namaCustomer = mysql_query($sql);

            ?>
                <form method=POST action='js_jual_barang.php?act=caricustomer' onSubmit="popupform(this, 'jual_barang')">
                   <div class="form-group">
                    <label class="col-sm-4 control-label">Username customer</label>
                    <div class="col-sm-8">
                        <input type="text" name="idCustomer" id="idCustomer" class="form-control"  />
                    </div>
                </div>
                  <button type="submit" name="cariCustomer" class="btn btn-success btn-sm btn-block">Submit</button>
                </form><!-- panel -->
                 </div>                               
              </div><!-- panel-group -->
          </div>
      </div><!-- row -->
      
  </div><!-- contentpanel -->
  
</div><!-- mainpanel -->

<SCRIPT TYPE="text/javascript">
/*
   function popupform(myform, windowname)
   {
      if (!window.focus)
         return true;
      window.open('', windowname, 'type=fullWindow,fullscreen=yes,scrollbars=yes');
      myform.target = windowname;
      return true;
   }*/

</SCRIPT>
<?php
include "pages/footer.php";
?>