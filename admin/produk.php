<?php
include "pages/header.php";
?>
 <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="media-body">
                                <!-- <ul class="breadcrumb">
                                    <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
                                    <li>Dashboard</li>
                                </ul> -->
                                <h3>List Produk</h3>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
                        
                        <div class="panel panel-success-head">
                            <div class="panel-heading">
                                <h4 class="panel-title">DataTable With Child Rows</h4>
                                <p>This can be used to show additional information about a row, useful for cases where you wish to convey more information about a row than there is space for in the host table.</p>
                            </div><!-- panel-heading -->
                            
                            <table id="exRowTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>kode Barang</th>
                                        <th>Nama Item</th>
                                        <th>Merk</th>
                                        <th>Size</th>
                                        <th>Warna</th>
                                        <th>stock</th>
                                    </tr>
                                </thead>
                            </table>
           
                        </div><!-- panel -->
                        
    </div><!-- contentpanel -->
</div><!-- mainpanel -->

<script>
            jQuery(document).ready(function(){
                
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
                url : 'aaa.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
<?php
include "pages/footer.php";
?>