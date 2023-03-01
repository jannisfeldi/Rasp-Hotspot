<?php
echo exec("free -h | head -2 | tail -1 | cut -c 27-31");

?>