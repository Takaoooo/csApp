<?php
//記事を作成、カスタムフィールドに書き込む
require("../wp-blog-header.php");
date_default_timezone_set('Asia/Tokyo');


$todaytime = date('YmdHi', time());
$posttime = date('Y-m-d H:i:s', time());

$post = array(
  'post_author' => 1, // 作成者のユーザー ID。
  'post_content' => '[cft format=1]', // 投稿の全文。
  'post_date' => $posttime, // 投稿の作成日時。
  'post_status' => 'publish', 
  'post_title' => 'FREE-WiFiスポット（TOKYO）', 
  
);

$multipleData = array();
$data = array();


$file_name = "FREE_WiFi_and_TOKYO.csv";

$fp = fopen($file_name,"r");
if ( $fp ){
  while( !feof($fp) ){
    $multipleData[] = fgetcsv($fp);
  }
};

// $postid = wp_insert_post( $post );
// if($postid != 0){
//   update_post_meta($postid,"SSID","FREE_Wi-Fi_and_TOKYO");
//   update_post_meta($postid, "Place", "八重根港船客待合所");
//   update_post_meta($postid, "Address", "八丈町大賀郷542番地9");
//   update_post_meta($postid, "Latitude", 33.097462);
//   update_post_meta($postid, "Longitude", 139.770317);
// }

foreach($multipleData as $data){
  $postid = wp_insert_post( $post );

  if($postid != 0){
    // if(empty($data)){
    //   break;
    // }
    // if($data[0]=="SSID"){
    //   continue;
    // }
    update_post_meta($postid,"SSID",$data[0]);
    update_post_meta($postid, "Place", $data[1]);
    update_post_meta($postid, "Address", $data[2]);
    update_post_meta($postid, "Latitude", $data[3]);
    update_post_meta($postid, "Longitude", $data[4]);
    // if($data[0]=="FREE_Wi-Fi_and_TOKYO"){
    //   break;
    // }
  }else{
    echo "投稿に失敗しました"."\n";
  }
}

fclose($fp);
echo "無事動作が終了しました";

?>