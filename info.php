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
                        <h2>Info</h2>
                        <h5>';
                            if($online){
                                echo   'Address Ip: ' .$status->ip . '<br/>
                                        Port: ' . $status->port . '<br/>
                                        hostame: ' . $status->hostname . '<br/>
                                        Motd: ' . $status->motd->html[0] . '<br/>
                                        player Online: ' . $status->players->online . '<br/>
                                        Player Max: ' . $status->players->max .'<br/>
                                        Version: ' . $status->version . '<br/>
                                        Software: ' . $status->software . '<br/>
                                        Ping: ' ; if($status->debug->ping == 1){
                                            echo 'true';
                                        }
                                        echo '<br/>
                                        Query: ' . $status->debug->query . '<br/>
                                        srv: ' . $status->debug->srv . '<br/>
                                        ip in srv: ' . $status->debug->ipinsrv . '<br/>
                                        cname in srv: ' . $status->debug->cnameinsrv . '<br/>
                                        animated motd: ' . $status->debug->animatedmotd . '<br/>
                                        cache time: ' . $status->debug->cachetime . '<br/>
                                        protocol: ' . $status->protocol . '<br/>';
                            }
                            echo
                        '</h5>
                    </div>
                </div>
            </div>
        ';
    ?>
</div>
	<?php include './res/templates/footer.php';?>
</body>
</html>