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
									<label class="col-md-3 control-label">Job No.</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium"  
										placeholder="Job No."
										name="job_no" 
										value="<?=isset($job_no)?$job_no:''?>" >
										<span class="help-inline"></span>
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
				<form method="post" action="<?=base_url()?>/quotation/save_quote_job">
				<input type="hidden" name="quote_id" value="<?=$quote_id?>" />
				<input type="hidden" name="job_no" value="<?=isset($job_no)?$job_no:''?>" />
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
								<td align="center" width="1%"><input type="checkbox" id="qcheck_all" /></td>
								<td align="center" width="12%"><b>รายละเอียดงาน</b></td>
							</tr>
							</thead>
							<tbody>
							<? if(isset($job_search) > 0){?>
								<? foreach ($job_search->result() as $js){ ?>
									<tr>
										<td align="center">
											<input type="checkbox" name="id_check[]" class="q_check" value="<?=$js->job_line_id?>" />
										</td>
										<td align="center">
											<?=$js->description?>
										</td>
									</tr>
								<? }?>
							<?}?>
							</tbody>
							</table>
								<input type="hidden" name="stauts" id="status_approve" />
								<button type="submit" class="btn blue"  >บันทึก</button>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
				</form>
			</div>
			
			
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
<?php $this->load->view("footer");?>