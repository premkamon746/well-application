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
												</tr>
											</thead>
								<tbody>
								<? foreach ($sale_item->result() as $r) : ?>
									<tr class="item_add">
										<td><?=$r->segment1?></td>
										<td><?=$r->segment2?></td>
										<td><?=$r->segment3?></td>
										<td><?=$r->segment4?></td>
										<td><?=$r->price?></td>
										<td><?=$r->unit_cost?></td>
										<td><?=$r->wage_cost?></td>
										<td><?=$r->man_hour?></td>
									</tr>
								<? endforeach ?>
								</tbody>
</table>
<script>
	$(document).ready(function(){
		$(".item_add").click(function(){

			price_row =  parseInt($(this).children().get(4).innerHTML);
			all_price =  $("#price").val()==""?0:parseInt($("#price").val());


			all_quantity =  $("#quantity").val()==""?0:parseInt($("#quantity").val());
			all_quantity +=1;
			if(all_quantity >= 0){
				$("#quantity").val(all_quantity);
			}else{
				all_quantity= 0;
			}
			
			price = all_price+price_row;
			total = price* all_quantity;
			
			$("#price").val(price);
			$("#toprice").val(total);
			
			$("#item_list").append("<tr>"+$(this).html()+"<td><a href='javascript:void(0);' onclick='removeParent(this);'>remove</a></td></tr>");
		});

	});

	function removeParent(obj){
		price_row = parseInt($(obj).parent().parent().children().get(4).innerHTML);
		all_price =  $("#price").val()==""?0:parseInt($("#price").val());

		all_quantity =  $("#quantity").val()==""?0:parseInt($("#quantity").val())-1;
		if(all_quantity >= 0){
			$("#quantity").val(all_quantity);
		}else{
			all_quantity= 0;
		}

		price = all_price-price_row;
		total = price* all_quantity;
		
		$("#price").val(price);
		$("#toprice").val(total);
		$(obj).parent().parent().remove();
	}
</script>

