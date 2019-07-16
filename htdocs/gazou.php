<?php
 $id = $_GET['id']
 ?>
<?php
//データベース接続設定
$dbServer = '127.0.0.1';
$dbName = $_SERVER['MYSQL_DB'];
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";
$dbUser = $_SERVER['MYSQL_USER'];
$dbPass = $_SERVER['MYSQL_PASSWORD'];

//データベースへの接続
$db = new PDO($dsn, $dbUser, $dbPass);


header("Content-type: image/jpg");
$stmt = $db->query("select * from maindb WHERE cookingID ='$id'");
$record = $stmt->fetch();
$gazou = $record['image'];
echo $gazou;
?>