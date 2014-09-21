<?php $this->load->view("header");?>

            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">
					ค้นหาข้อมูลลูกค้า &nbsp;<small>(Customer Search)</small>
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
				
						<form class="form-horizontal" role="form" method="post" action="<?=base_url()?>customer/search">
							<div class="form-body">
								
								<div class="form-group">
									<label class="col-md-3 control-label">ชื่อลูกค้า</label>
									<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="ชื่อลูกค้า" id="customer_name" name = "customer_name"
											value="<?=isset($customer_name)?$customer_name:''?>" >
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
											<option value="">เลือกลูกค้า</option>
											<? if($customer->num_rows() > 0) {?>
												<?foreach($customer->result() as $cs){ ?>
													<option value="<?=$cs->customer_id ?>"><?=$cs->customer_name ?></option>
												<? }?>
											<? } // job type?>
										</select>
									</div>
								</div>	
							<div class="form-actions fluid">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn blue" onclick="">ค้นหา</button>
									&nbsp; &nbsp; &nbsp;
									<button type="button" class="btn blue">สร้างใหม่</button>
								</div>
							</div>
						</form>
						
					</div>
				</div>
				<!-- End Portlet -->
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
											<td align="center" width="12%"><b>ชื่อลูกค้า</b></td>
											<td align="center" width="15%"><b>ประเภท</b></td>
											<td align="center" width="13%"><b>หมายเลขผู้เสียภาษี</b></td>
											<td align="center" width="10%"><b>มีผลตั้งแต่</b></td>
											<td align="center" width="10%"><b>มีผลถึง</b></td>
										</tr>
										</thead>
										<tbody>
										<? if (isset($customer_search)&&$customer_search->num_rows() > 0 ) { ?>
										<? foreach ($customer_search->result() as $r) : ?>
											<tr>
												<td align="center" width="">
													<a href="<?=base_url();?>customer/create/<?=$r->customer_id?>">
														<?=$r->customer_name?>
													</a>
												</td>
												<td align="center" width="">
												<a href="<?=base_url();?>customer/create/<?=$r->customer_id?>">
													<?=$r->customer_type?>
												</a>
												</td>
												<td align="center" width="">
												<a href="<?=base_url();?>customer/create/<?=$r->customer_id?>">
												<?=$r->tax_number?>
												</a></td>
												<td align="center" width="">
												<a href="<?=base_url();?>customer/create/<?=$r->customer_id?>">
												<?=$r->effective_date_from?>
												</a>
												</td>
												<td align="center" width="">
												<a href="<?=base_url();?>customer/create/<?=$r->customer_id?>">
												<?=$r->effective_date_to?>
												</a>
												</td>
											</tr>
										<? endforeach ?>
										<? }?>
										</tbody>
										<tfoot>
										</tfoot>
										</table>
										<? if (isset($customer_search)&&$customer_search->num_rows() > 0 ) { ?>
										<?=$pagination?>
										<?php }?>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
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