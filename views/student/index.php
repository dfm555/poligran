<div class="tools">
	<button id="addStudent" class="btn btn-default">
		Nuevo
	</button>
	<br/><br/>
	<div class="panel panel-white">
		<div class="panel-heading">Datos Estudiantes</div>
		<div class="panel-body">
			<table class="table table-hover table-striped table-bordered">
				<thead>
				<tr>
					<th>#</th>
					<th>Identificación</th>
					<th>Nombre completo</th>
					<th>Correo electrónico</th>
					<th>Apodo</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php $count = 1;
				if(is_array($students)):
					foreach($students as $rowStudent): ?>
						<tr>
							<td><?php echo $count ?></td>
							<td><?php echo $rowStudent['identification'] ?></td>
							<td><?php echo $rowStudent['full_name'] ?></td>
							<td><?php echo $rowStudent['email'] ?></td>
							<td><?php echo $rowStudent['nickname'] ?></td>
							<td>
								<div class="btn-group-xs">
									<button id="" data-user="<?php echo $rowStudent['id_student'] ?>" data-id="<?php echo $rowStudent['id_person'] ?>" class="btn btn-blue editStudent">
										<i class="fa fa-edit"></i>
									</button>
									<button id="" data-user="<?php echo $rowStudent['id_student'] ?>" class="btn btn-dark manageStudent">
										<i class="fa fa-cog"></i>
									</button>
									<button id="" data-user="<?php echo $rowStudent['id_student'] ?>" data-id="<?php echo $rowStudent['id_person'] ?>" class="btn btn-danger deleteStudent">
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