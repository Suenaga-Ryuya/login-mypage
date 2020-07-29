<?php

mb_internal_encoding("utf8");

$temp_pic_name = $_FILES['picture']['tmp_name'];

$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;

move_uploaded_file($temp_pic_name, './image/'.$original_pic_name);


?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイページ登録</title>
  <link rel="stylesheet" type="text/css" href="register_confirm.css">
  
</head>
<body>
  
  <header>
    <img src="4eachblog_logo.jpg">
  </header>

  <main>
    <div class="container">
      <div class="form_contents">
        <h2>会員登録 確認</h2>
        <p class="text">こちらの内容で登録してもよろしいでしょうか？</p>
      
        <div class="name">
          <p>氏名：<?=$_POST['name']; ?></p>
        </div>
        
        <div class="mail">
          <p>メールアドレス：<?=$_POST['mail']; ?></p>
        </div>
        
        <div class="password">
          <p>パスワード：<?=$_POST['password']; ?></p>
        </div>
        
        <div class="picture">
          <p>プロフィール写真：<?=$original_pic_name; ?></p>
        </div>
        
        <div class="comments">
          <p>コメント：<?=$_POST['comments']; ?></p>
        </div>
        
        <div class="flexbox">
          <form action="register.php">
            <div class="toroku">
              <input type="submit" class="submit_button back" size="30" value="戻って修正する">
            </div>
          </form>

          <form action="register_insert.php" method="POST">
            <div class="toroku">
              <input type="submit" class="submit_button accept" size="35" value="登録する">
              <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
              <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
              <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
              <input type="hidden" value="<?php echo $original_pic_name; ?>" name="path_filename">
              <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">
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