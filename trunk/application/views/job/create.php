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
						<form class="form-horizontal" role="form">
							<div class="form-body">
								<div class="form-group">
									<label class="col-md-3 control-label">วันที่รับงาน</label>
									<div class="col-md-9">
										<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control input-inline input-medium" readonly name="order_date_from" placeholder="วันที่รับงาน">
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">ประเภทงาน</label>
									<div class="col-md-9">
										<select class="form-control input-inline input-medium">
											<option>เลือกประเภทงาน</option>
											<? if($job_type->num_rows() > 0) {?>
												<?foreach($job_type->result() as $jt){ ?>
													<option value="<?=$jt->job_type_id ?>"><?=$jt->type_name ?></option>
												<? }?>
											<? } // job type?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">ประเภทงานย่อย</label>
									<div class="col-md-9">
										<select class="form-control input-inline input-medium">
											<option>เลือกประเภทงานย่อย</option>
											<? if($job_subtype->num_rows() > 0) {?>
												<?foreach($job_subtype->result() as $jst){ ?>
													<option value="<?=$jst->sub_type_id ?>"><?=$jst->sub_type_name ?></option>
												<? }?>
											<? } // job type?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">กำหนดวันส่งมอบ</label>
									<div class="col-md-9">
										<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control input-inline input-medium" readonly name="order_date_from" placeholder="กำหนดวันส่งมอบ">
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">ลูกค้า</label>
									<div class="col-md-9">
										<select id="customer_select" class="form-control input-inline input-medium">
											<option>เลือกลูกค้า</option>
											<? if($customer->num_rows() > 0) {?>
												<?foreach($customer->result() as $cs){ ?>
													<option value="<?=$cs->customer_id ?>"><?=$cs->customer_name ?></option>
												<? }?>
											<? } // job type?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">สถานที่ติดตั้ง</label>
									<div class="col-md-9">
										<select id="site_select" class="form-control input-inline input-medium">
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">ผู้ติดต่อ</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" name="order_date_from" placeholder="ผู้ติดต่อ">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">โทรศัพท์</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="โทรศัพท์">
										<span class="help-inline"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Tag</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="Tag">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Serial</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="Serial">
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
									<button type="button" class="btn green" onclick="createJobLine()">สร้างใบงาน</button>
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