<?
$f = @$_GET['f'];
switch($f){
	case 'logout':
		//session_destroy();
		header("Location: enter");
		break;
	case 'ingresara_punto':
	echo '<a href="#" style="font-size:10px;float:right;" onclick="show_hide(\'trel\')">[X]</a>';
		echo '<h2>Únete a punto</h2>';
		echo '<div style="background-color:#fff;width:inherit;height:inherit;border-bottom:1px solid#ddd;border-right:1px solid#ddd;border-left:1px solid#ddd;"></div>';
		break;
	case 'crear_punto':
	echo '<a href="#" style="font-size:10px;float:right;" onclick="show_hide(\'trel\')">[X]</a>';
		echo '<h2>Crear punto</h2>';
		echo '<div style="background-color:#fff;width:inherit;height:inherit;border-bottom:1px solid#ddd;border-right:1px solid#ddd;border-left:1px solid#ddd;"></div>';
		break;

<<<<<<< HEAD


=======
	
	
>>>>>>> 2021aae5cf11f7893fda4493a6e74938c00c72f0
}


?>
