<?php $this->load->view("header");?>

            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">
					สร้างใบงาน &nbsp;<small>(Create Job)</small>
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
									<label class="col-md-3 control-label">วันที่รับงาน</label>
									<div class="col-md-9">
										<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control input-inline input-medium" 
											readonly name="job_date" placeholder="วันที่รับงาน" 
											id="job_date"
											value="<?=isset($job_date)?$job_date:''?>" ><span style="color:red;">*</span>
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">ประเภทงาน</label>
									<div class="col-md-9">
									
									<? if(isset($job_type_id)){ ?>
									<script>
										$(document).ready(function(){
											$('#job_type_id').val("<?=$job_type_id?>")
										})
									</script>
									<? }?>
										<select name="job_type_id" class="form-control input-inline input-medium" id="job_type_id">
											<option>เลือกประเภทงาน</option>
											<? if($job_type->num_rows() > 0) {?>
												<?foreach($job_type->result() as $jt){ ?>
													<option value="<?=$jt->job_type_id ?>"><?=$jt->type_name ?></option>
												<? }?>
											<? } // job type?>
										</select><span style="color:red;">*</span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label">ประเภทงานย่อย</label>
									<div class="col-md-9">
									
									<? if(isset($sub_type_id)&&isset($job_type_id)){ ?>
									<script>
										$(document).ready(function(){
											url = "<?=base_url()?>job/get_job_subtype/"+<?=$job_type_id?>;
								 	 		$.getJSON(url, function(data){
								 	 			getDropSubTypeDownList(data);
								 	 			$('#sub_type_id').val("<?=$sub_type_id?>");
								 	 		});
											
										})
									</script>
									<? }?>
									
										<select name="sub_type_id" class="form-control input-inline input-medium" id="sub_type_id">
											<option>เลือกประเภทงานย่อย</option>
										</select><span style="color:red;">*</span>
									</div>
								</div>
								
								
								<div class="form-group">
									<label class="col-md-3 control-label">กำหนดวันส่งมอบ</label>
									<div class="col-md-9">
										<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control input-inline input-medium" 
											readonly name="job_end_date" placeholder="กำหนดวันส่งมอบ" 
											id="job_end_date" value="<?=isset($job_end_date)?$job_end_date:''?>"><span style="color:red;">*</span>
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">ลูกค้า</label>
									<div class="col-md-9">
									<? if(isset($customer_id)){ ?>
									<script>
										$(document).ready(function(){
											$('#customer_select').val("<?=$customer_id?>");
										})
									</script>
									<? }?>
										<select name="customer_id" class="form-control input-inline input-medium" id="customer_select">
											<option>เลือกลูกค้า</option>
											<? if($customer->num_rows() > 0) {?>
												<?foreach($customer->result() as $cs){ ?>
													<option value="<?=$cs->customer_id ?>"><?=$cs->customer_name ?></option>
												<? }?>
											<? } // job type?>
										</select><span style="color:red;">*</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">สถานที่ติดตั้ง</label>
									<div class="col-md-9">
									
									<? if(isset($ship_to_id)&&isset($customer_id)){ ?>
									<script>
										$(document).ready(function(){
											url = "<?=base_url()?>job/get_cust_site_ajax_ship/"+<?=$customer_id?>;
								 	 		$.getJSON(url, function(data){
								 	 			getDropDownList(data);
								 	 			$('#site_select').val("<?=$ship_to_id?>");
								 	 		});
											
										})
									</script>
									<? }?>
									
										<select name="ship_to_id" class="form-control input-inline input-medium" id="site_select">
											<option></option>
										</select><span style="color:red;">*</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">ผู้ติดต่อ</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" name="order_date_from" placeholder="ผู้ติดต่อ">
									<span style="color:red;">*</span></div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">โทรศัพท์</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="โทรศัพท์"><span style="color:red;">*</span></div>
										<span class="help-inline"></span>
									
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Tag</label>
									<div class="col-md-9">
										<input name="tag_no" type="text" class="form-control input-inline input-medium" id="tag_no" placeholder="Tag">
									<span style="color:red;">*</span></div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Serial</label>
									<div class="col-md-9">
										<input name="serial_number" type="text" class="form-control input-inline input-medium" id="serial_number" placeholder="Serial">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">หมายเหตุ</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="หมายเหตุ">
									</div>
								</div>
							</div>
							<div class="form-actions fluid">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green" onclick="">สร้างใบงาน</button>
									&nbsp; &nbsp; &nbsp;
									<button type="button" class="btn default">ยกเลิก</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- End Portlet -->
            </div>
 <script>
 	$(document).ready(function(){
 	 	$('#customer_select').change(function(){
 	 	 	cid = $(this).val();
 	 		url = "<?=base_url()?>job/get_cust_site_ajax_ship/"+cid;
 	 		$.getJSON(url, function(data){
 	 			getDropDownList(data) 
 	 		});
 	 	});

 	 	$('#job_type_id').change(function(){
 	 	 	job_type_id = $(this).val();
 	 		url = "<?=base_url()?>job/get_job_subtype/"+job_type_id;
 	 		$.getJSON(url, function(data){
 	 			getDropSubTypeDownList(data) 
 	 		});
 	 	});
 	});

 	//function getDropDownList(name, id, optionList) {
 	function getDropDownList(optionList) {
 	    //var combo = $("<select></select>").attr("id", id).attr("name", name);
		var combo = $("#site_select");
		combo.children('option').remove();
 	    $.each(optionList, function (i, el) {
 	        combo.append("<option value="+el.site_id+">" + el.address + "</option>");
 	    });

 	    //return combo;
 	    // OR
 	    $("#site_select").append(combo);
 	}

 	function getDropSubTypeDownList(optionList) {
 	    //var combo = $("<select></select>").attr("id", id).attr("name", name);
		var combo = $("#sub_type_id");
		combo.children('option').remove();
 	    $.each(optionList, function (i, el) {
 	        combo.append("<option value="+el.sub_type_id+">" + el.sub_type_name + "</option>");
 	    });

 	    //return combo;
 	    // OR
 	    $("#sub_type_id").append(combo);
 	}
 </script>
<?php $this->load->view("footer");?>