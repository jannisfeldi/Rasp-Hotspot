<?php
$rx = exec("sar -n DEV 1 1 | grep 'Average:' | grep 'wlan0' | awk '{print $5}'");
$tx = exec("sar -n DEV 1 1 | grep 'Average:' | grep 'wlan0' | awk '{print $6}'");

$rx = round($rx/1024,2);
$tx = round($tx/1024,2);
echo "↓".$rx."MB/s | ↑".$tx."MB/s";
?>