<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BBS</title>
</head>
<body>
<?php

 header("HTTP/1.1 301 Moved Permanently");
 header("Location: http://docker.adachin.me:70/bbs.php");


if ($_REQUEST['name'] == '' or $_POST['message'] == '') {
  exit('error');
}

$con = mysql_connect('xxx.xxx.xxxx.xxxx', 'user', 'pass');
if (!$con) {
  exit('データベースに接続できませんでした。');
}

$result = mysql_select_db('bbs', $con);
if (!$result) {
  exit('データベースを選択できませんでした。');
}

$result = mysql_query('SET NAMES utf8', $con);
if (!$result) {
  exit('文字コードを指定できませんでした。');
}

$name    = $_REQUEST['name'];
$message = $_REQUEST['message'];
$created = date('Y-m-d H:i:s');

$result = mysql_query("INSERT INTO messages(name, message, created) VALUES('$name', '$message', '$created')", $con);
if (!$result) {
  exit('データを登録できませんでした。');
}

$con = mysql_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>
 <h3>つぶやきましたん。 </h3>
<ul>
  <li><a href="bbs.php">一覧へ戻る</a></li>
</ul>
</body>
</html>
