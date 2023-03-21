<?php

header("Location:https://piaccess.space/shutdown.html");
exec("php /home/rasprouter/web/shutdownNOW.php > /dev/null 2>&1 &");
?>