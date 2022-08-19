<?php
echo __FILE__;
echo "<br>";
echo (password_hash('password123',PASSWORD_BCRYPT));

//ファイル丸ごと読み込み
echo "<br>";
$contactFile = '.contact.dat';

$fileContents = file_get_contents($contactFile);
echo $fileContents;

//ファイル書き込み
// file_put_contents($contactFile,"ok");

$addText = 'test add1'."\n";
//ファイル追記
// file_put_contents($contactFile,$addText,FILE_APPEND);
echo "<br>";

// $allData = file($contactFile);
// foreach($allData as $lineData){
//     $lines = explode(',',$lineData);
//     echo $lines[0].'<br>';
//     echo $lines[1].'<br>';
//     echo $lines[2].'<br>';
// };

$contents = fopen($contactFile,'a+');
fwrite($contents,$addText);
fclose($contents);
