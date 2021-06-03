<?php
    function loadfile()
    {
        $dir='PNG-cards-1.3';
        $file=scandir($dir);
        array_splice($file,0,2);
        array_splice($file,array_search("cardback.png",$file),1);
        $_SESSION["file"]=$file;
    }
    function random()
    {       
        return mt_rand(0,count($_SESSION["file"])-1);
    }
    function arrayitemremove($item)
    {
        array_splice($_SESSION["file"],array_search($item,$_SESSION["file"]),1);
        if(count($_SESSION["file"])==0)
        {
            loadfile();
        }
    }
    function buttonsummon($mode)
    {
        if($mode=="比賽")
        {
            $_SESSION["mode"]="翻牌";
            echo '<br><div style="text-align:center;">
                    <form name="addForm" action="" >
                    <input type="submit" value="翻牌">
                    </form></div><br>
                    <div style="text-align:center;">
                    <form name="gg" action="" method="post">
                    <input type="submit" name="submitButton" value="換一張">
                    </form></div><br>';           
        }
        if($mode=="翻牌")
        {
            $_SESSION["mode"]="比賽";
            echo '<br><div style="text-align:center;"><form name="addForm" action="" method="post">
                    <input type="submit" value="下一局">
                    </form></div><br>';           
        }
    }
    function summoncheck($mode)
    {
        if($mode=="比賽")
        {
            $_SESSION["player"]=$_SESSION["file"][random()];
            arrayitemremove($_SESSION["player"]);
            $_SESSION["ai"]="cardback.png";
        } 
        else
        {
            $_SESSION["ai"]=$_SESSION["file"][random()];
            arrayitemremove($_SESSION["ai"]);
            wl();
        } 
    }
    function changcard()
    {
        $_SESSION["mode"]="比賽";
    }
    function wl()
    {
        if((int) filter_var($_SESSION["player"], FILTER_SANITIZE_NUMBER_INT)==(int) filter_var($_SESSION["ai"], FILTER_SANITIZE_NUMBER_INT))
        {
            $_SESSION['nowinner']+=1;
        }
        elseif((int) filter_var($_SESSION["player"], FILTER_SANITIZE_NUMBER_INT)>(int) filter_var($_SESSION["ai"], FILTER_SANITIZE_NUMBER_INT))
        {
            $_SESSION['win']+=1;
        }
        elseif((int) filter_var($_SESSION["player"], FILTER_SANITIZE_NUMBER_INT)<(int) filter_var($_SESSION["ai"], FILTER_SANITIZE_NUMBER_INT))
        {
            $_SESSION['lost']+=1;
        }
    }
?> 