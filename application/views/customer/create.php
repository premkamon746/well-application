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
							
							<?php if(isset($customer_name)) {?>
							
							</br></br>
									<a  href="#myModal"  type="button" class="btn blue" onclick="">ที่อยู่บิล</a>									<table id="tblMain" class="table table-striped table-bordered table-hover">
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
											<tr>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
											</tr>
										</tbody>
										<tfoot>
										</tfoot>
										</table>
										
							</br></br>
									<a href="#myModal"  type="button" class="btn blue" onclick="">ที่อยู่จัดส่ง</a>
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
											<tr>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
												<td align="center" width=""></td>
											</tr>
										</tbody>
										<tfoot>
										</tfoot>
										</table>
								<?php }?>
						</form>
					</div>
				</div>
				<!-- End Portlet -->
            </div>
            
	<div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Adddress</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
						<label class="col-md-3 control-label">ชื่อลูกค้า</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="ชื่อลูกค้า" id="customer_name" name = "customer_name"
											value="<?=isset($customer_name)?$customer_name:''?>" >
						</div>
					</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
 <script>
 	$(document).ready(function(){
 		//$("#myModal").modal('hide')    
 		
 		/*$('#myModal').on('shown.bs.modal', function (e) {
		    alert('Modal is successfully shown!');
		});*/

 		$(".btn").click(function(){
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