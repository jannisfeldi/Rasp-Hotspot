<?php
echo exec("top -bn1 | grep 'Cpu(s)' | awk '{print $2 + $4}'");
?>