<?php

mb_internal_encoding("utf8");
session_start();

if (empty($_POST['form_mypage'])) {
  header('Location:login_error.php');
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
  </header>

  <main>
    <div class="container">
      <div class="form_contents">
        <h2>会員情報</h2>
        <form action="mypage_update.php" method="POST">
        <p class="text">こんにちは！ <?=$_SESSION['name']; ?>さん</p>
        <div class="info flexbox">

          <div class="picture">
            <img src="./image/<?=$_SESSION['picture']; ?>" width="150px" height="150px">
          </div>
          
          <div class="private">

            <div class="name">
              <p>氏名：<input type="text" value="<?=$_SESSION['name']; ?>" name="name"></p>
            </div>
            
            <div class="mail">
              <p>メールアドレス：<input type="text" value="<?=$_SESSION['mail']; ?>" name="mail"></p>
            </div>
            
            <div class="password">
              <p>パスワード：<input type="text" value="<?=$_SESSION['password']; ?>" name="password"></p>
            </div>
          </div>
        
        </div>
        
        <div class="comments">
          <p><textarea type="text" value="<?=$_SESSION['comments']; ?>" rows="4" cols="80" name="comments"></textarea></p>
        </div>
        
        <div>

          
            <div class="toroku">
              <input type="submit" class="submit_button accept" size="20" value="変更する">
              
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