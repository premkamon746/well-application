<?php $this->load->view("header");?>

            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">ค้นหาใบเสนอราคา &nbsp;<small>(Search Quotation)</small></h3>
				</div>
            </div>
            <div class="row">
				<!-- Start Portlet -->
                <div class="portlet box red">
					<div class="portlet-title">
						<!--div class="caption">
							<i class="fa fa-reorder"></i> Job Search
						</div-->
					</div>
					<div class="portlet-body form">
						<form class="form-horizontal" role="form" method="post">
							<div class="form-body">
								<div class="form-group">
									<label class="col-md-3 control-label">Quotation No.</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" 
										placeholder="Quotation No."
										name="quote_number" 
										value="<?=isset($quote_number)?$quote_number:''?>"
										>
										<span class="help-inline"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">วันที่ใบเสนอราคา</label>
									<div class="col-md-9">
										<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
											<input type="text" class="form-control form-filter input-medium" 
											readonly="" 
											name="quote_date" 
											placeholder="วันที่ใบเสนอราคา"
											value="<?=isset($quote_date)?$quote_date:''?>">
											
											
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
											<option value="">เลือกลูกค้า</option>
											<? if($customer->num_rows() > 0) {?>
												<? foreach($customer->result() as $cs){ ?>
													<option value="<?=$cs->customer_id ?>"><?=$cs->customer_name ?></option>
												<? }?>
											<? } // job type?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-actions fluid">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green" onclick="">ค้นหา</button>
									&nbsp; &nbsp; &nbsp;
									<button type="button" class="btn default" onclick="window.location='<?=site_url('quotation/search')?>'">ยกเลิก</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- End Portlet -->
            </div>
			<div class="row">
				<form method="post" action="<?=base_url()?>/quotation/approve">
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
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
								<? if($this->approve_flag=='Y') {?>
								<td align="center" width="1%"><input type="checkbox" id="qcheck_all" /></td>
								<?php }?>
								<td align="center" width="12%"><b>Quotation No.</b></td>
								<td align="center" width="18%"><b>วันที่ใบเสนอราคา</b></td>
								<td align="center" width="35%"><b>ลูกค้า</b></td>
								<td align="center" width="15%"><b>Status</b></td>
								<td align="center" width="15%"><b>แก้ไข</b></td>
							</tr>
							</thead>
							<tbody>
							<? if(isset($quot_search) > 0){?>
								<? foreach ($quot_search->result() as $js){ ?>
									<tr>
										<? if($this->approve_flag=='Y') {?>
										<td align="center">
										<? if($js->quote_status == "WAIT CONFIRM") {?>
										<input type="checkbox" name="id_check[]" class="q_check" value="<?=$js->quote_id?>" />
										<?php }?>
										</td>
										<?php }?>
										<td align="center">
										<a href="<?=base_url();?>quotation/detail/<?=$js->quote_id?>"><?=$js->quote_number?></a>
										</td>
										<td align="center"><a href="<?=base_url();?>quotation/detail/<?=$js->quote_id?>"><?=$js->quote_date?></a></td>
										<td align="center"><a href="<?=base_url();?>quotation/detail/<?=$js->quote_id?>"><?=$js->customer_name?></a></td>
										<td align="center">
										<a href="<?=base_url();?>quotation/detail/<?=$js->quote_id?>">
											<? if($js->quote_status == "WAIT CONFIRM") {?>
												<span class="label label-sm label-warning"> รออนุมัติ</span>
											<? }else if($js->quote_status == "CONFIRM"){?>
												<span class="label label-sm label-success"> อนุมัติ</span>
											<? }else if($js->quote_status == "CANCEL"){?>
												<span class="label label-sm label-danger"> ไม่อนุมัติ</span>
											<? }?>
										</a>
										
										</td>
										<td align="center" width="15%">
											<? if($js->quote_status == "WAIT CONFIRM") {?>
											<a href="<?=base_url()?>quotation/line/<?php echo $js->quote_id?>" >แก้ไข</a>
											<?php }?>
										</td>
									</tr>
								<? }?>
							<?}?>
							</tbody>
							</table>
							<? if($this->approve_flag=='Y') {?>
								<input type="hidden" name="stauts" id="status_approve" />
								<button type="submit" class="btn blue" onclick="$('#status_approve').val('1');" >อนุมัติ</button>
								<button type="submit" class="btn red" onclick="$('#status_approve').val('0');">ไม่อนุมัติ</button>
							<? }?>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
				</form>
			</div>
<? if($this->approve_flag=='Y') {?>
	<script>
		$(document).ready(function(){
	
			$('#qcheck_all').click(function () {
	
				if($(this).is(':checked')){
					$('.q_check').each(function() {
						//console.log($(this).parent());
			     		$(this).prop("checked",true);
			     		$(this).parent().addClass('checked');
			     		
			    	});
				}else{
					$('.q_check').each(function() {
			     		$(this).prop("checked",false);
			     		$(this).parent().removeClass('checked');
			    	});
				}/**/
			});
			
			
		});
	</script>
<?php }?>
<?php $this->load->view("footer");?>