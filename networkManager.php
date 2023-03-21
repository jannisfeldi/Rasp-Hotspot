<?php
if(isset($_GET["netname"])) {
        $networkName = $_GET["netname"];
        $networkPasswd = $_GET["netpswd"];
        exec("echo '$networkName' > states/networkName.state");
        exec("echo '$networkPasswd' > states/networkPasswd.state");
        echo("Einstellung gespeichert.");
        header("Refresh: 2; URL=index.php");
    

}


?>