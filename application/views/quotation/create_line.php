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
								<td align="center" width="22%"><b>ลบ</b></td>
							</tr>
							</thead>
							<tbody>
								
								<? $all_line = 0;?>
								<? if($line->num_rows() >0 ) {?>
									<? $i = 0;?>
									
									<? foreach ($line->result() as $r) {?>
										<tr>
											<td align="center" width="12%"><?=++$i?></td>
											<td align="left" width="35%"><?=$r->remarks?></td>
											<td align="center" width="13%"><?=$r->quantity?></td>
											<td align="right" width="18%"><?=number_format($r->unit_selling_price,2)?></td>
											<td align="right" width="22%"><?=number_format($r->line_amount,2)?></td>
											<td align="center" width="22%">
												<a href="javascript:void(0)" onclick="del_line('<?=$r->line_id?>','<?=$r->quote_id?>');">ลบ</a>
											</td>
										</tr>
										<? $all_line +=$r->line_amount?>
									<?}?>
								<? }?>
								<tr>
									<td align="center" width="12%">
									<a heft="#myModal"  class="glyphicon glyphicon-plus modalc" ></a>
									
									</td>
									<td align="center" width="35%"></td>
									<td align="center" width="13%"></td>
									<td align="center" width="18%"></td>
									<td align="center" width="22%"></td>
									<td align="center" width="22%"></td>
								</tr>
							</tbody>
							<tfoot>
							<tr>
								<td colspan="6" align="right">
									<table class="table table-striped table-bordered table-hover" style="width:200px;">
										<tr>
											<td>ยอดเงินก่อนภาษี</td>
											<td align="right"><?=number_format($all_line,2)?> </td>
										</tr>
										<tr>
											<td>ภาษี</td>
											<td  align="right"><?=$vat?>% </td>
										</tr>
										<tr>
											<td>รวมเป็นเงิน</td>
											<td  align="right"><?=number_format(($all_line + ($all_line*$vat*0.01) ),2)?></td>
										</tr>
									
									</table>
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
				<button type="button" class="btn green" onclick="window.location='<?=base_url()?>quotation/quote_job/<?=$quote_id?>'">บันทึก</button>
			</div>
			
<div id="myModal" class="modal fade">
        <div class="modal-dialog" style="width:1000px;">
        	<form id="sale_item_form" class="form-horizontal" role="form" method="post">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    <h4 class="modal-title">Item</h4>
	                </div>
	                <div class="modal-body"  style="margin-bottom:0px;padding-bottom:0px;">
							<div class="col-md-12">
								<!-- BEGIN EXAMPLE TABLE PORTLET-->
								<div class="portlet box light-grey">
									<div class="portlet-title">
										<div class="caption">
											<select name="catagory" class="form-control input-inline input-medium" id="catagory">
												<option value="">Catagory</option>
												<? if($item_cat->num_rows() > 0) {?>
													<? foreach($item_cat->result() as $cs){ ?>
														<option value="<?=substr($cs->category,0,3)?>"><?=$cs->category ?></option>
													<? }?>
												<? } // job type?>
											</select>
											
											<select name="segment1" class="form-control input-inline input-medium" id="segment1">
												<option value="">Segment 1</option>
											</select>
											
											
											<select name="segment2" class="form-control input-inline input-medium" id="segment2">
												<option value="">Segment 2</option>
											</select>
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
										<div id="sale_item_data" style="height:200px;overflow: auto;"></div>
									</div>
								</div>
								<!-- END EXAMPLE TABLE PORTLET-->
							</div>
	                		
	                </div>
	                
	                <?php $this->load->view("quotation/data_item"); ?>
	                
	                
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                    <button type="submit" class="btn green">Save changes</button>
	                </div>
	            </div>
            </form>
            
       		
        </div>
    </div>
	
<script>

	
	
	function getSaleItem(id){
		var img = "<img src='<?=base_url()?>assets/img/loading.gif' />";
		$('#sale_item_data').html(img);
		var url = "<?=base_url()?>quotation/sale_item_ajax/"+id;
		$.get(url, function(data){
			$('#sale_item_data').html(data);
		});
	}

	function getSaleItemSegment1(s1){
		cat = $("#catagory").val();
		alert(s1);
		var url = "<?=base_url()?>quotation/sale_item_s1_ajax/"+cat+"/"+s1;
		$.get(url, function(data){
			$('#sale_item_data').html(data);
		});
	}

	function getSaleItemSegment2(s2){
		cat = $("#catagory").val();
		s1 = $.trim($("#segment1").val());
		var url = "<?=base_url()?>quotation/sale_item_s2_ajax/"+cat+"/"+s1+"/"+s2;
		$.get(url, function(data){
			$('#sale_item_data').html(data);
		});
	}



	function getSegment1(id){
		//var img = "<img src='<?=base_url()?>assets/img/loading.gif' />";
		//$('#sale_item_data').html(img);
		var url = "<?=base_url()?>quotation/get_segment1/"+id;
		$.getJSON(url, function(data){
			getDropDownList(data,$("#segment1"));
		});
	}

	function getSegment2(s1){
		//var img = "<img src='<?=base_url()?>assets/img/loading.gif' />";
		//$('#sale_item_data').html(img);
		cat = $("#catagory").val();
		var url = "<?=base_url()?>quotation/get_segment2/"+cat+"/"+s1;
		$.getJSON(url, function(data){
			getDropDownList(data,$("#segment2"));
		});
	}

	function getDropDownList(optionList,obj) {
	    $(obj).find("option").each(function() {
	    	$(this).remove();
		});
	    
	var combo = obj;
	    $.each(optionList, function (i, el) {
		 
	        combo.append("<option value='"+el.segment+"'>" + el.segment + "</option>");
	    });

	    obj.append(combo);
	}

	$(document).ready(function(){
		$("#catagory").change(function(){

			if($(this).val()!=""){
				getSaleItem($(this).val());
				getSegment1($(this).val());


				//remove segment2 first
				$('#segment2').find("option").each(function() {
			    	$(this).remove();
				});
			}
		});

		$("#segment1").change(function(){
			console.log($(this).val());
			getSaleItemSegment1($(this).val())
			getSegment2($(this).val());
		});

		$("#segment2").change(function(){
			getSaleItemSegment2($(this).val())
		});

		
		$('#sale_item_form').submit(function(){

			rest = true;
			if($('#desc').val() == ""){
				$('#desc').addClass("redbox");
				rest =  false;
			}

			if($('#quantity').val() == ""){
				$('#quantity').addClass("redbox");
				rest =  false;
			}

			if($('#price').val() == ""){
				$('#price').addClass("redbox");
				rest =  false;
			}

			if($('#toprice').val() == ""){
				$('#toprice').addClass("redbox");
				rest =  false;
			}
			
			if(rest==true){
				$('#sale_item_form').submit();
			}
			
			return false;
		});
	});

	function del_line(line_id,quote_id){
		if(confirm("ต้องการลบหรือไม่")){
			window.location = "<?=base_url()?>quotation/del_line/"+line_id+"/"+quote_id;
		}
	}
</script>
<?php $this->load->view("footer");?>