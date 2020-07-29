<?php

mb_internal_encoding("utf8");

session_start();

try {
  $pdo = new PDO("mysql:dbname=lesson3;host=localhost;", "root", "");
} catch (PDOException $e) {
  die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスができません。<br>しばらくしてから再度ログインをしてください。</p><a href='http://localhost/login_mypage/login.php'></a>");
}

// echo $_POST['name'];
// echo $_POST['mail'];
// echo $row['mail'];
// echo $_SESSION['id'];

$stmt = $pdo->prepare("update login_mypage set name = ?, mail = ?, password = ?, comments = ? where id = ?;");

$stmt->bindValue(1, $_POST['name']);
$stmt->bindValue(2, $_POST['mail']);
$stmt->bindValue(3, $_POST['password']);
$stmt->bindValue(4, $_POST['comments']);
$stmt->bindValue(5, $_SESSION['id']);


$stmt->execute();

$stmt = $pdo->prepare("select * from login_mypage where mail = ? and password = ?");

$stmt->bindValue(1, $_POST['mail']);
$stmt->bindValue(2, $_POST['password']);

$stmt->execute();
$pdo = null;

foreach ($stmt as $row) {
  $_SESSION['name'] = $row['name'];
  $_SESSION['mail'] = $row['mail'];
  $_SESSION['password'] = $row['password'];
  $_SESSION['comments'] = $row['comments'];
}

// if (empty($_POST['mail'])) {
//   header('Location:login.php');
// }else {
  header('Location:mypage.php');
// }

?>