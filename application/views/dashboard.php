<?php ob_start();?>
	
	<h1>Selamat Datang di Master Mobil !</h1>

<?php
	$data = ob_get_clean();
	include('application/views/template.php');
	ob_flush();
?>