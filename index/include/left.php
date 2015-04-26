<!--BEGIN SIDEBAR MENU-->
<nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
     data-position="right" class="navbar-default navbar-static-side">
	<div class="sidebar-collapse menu-scroll">
		<ul id="side-menu" class="nav">

			<div class="clearfix"></div>
			<li class="<?php echo ($section == 'index')?'active':''; ?>"><a href="<?php HOST ?>/index"><i class="fa fa-tachometer fa-fw">
						<div class="icon-bg bg-orange"></div>
					</i><span class="menu-title">Dashboard</span></a>
			</li>
			<li class="<?php echo ($section == 'teacher')?'active':''; ?>"><a href="<?php HOST ?>/teacher"><i class="fa fa-group fa-fw">
						<div class="icon-bg bg-pink"></div>
					</i><span class="menu-title">Profesores</span></a>

			</li>
			<li class="<?php echo ($section == 'student')?'active':''; ?>"><a href="<?php HOST ?>/student"><i class="fa fa-graduation-cap fa-fw">
						<div class="icon-bg bg-green"></div>
					</i><span class="menu-title">Estudiantes</span></a>

			</li>
			<li class="<?php echo ($section == 'career')?'active':''; ?>"><a href="<?php HOST ?>/career"><i class="fa fa-university fa-fw">
						<div class="icon-bg bg-violet"></div>
					</i><span class="menu-title">Carreras</span></a>

			</li>
			<li class="<?php echo ($section == 'subject')?'active':''; ?>"><a href="<?php HOST ?>/subject"><i class="fa fa-book fa-fw">
						<div class="icon-bg bg-blue"></div>
					</i><span class="menu-title">Materias</span></a>

			</li>
		</ul>
	</div>
</nav>
<!--END SIDEBAR MENU-->