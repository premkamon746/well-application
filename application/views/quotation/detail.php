<?php $this->load->view("header");?>

<script>
	function validateQuote(){
		ret = true;
		$('.quote_line_status').each(function(){
			console.log()
 			if($(this)[0].selectedIndex <= 0){
 				ret = false;
 			}
		});
		if(ret==false){
			alert("กรุณาเลือกสถานะให้ครบก่อน");
			return false;
		}
		return ret;
	}
</script>
<form method="post" onsubmit="return validateQuote()">
            <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">รายละเอียดใบเสนอราคา</h3>
				</div>
            </div>
            <div class="row">
				<div class="col-md-12">
					<div class="portlet box green">
						<div class="portlet-title"></div>
						<div class="portlet-body">
							<table width="75%" align="center">
							<tbody><tr>
								<td height="32px" width="20%"><b>Quotation No.</b></td>
								<td width="25%"><?=$quote->quote_number?></td>
								<td width="18%"><b>ลูกค้า</b></td>
								<td width="37%"><?=$quote->customer_name?></td>
							</tr>
							<tr>
								<td height="32px"><b>วันที่เสนอราคา</b></td>
								<td><?=$quote->quote_date?></td>
								<td><b>Bill to</b></td>
								<td><?=getAddress($quote->bill_to_id)?></td>
							</tr>
							<tr>
								<td height="32px"><b></b></td>
								<td></td>
								<td><b>Ship to</b></td>
								<td><?=getAddress($quote->ship_to_id)?></td>
							</tr>
							</tbody></table>
							<br>
							<table width="96%">
							<tbody><tr>
								<td width="30%" align="left" style="padding-left: 20px">
								<script>

									function copy_quote(quote_id){
										if(confirm("ต้องการคัดลอก quotation หรือไม่?")){
											window.location = "<?=base_url()?>quotation/copy/"+quote_id;
										}
									}

									function cancel_quote(quote_id){
										if(confirm("ต้องการยกเลิก quotation หรือไม่?")){
											window.location = "<?=base_url()?>quotation/cancel/"+quote_id;
										}
									}

									function print_quote(quote_id){
										if(confirm("ต้องการพิมพ์quotation หรือไม่?")){
											window.location = "<?=base_url()?>quotation/qprint/"+quote_id;
										}
									}
								</script>
									
									<? if($this->approve_flag=='Y'  ) {?>	
										
										<input type="hidden" name="quote_id" value="<?=$quote_id?>"/>		
										<? if( ($quote->quote_status!="CONFIRM" && $quote->quote_status!="CANCEL")){ ?>												
											<button type="submit" class="btn green" onclick="" style="float:right;"> ยืนยันใบเสนอราคา </button>
										<?  } ?>
									<?php } ?>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="button" class="btn blue" onclick="copy_quote('<?=$quote_id?>');" style="float:right;margin-right:80px !important;"> Copy </button>
									&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="button" class="btn red" onclick="cancel_quote('<?=$quote_id?>');" style="float:right;margin-right:80px !important;"> ยกเลิก </button>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="button" class="btn green" onclick="print_quote('<?=$quote_id?>');" style="float:right;margin-right:80px !important;"> พิมพ์ </button>
								</td>
							</tr>
							</tbody></table>
							<br>
						</div>
					</div>
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
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="tbl_job_line">
							<thead>
							<tr>
								<td align="center"><b>ลำดับ</b></td>
								<td align="center"><b>รายละเอียดงาน</b></td>
								<td align="center"><b>จำนวน</b></td>
								<td align="center"><b>ราคาต่อหน่วย</b></td>
								<td align="center"><b>รวม</b></td>
								<td align="center"><b>สถานะ</b></td>
							</tr>
							</thead>
							<tbody>
							
							<? if($quote_line->num_rows() > 0) {?>
								<? $i=0; ?>
								<? foreach ($quote_line->result() as $jl) {?>
									<tr class="odd gradeX">
										<td><?=++$i?></td>
										<td align="left"><?=$jl->remarks?></td>
										<td align="center"><?=$jl->quantity?></td>
										<td align="right"><?=number_format($jl->unit_selling_price,2) ?></td>
										<td align="right"><?=number_format($jl->line_amount,2) ?></td>
										<td align="center">
											<? if($this->approve_flag=='Y') {?>		
											
												<? if( ($quote->quote_status!="CONFIRM" && $quote->quote_status!="CANCEL")){ ?>	
												<select name="quote_line_status[]" class="quote_line_status">
													<option value="WAIT CONFIRM:<?=$jl->line_id?>" <?=selected($jl->quote_line_status,"WAIT CONFIRM")?> >รออนุมัติ</option>
													<option value="CONFIRM:<?=$jl->line_id?>" <?=selected($jl->quote_line_status,"CONFIRM")?>>อนุมัติ</option>
													<option value="CANCEL:<?=$jl->line_id?>" <?=selected($jl->quote_line_status,"CANCEL")?>>ไม่อนุมัติ</option>
												</select>
												<?php  }else{ ?>
												
													<? if($jl->quote_line_status == "WAIT CONFIRM") {
														echo 'รออนุมัติ';
														 }else if($jl->quote_line_status == "CONFIRM"){
															echo 'อนุมัติ';
														 }else if($jl->quote_line_status == "CANCEL"){
															echo 'ไม่อนุมัติ';
														 }else{
														echo "<span>";
													}
													
													echo "&nbsp;&nbsp;&nbsp;</span>"; ?>
												
												<?php }?>
												
												<? if($jl->quote_line_status == "WAIT CONFIRM") {
													echo '<span class="label label-sm label-warning">';
												 }else if($jl->quote_line_status == "CONFIRM"){
													echo '<span class="label label-sm label-success">';
												 }else if($jl->quote_line_status == "CANCEL"){
													echo '<span class="label label-sm label-danger">';
												 }else{
													echo "<span>";
													}
													
													echo "&nbsp;&nbsp;&nbsp;</span>";
												?>
											<?php }else{?>
												<? if($jl->quote_line_status == "WAIT CONFIRM") {?>
													<span class="label label-sm label-warning"> รออนุมัติ</span>
												<? }else if($jl->quote_line_status == "CONFIRM"){?>
													<span class="label label-sm label-success"> อนุมัติ</span>
												<? }else if($jl->quote_line_status == "CANCEL"){?>
													<span class="label label-sm label-danger"> ไม่อนุมัติ</span>
												<? }?>
											<?php }?>
										
										</td>
									</tr>
								<? } ?>
							<? } ?>
							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			
			<!-- Button trigger modal -->
</form>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <form method="post" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">บันทึกรายละเอียดงาน</h4>
      </div>
      <div class="modal-body">
      		
        		รายละเอียด : <br/><textarea name="description" rows="4" cols="60"></textarea>
        		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn green">บันทึก</button>
      </div>
    </div>
  </div>
  </form>
</div>
<?php $this->load->view("footer");?>