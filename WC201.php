<?php 
    $dsn  = 'mysql:dbname=Chat;host=127.0.0.1';
	$user = 'root';
	$pw   = 'H@chiouji1';
	
	$sql = 'SELECT * FROM Login';
	$dbh = new PDO($dsn, $user, $pw);  //接続
    $sth = $dbh->prepare($sql);        //SQL準備
	$sth->execute();                   //実行
			
	$chara=[];
	while(($buff = $sth->fetch()) !== false )
	{
		$chara[] = $buff;
	}
    $name=$_GET['name'];
    $pass=$_GET['pass'];
    

if($name===""||$pass===""){
$num=1;
$url="http://127.0.0.1/Chat/ER001.php?num={$num}";
header("Location: ".$url);
exit(0);
}else{
     for($i = 0; $i < 3; $i++){
     $cur=$chara[$i];
      if($name===$cur[1] && $pass===$cur[2]){
       $DISP_NAME =$cur;
        break;
      }else if($i === 3 && ($name !== $cur[1] || $pass !== $cur[2])){
           header("Location: ER001.php");
			 exit(0);
       }
     }
}

?>




<html>
<head>
<title>Chat</title>
<style type="text/css">
a{
font-weight:bold;
font-size:50px;
}
</style>
</head>
<body>
<br>
<u><?php print $DISP_NAME[3] ?></u>
<form action="Write.php">
<input type="hidden" name='name' value="<?php print $name; ?>">
<input type="text" name="Write">
<input type="submit" value="Write">
<hr>
<input type="submit" value="Refresh">

<?php
$file=file_get_contents('chat.log');
//print $file;
$fp =fopen('chat.log','r');
$count =0;
$chatData;
while(($data=fgets($fp))!==false){
$chatData[]=explode(',',$data);
$count++;
}
for($a=0;$a<$count;$a++){
   for($b=0;$b<3;$b++){
       if($b==0){
             print $chatData[$a][$b]."\t";
             }
             else if($b==1){
                  ?><font size="5"><?php print $chatData[$a][$b]."\t";?></font><?php}else{
                  ?><font size="2" clor=gray><?php print $chatData[$a][$b]."\t";?></font><?php }
                  }
                  ?><hr><?php
                  }
                  fclose($fp);
                  ?>
</br>
</form>
</body>
</html>
