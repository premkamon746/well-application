<div class="modal-body" style="margin-top:0px;padding-top:0px;">
							<div class="col-md-12">
								<!-- BEGIN EXAMPLE TABLE PORTLET-->
								<div class="portlet box light-grey">
									<div class="portlet-title">
										<div class="caption"></div>
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
										<table class="table table-striped table-bordered table-hover" >
											<thead>
												<tr role="row" class="heading">
													<th width="5%">Secment 1</th>
													<th width="15%">Secment 2</th>
													<th width="15%">Secment 3</th>
													<th width="10%">Secment 4</th>
													<th width="10%">Price</th>
													<th width="10%">Unit Cost</th>
													<th width="10%">Mat. Cost</th>
													<th width="10%">M / H</th>
													<th width="10%">remove</th>
												</tr>
											</thead>
											<tbody id="item_list">
											</tbody>
										</table>
											<div>
							                	<input type="text" class="form-control input-inline input-xlarge" id="desc"  name="desc" placeholder="description">
							                	<input type="text" class="form-control input-inline input-mini" id="quantity" name="quantity" placeholder="Quotity"> 
							                	<select  class="form-control input-inline input-small">
							                		<option>หน่วย</option>
							                	</select>
							                	<input type="text" class="form-control input-inline input-xsmall" id="price" name="price" placeholder="Price/Unit">
							                	<input type="text" class="form-control input-inline input-xsmall" id="toprice" name="toprice" placeholder="Total Price" readonly>
							                </div>
									</div>
								</div>
								<!-- END EXAMPLE TABLE PORTLET-->
							</div>
	                </div>

<script>
	$(document).ready(function(){
		$('#quantity').keyup(function(){
			q = $('#quantity').val();
			p = $('#price').val();
			t = q*p;
			$('#toprice').val(t);
		});
		$('#price').keyup(function(){
			q = $('#quantity').val();
			p = $('#price').val();
			t = q*p;
			$('#toprice').val(t);
		});
	});

</script>

