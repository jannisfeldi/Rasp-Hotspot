<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_GET['action'])) {
    if($_GET['action'] == "on") {
        exec('sleep 5 && echo "on" > states/hotspot.state && sudo systemctl start wlanctl');

    }
    if($_GET['action'] == "off") {
        exec('sleep 3 && echo "off" > states/hotspot.state && sudo systemctl stop wlanctl');
    }
}
?>