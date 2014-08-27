<table>
	<thead>
								<tr role="row" class="heading">
									<th width="5%">
										 Secment 1
									</th>
									<th width="15%">
										 Secment 2
									</th>
									<th width="15%">
										 Secment 3
									</th>
									<th width="10%">
										Secment 4
									</th>
									<th width="10%">
										 Price
									</th>
									<th width="10%">
										 Unit Cost
									</th>
									<th width="10%">
										 Mat. Cost
									</th>
									<th width="10%">
										 M / H
									</th>
								</tr>
								
								</thead>
								<tbody>
								<? foreach ($sale_item->result() as $r) : ?>
									<tr>
										
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


