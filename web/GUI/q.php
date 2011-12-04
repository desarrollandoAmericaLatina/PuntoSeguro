<?
$f = @$_GET['f'];
switch($f){
	case 'logout':
		//session_destroy();
		header("Location: enter");
		break;
	case 'ingresara_punto':
	echo '<a href="#" style="font-size:10px;float:right;" onclick="show_hide(\'trel\')">[X]</a>';
		echo '<h2>Ingresa a punto</h2>';
		break;
	case 'crear_punto':
	echo '<a href="#" style="font-size:10px;float:right;" onclick="show_hide(\'trel\')">[X]</a>';
		echo '<h2>Crear punto</h2>';
		break;

	
	
}


?>
