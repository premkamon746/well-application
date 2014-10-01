<?php $this->load->view("header");?>
            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">สร้างใบงาน &nbsp;<small>(วางแผนผลิต)</small></h3>
				</div>
            </div>
            <div class="row">
            <div class="portlet box red">
						<div class="portlet-title"></div>
						<div class="portlet-body">
							<br>
						
				<table width="75%" align="center">
							<tbody><tr>
								<td height="32px" width="20%"><b>วันที่รับงาน</b></td>
								<td width="25%"><?=$job->job_date ?></td>
								<td width="18%"><b>ลูกค้า</b></td>
								<td width="37%"><?=$job->customer_name?></td>
							</tr>
							<tr>
								<td height="32px"><b>ประเภทงาน</b></td>
								<td><?=getJobType($job->job_type_id)?></td>
								<td><b>สถานที่ติดตั้ง</b></td>
								<td><?=getAddress($job->site_id)?></td>
							</tr>
							<tr>
								<td height="32px"><b>ประเภทงานย่อย</b></td>
								<td><?=getJobSubType($job->sub_type_id)?></td>
								<td><b>ผู้ติดต่อ</b></td>
								<td><?=$job->job_end_date?></td>
							</tr>
							<tr>
								<td height="32px" width="15%"><b>กำหนดวันส่งมอบ</b></td>
								<td width="35%"><?=$job->job_end_date?></td>
								<td width="15%"><b>โทรศัพท์</b></td>
								<td width="35%"><?=$job->phone_number?> <?=$job->mobile_number?></td>
							</tr>
							</tbody>
							
							
							</table>
							
					
					
					<table width="96%">
						<tbody><tr>
							<td width="20%" align="left">
								<!-- button type="button" class="btn red" onclick=""> &nbsp; บันทึก &nbsp; </button -->
							</td>
							<td width="40%">
								<button type="button" class="btn green" 
								onclick="start()">Start</button>
								&nbsp; &nbsp; &nbsp;
								<button type="button" class="btn gray" onclick="end()">End</button>
							</td>
							<td width="20%">
								<button type="button" class="btn blue" onclick="forward()">ส่งงานต่อ </button>
							</td>
						</tr>
						</tbody>
					</table>
					</div><!-- portlet-body -->
					</div>	<!-- portlet box red -->		
			</div><!-- close row -->
			
			<br>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>วางแผนการผลิต
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="tbl_job_line">
							<thead>
							<tr>
								<td align="center"><b>No.</b></td>
								<td align="center"><b>รายละเอียดงานการผลิต</b></td>
								<td align="center"><b>ให้แผนก</b></td>
								<td align="center"><b>เริ่ม (Plan)</b></td>
								<td align="center"><b>สิ้นสุด (Plan)</b></td>
								<td align="center"><b>เริ่ม (Actual)</b></td>
								<td align="center"><b>สิ้นสุด (Actual)</b></td>
								<td align="center"><b>Status</b></td>
							</tr>
							</thead>
							<tbody>
							<?php $i=0;?>
							<? foreach ($task->result() as $r){?>
								<tr class="odd gradeX">
									<td align="center"><? echo ++$i;?></td>
									<td><?=$r->description?></td>
									<td align="center"><?=$r->dept_name?></td>
									<td align="center"><?=$r->plan_date_from?></td>
									<td align="center"><?=$r->plan_date_to?></td>
									<td align="center"><?=$r->actual_date_start?></td>
									<td align="center"><?=$r->actual_finish_date?></td>
									<td align="center">
									
									<? if($r->task_status == "WAIT CONFIRM") {?>
										<span class="label label-sm label-warning"> รออนุมัติ</span>
									<? }else if($r->task_status == "CONFIRM"){?>
										<span class="label label-sm label-success"> อนุมัติ</span>
									<? }else if($r->task_status == "CANCEL"){?>
										<span class="label label-sm label-danger"> ไม่อนุมัติ</span>
									<? }?>
									</td>
								</tr>
								
								
							<?php }?>
							</tbody>
							<tfoot>
								<tr class="odd gradeX">
								<td align="center">
									<button class="btn btn-primary btn-lg" 
												style="padding:0px 2px 0px 2px" 
												data-toggle="modal" 
												data-target="#myModal" >
										<span class="glyphicon glyphicon-plus"></span>
									</button>
								</td>
								
								<td align="center"></td>
								<td></td>
								<td align="center"></td>
								<td align="center"></td>
								<td align="center"></td>
								<td align="center"></td>
								<td align="center"></td>
								<td align="center"></td>
							</tr>
							</tfoot>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			
			
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <form method="post" >
  <div class="modal-dialog" >
  
    <div class="modal-content">
    <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    <h4 class="modal-title">สร้างใบงาน </h4>
	                </div>
      <?php $this->load->view("job/form_task");?>
      <div style="clear:both;"></div>
      
  <div class="modal-footer">
	                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
	                    <button type="submit" class="btn green">บันทึก</button>
	                </div>
    </div>
    
  </div>
  </form>
</div>

<script>

						function start(){
							if(confirm("start")){
								window.location='<?=base_url()?>job/chane_status/<?=$job_id?>/start';
							}
						}

						function end(){
							if(confirm("end")){
								window.location='<?=base_url()?>job/chane_status/<?=$job_id?>/end/';
							}
						}

						function forward(){
							if(confirm("forward")){
								window.location='<?=base_url()?>job/chane_status/<?=$job_id?>/forward/';
							}
						}
					</script>
<?php $this->load->view("footer");?>