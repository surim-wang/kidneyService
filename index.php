<!doctype html>
<html>
  <head>
    <meta charset = "utf-8">
    <title></title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
<o>
<?php
$list = scandir('data');
$i = 0;
while($i<count($list)){
  if($list[$i] != '.'){
    if($list[$i] !='..'){
      ?>
      <li><a href="index.php?id=<?=$list[$i]?>"><?= $list[$i]?></a></li>
      <?php
    }
  }
  $i = $i +1;
}
 ?>
</o>
    <h2>
      <?php
      if(isset($_GET['id'])) {
        echo $_GET['id'];
      } else {
        echo "Welcome" ;
      }
      ?>
    </h2>
     <?php
     if(isset($_GET['id'])) {
       echo file_get_contents("data/".$_GET['id']);
     } else {
       echo "Hello php" ;
     }

     ?>
  </body>
</html>
