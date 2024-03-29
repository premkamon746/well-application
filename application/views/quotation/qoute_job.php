<?php $this->load->view("header");?>
 <div class="row">
                <div class="col-md-12">
					<h3 class="page-title">ค้นหาใบเสนอราคา &nbsp;<small>(Search Quotation)</small></h3>
				</div>
            </div>
            <div class="row">
				<!-- Start Portlet -->
				<form class="form-horizontal" role="form" method="post" id="insert_row" action="<?=base_url()?>quotation/save_quote_job">
				<input type="hidden" name="quote_id" value="<?=$quote_id?>" />
				<? for ($i = 0; $i < count($job_no); $i++) { ?>
							
							<div class="form-body">
								<div class="form-group">
									<label class="col-md-3 control-label">Job No.</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium job_no"  readonly="readonly" value=<?=$job_no[$i]?> >
										<span class="help-inline"></span>
										<input type="button" class="btn blue remove" onclick="" value="ลบ"   >
										<table class="table table-striped table-bordered table-hover" style="width:500px;">
											<thead>
												<tr role="row" class="heading">
													<th><input type="checkbox"  class="qcheck_all" /></th>
													<th>Description</th>
												</tr>
											</thead>
											<tbody>
											<? foreach ($job_search[$i]->result() as $r) : ?>
												<tr class="item_add">
													<th><input type="checkbox" class="q_check" name="job_line[]" value="<?=$r->job_line_id?>:<?=$r->job_id?>" /></th>
													<td><?=$r->description ?></td>
												</tr>
											<? endforeach ?>
											</tbody>
										</table>
										
								</div>
								</div>
								
							</div>		
							
				<? }?>
				<div style="text-align:center;">
					<input type="button" class="btn blue" onclick="window.location='<?=base_url()?>quotation/line/<?=$quote_id?>'" value="ย้อนกลับ"  />
					<? if(count($job_no) > 0) {?>
					<input type="submit" class="btn green" value="บันทึก"  />
					<? }?>
				</div>
				</form>		
				<br/><br/><br/><br/><br/>
				<form class="form-horizontal" role="form" method="post" id="get_row">
							
							
							
							
							<div class="form-body">
								<div class="form-group">
									<label class="col-md-3 control-label">Job No.</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-inline input-medium job_no" id="job_no"   name="job_no" readonly="readonly" >
										<span class="help-inline"></span>
										<input type="button" class="btn blue add1" onclick="" value="ค้นหา"   >
								</div>
								<div class="html_val"></div>
								</div>
							</div>
							
							
						</form>
				<!-- End Portlet -->
            </div>
            
            <div class="row">
				<form method="post" action="<?=base_url()?>/quotation/save_quote_job">
				<input type="hidden" name="quote_id" value="<?=$quote_id?>" />
				<input type="hidden" name="job_no" value="<?=isset($job_no)?$job_no:''?>" />
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
				</form>
			</div>
		
		
		
		<div id="myModal" class="modal fade " >
        <div class="modal-dialog" style="width:300px; ">
        	<form class="form-horizontal" role="form" method="post">
	            <div class="modal-content" >
	                
	                <div class="modal-body" style="width:300px;">
	                		<table class="table table-striped table-bordered table-hover" id="job_table" style="width:200px;">
							<thead>
							<tr>
								<td align="center" width="1%">job_no</td>
								<td align="center" width="12%">job_date</td>
								<td align="center" width="12%">job_end_date</td>
							</tr>
							</thead>
							<tbody>
							<?php if ($job_cus->num_rows() > 0) {?>
								<?php foreach($job_cus->result() as $j) { ?>
									<tr>
										<td align="center" width="1%"><a href="javascript:void(0)" ><?=$j->job_no?></a></td>
										<td align="center" width="12%"><a href="javascript:void(0)" ><?=$j->job_date?></a></td>
										<td align="center" width="12%"><a href="javascript:void(0)" ><?=$j->job_end_date?></a></td>
									</tr>
								<?php }?>
							<?php }?>
							</tbody>
							</table>	
	                		
	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
	                </div>
	            </div>
            </form>
        </div>
    </div>
    
		
			
			<script>

		//var itemClickObject;
		$(document).ready(function(){
			
			$('.remove').click(function(){
				job_no = $(this).parent().find("input[type='text']").val();
				window.location = "<?=base_url()?>quotation/remove_qj/"+job_no+"/<?=$quote_id?>";
			});


			
			$('.job_line').click(function(){
				console.log($(this).closest('thead').next().find("checkbox"));
				$(this).closest('table').find('tbody').find("checkbox").each(function(){
					//console.log("est");
					$(this).prop("checked",true);
					$(this).parent().addClass(".checked");
				})
			});

			
			$('#job_table tbody tr').click(function(){
				job_no = $(this).find("td").first().text();
				$('#job_no').val(job_no);
				//
				$("#myModal").modal('hide');
				$('#get_row').submit();
			});
			/*$('#job_table tbody tr').click(function(){
				job_no = $(this).find("td").first().text();
				$(itemClickObject).parent().find(".job_no").val(job_no);
				$("#myModal").modal('hide');
				alert("<?=base_url()?>job/get_job_line/"+job_no);
				$.get("<?=base_url()?>job/get_job_line/"+job_no,function(data){
					$(itemClickObject).closest(".form-body").find(".html_val").html(data);
					html ='<div class="form-body">'+
					'<div class="form-group">'+
						'<label class="col-md-3 control-label">Job No.</label>'+
						'<div class="col-md-9">'+
							'<input type="text" class="form-control input-inline input-medium job_no"   name="job_no[]" readonly="readonly" >'+
							'<span class="help-inline"></span>'+
							'<input type="button" class="btn blue add1" onclick=$("#myModal").modal("show"); value="ค้นหา"   >'+
					'</div>'+
					'<div class="html_val"></div>'+
					'</div>'+
					'</div>';
					$(itemClickObject).closest(".form-body").parent().append(html);
				
				});
			});*/

			
			$('.qcheck_all').click(function () {

				
				if($(this).is(':checked')){
					$(this).closest('table').find("tbody").find(".q_check").each(function() {
						//console.log($(this).parent());
			     		$(this).prop("checked",true);
			     		$(this).parent().addClass('checked');
			     		
			    	});
				}else{
					$(this).closest('table').find("tbody").find(".q_check").each(function() {
			     		$(this).prop("checked",false);
			     		$(this).parent().removeClass('checked');
			    	});
				}/**/
			});
			
			$(".add1").click(function(){
				itemClickObject = $(this);
	 	        $("#myModal").modal('show');
	 	    });
		});
		</script>
<?php $this->load->view("footer");?>