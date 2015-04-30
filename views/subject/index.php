<div class="tools">
	<button id="addSubject" class="btn btn-default">
		Nuevo
	</button>
	<br/><br/>
	<div class="panel panel-white">
		<div class="panel-heading">Datos Materias</div>
		<div class="panel-body">
			<table class="table table-hover table-striped table-bordered">
				<thead>
				<tr>
					<th>#</th>
					<th>Código</th>
					<th>Nombre</th>
					<th>Créditos</th>
					<th>Ciclo</th>
					<th>Aula</th>
					<th>Descripción</th>
					<th>Horas semanales</th>
					<th>Cupos</th>
				</tr>
				</thead>
				<tbody>
<?php $count = 1;
				if(is_array($subjects)):
					foreach($subjects as $rowSubject): ?>
						<tr>
							<td><?php echo $count ?></td>
							<td><?php echo $rowSubject['code'] ?></td>
							<td><?php echo $rowSubject['name'] ?></td>
							<td><?php echo $rowSubject['quantity_credits'] ?></td>
							<td><?php echo $rowSubject['cycle'] ?></td>
							<td><?php echo $rowSubject['room'] ?></td>
                                                        <td><?php echo $rowSubject['description'] ?></td>
                                                        <td><?php echo $rowSubject['weekly_hours'] ?></td>
                                                        <td><?php echo $rowSubject['place_available'] ?></td>
							<td>
								<div class="btn-group-xs">
									<button id="" data-id="<?php echo $rowSubject['id_subject'] ?>" class="btn btn-blue editSubject">
										<i class="fa fa-edit"></i>
									</button>
									<button id="" data-id="<?php echo $rowSubject['id_subject'] ?>" class="btn btn-danger deleteSubject">
										<i class="fa fa-trash-o"></i>
									</button>
								</div>
							</td>
						</tr>
						<?php $count++; endforeach; endif?>
				</tbody>
			</table>
		</div>
	</div>
</div>