<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_GET['action'])) {
    if($_GET['action'] == "on") {
        exec('echo "on" > /Users/jannisfeldmann/Documents/Abschlussprojekt/states/hotspot.state');
    }
    if($_GET['action'] == "off") {
        exec('echo "off" > /Users/jannisfeldmann/Documents/Abschlussprojekt/states/hotspot.state');
    }
}
?>