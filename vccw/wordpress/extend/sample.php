<?php

//dataという変数に配列を作成
$multipleData = array();
$data = array();

//ファイル名を指定
$file_name = "FREE_WiFi_and_TOKYO.csv";
//file_put_contents('FREE_WiFi_and_TOKYO.csv', $str);


//ファイルを開く
$fp = fopen($file_name,"r");

//もし$fpのとき
if ( $fp ){
  //$fpが終わりまで繰り返す
  while( !feof($fp) ){
    //$fpの内容を配列に格納
    $multipleData[] = fgetcsv($fp);
  }
}

foreach($multipleData as $data){
  if(empty($data)){
    break;
  }
  if($data[0]=="SSID"){
    continue;
  }
  echo "SSID:".$data[0]."\n";
  echo "Place:".$data[1]."\n";
  echo "Address:".$data[2]."\n";
  echo "Latitude:".$data[3]."\n";
  echo "Longtitude:".$data[4]."\n";
  echo "\n";
}

//$fpを閉じる
fclose($fp);
/*
$str = <<<EOD
Windows,Mac,Linux
MySQL,PostgreSQL,SQLite
EOD;
file_put_contents('test.csv', $str);

$multipleDat

foreach($multipleData as $data){
  echo $data[0];
}


*/
?>
