<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title></title>

        <link href="css/style.default.css" rel="stylesheet">
        <link href="css/select2.css" rel="stylesheet" />
        <link href="css/style.datatables.css" rel="stylesheet">
        <link href="//cdn.datatables.net/responsive/1.0.1/css/dataTables.responsive.css" rel="stylesheet">
        <link href="css/style_button.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
            <div class="mainpanel">
              <div class="contentpanel">
                <div class="panel panel-primary-head">
                  <div class="panel-heading">
                    <p><strong><font size="+3">Data Admin dan Kasir</font></strong></p>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left" bgcolor="#0066FF"><form action="home.php?page=tambahAdmin"><div class="box">
                        <button><font color="#000000"><img src="images/ico/TAMBAH.png" title="Tambah Supplier">TAMBAH ADMIN BARU</font></button></div></form></td>
                      <td align="right" bgcolor="#0066FF"><form action="home.php?page=cetakAdmin"><div class="box">
                        <button><font color="#000000"><img src="images/ico/cetak.png" title="Cetak Data Supplier">CETAK DATA ADMIN</font></button></div></form></td>
                    </tr>
                  </table>
                  </div>
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
                    <th width="98">Aksi</th>
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
                while (($r = mysql_fetch_array($tampil)) or ( $ctr < 1000)) {
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
                        <a href="home.php?edit&&id=<?php echo $r['admin_id']; ?>">Ubah</a> | <a href="hapusadmin.php?id=<?php echo $r['admin_id']; ?>">Hapus</a> 
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


        
        
        
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-ui-1.10.3.min.js"></script>
        
        <!-- <script src="js/jquery-migrate-1.2.1.min.js"></script> -->
        
        <!-- <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script> -->
        
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        <script src="//cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.js"></script>
        <!-- <script src="js/select2.min.js"></script>
        <script src="js/custom.js"></script> -->
        <script>
            $(document).ready(function(){

                /*$('#basicTable').DataTable({
                    responsive: true
                });*/
                $("#basicTable").DataTable();
                    
            });    
                /*
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
                    "ajax": "ajax/objects.txt",
                    "columns": [
                        {
                            "class":          'details-control',
                            "orderable":      false,
                            "data":           null,
                            "defaultContent": ''
                        },
                        { "data": "name" },
                        { "data": "position" },
                        { "data": "office" },
                        { "data": "salary" }
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
                        '<td>'+d.name+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Extension number:</td>'+
                        '<td>'+d.extn+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Extra info:</td>'+
                        '<td>And any further details here (images etc)...</td>'+
                    '</tr>'+
                '</table>';
            }*/
        </script>

    </body>
</html>
