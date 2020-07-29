<?php
// require_once 'ConnectDB.php';

mb_internal_encoding("utf8");
session_start();

if (empty($_SESSION['id'])) {

  try {
    $pdo = new PDO("mysql:dbname=lesson3;host=localhost;", "root", "");
  } catch (PDOException $e) {
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスができません。<br>しばらくしてから再度ログインをしてください。</p><a href='http://localhost/login_mypage/login.php'></a>");
  }

  $stmt = $pdo->prepare("select * from login_mypage where mail = ? and password = ?;");

  $stmt->bindValue(1, $_POST['mail']);
  $stmt->bindValue(2, $_POST['password']);

  $stmt->execute();
  $pdo = null;

  foreach ($stmt as $row) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['picture'] = $row['picture'];
    $_SESSION['comments'] = $row['comments'];
  }

  if (empty($_SESSION['id'])) {
    $_POST['login_keep'] = "";
    header('Location:login_error.php');
  }

  if (!empty($_POST['login_keep'])) {
    $_SESSION['login_keep'] = $_POST['login_keep'];
  }
}
  
if (!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])) {
  setcookie('mail', $_SESSION['mail'], time() + 60 * 60 * 24 * 7);
  setcookie('password', $_SESSION['password'], time() + 60 * 60 * 24 * 7);
  setcookie('login_keep', $_SESSION['login_keep'], time() + 60 * 60 * 24 * 7);
}else if (empty($_SESSION['login_keep'])) {
  setcookie('mail', '', time() - 1);
  setcookie('password', '', time() - 1);
  setcookie('login_keep', '', time() - 1);
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイページ登録</title>
  <link rel="stylesheet" type="text/css" href="mypage.css">
  
</head>
<body>
  
  <header>
    <img src="4eachblog_logo.jpg">
    <div class="login"><a href="log_out.php">ログアウト</a></div>
  </header>

  <main>
    <div class="container">
      <div class="form_contents">
        <h2>会員情報</h2>
        
        <p class="text">こんにちは！ <?=$_SESSION['name']; ?>さん</p>
        <div class="info flexbox">

          <div class="picture">
            <img src="./image/<?=$_SESSION['picture']; ?>" width="150px" height="150px">
          </div>
          
          <div class="private">

            <div class="name">
              <p>氏名：<?=$_SESSION['name']; ?></p>
            </div>
            
            <div class="mail">
              <p>メールアドレス：<?=$_SESSION['mail']; ?></p>
            </div>
            
            <div class="password">
              <p>パスワード：<?=$_SESSION['password']; ?></p>
            </div>
          </div>

        </div>
        
        <div class="comments">
          <p><?=$_SESSION['comments']; ?></p>
        </div>
        
        <div>

          <!-- <a href="mypage_hensyu.php" class="submit_button accept" size="35">編集する</a> -->
          <form action="mypage_hensyu.php" method="POST">
            <input type="hidden" value="<?php echo rand(1, 10); ?>" name="form_mypage">
            <div class="toroku">
              <input type="submit" class="submit_button accept" size="35" value="編集する">
            </div>
          </form>
        </div>
      </div>
        
    </div>
  </main>

  <footer>
    &copy; 2018 InterNous.inc. All rights reserved
  </footer>

</body>
</html>