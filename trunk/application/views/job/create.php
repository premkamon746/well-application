<?php $this->load->view("header");?>
<div class="page-content">
            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">
					สร้างใบงาน &nbsp;<small>(Create Job)</small>
					</h3>
				</div>
            </div>
            <div class="row">
				<!-- Start Portlet -->
                <div class="portlet box red">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-reorder"></i>&nbsp; กรอกรายละเอียดลูกค้า
						</div>
					</div>
					<div class="portlet-body form">
						<form class="form-horizontal" role="form">
							<div class="form-body">
								<div class="form-group">
									<label class="col-md-3 control-label">วันที่รับงาน</label>
									<div class="col-md-9">
										<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control input-inline input-medium" readonly name="order_date_from" placeholder="วันที่รับงาน">
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">ประเภทงาน</label>
									<div class="col-md-9">
										<select class="form-control input-inline input-medium">
											<option>เลือกประเภทงาน</option>
											<option>ซ่อมงานมอเตอร์ประเภท AC</option>
											<option>ซ่อมงานมอเตอร์ประเภท DC</option>
											<option>ซ่อมงาน Slip Ring</option>
											<option>ซ่อมงาน Vabration</option>
											<option>Onsite ประเภทงาน AC</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">ประเภทงานย่อย</label>
									<div class="col-md-9">
										<select class="form-control input-inline input-medium">
											<option>เลือกประเภทงานย่อย</option>
											<option>ไฟ 1  เฟส</option>
											<option>ไฟ 3  เฟส</option>
											<option>ไฟ 6  เฟส</option>
											<option>ไฟ ประเภท DC</option>
											<option>Slip Ring</option>
											<option>Vabration</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">กำหนดวันส่งมอบ</label>
									<div class="col-md-9">
										<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control input-inline input-medium" readonly name="order_date_from" placeholder="กำหนดวันส่งมอบ">
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">ลูกค้า</label>
									<div class="col-md-9">
										<select class="form-control input-inline input-medium">
											<option>เลือกลูกค้า</option>
											<option>บมจ. ปูนซีเมนต์ไทย</option>
											<option>บมจ. บ้านปู</option>
											<option>บ. ชิโนไทย เอ็นจิเนียริ่ง</option>
											<option>บ. กว้างไพศาล</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">สถานที่ติดตั้ง</label>
									<div class="col-md-9">
										<select class="form-control input-inline input-medium">
											<option>เลือกสถานที่ติดตั้ง</option>
											<option>โรงงานสมุทรปราการ</option>
											<option>โรงงานบางพลี</option>
											<option>โรงงานอยุธยา</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">ผู้ติดต่อ</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" name="order_date_from" placeholder="ผู้ติดต่อ">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">โทรศัพท์</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="โทรศัพท์">
										<span class="help-inline"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Tag</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="Tag">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Serial</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="Serial">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">หมายเหตุ</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium" placeholder="หมายเหตุ">
									</div>
								</div>
							</div>
							<div class="form-actions fluid">
								<div class="col-md-offset-3 col-md-9">
									<button type="button" class="btn green" onclick="createJobLine()">สร้างใบงาน</button>
									&nbsp; &nbsp; &nbsp;
									<button type="button" class="btn default">ยกเลิก</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- End Portlet -->
            </div>
        </div>
<?php $this->load->view("footer");?>