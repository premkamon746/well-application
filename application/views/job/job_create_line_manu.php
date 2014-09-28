<?php $this->load->view("header");?>
            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">สร้างใบงาน &nbsp;<small>(วางแผนผลิต)</small></h3>
				</div>
            </div>
            <div class="row">
				<table width="200px" align="right">
				<tbody><tr>
					<td height="32px" width="80px"><b>Job No.</b></td>
					<td width="120px">140600001</td>
				</tr>
				<tr>
					<td height="32px"><b>Status</b></td>
					<td>New</td>
				</tr>
				<tr>
					<td height="32px"><b>Piority</b></td>
					<td>Normal</td>
				</tr>
				</tbody></table>
			</div>
			<table width="96%">
			<tbody><tr>
				<td width="20%" align="left">
					<button type="button" class="btn red" onclick=""> &nbsp; บันทึก &nbsp; </button>
				</td>
				<td width="40%">
					<button type="button" class="btn green" onclick=""> &nbsp; &nbsp; Start &nbsp; &nbsp; </button>
					&nbsp; &nbsp; &nbsp;
					<button type="button" class="btn gray" onclick=""> &nbsp; &nbsp; End &nbsp; &nbsp; </button>
				</td>
				<td width="20%">
					<button type="button" class="btn blue" onclick=""> &nbsp; ส่งงานต่อ &nbsp; </button>
				</td>
			</tr>
			</tbody></table>
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
								<td align="center"><b>หมายเหตุ</b></td>
								<td align="center"><b>Status</b></td>
							</tr>
							</thead>
							<tbody>
							<tr class="odd gradeX">
								<td align="center">1</td>
								<td>รายละเอียดการผลิต 1</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">
									<span class="label label-sm label-success">อนุมัติ</span>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td align="center">2</td>
								<td>รายละเอียดการผลิต 2</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">
									<span class="label label-sm label-warning">รออนุมัติ</span>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td align="center">3</td>
								<td>รายละเอียดการผลิต 3</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">Test</td>
								<td align="center">
									<span class="label label-sm label-default">ไม่อนุมัติ</span>
								</td>
							</tr>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
<?php $this->load->view("footer");?>