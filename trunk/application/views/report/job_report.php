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
									<label class="col-md-3 control-label">Job Closed Date from</label> 
									<div class="col-md-9">
									
								
										<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
										<input type="text" class="form-control form-filter input-medium" 
											readonly="" 
											name="job_end_date_start" 
											placeholder=""
											value="<?=isset($from)?$from:''?>">
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</div>
										 
										<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
										<input type="text" class="form-control form-filter input-medium" 
											readonly="" 
											name="job_end_date_end" 
											placeholder=""
											value="<?=isset($to)?$to:''?>">
											
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
										</div>
										<div style="clear: both;"></div-->
										<span class="help-inline"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">สถานะ</label>
									<div class="col-md-9">
									<? if(isset($customer_id)){ ?>
									<script>
										$(document).ready(function(){
											$('#customer_select').val("<?=$customer_id?>");
										})
									</script>
									<? }?>
										<select name="customer_id" class="form-control input-inline input-medium" id="customer_select">
											<option value="">job status</option>
											<? if($js->num_rows() > 0) {?>
												<? foreach($js->result() as $cs){ ?>
													<option value="<?=$cs->status_code ?>"><?=$cs->status_code ?></option>
												<? }?>
											<? } // job type?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-actions fluid">
							<?=isset($message)?$message:""?>
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green" onclick="">ค้นหา</button>
									&nbsp; &nbsp; &nbsp;
									<button type="button" class="btn default" onclick="window.location='<?=site_url('report/note')?>'">ยกเลิก</button>
								</div>
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
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>    
								<td>Job Date</td>
								<td>Job Type</td>
								<td>Job Number</td>
								<td>Job Closed Date</td>
								<td>Status</td>
								
							</tr>
							</thead>
							<tbody>
							<?php $i = 1;
								$sum_amt = 0;
							?>
							<? if(isset($close_search) > 0){?>
								<? foreach ($close_search->result() as $js){ ?>
									<tr>
										<td><?=$js->job_date?></td>
										<td><?=$js->type_name?></td>
										<td><?=$js->job_no?></td>
										<td><?=$js->job_end_date?></td>
										<td><?=$js->job_status?></td>
										
									</tr>
								<? }?>
							<?}?>
							</tbody>
							
							</table>
							
							
						</div>
						
						<div class="portlet box red"  style="width: 500px; font-weight:bold;">
						<br/>
						<div class="portlet-body" >
							<table class="table table-striped table-bordered table-hover" id="sample_1">
								<tr>
									<td>Job Summary Total</td>
									<td><?=$total?></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>NEW</td>
									<td><?=$NEW?></td>
									<td>CONFIRM</td>
									<td><?=$CONFIRM?></td>
									<td>CANCEL</td>
									<td><?=$CANCEL?></td>
								</tr>
								<tr>
									<td>CHECK</td>
									<td><?=$CHECK?></td>
									<td>PROCESSING</td>
									<td><?=$PROCESSING?></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>WAIT CONFIRM</td>
									<td><?=$WAIT_CONFIRM?></td>
									<td>CLOSED</td>
									<td><?=$CLOSED?></td>
									<td></td>
									<td></td>
								</tr>
							</table>
							</div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			
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