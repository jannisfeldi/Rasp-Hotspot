<?php
$rx = exec("sar -n DEV 1 1 | grep 'Average:' | grep 'eth0' | awk '{print $5}'");
$tx = exec("sar -n DEV 1 1 | grep 'Average:' | grep 'eth0' | awk '{print $6}'");

$rx = round($rx/1024);
$tx = round($tx/1024);
echo "↓".$rx."MB/s | ↑".$tx."MB/s";
?>