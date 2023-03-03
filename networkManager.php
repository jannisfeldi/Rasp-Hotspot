<?php
if(isset($_GET["action"])) {
    if (!(empty($_GET["action"])))
    if($_GET["action"] == "set") {
        $networkName = $_GET["netname"];
        $networkPasswd = $_GET["netpswd"];
        exec("echo '$networkName' > states/networkName.state");
        exec("echo '$networkPasswd' > states/networkPasswd.state");

    }
    if($_GET["action"] == "get") {
        
    }
}


?>