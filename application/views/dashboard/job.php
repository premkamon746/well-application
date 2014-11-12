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
					
				</div>
				<!-- End Portlet -->
            </div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>
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
									<a href="<?=base_url('job/search_detail/'.$js->job_id)?>"><?=$js->job_no?></a>
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
							<ul class="pagination bootpag">
								<?=$pagination?>
							</ul>
							<!--  ul class="pagination bootpag">
								<li data-lp="1" class="prev">
								<a href="javascript:void(0);">«</a></li>
								<li data-lp="1"><a href="javascript:void(0);">1</a></li>
								<li data-lp="2" class="disabled"><a href="javascript:void(0);">2</a></li>
								<li data-lp="3"><a href="javascript:void(0);">3</a></li>
								<li data-lp="3" class="next"><a href="javascript:void(0);">»</a></li>
							</ul-->
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