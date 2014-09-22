<div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    <h4 class="modal-title">ที่อยู่ออกบิล</h4>
	                </div><br/><br/>
					
					<div class="form-group">
						<label class="col-md-3 control-label">ที่อยู่</label>
						<div class="col-md-9">
											<textarea class="form-control input-inline input-medium" 
											 placeholder="address1" id="address1" name = "address1[]"><?=isset($address1)?$address1:''?></textarea>
						</div>
					</div>
			
					
					<div class="form-group">
						<label class="col-md-3 control-label">รหัสไปรษณีย์</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="postcode" id="postcode" name = "postcode[]"
											value="<?=isset($postcode)?$postcode:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">จังหวัด</label>
						<div class="col-md-9">
							<select name = "province_code[]" class="form-control input-inline input-medium" id="province_code">
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
											<select name = "country_code[]" class="form-control input-inline input-medium" id="country_code">
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
											 placeholder="contact_person" id="contact_person" name = "contact_person[]"
											value="<?=isset($contact_person)?$contact_person:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">โทรศัพท์</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="phone_number" id="phone_number" name = "phone_number[]"
											value="<?=isset($phone_number)?$phone_number:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">มือถือ</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="mobile_number" id="mobile_number" name = "mobile_number[]"
											value="<?=isset($mobile_number)?$mobile_number:''?>" >
						</div>
					</div>
					
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>					
					
					<div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    <h4 class="modal-title">ที่อยู่ส่งของ</h4>
	                </div><br/><br/>					
					<div class="form-group" id="sameBill">
						<label class="col-md-3 control-label">ใช้ที่อยู่ส่งบิล</label>
						<div class="col-md-9">
											<input type="checkbox" class="form-control input-inline input-medium" 
											 id="ship_address" name = "ship_address" value="1">  ใช่
						</div>
					</div> 
					<div class="form-group">
						<label class="col-md-3 control-label">ที่อยู่</label>
						<div class="col-md-9">
											<textarea class="form-control input-inline input-medium" 
											 placeholder="address1" id="address1_2" name = "address1[]"><?=isset($address1)?$address1:''?></textarea>
						</div>
					</div>
			
					
					<div class="form-group">
						<label class="col-md-3 control-label">รหัสไปรษณีย์</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="postcode" id="postcode_2" name = "postcode[]"
											value="<?=isset($postcode)?$postcode:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">จังหวัด</label>
						<div class="col-md-9">
							<select name = "province_code[]" class="form-control input-inline input-medium" id="province_code_2">
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
											<select name = "country_code[]" class="form-control input-inline input-medium" id="country_code_2">
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
											 placeholder="contact_person" id="contact_person_2" name = "contact_person[]"
											value="<?=isset($contact_person)?$contact_person:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">โทรศัพท์</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="phone_number" id="phone_number_2" name = "phone_number[]"
											value="<?=isset($phone_number)?$phone_number:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">มือถือ</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="mobile_number" id="mobile_number_2" name = "mobile_number[]"
											value="<?=isset($mobile_number)?$mobile_number:''?>" >
						</div>
					</div>
					
					<script>
					$(document).ready(function(){

						$("#ship_address").click(function(){
								$('#address1_2').val($('#address1').val());
								$('#postcode_2').val($('#postcode').val());
								$('#province_code_2').val($('#province_code').val());
								$('#country_code_2').val($('#country_code').val());
								$('#contact_person_2').val($('#contact_person').val());
								$('#phone_number_2').val($('#phone_number').val());
								$('#mobile_number_2').val($('#mobile_number').val());
							
						});
						
					});
					</script>