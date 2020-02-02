<?php
include('inc/header.php');

echo "<div id='blue'>
	<h3 class='text-center text-danger'>Permiso para ver pagina Negado</h3>
</div>
<div class='container'>
	<p>Esta pagina tiene contenido al cual usted no esta autorizado.</p>

	<p>Tambien, puede hablar con el Administrador de la pagina para ver como obtener aceso a dicha pagina.</p>

	<div class='mb centered'>
		<a class='btn btn-primary' href='index.php'>Ir a Inicio!</a>
	</div>
</div>";

include('inc/footer.php');
?>