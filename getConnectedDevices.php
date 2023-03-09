<?php

$file = 'states/connectedDevices.state';
$content = file_get_contents($file);
$formatted_content = '<pre>' . nl2br($content) . '</pre>';
echo $formatted_content;
?>