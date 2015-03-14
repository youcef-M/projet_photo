	&nbsp;
	&nbsp;
	<div class="row" >
		<div class="col-sm-4">
			<h2>Serveur</h2>
			<?php var_dump($_SERVER); ?>
		</div>							
		<div class="col-sm-4">
			<h2>Constantes</h2>
			<?php var_dump(get_defined_constants()); ?>
		</div>							
		<div class="col-sm-4">
			<h2> Session </h2>
			<?php var_dump($_SESSION); ?>
		</div>							
	</div>