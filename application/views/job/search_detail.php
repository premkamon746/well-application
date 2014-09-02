<?php $this->load->view("header");?>
            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">ข้อมูลใบงาน &nbsp;<small>(รายละเอียดงาน)</small></h3>
				</div>
            </div>
            <div class="row">
				<div class="col-md-12">
					<div class="portlet box green">
						<div class="portlet-title"></div>
						<div class="portlet-body">
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
								<td><?=$job->address1?><?=$job->address2?></td>
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
							</tbody></table>
							<br>
							<table width="96%">
							<tbody><tr>
								<td width="30%" align="left" style="padding-left: 20px">
									<?php $data = $this->session->userdata('login_object');  ?>
									<?php if($data["deptid"]==1){//QC ?>
									<button type="button" class="btn gray" onclick="">ยกเลิกใบสั่งงาน</button>
									<?php }?>
									&nbsp; &nbsp; &nbsp;
									<button type="button" class="btn blue" onclick=""> &nbsp; พิมพ์ Label &nbsp; </button>
								</td>
								<td width="18%">
									<b>Tag:</b> &nbsp; &nbsp; <?=$job->tag_no ?>
								</td>
								<td width="18%">
									<b>Serial:</b> &nbsp; &nbsp; <?=$job->serial_number ?>
								</td>
								<td width="34%">
									<b>หมายเหตุ: </b> -
								</td>
							</tr>
							</tbody></table>
							<br>
						</div>
					</div>
				</div>
			</div>
			<div class="row"><!-- begin row -->
				<div class="col-md-12">
					<div class="portlet box green">
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
										<td><?=$jl->usr_name?></td>
									</tr>
								<? } ?>
							<? } ?>
							
							</tbody>
							</table>
							<? if($job->job_status==$job_status) { ?>
								<form method="POST" action="<?=base_url()?>job/approve_job">
									<input type="hidden" name="job_id" value="<?=$job_id?>"/>
									<button type="submit" class="btn red" >Approve</button>
								</form>
							<?php }?>
						</div>
					</div>
				</div>
			</div><!-- end row -->
<?php $this->load->view("footer");?>