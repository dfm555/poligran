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
				</tr>
				</thead>
				<tbody>
				<?php $count = 1; foreach($admins as $rowAdmin): ?>
				<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $rowAdmin['identification'] ?></td>
				<td><?php echo $rowAdmin['full_name'] ?></td>
				<td><?php echo $rowAdmin['email'] ?></td>
				<td><?php echo $rowAdmin['type'] ?></td>
				</tr>
				<?php $count++; endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
