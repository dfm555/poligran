<div class="tools">
	<button id="addTeacher" class="btn btn-default">
		Nuevo
	</button>
	<br/><br/>
	<div class="panel panel-white">
		<div class="panel-heading">Datos profesores</div>
		<div class="panel-body">
			<table class="table table-hover table-striped table-bordered">
				<thead>
				<tr>
					<th>#</th>
					<th>Identificación</th>
					<th>Nombre completo</th>
					<th>Correo electrónico</th>
					<th>Oficina</th>
					<th>Teléfono</th>
					<th>Categoría</th>
					<th>Valor hora</th>
				</tr>
				</thead>
				<tbody>
				<?php $count = 1;
				if(is_array($teachers)):
					foreach($teachers as $rowTeacher): ?>
						<tr>
							<td><?php echo $count ?></td>
							<td><?php echo $rowTeacher['identification'] ?></td>
							<td><?php echo $rowTeacher['full_name'] ?></td>
							<td><?php echo $rowTeacher['email'] ?></td>
							<td><?php echo $rowTeacher['office'] ?></td>
							<td><?php echo $rowTeacher['phone_number'] ?></td>
							<td><?php echo $rowTeacher['category'] ?></td>
							<td><?php echo $rowTeacher['amount_hour'] ?></td>
							<td>
								<div class="btn-group-xs">
									<button id="" data-user="<?php echo $rowTeacher['id_teacher'] ?>" data-id="<?php echo $rowTeacher['id_person'] ?>" class="btn btn-blue editTeacher">
										<i class="fa fa-edit"></i>
									</button>
									<button id="" data-user="<?php echo $rowTeacher['id_teacher'] ?>" data-id="<?php echo $rowTeacher['id_person'] ?>" class="btn btn-danger deleteTeacher">
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