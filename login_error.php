<?php

if (isset($_SESSION['id'])) {
  header('Location:mypage.php');
}


?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="login.css">

</head>
<body>
  
  <header>
    <img src="4eachblog_logo.jpg">
  </header>

  <main>
    <div class="container">
      <div class="form_contents">
        <p class="error">メールアドレスまたはパスワードが間違ってます。</p>
        <form action="mypage.php" method="POST">

          <div class="mail">
            <label>メールアドレス</label><br>
            <input type="text" class="formbox" size="40" name="mail" pattern="^[a-z0-9_.%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="" required> <!-- @erorr -->
          </div>

          <div class="password">
            <label>パスワード</label><br>
            <input type="password" id="password" class="formbox" size="40" name="password"  pattern="^[a-zA-Z0-9]{6,}$" value="" required> <!-- @erorr -->
          </div>

          <div class="login_check"><label><input type="checkbox" name="login_keep" value="login_keep">ログイン状態を保持する</label></div>

          <div class="toroku">
            <input type="submit" class="submit_button accept" size="35" value="ログイン">
          </div>

        </form>
      </div>
    </div>
  </main>

  <footer>
    &copy; 2018 InterNous.inc. All rights reserved
  </footer>

</body>
</html>