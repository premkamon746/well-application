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
						<form class="form-horizontal" role="form">
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
								<td align="center" width="12%"><b>Quotation No.</b></td>
								<td align="center" width="18%"><b>วันที่ใบเสนอราคา</b></td>
								<td align="center" width="35%"><b>ลูกค้า</b></td>
								<td align="center" width="15%"><b>Status</b></td>
								<td align="center" width="20%"><b>&nbsp;</b></td>
							</tr>
							</thead>
							<tbody>
							<? if(isset($job_search) > 0){?>
								<? foreach ($job_search->result() as $js){ ?>
									<tr>
										<td align="center">
											<a href="<?=base_url('job/search_detail/'.$js->job_id)?>"><?=$js->job_no?></a>
										</td>
										<td align="center"><?=$js->quote_number?></td>
										<td align="center"><?=$js->quote_date?></td>
										<td align="center"><?=$js->customer_name?></td>
										<td align="center"><span class="label label-sm label-success"> อนุมัติ</span></td>
										<td align="center"><a href="#" class="fa fa-file-text"></a></td>
									</tr>
								<? }?>
							<?}?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
<?php $this->load->view("footer");?>