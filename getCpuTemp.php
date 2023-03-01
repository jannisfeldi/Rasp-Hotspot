<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo exec("cat /sys/class/thermal/thermal_zone0/temp | awk '{print $1/1000}'"),"°C";

?>