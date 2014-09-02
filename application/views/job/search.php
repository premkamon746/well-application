<?php $this->load->view("header");?>
            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">ค้นหาใบงาน &nbsp;<small>(Search Job)</small></h3>
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
						<form class="form-horizontal" role="form" method="post"">
							<div class="form-body">
								<div class="form-group">
									<label class="col-md-3 control-label">Job No.</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="Job No." 
										name="job_no" value="<?=isset($job_no)?$job_no:''?>" >
										<span class="help-inline"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">วันที่รับงาน</label>
									<div class="col-md-9">
										<!--input type="text" class="form-control input-inline input-medium" placeholder="วันที่รับงาน"-->
										<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
											<input type="text" class="form-control form-filter input-medium" 
											readonlyplaceholder="วันที่รับงาน"
											name="job_date"
											 value="<?=isset($job_date)?$job_date:''?>">
											<!--span class="input-group-btn"-->
												&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											<!--/span-->
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
											<option value="">เลือกประเภทงาน</option>
											<? if($job_type->num_rows() > 0) {?>
												<? foreach($job_type->result() as $jt){ ?>
													<option value="<?=$jt->job_type_id ?>"><?=$jt->type_name ?></option>
												<? }?>
											<? } // job type?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">ประเภทงานย่อย</label>
									<div class="col-md-9">
									
									<? if(isset($sub_type_id)){ ?>
									<script>
										$(document).ready(function(){
											$('#sub_type_id').val("<?=$sub_type_id?>")
										})
									</script>
									<? }?>
										<select name="sub_type_id" class="form-control input-inline input-medium" id="sub_type_id">
											<option value="">เลือกประเภทงานย่อย</option>
											<? if($job_subtype->num_rows() > 0) {?>
												<? foreach($job_subtype->result() as $jst){ ?>
													<option value="<?=$jst->sub_type_id ?>"><?=$jst->sub_type_name ?></option>
												<? }?>
											<? } // job type?>
										</select>
									</div>
								</div>
								<!--  div class="form-group">
									<label class="col-md-3 control-label">Status</label>
									<div class="col-md-9">
									
									<? if(isset($status_code)){ ?>
									<script>
										$(document).ready(function(){
											$('#status_code').val('<?=$status_code?>');
										})
									</script>
									<? }?>
										<select name="status_code" class="form-control input-inline input-medium" id="status_code">
											<option value="">เลือกประเภทงานย่อย</option>
											<? //if($job_status->num_rows() > 0) {?>
												<? //foreach($job_status->result() as $jst){ ?>
													<option value="<?//=$jst->status_code ?>"><?//=$jst->status_code ?></option>
												<? //}?>
											<? //} // job type?>
										</select>
									</div>
								</div>
							</div-->
							<div class="form-actions fluid">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green" onclick="">ค้นหา</button>
									&nbsp; &nbsp; &nbsp;
									<button type="button" class="btn default" onclick="reload()">ยกเลิก</button>
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
							<!--div class="table-toolbar">
								<div class="btn-group">
									<button id="sample_editable_1_new" class="btn green">
									Add New <i class="fa fa-plus"></i>
									</button>
								</div>
								<div class="btn-group pull-right">
									<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">Print</a>
										</li>
										<li>
											<a href="#">Save as PDF</a>
										</li>
										<li>
											<a href="#">Export to Excel</a>
										</li>
									</ul>
								</div>
							</div-->
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
								<td align="center"><b>Job No.</b></td>
								<td align="center"><b>วันที่รับงาน</b></td>
								<td align="center"><b>ลูกค้า</b></td>
								<td align="center"><b>Status</b></td>
								<td align="center"><b>ประเภทงาน</b></td>
								<td align="center"><b>ประเภทงานย่อย</b></td>
								<td align="center"><b>&nbsp;</b></td>
							</tr>
							<? if(isset($job_search) > 0){?>
							<? foreach ($job_search->result() as $js){ ?>
							<tr>
								<td align="center">
									<a href="<?=base_url('job/search_detail/'.$js->job_id)?>" target="_blank"><?=$js->job_no?></a>
								</td>
								<td align="center"><?=$js->job_date?></td>
								<td align="center"><?=$js->customer_name?></td>
								<td align="center"><?=$js->job_status?></td>
								<td align="center"><?=$js->description?></td>
								<td align="center"><?=$js->sub_type_name?></td>
								<td align="center"><b>&nbsp;</b></td>
							</tr>
							<? }?>
							<?}?>
							</thead>
							<tbody></tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<script>
				function reload(){
					window.location = "<?=base_url('job/search')?>";
				}
			</script>
<?php $this->load->view("footer");?>