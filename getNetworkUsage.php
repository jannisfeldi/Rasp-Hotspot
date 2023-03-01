<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_GET["type"])) {
    if($_GET["type"] == "download") {
        echo exec("ifconfig eth0 | grep 'RX packets' |grep -o -P '\([^)]+\)$' | tr -d '()'");
    }
    if($_GET["type"] == "upload") {
        echo exec("ifconfig eth0 | grep 'TX packets' |grep -o -P '\([^)]+\)$' | tr -d '()'");
    }
}




?>