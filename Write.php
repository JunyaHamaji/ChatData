<?php
$write=$_GET['Write'];
$fp=fopen('chat.log','r');
fwrite($fp,$write.'\r');
fclose($fp);
header('Location:http://127.0.0.1/Chat/WC101.php');
?>
