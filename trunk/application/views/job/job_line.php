<table class="table table-striped table-bordered table-hover" style="width:500px;">
											<thead>
												<tr role="row" class="heading">
													<th><input type="checkbox" class="job_line" /></th>
													<th>Description</th>
												</tr>
											</thead>
								<tbody>
								<? foreach ($job_line->result() as $r) : ?>
									<tr class="item_add">
										<th><input type="checkbox" name="job_line" value="<?=$r->job_line_id?>" /></th>
										<td><?=$r->description?></td>
									</tr>
								<? endforeach ?>
								</tbody>
</table>
