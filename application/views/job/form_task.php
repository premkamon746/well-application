				   <div class="form-group">
						<label class="col-md-3 control-label">รายละเอียดงานการผลิต</label>
						<div class="col-md-9">
											<textarea class="form-control input-inline input-medium" 
											 placeholder="" id="description" name = "description"></textarea>
						</div>
					</div>
			
					
					<div class="form-group">
						<label class="col-md-3 control-label">ให้แผนก</label>
						<div class="col-md-9">
							<select name = "assign_to_dept_id" class="form-control input-inline input-medium" id="assign_to_dept_id">
								<option value="">เลือกแผนก</option>
								
								<? if(isset($dept)){ ?>
									<? foreach ($dept->result() as $p) :?>
										<option value="<?=$p->dept_id?>"><?=$p->dept_name?></option>
									<? endforeach ?>
								<? } ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">เริ่ม (Plan)</label>
						<div class="col-md-9">
							<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
											<input type="text" class="form-control input-inline input-medium" readonly="" name="plan_date_from" placeholder="" id="plan_date_from" value="">
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">สิ้นสุด (Plan)</label>
						<div class="col-md-9">
											<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
											<input type="text" class="form-control input-inline input-medium" readonly="" name="plan_date_to" placeholder="" id="plan_date_to" value="">
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">เริ่ม (Actual)</label>
						<div class="col-md-9">
											<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
											<input type="text" class="form-control input-inline input-medium" readonly="" name="actual_date_start" placeholder="" id="actual_date_start" value="">
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">สิ้นสุด (Actual)</label>
						<div class="col-md-9">
											<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
											<input type="text" class="form-control input-inline input-medium" readonly="" name="actual_finish_date" placeholder="" id="actual_finish_date" value="">
											&nbsp; <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
							</div>
						</div>
					</div>
					
					<!-- div class="form-group">
						<label class="col-md-3 control-label">หมายเหตุ</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="mobile_number" id="mobile_number" name = "mobile_number[]"
											value="<?=isset($mobile_number)?$mobile_number:''?>" >
						</div>
					</div -->
					
