<?php
  add_action('wp_ajax_tell_me', 'tell_me');  // ログイン状態のユーザーからのアクセスで動作する
  add_action('wp_ajax_nopriv_tell_me', 'tell_me'); // 非ログインのユーザーからのアクセスで動作する
  function tell_me() {
    $res = "answer";
  
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
  
    die();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>

</head>
<body>
  
</body>
</html>
