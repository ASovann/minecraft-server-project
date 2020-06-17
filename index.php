<html>
<head>
    
    <?php include './res/templates/head.php';?>
   
</head>
<body>
<div class="container">
	<?php
        echo'
            <div class="black centered"></div>

                <div class="row">

                    <div class="col-sm-12 all">

                        <div class="icon">';
                            if ($online) {
                                $icon = 'https://api.mcsrvstat.us/icon/' . $serverip;
                                echo '<img src='. $icon .'>';
                            }

                        echo '</div> 
                        <div class="logo">';
                            if ($online) {
                                $icon = 'https://api.mcsrvstat.us/icon/' . $serverip;
                                echo '<img src='. $icon .'>';
                            }

                        echo '</div> 
                        <div class="info_and_status">
                            <h1><span id="sv_ip">' . $configs -> ipaddress . '</span><br>
                            <span id="status">status: ';
                            if($online) {
                                echo 'ONLINE';
                            }
                            else {
                                echo 'OFFLINE';
                            }
                            echo'</span></h1>
                            <h2 id="players_num">Players: ';
                            if($online){
                                echo $status -> players -> online .'/'. $status -> players -> max;
                            }else {
                                echo 'none';
                            }
                            echo '</h2>

                            <h3 id="version">Version: ';
                            if($online) {
                                echo $status -> version;
                            }
                            echo '</h3><h3 id="version">Motd: ';
                            if($online) {
                                foreach($status -> motd -> html as $motd){
                                    echo $motd .'<br />';
                                };
                            }
                            echo '</h3>';
                            if($online){
                                echo '<a href="./map">MAP</a>';      
                            }
                            echo '
                        </div>
                    </div>
                </div>
            </div>
        ';
    ?>
</div>
	<?php include './res/templates/footer.php';?>
</body>
</html>