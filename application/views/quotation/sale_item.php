<div id="full-width" class="modal container fade" tabindex="-1">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title">เลือกรายการสำหรับเสนอขาย</h4>
								</div>
								<div class="modal-body">
									<select class="form-control input-inline input-medium">
										<option>== Category ==</option>
										<? if($item_cat->num_rows() > 0) {?>
												<?foreach($item_cat->result() as $cs){ ?>
													<option value="<?=$cs->category ?>"><?=$cs->category ?></option>
												<? }?>
											<? } // job type?>
									</select>
									<? $this->load->view("quotation/sale_item_datatable");?>
								</div>
								<div class="modal-footer">
									<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
									<button type="button" class="btn blue">Save changes</button>
								</div>
							</div>
<!-- DATA TABLE -->
<script type="text/javascript" src="<?=base_url()?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/core/datatable.js"></script>

    
<script type="text/javascript">
var TableAjax = function () {


    var handleRecords = function() {

        var grid = new Datatable();
            grid.init({
                src: $("#datatable_ajax"),
                onSuccess: function(grid) {
                    // execute some code after table records loaded
                },
                onError: function(grid) {
                    // execute some code on network or other general error  
                },
                dataTable: {  // here you can define a typical datatable settings from http://datatables.net/usage/options 
                    /* 
                        By default the ajax datatable's layout is horizontally scrollable and this can cause an issue of dropdown menu is used in the table rows which.
                        Use below "sDom" value for the datatable layout if you want to have a dropdown menu for each row in the datatable. But this disables the horizontal scroll. 
                    */
                    //"sDom" : "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>r>>", 
                   
                    "aLengthMenu": [
                        [20, 50, 100, 150, -1],
                        [20, 50, 100, 150, "All"] // change per page values here
                    ],
                    "iDisplayLength": 20, // default record count per page
                    "bServerSide": true, // server side processing
                    "sAjaxSource": "<?=site_url('quotation/sale_item_ajax/DC.Motor')?>", // ajax source
                    "aaSorting": [[ 1, "asc" ]] // set first column as a default sort by asc
                }
            });

    }

    return {

        //main function to initiate the module
        init: function () {
            //initPickers();
            handleRecords();
        }

    };
}();


</script>
<script>
jQuery(document).ready(function() { 
   TableAjax.init();
});
</script>
<!-- DATA TABLE -->


