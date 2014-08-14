<?php $this->load->view("header");?>

            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">
						สร้างใบเสนอราคา &nbsp;<small>Create Quotation &nbsp; :: &nbsp; ขั้นตอนที่ 1 จาก 3</small>
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
									<label class="col-md-3 control-label">Quotation No.</label>
									<div class="col-md-9" valign="bottom">
										<input type="text" class="form-control input-inline input-medium" name="order_date_from" value="QUO14060001" readonly="">
										<input type="text" class="form-control input-inline input-medium" style="margin-left: 240px; background-color: #555555" value="Status" readonly="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">วันที่เสนอราคา</label>
									<div class="col-md-9">
										<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control input-inline input-medium" readonly="" name="order_date_from" placeholder="วันที่เสนอราคา">
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
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Bill To</label>
									
									<div class="col-md-9">
									
									<? if(isset($ship_to_id)&&isset($customer_id)){ ?>
									<script>
										$(document).ready(function(){
											url = "<?=base_url()?>job/get_cust_site_ajax/"+<?=$customer_id?>;
								 	 		$.getJSON(url, function(data){
								 	 			getDropDownList(data,$('#bill_select'));
								 	 			$('#bill_select').val("<?=$ship_to_id?>");
								 	 		});
											
										})
									</script>
									<? }?>
									
										<select name="bill_to_id" class="form-control input-inline input-medium" id="bill_select">
											<option></option>
										</select>
									</div>
									
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Ship To</label>
									<div class="col-md-9">
									
									<? if(isset($ship_to_id)&&isset($customer_id)){ ?>
									<script>
										$(document).ready(function(){
											url = "<?=base_url()?>job/get_cust_site_ajax/"+<?=$customer_id?>;
								 	 		$.getJSON(url, function(data){
								 	 			getDropDownList(data,$('#site_select'));
								 	 			$('#site_select').val("<?=$ship_to_id?>");
								 	 		});
											
										})
									</script>
									<? }?>
									
										<select name="ship_to_id" class="form-control input-inline input-medium" id="site_select">
											<option></option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">ชื่อผู้ติดต่อ</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="ชื่อผู้ติดต่อ">
										<select class="form-control input-inline input-medium" style="margin-left: 240px">
											<option>Sales</option>
											<option>Option 1</option>
											<option>Option 2</option>
											<option>Option 3</option>
											<option>Option 4</option>
											<option>Option 5</option>
										</select>
									</div>
								</div>
								<br>
								<div class="form-group">
									<label class="col-md-3 control-label">Attention</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="Attention">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">CC</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="CC">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Subject</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="Subject">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Email</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="Email">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Remark</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="Remark">
									</div>
								</div>
							</div>
							<div class="form-actions fluid">
								<div class="col-md-offset-3 col-md-9">
									<button type="button" class="btn green" onclick="createQuoLine()">สร้างใบเสนอราคา</button>
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
 	 			getDropDownList(data,$('#bill_select'));
 	 			getDropDownList(data,$("#site_select")); 
 	 		});
 	 		
 	 	});
 	});

 	//function getDropDownList(name, id, optionList) {
 	function getDropDownList(optionList,obj) {
 	    //var combo = $("<select></select>").attr("id", id).attr("name", name);
		var combo = obj;
 	    $.each(optionList, function (i, el) {
 	        combo.append("<option value="+el.site_id+">" + el.address + "</option>");
 	    });

 	    //return combo;
 	    // OR
 	    obj.append(combo);
 	}
 </script>
<?php $this->load->view("footer");?>