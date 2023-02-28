<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_GET['action'])) {
    if($_GET['action'] == "on") {
        exec('echo "on" > states/hotspot.state');
    }
    if($_GET['action'] == "off") {
        exec('echo "off" > states/hotspot.state');
    }
}
?>