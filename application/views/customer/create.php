<?php $this->load->view("header");?>

            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">
					บันทึกข้อมูลลูกค้า &nbsp;<small>(Create Customer)</small>
					</h3>
				</div>
            </div>
            <div class="row">
				<!-- Start Portlet -->
                <div class="portlet box red">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-reorder"></i>&nbsp; กรอกรายละเอียดลูกค้า
						</div>
					</div>
					<div class="portlet-body form">
				<b><?=isset($warngin_msg)?$warngin_msg:""?></b>
						<form class="form-horizontal" role="form" method="post">
							<div class="form-body">
								
								<div class="form-group">
									<label class="col-md-3 control-label">ชื่อลูกค้า</label>
									<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="ชื่อลูกค้า" id="customer_name" name = "customer_name"
											value="<?=isset($customer_name)?$customer_name:''?>" >
									</div>
								</div>
								
								
								<div class="form-group">
									<label class="col-md-3 control-label">เลือกประเภทร้าน</label>
									<div class="col-md-9">
									<? if(isset($customer_type)){ ?>
										<script>
											$(document).ready(function(){
												$('#customer_type').val("<?=$customer_type?>");
											})
										</script>
									<? }?>
									
											<select name = "customer_type" class="form-control input-inline input-medium" id="customer_type">
												<option value="">เลือกประเภทร้าน</option>
												<option value="a">a</option>
												<option value="b">b</option>
												<option value="c">c</option>
											</select>
									</div>
								</div>
								
								
								
								
							</div>
							<div class="form-actions fluid">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green" onclick="">บันทึก</button>
									&nbsp; &nbsp; &nbsp;
									<button type="button" class="btn default">ยกเลิก</button>
								</div>
							</div>
							
							
						</form>
					</div>
				</div>
				<!-- End Portlet -->
            </div>
            
            <?php if(isset($customer_name)) {?>
			<a  href="#myModal"  type="button" class="btn blue add1" onclick="">เพิ่มที่อยู่</a>
            <div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>ผลการค้นหา
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
											<td align="center" width="12%"><b>Site</b></td>
											<td align="center" width="15%"><b>จังหวัด</b></td>
											<td align="center" width="13%"><b>Primary</b></td>
											<td align="center" width="10%"><b>ที่อยู่</b></td>
											<td align="center" width="10%"><b>รหัสไปรษณีย์</b></td>
											<td align="center" width="13%"><b>ประเทศ</b></td>
											<td align="center" width="10%"><b>ผู้ติดต่อ</b></td>
											<td align="center" width="12%"><b>โทรศัพท์</b></td>
											<td align="center" width="12%"><b>มือถือ</b></td>
											<td align="center" width="12%"><b>อีเมล์</b></td>
										</tr>
										</thead>
										<tbody>
											<? if ($ship->num_rows() > 0 ) { ?>
												<? foreach ($ship->result() as $r) : ?>
													<tr>
														<td align="center" width=""><?=$r->site_code?></td>
														<td align="center" width=""><?=$r->province_code?></td>
														<td align="center" width=""><?=$r->primary_flag?></td>
														<td align="center" width=""><?=$r->address1?><?=$r->address2?></td>
														<td align="center" width=""><?=$r->postcode?></td>
														
														<td align="center" width=""></td>
														<td align="center" width=""><?=$r->contact_person?></td>
														<td align="center" width=""><?=$r->phone_number?></td>
														<td align="center" width=""><?=$r->mobile_number?></td>
														<td align="center" width=""></td>
													</tr>
												<? endforeach ?>
											<? }?>
										</tbody>
										<tfoot>
										</tfoot>
										</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>ผลการค้นหา
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
											<td align="center" width="12%"><b>Site</b></td>
											<td align="center" width="15%"><b>จังหวัด</b></td>
											<td align="center" width="13%"><b>Primary</b></td>
											<td align="center" width="10%"><b>ที่อยู่</b></td>
											<td align="center" width="10%"><b>รหัสไปรษณีย์</b></td>
											<td align="center" width="13%"><b>ประเทศ</b></td>
											<td align="center" width="10%"><b>ผู้ติดต่อ</b></td>
											<td align="center" width="12%"><b>โทรศัพท์</b></td>
											<td align="center" width="12%"><b>มือถือ</b></td>
											<td align="center" width="12%"><b>อีเมล์</b></td>
										</tr>
										</thead>
										<tbody>
										<? if ($bill->num_rows() > 0 ) { ?>
										<? foreach ($bill->result() as $r) : ?>
											<tr>
												<td align="center" width=""><?=$r->site_code?></td>
												<td align="center" width=""><?=$r->province_code?></td>
												<td align="center" width=""><?=$r->primary_flag?></td>
												<td align="center" width=""><?=$r->address1?><?=$r->address2?></td>
												<td align="center" width=""><?=$r->postcode?></td>
												
												<td align="center" width=""></td>
												<td align="center" width=""><?=$r->contact_person?></td>
												<td align="center" width=""><?=$r->phone_number?></td>
												<td align="center" width=""><?=$r->mobile_number?></td>
												<td align="center" width=""></td>
											</tr>
										<? endforeach ?>
										<? }?>
										</tbody>
										<tfoot>
										</tfoot>
										</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			
			<?php }?>
	<div id="myModal" class="modal fade">
        <div class="modal-dialog">
        	<form class="form-horizontal" role="form" method="post">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    <h4 class="modal-title">Add Adddress</h4>
	                </div>
	                <div class="modal-body">
	                		<b><?=isset($warngin_msg2)?$warngin_msg2:""?></b>
	               			<input type="hidden" name="customer_id" value="<?=$customer_id?>"  />
	                		<? $this->load->view("customer/form_address");?>
	                		
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
 	$(document).ready(function(){
 		//$("#myModal").modal('hide')    
 		
 		/*$('#myModal').on('shown.bs.modal', function (e) {
		    alert('Modal is successfully shown!');
		});*/

 		$(".add1").click(function(){
 	        $("#myModal").modal('show');
 	    });

		$(".add2").click(function(){
 	        $("#myModal").modal('show');
 	    });
 		
 	 	$('#customer_select').change(function(){
 	 	 	cid = $(this).val();
 	 		url = "<?=base_url()?>job/get_cust_site_ajax/"+cid;
 	 		$.getJSON(url, function(data){
 	 			getDropDownList(data) 
 	 		});
 	 	});
 	});

 	//function getDropDownList(name, id, optionList) {
 	function getDropDownList(optionList) {
 	    //var combo = $("<select></select>").attr("id", id).attr("name", name);
		var combo = $("#site_select");
 	    $.each(optionList, function (i, el) {
 	        combo.append("<option value="+el.site_id+">" + el.address + "</option>");
 	    });

 	    //return combo;
 	    // OR
 	    $("#site_select").append(combo);
 	}
 </script>
<?php $this->load->view("footer");?>