

<div class="form-group">
						<label class="col-md-3 control-label">ที่อยู่</label>
						<div class="col-md-9">
											<textarea class="form-control input-inline input-medium" 
											 placeholder="address1" id="address1" name = "address1"><?=isset($address1)?$address1:''?></textarea>
						</div>
					</div>
			
					
					<div class="form-group">
						<label class="col-md-3 control-label">รหัสไปรษณีย์</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="postcode" id="postcode" name = "postcode"
											value="<?=isset($postcode)?$postcode:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">จังหวัด</label>
						<div class="col-md-9">
							<select name = "province_code" class="form-control input-inline input-medium" id="province_code">
								<option value="">province_code</option>
								
								<? if(isset($provice)){ ?>
									<? foreach ($provice->result() as $p) :?>
										<option value="<?=$p->province_code?>"><?=$p->province_name?></option>
									<? endforeach ?>
								<? } ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">ประเทศ</label>
						<div class="col-md-9">
											<? if(isset($country_code)){ ?>
										<script>
											$(document).ready(function(){
												$('#country_code').val("<?=$country_code?>");
											})
										</script>
									<? }?>									
											<select name = "country_code" class="form-control input-inline input-medium" id="country_code">
													<option value="219">Thailand</option>
												<?php if (isset($country)) {?>
												<? foreach ($country->result() as $c) :?>
													<option value="<?=$c->country_code?>"><?=$c->country_name?></option>
												<?php endforeach ?>
												<?php }?>
											</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">ผู้ติดต่อ</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="contact_person" id="contact_person" name = "contact_person"
											value="<?=isset($contact_person)?$contact_person:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">โทรศัพท์</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="phone_number" id="phone_number" name = "phone_number"
											value="<?=isset($phone_number)?$phone_number:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">มือถือ</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="mobile_number" id="mobile_number" name = "mobile_number"
											value="<?=isset($mobile_number)?$mobile_number:''?>" >
						</div>
					</div>
					
					<!-- div class="form-group" id="sameBill">
						<label class="col-md-3 control-label">ใช้เป็นที่อยู่ส่งของด้วย</label>
						<div class="col-md-9">
											<input type="checkbox" class="form-control input-inline input-medium" 
											 id="ship_address" name = "ship_address" value="1">  ใช่
						</div>
					</div -->