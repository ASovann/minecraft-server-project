<html>
<head>
    <?php include './res/templates/head.php';?>
</head>
<body>
<div class="container">
    <?php
        echo '<div class="black centered"></div>

            <div class="row">

                <div class="col-sm-12 all">
                    <h2 id="players_num">Players: ';
                    if($online){
                        $player_num = $status -> players -> online;
                        echo $player_num .'/'. $status -> players -> max;
                    }else {
                        echo 'none';
                    }
                    echo '</h2>
                    <div class="list">';
                        if($online) {
                            $player_num = $status -> players -> online;
                            if($player_num > 0) {
                                echo '<table class="table table-bordered table-dark table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Head</th>
                                            <th scope="col">Players</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        foreach ($status->players->list as $player) {
                                            echo '<tr>
                                                    <th scope="row"><img src="https://minotar.net/avatar/' . $player . '/50"</th>
                                                    <td>' . $player . '
                                                </tr>';
                                        }
                                    echo'</tbody>
                                </table>';
                            }
                        }

                    echo'</div>
                </div>
            </div>
        ';
    ?>
    </div>
</div>
<?php include './res/templates/footer.php';?>
</body>
</html>