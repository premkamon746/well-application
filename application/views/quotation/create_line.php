<?php $this->load->view("header");?>

            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">สร้างใบเสนอราคา &nbsp;<small>รายการเสนอขาย &nbsp; :: &nbsp; ขั้นตอนที่ 2 จาก 3</small></h3>
				</div>
            </div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>รายการเสนอขาย
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<table id="tblMain" class="table table-striped table-bordered table-hover">
							<thead>
							<tr>
								<td align="center" width="12%"><b>ลำดับ</b></td>
								<td align="center" width="35%"><b>รายละเอียด</b></td>
								<td align="center" width="13%"><b>จำนวน</b></td>
								<td align="center" width="18%"><b>ราคาต่อหน่วย</b></td>
								<td align="center" width="22%"><b>รวม (บาท)</b></td>
							</tr>
							</thead>
							<tbody>
								<tr>
									<td align="center" width="12%">
									<a heft="#myModal"  class="glyphicon glyphicon-plus modalc" ></a>
									
									</td>
									<td align="center" width="35%"></td>
									<td align="center" width="13%"></td>
									<td align="center" width="18%"></td>
									<td align="center" width="22%"></td>
								</tr>
							</tbody>
							<tfoot>
							<tr>
								<td colspan="5" align="right">
									<input type="text" style="width: 120px; height: 28px" value=" Grand Total"> &nbsp; + &nbsp;
									<input type="text" style="width: 100px; height: 28px" value=" Vat"> &nbsp; = &nbsp;
									<input type="text" style="width: 160px; height: 28px" value=" Total">
								</td>
							</tr>
							</tfoot>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<div class="row" align="center">
				<button type="button" class="btn green" onclick="createQuoLine()">บันทึก</button>
			</div>
			
<div id="myModal" class="modal fade">
        <div class="modal-dialog" style="width:1000px;">
        	<form class="form-horizontal" role="form" method="post">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    <h4 class="modal-title">Item</h4>
	                </div>
	                <div class="modal-body">
							<div class="col-md-12">
								<!-- BEGIN EXAMPLE TABLE PORTLET-->
								<div class="portlet box light-grey">
									<div class="portlet-title">
										<div class="caption">
											<select name="catagory" class="form-control input-inline input-medium" id="catagory">
												<option value="">Catagory</option>
												<? if($item_cat->num_rows() > 0) {?>
													<? foreach($item_cat->result() as $cs){ ?>
														<option value="<?=$cs->category ?>"><?=$cs->category ?></option>
													<? }?>
												<? } // job type?>
											</select>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="#portlet-config" data-toggle="modal" class="config">
											</a>
											<a href="javascript:;" class="reload">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>
									</div>
									<div class="portlet-body">
										<div id="sale_item_data"></div>
									</div>
								</div>
								<!-- END EXAMPLE TABLE PORTLET-->
							</div>
	                		
	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                    <button type="submit" class="btn green">Save changes</button>
	                </div>
	            </div>
            </form>
        </div>
    </div>

<script>
	function getSaleItem(id){
		var url = "<?=base_url()?>quotation/sale_item_ajax/"+id;
		$.get(url, function(data){
			$('#sale_item_data').html(data);
		});
	}

	$(document).ready(function(){
		$("#catagory").change(function(){
			getSaleItem($(this).val())
		});
	});
</script>
<?php $this->load->view("footer");?>