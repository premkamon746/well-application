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
									<label class="col-md-3 control-label">เลขประจำตัวผู้เสียภาษี</label>
									<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="เลขประจำตัวผู้เสียภาษี" id="tax_number" name = "tax_number"
											value="<?=isset($tax_number)?$tax_number:''?>" >
									</div>
								</div>
								
								
								<div class="form-group">
									<label class="col-md-3 control-label">ประเภทธุรกิจ</label>
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
												<option value="บริษัท">บริษัท</option>
												<option value="หจก.">หจก.</option>
												<option value="ห้างร้าน">ห้างร้าน</option>
												<option value="บุคคล">บุคคล</option>
												<option value="อื่นๆ">อื่นๆ</option>
											</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label">วันที่มีผลตั้งแต่</label>
									<div class="col-md-9">
										<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
											<input type="text" class="form-control input-inline input-medium" 
											readonly name="effective_date_from" placeholder="วันที่มีผลตั้งแต่" 
											id="effective_date_from"
											value="<?=isset($effective_date_from)?$effective_date_from:''?>" >
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label">วันที่มีผลตั้งถึง</label>
									<div class="col-md-9">
										<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
											<input type="text" class="form-control input-inline input-medium" 
											readonly name="effective_date_to" placeholder="วันที่มีผลตั้งถึง" 
											id="effective_date_from"
											value="<?=isset($effective_date_to)?$effective_date_to:''?>" >
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label">เครดิทเทอม</label>
									
									<div class="col-md-9">
										<? if(isset($customer_id)){ ?>
										<script>
											$(document).ready(function(){
												$('#credit_term').val("<?=isset($credit_term)?$credit_term:"" ?>");
											})
										</script>
										<? }?>
										<select class="form-control input-inline input-medium"  name="credit_term" id="credit_term">
											<option value="">เครดิทเทอม</option>
											<? if($term->num_rows() > 0) {?>
												<?foreach($term->result() as $cs){ ?>
													<option value="<?=$cs->credit_code ?>"><?=$cs->credit_term_day ?></option>
												<? }?>
											<? } // job type?>
										</select>
									</div>
									
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label">sale</label>
									<div class="col-md-9">
									<? if(isset($default_sales)){ ?>
										<script>
											$(document).ready(function(){
												$('#default_sales').val("<?=$default_sales?>");
											})
										</script>
									<? }?>									
											<select name = "default_sales" class="form-control input-inline input-medium" id="default_sales">
												<option value="">sale rep</option>
												<? foreach ($sale_rep->result() as $r) : ?>
													<option value="<?=$r->salesrep_id?>"><?=$r->sales_name?></option>
												<? endforeach ?>
											</select>
									</div>
								</div>
								
							</div>
							<div class="form-actions fluid">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green" onclick="">บันทึก</button>
									&nbsp; &nbsp; &nbsp;
									<button type="button" class="btn default" onclick="window.location='<?=base_url()?>'">ยกเลิก</button>
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
								<i class="fa fa-globe"></i>ที่อยู่ออกบิล
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
														<td align="center" width=""><?=$r->province_name?></td>
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
								<i class="fa fa-globe"></i>ที่อยู่ส่งของ
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
												<td align="center" width=""><?=$r->province_name?></td>
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
        		<input type="hidden" name="site_code" id="site_code"/>
	            <div class="modal-content">
	                
	                <div class="modal-body">
	                		<b><?=isset($warngin_msg2)?$warngin_msg2:""?></b>
	               			<input type="hidden" name="customer_id" value="<?=$customer_id?>"  />
	                		<? $this->load->view("customer/form_address");?>
	                		
	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
	                    <button type="submit" class="btn green">บันทึก</button>
	                </div>
	            </div>
            </form>
        </div>
    </div>
 <script>
 	$(document).ready(function(){

 		/*$(".checker").click(function(){
 	 		$(this).find("checkbox").prop("checked",true);
 	 		$(this).find("checkbox").parent().addClass("checked");
 		});*/
 		
 		$(".add1").click(function(){
 	 		$("#site_code").val("BILL"); //insert type bill
 	 		
 	 		//$("#sameBill").show(); // show use ship address and bill address check box
 	        $("#myModal").modal('show');
 	    });

		$(".add2").click(function(){
			$("#site_code").val("SHIP");//insert type ship
			//$("#ship_address").prop("checked",false);
			//$("#ship_address").parent().removeClass("checked");
			//$("#sameBill").hide();
 	        $("#myModal").modal('show');
 	    });
 		
 	 	$('#customer_select').change(function(){
 	 	 	cid = $(this).val();
 	 		url = "<?=base_url()?>job/get_cust_site_ajax_ship/"+cid;
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