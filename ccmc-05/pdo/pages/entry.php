<?php
//外部ファイルの読み込み
require_once("../database.php");
$pdo = connectDatabase();
$sql="select * from areas";

$pstmt = $pdo->prepare($sql);
//SQL実行
$pstmt->execute();
//結果セットを取得
$rs = $pstmt->fetchAll();
//で-たべース接続オブジェクト
disconnectDatabase($pdo);
//結果セットの確認
echo "<pre>";
var_dump($rs);
echo "</pre>";
exit(0);
?>



<!DOCTYPE html>

<html lang="ja">
	<head>
		<meta charset="utf-8" />
		<title>PDOを使ってみる</title>
	</head>
	<body>
		<h1>PDOを使ってみる</h1>
		<h2>地域を選択する</h2>
		<form action="restaurants.php" method="get">
		<select name="area">
			<option value="0">-- 選択してください --</option>
			<option value="1">福岡</option>
			<option value="2">神戸</option>
			<option value="3">伊豆</option>
		</select>
		<input type="submit" value="選択" />
		</form>
	</body>
</html>
