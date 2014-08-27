<?php $this->load->view("header");?>

            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">สร้างใบเสนอราคา &nbsp;<small>รายการเสนอขาย &nbsp; :: &nbsp; ขั้นตอนที่ 2 จาก 3</small></h3>
				</div>
            </div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>รายการเสนอขาย
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
							<table id="tblMain" class="table table-striped table-bordered table-hover">
							<thead>
							<tr>
								<td align="center" width="12%"><b>ลำดับ</b></td>
								<td align="center" width="35%"><b>รายละเอียด</b></td>
								<td align="center" width="13%"><b>จำนวน</b></td>
								<td align="center" width="18%"><b>ราคาต่อหน่วย</b></td>
								<td align="center" width="22%"><b>รวม (บาท)</b></td>
							</tr>
							</thead>
							<tbody>
								<tr>
									<td align="center" width="12%">
									<span class="glyphicon glyphicon-plus" data-target="#long" data-toggle="modal"></span>
									
									</td>
									<td align="center" width="35%"></td>
									<td align="center" width="13%"></td>
									<td align="center" width="18%"></td>
									<td align="center" width="22%"></td>
								</tr>
							</tbody>
							<tfoot>
							<tr>
								<td colspan="5" align="right">
									<input type="text" style="width: 120px; height: 28px" value=" Grand Total"> &nbsp; + &nbsp;
									<input type="text" style="width: 100px; height: 28px" value=" Vat"> &nbsp; = &nbsp;
									<input type="text" style="width: 160px; height: 28px" value=" Total">
								</td>
							</tr>
							</tfoot>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<div class="row" align="center">
				<button type="button" class="btn green" onclick="createQuoLine()">บันทึก</button>
			</div>
			
<div id="long" class="modal hide fade" tabindex="-1" data-replace="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>A Fairly Long Modal</h3>
  </div>
  <div class="modal-body">
    <button class="btn" data-toggle="modal" href="#notlong" style="position: absolute; top: 50%; right: 12px">Not So Long Modal</button>
    <img style="height: 800px" src="http://i.imgur.com/KwPYo.jpg">
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn">Close</button>
  </div>
</div>


<?php $this->load->view("footer");?>