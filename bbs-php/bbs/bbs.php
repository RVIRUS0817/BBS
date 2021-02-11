<html>
<head>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<style>
/*body{margin:20px;}*/
body {
  padding-top: 50px;
}
.starter-template {
  padding: 40px 15px;
  text-align: center;
}
div.wrapper{margin:20px;}
div.tweetList p:nth-child(odd) {
    background:#c6e2e2;
}
div.tweetArea{
margin-bottom: 10px;
border-bottom:3px 0 dotted;
}
/*div.navi{width:100%;height:50px;background:black;}*/
</style>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADACHIN BBS</title>
</head>
<body>
<!--
  <div class="navi">
    <a href="/">TOPページ</a>
  </div>
-->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ADACHIN BBS</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="http://docker.adachin.me:70/bbs.php">Home</a></li>
            <li><a href="https://blog.adachin.me/">Blog</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
<div class="wrapper">
<div class="tweetArea">
  <form action="regist.php" method="post">
   <h5>おなまえ : </h5>
    <input type="text" class="form-control" name="name" size="30" value="" />
    <h5>今なにやってるん : </h5>
    <textarea class="form-control" name="message" rows="5"></textarea>
    <br/>

    <input type="submit" class="btn btn-large btn-block" value="つぶやく" />
        <hr>
  </form>
</div>
<div class="tweetList">
<?php

$con = mysql_connect('xxx.xxx.xxx.xxx', 'user', 'pass');
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

$result = mysql_query('SELECT * FROM messages ORDER BY no DESC', $con);
while ($data = mysql_fetch_array($result)) {
  echo "<p>\n";
  echo '<strong>[You.' . $data['no'] . '] ' . htmlspecialchars($data['name'], ENT_QUOTES) . ' ' . $data['created'] . "</strong><br />\n";
  echo "<br />\n";
  echo nl2br(htmlspecialchars($data['message'], ENT_QUOTES));
  echo "</p>\n";
}

$con = mysql_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>
</div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>


