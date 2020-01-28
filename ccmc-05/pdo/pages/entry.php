<?php
//外部ファイルの読み込み
require_once("../database.php");
require_once("../classes.php");
$pdo = connectDatabase();
$sql="select * from areas";

$pstmt = $pdo->prepare($sql);
//SQL実行
$pstmt->execute();
//結果セットを取得
$rs = $pstmt->fetchAll();
//で-たべース接続オブジェクト
disconnectDatabase($pdo);
//結果セットを配列に格納
$areas = [];
foreach ($rs as $record) {
    $id = intval($record["id"]);
    $name = $record["name"];
    $area = new Area($id , $name);
    $areas[] = $area;
}
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
			<?php foreach ($areas as $area) { ?>
			<option value="<?= $area->getId() ?>"><?= $area->getName() ?></option>
			<?php } ?>
			<option value="2">神戸</option>
			<option value="3">伊豆</option>
		</select>
		<input type="submit" value="選択" />
		</form>
	</body>
</html>
