<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Load Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Load Font Awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- Load Materialize-CSS -->
	<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
	<!-- Load JQuery 3.1.1 -->
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
	<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Load Roboto Font -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
<!-- Load Custom CSS -->
	<link rel="stylesheet" href="./res/css/custom.css">
<!-- Load Icon Server-->
    <link rel="icon" href="./res/img/favicon.ico">


	<?php
		//load config 
		$configs = include('./res/templates/config.php');
		// get ip server
		$serverip = $configs -> ipaddress;
		//get port id
		$serverport =  $configs -> port;
		//call api
		$status = json_decode(file_get_contents('https://api.mcsrvstat.us/2/' . $serverip));
		//check server status
		if($status -> online == true)
        {
            $online = true;

        }else {
            $online = false;
        }
	?>

<!-- Load Nav Bar -->

	<script>
		$( document ).ready(function(){
			$(".button-collapse").sideNav();
		})
	</script>
	
	<div class="row">
		<nav>
		<div class="header">
			<div class="nav-wrapper">
				<div class="col s12">
					<a href="<?php echo $configs->title_link?>" class="brand-logo"><?php echo $configs->title?></a>
					<a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<?php
						
							foreach ($configs->navbarlinks as $key => $navbarlink) {
								
								$navbarlinkdestination =  $configs->navbarlinkdestinations[$key];
								
								echo '<li><a href="'. $navbarlinkdestination .'">'. $navbarlink .'</a></li>';
								
							}
						
						?>
					</ul>
					<ul class="side-nav" id="mobile-nav">
						<?php
						
							foreach ($configs->navbarlinks as $key => $navbarlink) {
								
								$navbarlinkdestination =  $configs->navbarlinkdestinations[$key];
								
								echo '<li><a href="'. $navbarlinkdestination .'">'. $navbarlink .'</a></li>';
								
							}
						
						?>
					</ul>
				</div>
			</div>
		</div>
		</nav>
	</div>