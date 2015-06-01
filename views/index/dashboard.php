<div id="sum_box" class="row mbl">
	<div class="col-sm-6 col-md-3">
		<div class="panel profit db mbm">
			<div class="panel-body">
				<p class="icon">
					<i class="icon fa fa-graduation-cap"></i>
				</p>
				<h4 class="value">
					<span><?php echo $students; ?></span>
				</h4>
				<p class="description">
					Estudiantes</p>
				<div class="progress progress-sm mbn">
					<div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
					     style="width: <?php echo $students ?>%;" class="progress-bar progress-bar-success">
						<span class="sr-only"><?php echo $students ?>% Complete (success)</span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="panel income db mbm">
			<div class="panel-body">
				<p class="icon">
					<i class="icon fa fa-university"></i>
				</p>
				<h4 class="value">
					<span><?php echo $careers; ?></span>
				</h4>
				<p class="description">
					Carreras</p>
				<div class="progress progress-sm mbn">
					<div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
					     style="width: <?php echo $careers; ?>%;" class="progress-bar progress-bar-info">
						<span class="sr-only"><?php echo $careers; ?>% Complete (success)</span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="panel task db mbm">
			<div class="panel-body">
				<p class="icon">
					<i class="icon fa fa-book"></i>
				</p>
				<h4 class="value">
					<span><?php echo $subjects; ?></span></h4>
				<p class="description">
					Materias</p>
				<div class="progress progress-sm mbn">
					<div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
					     style="width: <?php echo $careers; ?>%;" class="progress-bar progress-bar-danger">
						<span class="sr-only"><?php echo $careers; ?>% Complete (success)</span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="panel visit db mbm">
			<div class="panel-body">
				<p class="icon">
					<i class="icon fa fa-group"></i>
				</p>
				<h4 class="value">
					<span><?php echo $teachers; ?></span></h4>
				<p class="description">
					Profesores</p>
				<div class="progress progress-sm mbn">
					<div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
					     style="width: <?php echo $careers; ?>%;" class="progress-bar progress-bar-warning">
						<span class="sr-only"><?php echo $careers; ?>% Complete (success)</span></div>
				</div>
			</div>
		</div>
	</div>
</div>