<?php
require_once 'JunarApi.php';

if(isset($_POST)){
	if(isset($_POST['lon'])){
		$lon = $_POST['lon'];
	}
	else{
		$lon = -72.613022;
	}
	if(isset($_POST['lat'])){
		$lat = $_POST['lat'];
	}
	else{
		$lat = -38.734276; 
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>default</title>
	<link rel="stylesheet" type="text/css" href="style/start.css"/>
	<script type="text/javascript" src="scripts/dynamic.js"></script>
	<script type="text/javascript">
	  var disqus_title = 'Titulo Discusion!';
	  var disqus_identifier = 'room-1023';
	  var api_key = 'QWxsoA3jNhXc5y3M3wQC8Nkh7G91KAj2L5flmWYPXgDq0rd3CWPP1dC2XsEChtkQ';
	</script>
	
<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.5&region=CL&sensor=true"></script>
	<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

    
	var punto = new google.maps.LatLng("<?php echo $lat;?>"+','+ "<?php echo $lon;?>");

    function initialize() {

		var map = new google.maps.Map(document.getElementById('map'), {
		    zoom: 9,
		    center: punto,
		    mapTypeId: google.maps.MapTypeId.ROADMAP,
		    mapTypeControlOptions: {
		      position: google.maps.ControlPosition.TOP_LEFT,
		      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
		    }
	    });
	}
	</script>
</head>
<body onload="initialize()">
<div id="fb-root"></div>

	<div id="header">
		<div id="header_content">
		Usuario&nbsp;
		<div id="logout_button" style="width:60px;height:20px;background-color:#605A55;display:inline-block;text-align:center;border:1px solid#999;"><a href="q.php?f=logout">LogOut</a></div>
		</div>
	</div>
	<div id="middle">
		<div id="content">
			<div id="trel" style="visibility:hidden;position:absolute;top:150px;left:200px;background-color:#ddd;width:250px;height:250px;"></div>
			<?php
			$result = get_locale_data(-38.734276,-72.613022);
			
			while($row = mysql_fetch_array($result))
		  	{
			?>
			<div id="desc">
			<?php
			#cat.name, loc.descripcion_local
			echo $row['name'].': '.$row['descripcion_local'];
			?>
			</div>
			<?php 
		  	}
			?>
			<div id='map' style='width:400px; height:200px;border-bottom:1px dashed #DDD;float:left;'></div>
			<!-- <div id="tt_k"></div>-->
			<div id="sidebar">
				<p margin-top: 0;>
					INICIO:<span class="box_se">4&nbsp;Dic&nbsp;2011 - 16:00 hrs</span>
					<br/>
					FINAL:<span class="box_se">5&nbsp;Dic&nbsp;2011 - 18:00 hrs</span>
				</p>
				<br/>
				
				<p>
					Usuarios conectados: 6
				</p>
				<p id="e_comuna">
<<<<<<< HEAD
					<div id="show_comuna" style="float:left;background-color:#ddd;width:300px;margin-left:20px">
					<h2 style="margin-left: 10px">Información sobre comuna</h2>
					<div style="padding: 5px;background-color:#F9F9F9;border-left:1px dashed#ddd;border-bottom:1px dashed#ddd;border-right:1px dashed#ddd;">
					
<?php
					
					
					#1
					$comuna = 'Las Condes'; //static
					
					
					$data = get_info_data($comuna,20);
					$result = $data['result'];
					
					echo $data['description'].": ";
					
					for($i = 2; $i < sizeof($result); ++$i){
						$value = $result[$i];
					  	if($comuna == $value[0]){
					   		echo $value[1];
					   		echo " (".$value[2]."%)";
					   		echo "<br /><br />";
					  	}
					}
					
					#2
					$data = get_info_data_homic($comuna,20);
					$result = $data ['result'];
 
					echo $data['description'].": ";
					 
					for($i = 2; $i < sizeof($result); ++$i){
					  $value = $result[$i];
					  if($comuna == $value[0]){
					   echo $value[1];
					   echo " (".$value[2]."%)";
					    echo "<br /><br />";
					  }  
					 }
					 
					#3
					$data = get_info_data_hurto($comuna,20);
					$result = $data ['result'];
 
					echo $data['description'].": ";
					 
					for($i = 2; $i < sizeof($result); ++$i){
					  $value = $result[$i];
					  if($comuna == $value[0]){
					   echo $value[1];
					   echo " (".$value[2]."%)";
					    echo "<br /><br />";
					  }  
					 }
					 
					#4
					$data = get_info_data_robo($comuna,20);
					$result = $data ['result'];
 
					echo $data['description'].": ";
					 
					for($i = 2; $i < sizeof($result); ++$i){
					  $value = $result[$i];
					  if($comuna == $value[0]){
					   echo $value[1];
					   echo " (".$value[2]."%)";
					    echo "<br /><br />";
					  }  
					 }
					 
					#5
					$data = get_info_data_rlnh($comuna,20);
					$result = $data ['result'];
 
					echo $data['description'].": ";
					 
					for($i = 2; $i < sizeof($result); ++$i){
					  $value = $result[$i];
					  if($comuna == $value[0]){
					   echo $value[1];
					   echo " (".$value[2]."%)";
					    echo "<br /><br />";
					  }  
					 }
					 
					 #6
					$data = get_info_data_rcf($comuna,20);
					$result = $data ['result'];
 
					echo $data['description'].": ";
					 
					for($i = 2; $i < sizeof($result); ++$i){
					  $value = $result[$i];
					  if($comuna == $value[0]){
					   echo $value[1];
					   echo " (".$value[2]."%)";
					    echo "<br /><br />";
					  }  
					 }
					 
					 #7
					$data = get_info_data_rcs($comuna,20);
					$result = $data ['result'];
 
					echo $data['description'].": ";
					 
					for($i = 2; $i < sizeof($result); ++$i){
					  $value = $result[$i];
					  if($comuna == $value[0]){
					   echo $value[1];
					   echo " (".$value[2]."%)";
					    echo "<br /><br />";
					  }  
					 }
					 
					 #8
					$data = get_info_data_rcv($comuna,20);
					$result = $data ['result'];
 
					echo $data['description'].": ";
					 
					for($i = 2; $i < sizeof($result); ++$i){
					  $value = $result[$i];
					  if($comuna == $value[0]){
					   echo $value[1];
					   echo " (".$value[2]."%)";
					  }  
					 }
					?>
					
					
					</div>
					</div>
=======
					
					<div id="show_comuna" style="position:absolute;top:198px;left:145px;float:right;background-color:#ddd;width:300px;height:300px;"><h2>Datos de comuna</h2><div style="width:inherit;height:inherit;background-color:#F9F9F9;border-left:1px dashed#ddd;border-bottom:1px dashed#ddd;border-right:1px dashed#ddd;"></div></div>
>>>>>>> 2021aae5cf11f7893fda4493a6e74938c00c72f0
				</p>

				<div style="float: left;margin-top: 50px">
				<p id="salir" style="border: none"><input type="button" value="Salir" onclick="window.location.href='start.php'"/>
				</div>
				
			</div>
<<<<<<< HEAD

			<div id="disqus_thread" style="float: left;width: 400px"></div>
			<script type="text/javascript">
			    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
			    var disqus_shortname = 'puntoseguro'; // required: replace example with your forum shortname
			    var disqus_developer = 1; // 1 for dev mode
			
			    /* * * DON'T EDIT BELOW THIS LINE * * */
			    (function() {
			        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
			        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			    })();
			</script>
			<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
=======
			<div id="comments">
				<div class="s_coment_a"><h2>User</h2><p>Comments</p><div class="dt">04-Dic-2011</div></div>
				<div class="s_coment_b"><h2>User</h2><p>Comments</p><div class="dt">04-Dic-2011</div></div>
				<div class="s_coment_a"><h2>User</h2><p>Comments</p><div class="dt">04-Dic-2011</div></div>
				<div class="s_coment_b"><h2>User</h2><p>Comments</p><div class="dt">04-Dic-2011</div></div>
				<br/>
				<form name="new_msg">
				
					Tu opinión:<br/> <textarea name="msg" cols="50" rows="10"></textarea>
									<input type="button" value="Opinar"/>
				</form>
			</div>
>>>>>>> 2021aae5cf11f7893fda4493a6e74938c00c72f0
			
		</div>
	</div>
	<div id="footer">
	
	</div>
<<<<<<< HEAD
	
=======
	<script type="text/javascript">
	var e_comuna = new clickOpt("ecomuna_1", "rels");
	e_comuna.setDivtoReload('show_comuna'); e_comuna.setPagetoRequest('q.php'); e_comuna.setAttrs('f=ecomuna'); e_comuna.setMethod('GET');
	e_comuna.run();
	</script>
>>>>>>> 2021aae5cf11f7893fda4493a6e74938c00c72f0
</body>
</html>
<?php 
function get_locale_data($latitude, $longitude)
{
	$link =  mysql_connect('localhost', 'root', 'walkirias84');
	if (!$link) {
	    die('Error al conectarse: ' . mysql_error());
	}
	else {
		$sql= "
			select cat.name, loc.descripcion_local from puntoseguro.local as loc
			inner join puntoseguro.local_category as cat
				on cat.id = loc.category_id
			and loc.lat = $latitude
			and loc.lng = $longitude
		";
		
		mysql_select_db("puntoseguro", $link);
	
		$result = mysql_query($sql);
	
		mysql_close($link);
		
		return $result;
	}
}
?>
