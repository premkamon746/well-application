

<div class="form-group">
						<label class="col-md-3 control-label">Address 1</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="address1" id="address1" name = "address1"
											value="<?=isset($address1)?$address1:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Address 2</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="address2" id="address2" name = "address2"
											value="<?=isset($address2)?$address2:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">post code</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="postcode" id="postcode" name = "postcode"
											value="<?=isset($postcode)?$postcode:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">country code</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="postcode" id="country_code" name = "country_code"
											value="<?=isset($country_code)?$country_code:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">phone_number</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="phone_number" id="phone_number" name = "phone_number"
											value="<?=isset($phone_number)?$phone_number:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">mobile_number</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="mobile_number" id="mobile_number" name = "mobile_number"
											value="<?=isset($mobile_number)?$mobile_number:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">contact_person</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="contact_person" id="contact_person" name = "contact_person"
											value="<?=isset($contact_person)?$contact_person:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">site_code</label>
						<div class="col-md-9">
											<input type="text" class="form-control input-inline input-medium" 
											 placeholder="site_code" id="site_code" name = "site_code"
											value="<?=isset($site_code)?$site_code:''?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Province</label>
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
						<label class="col-md-3 control-label">primary flag</label>
						<div class="col-md-9" style="text-align:left;">
							<input type="checkbox"
							placeholder="primary_flag" id="primary_flag" name = "primary_flag"
							value="<?=isset($primary_flag)?$primary_flag:''?>" >
						</div>
					</div>
					
					<div class="form-group">
							<script>
								$(document).ready(function(){
									if("<?=isset($site_type)?"":""?>"=="B"){
										$("#bill_tyle").prop("checked",true);
									}else{
										$("#ship_tyle").prop("checked",true);
									}
								});
							</script>
						<label class="col-md-3 control-label">site_type</label>
						<div class="col-md-9" >
							<input type="radio" id="bill_tyle" name = "site_type"
							value="B" >ที่อยู่ส่งบิล
							
							<input type="radio" id="ship_tyle" name = "site_type"
							value="S" >ที่อยู่ส่ง Ship
							
						</div>
					</div>