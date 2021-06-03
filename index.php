<?php
    require "fnc.php";
    session_start();
    if(!isset($_SESSION["file"]))
    {
        loadfile();
        $_SESSION["mode"]="比賽";
        $_SESSION["win"]=0;
        $_SESSION["lost"]=0;
        $_SESSION["nowinner"]=0;
    }   
    if(isset($_POST['submitButton']))
    {
        changcard();
    }
    summoncheck($_SESSION["mode"]); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header style="text-align: center;background: cornflowerblue;font-size:50px;">
    <p>比大小</p>
    <?php 
        echo '<p>Win:'.$_SESSION['win'].'    Lost:'.$_SESSION['lost'].'     平手:'.$_SESSION["nowinner"].'</p>'
   ?>
</header>
<body>
    <div style="text-align: center;">
    <?php
            echo '<img src="PNG-cards-1.3/'.$_SESSION["ai"].'" width="100"><br>';           
        ?> 
    </div>
    <div>
        <?php
            buttonsummon($_SESSION["mode"]);
        ?>
    </div>
    <div style="text-align: center;">
        <?php
            echo '<img src="PNG-cards-1.3/'.$_SESSION["player"].'" width="100"><br>';           
        ?> 
    </div>
</body>
</html>