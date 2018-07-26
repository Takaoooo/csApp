<?php
//記事を作成、カスタムフィールドに書き込む
require("../wp-blog-header.php");
date_default_timezone_set('Asia/Tokyo');


$todaytime = date('YmdHi', time());
$posttime = date('Y-m-d H:i:s', time());
//$content = '東京のFREE_WiFiスポット<br>ぜひごらんください';
$post = array(
  'post_author' => 1, // 作成者のユーザー ID。
  'post_content' => '[cft format=1]', // 投稿の全文。
  'post_date' => $posttime, // 投稿の作成日時。
  //'post_name' => 'todaysblog'.$todaytime, // 投稿スラッグ。
  'post_status' => 'publish', // 公開ステータス。
  'post_title' => 'FREE-WiFiスポット（TOKYO）', // 投稿のタイトル。
  //'post_category' => array(1), // カテゴリーID(配列)。
);
echo "b";
$postid = wp_insert_post( $post );


$multipleData = array();
$data = array();

//ファイル名を指定
$file_name = "FREE_WiFi_and_TOKYO.csv";
echo "d";
//ファイルを開く
$fp = fopen($file_name,"r");

//もし$fpのとき
if ( $fp ){
  //$fpが終わりまで繰り返す
  while( !feof($fp) ){
    //$fpの内容を配列に格納
    $multipleData[] = fgetcsv($fp);
  }
};

/*
foreach($multipleData as $data){
  if($postid != 0){
    update_post_meta($postid,"SSID",$data[0]);
    update_post_meta($postid, "Name", $data[1]);
    update_post_meta($postid, "Address", $data[2]);
    update_post_meta($postid, "Latitude", $data[3]);
    update_post_meta($postid, "Longitude", $data[4]);
  }else{
    echo "投稿に失敗しました";
  }
  //echo $data[1]."\n";
}
*/

//$fpを閉じる
fclose($fp);
echo "e";

?>