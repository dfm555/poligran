<div class="page-form">
	<div class="panel panel-blue">
		<div class="panel-body pan">
			<form action="/index/login" method="post" class="form-horizontal" data-parsley-validate>
				<div class="form-body pal">
					<div class="col-md-12 text-center">
						<h1 style="margin-top: -90px; font-size: 48px;">
							Universidad Calasanz</h1>
						<br />
					</div>
					<div class="form-group">
						<div class="col-md-3">
							<img src="<?php echo BASE_RESOURCES?>images/avatar/profile-pic.png" class="img-responsive" style="margin-top: -35px;" />
						</div>
						<div class="col-md-9 text-center">
							<?php if(isset($error)): ?>
								<div class="alert alert-danger alert-dismissable">
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
									<strong>Error!</strong> usuario o contraseña incorrecto, intente de nuevo.</div>
							<?php endif ?>
							<h1>
								Por favor.</h1>
							<br />
							<p>
								Ingrese sus datos para iniciar sesión</p>
						</div>
					</div>
					<div class="form-group">
						<label for="inputName" class="col-md-3 control-label">
							Usuario:</label>
						<div class="col-md-9">
							<div class="input-icon right">
								<i class="fa fa-user"></i>
								<input id="inputName" name="username" type="text" placeholder="" class="form-control" required /></div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword" class="col-md-3 control-label">
							Contraseña:</label>
						<div class="col-md-9">
							<div class="input-icon right">
								<i class="fa fa-lock"></i>
								<input id="inputPassword" type="password" name="password" placeholder="" class="form-control" required/></div>
						</div>
					</div>
					<div class="form-group mbn">
						<div class="col-lg-12" align="right">
							<div class="form-group mbn">
								<div class="col-lg-3">
									&nbsp;
								</div>
								<div class="col-lg-9">
									<button type="submit" class="btn btn-default">
										Ingresar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-lg-12 text-center">
		<p>
			Olvido sus datos?
		</p>
	</div>
</div>