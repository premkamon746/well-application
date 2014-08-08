<?php $this->load->view("header");?>
            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">สร้างใบงาน &nbsp;<small>(รายละเอียดงาน)</small></h3>
				</div>
            </div>
            <div class="row">
				<table width="200px" align="right">
				<tr>
					<td height="32px" width="80px"><b>Job No.</b></td>
					<td width="120px"><?=isset($job->job_no)?$job->job_no:'' ?></td>
				</tr>
				<tr>
					<td height="32px"><b>Status</b></td>
					<td><?=isset($job->job_status)?$job->job_status:'' ?> </td>
				</tr>
				<tr>
					<td height="32px"><b>Piority</b></td>
					<td>Normal</td>
				</tr>
				</table>
			</div>
			<button type="button" class="btn red" onclick="manuPlan()"> &nbsp; &nbsp; บันทึก &nbsp; &nbsp; </button>
			<br/><br/>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>รายละเอียดงาน
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="tbl_job_line">
							<thead>
							<tr>
								<td align="center"><b>No.</b></td>
								<td align="center"><b>รายละเอียดงาน</b></td>
								<td align="center"><b>สถานะ</b></td>
								<td align="center"><b>บันทึกโดย</b></td>
							</tr>
							</thead>
							<tbody>
							
							<? if($job_line->num_rows() > 0) {?>
								<? $i=0; ?>
								<? foreach ($job_line->result() as $jl) {?>
									<tr class="odd gradeX">
										<td><?=++$i?></td>
										<td><?=$jl->description?></td>
										<td><?=$jl->status?></td>
										<td><?=$jl->create_user?></td>
									</tr>
								<? } ?>
							<? } ?>
							
							
							<tr class="odd gradeX">
								<td align="center">
									<button class="btn btn-primary btn-lg" 
												style="padding:0px 2px 0px 2px" 
												data-toggle="modal" 
												data-target="#myModal" >
										<span class="glyphicon glyphicon-plus"></span>
									</button>
								</td>
								
								<td></td>
								<td align="center">
									<span class="label label-sm label-success"></span>
								</td>
								<td align="center"></td>
							</tr>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			
			<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <form method="post" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">บันทึกรายละเอียดงาน</h4>
      </div>
      <div class="modal-body">
      		
        		รายละเอียด : <br/><textarea name="description" rows="4" cols="60"></textarea>
        		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn green">บันทึก</button>
      </div>
    </div>
  </div>
  </form>
</div>
<?php $this->load->view("footer");?>