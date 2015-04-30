<div class="tools">
	<button id="addCareer" class="btn btn-default">
		Nuevo
	</button>
	<br/><br/>
	<div class="panel panel-white">
		<div class="panel-heading">Datos Carreras</div>
		<div class="panel-body">
			<table class="table table-hover table-striped table-bordered">
				<thead>
				<tr>
					<th>#</th>
					<th>Código</th>
					<th>Nombre</th>
					<th>Créditos</th>
					<th>Valor semestre</th>
					<th>Semestres</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php $count = 1;
				if(is_array($careers)):
					foreach($careers as $rowCareer): ?>
						<tr>
							<td><?php echo $count ?></td>
							<td><?php echo $rowCareer['code'] ?></td>
							<td><?php echo $rowCareer['name'] ?></td>
							<td><?php echo $rowCareer['quantity_credits'] ?></td>
							<td><?php echo $rowCareer['amount'] ?></td>
							<td><?php echo $rowCareer['quantity_semester'] ?></td>
							<td>
								<div class="btn-group-xs">
									<button id="" data-id="<?php echo $rowCareer['id_career'] ?>" class="btn btn-blue editCareer">
										<i class="fa fa-edit"></i>
									</button>
									<button id="" data-id="<?php echo $rowCareer['id_career'] ?>" class="btn btn-danger deleteCareer">
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