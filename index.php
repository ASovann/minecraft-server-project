<html>
<head>
	<?php include './res/templates/head.php';?>
</head>
<body>
<div class="container">
	<div class="row">
		<ul class="collapsible popout" data-collapsible="accordion">
			
			<?php
			
				foreach ($configs->servernames as $key => $servername) {
					
					$serverip =  $configs->serverips[$key];
					$serverport =  $configs->serverports[$key];
					

						$json = file_get_contents('https://mcapi.us/server/status?ip=' . $serverip . '&port=' . $serverport);
						$data = json_decode($json,true);
					
						$status = $data['status'];
						$online = $data['online']; 
						$motd = $data['motd']; 
											   
						$error = $data['error']; 
												 
												 
						//$serverimage = 'https://mcapi.us/server/image?ip=' . $serverip . '&port=' . $serverport;
						$maxplayers = $data['players']['max']; 
						$currentplayers = $data['players']['now']; 
						$serverversion = $data['server']['name']; 
						$serverprotocol = $data['server']['protocol'];
						$lastonlinestamp = $data['last_online'];
						$lastupdatedstamp = $data['last_updated'];

						$lastonline = date('d-m-Y H:i:s', intval($lastonlinestamp));
						$lastupdated = date('d-m-Y H:i:s', intval($lastupdatedstamp));
						
					echo '
					
					<li>
						<div class="collapsible-header"><i class="material-icons">';
						
								
								if ($online == 1) {
									
									echo "check_circle";
									
								}
								else {
									
									echo "cancel";
									
								}
							
							echo '</i>'. $servername .'<span class="secondary-content">';
							
								if ($online == 1) {
									
									echo $currentplayers . '/' . $maxplayers;
									
								}
								else {
									
									echo "Offline";
									
								}
							
							echo '</span></div>
						<div class="collapsible-body"><p>';
						
							if ($online == 1) {
								
								echo '
									Online
									<br>
									Motd: '. $motd .'
									<br>
									Players: '. $currentplayers .'/'. $maxplayers .'
									<br>
									Server Version: '. $serverversion .'';
									
										if (!$lastonline == NULL) {
											
											echo '<br>Last Online: '. $lastonline .'';
											
										}
										
										if (!$lastupdated == NULL) {
											
											echo '<br>Last Updated: '. $lastupdated .'';
											
										}
									
									'
									
								
								';
								
							}
							else {
								
								if ($error == 'missing data' | $error == 'invalid hostname or port' | substr($error, 0, strlen($error)) === 'internal server error') {
									
									echo $error;
									
								}
								else {
									
									echo "Server is offline.";
									
								}
								
							}
						
						echo '</p></div>
					</li>
					
					';
				}
			?>
			
		</ul>
	</div>
</div>
	<?php include './res/templates/footer.php';?>
</body>
</html>