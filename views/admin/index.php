<div class="tools">
	<button id="addAdmin" class="btn btn-default">
		Nuevo
	</button>
	<br/><br/>
	<div class="panel panel-white">
		<div class="panel-heading">Datos administrador</div>
		<div class="panel-body">
			<table class="table table-hover table-striped table-bordered">
				<thead>
				<tr>
					<th>#</th>
					<th>Identificación</th>
					<th>Nombre completo</th>
					<th>Correo electrónico</th>
					<th>Type</th>
					<th>actions</th>
				</tr>
				</thead>
				<tbody>
				<?php $count = 1;
				if(is_array($admins)):
				foreach($admins as $rowAdmin): ?>
				<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $rowAdmin['identification'] ?></td>
				<td><?php echo $rowAdmin['full_name'] ?></td>
				<td><?php echo $rowAdmin['email'] ?></td>
				<td><?php echo $rowAdmin['type'] ?></td>
				<td>
					<div class="btn-group-xs">
						<button id="editAdmin" data-id="<?php echo $rowAdmin['id_person'] ?>" class="btn btn-blue">
							<i class="fa fa-edit"></i>
						</button>
						<button id="deleteAdmin" data-user="<?php echo $rowAdmin['id_admin'] ?>" data-id="<?php echo $rowAdmin['id_person'] ?>" class="btn btn-danger">
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
