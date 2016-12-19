<html>
<head>
<title>Chat-Error001</title>
<style type="text/css">
a{
font-weight:bold;
font-size:50px;
color:red;
}
</style>
</head>
<body>
<p>
<a>Chat</a>
</p>
<b>Error</b>
<br>
<?php
$val=$_GET['num'];
//print $val;
if($val==1){
print "Plese input your id and password";
}
if($val==2){
print "Not Found id";
}
if($val==3){
print "ID or Password is incorrect";
}
//print "Your Name is required.Please input your name";
?>
</br>
<form action="WC101.php">

<br>
<input type="submit" value="back">
</br>
</form>
</body>
</html>

