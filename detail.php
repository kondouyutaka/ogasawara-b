<?php
 $id = $_GET['cid'];
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

//検索実行
$stmt = $db->query("select * from maindb WHERE cookingID ='$id'");
$record = $stmt->fetch();

//結果の出力
$food=$record['foodname']; 
$zairyou=$record['material'];
$calories=$record['Calories'];
$eiyou=$record['balance'];
$tukurikata=$record['recipe'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>調理方法表示画面</title>
  <link rel="stylesheet"type="text/css" href="box.css"/>
</head>
<body>
<center><h1>調理方法</h1></center>  
<h2><center>
    <?php
    echo('<table border="1">');
    echo('<tr align="center">');
    echo('<td>'."料理名".'</td>');
    echo('</tr>');
    echo('<tr align="center">');
    echo('<td>'.$food.'</td>');
    echo('</tr>');
    echo('<tr align="center">');
    echo('<td>'."料理画像".'</td>');
    echo('</tr>');
    echo('<tr align="center">');
    echo('<td>'.'<img src="./gazou.php ?id='.$id.';?>">'.'</td>');
    echo('</tr>');
    echo('<tr align="center">');
    echo('<td>'."材料・カロリー・栄養バランス".'</td>');
    echo('</tr>');
    echo('<tr align="center">');
    echo nl2br('<td>'.$zairyou.'</td>');
    echo('</tr>');
    echo('<tr align="center">');
    echo('<td>'."カロリー".$calories.'</td>');
    echo "<br/>";
    echo('</tr>');
    echo('<tr align="center">');
    echo('<td>'."栄養評価".$eiyou.'</td>');
    echo "<br/>";
    echo('</tr>');
    echo('<tr align="center">');
    echo('<td>'."作り方".'</td>');
    echo('</tr>');
    echo('<tr align="center">');
    echo nl2br('<td>'.$tukurikata.'</td>');
    echo('</tr>');
    echo('</table>');
    ?>
  
</center></h2>


  <h3><p><center><input type="button" value="トップに戻る" onClick="location.href='./index.html'"></a></center></p></h3>
  <h3><p><center><input type="button" value="献立提案画面に戻る" onclick=history.back()></a></center></p></h3>

</body>

</html>