<?require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>default</title>
	<link rel="stylesheet" type="text/css" href="style/default.css"/>
	<script type="text/javascript" src=""></script>
</head>
<body>
	<div id="header_content">Header Content</div>
	<div id="middle_content">
		<div id="sidebar">
		
		</div>
		<div id="content">
		
		</div>
	</div>
	<div id="footer">
	
	</div>
	<script type="text/javascript"></script>
</body>
</html>
