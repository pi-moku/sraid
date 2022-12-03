<?php
$title = $_POST["title"];
$kosuu = $_POST["kosuu"];
if(!strlen($title) || file_exists($title)){
    echo "タイトルを入力してください";
} else{
    mkdir($title,0777);
    $count = 0;
    while(true){
        if($count == $kosuu){
            break;
        } else{
            $o = $_POST[$count];
            htmlentities($o,ENT_QUOTES,'UTF-8');
            file_put_contents($title."/".$count.".php",$o);
            $src = '
            <?php
            $jibun = basename(__FILE__, ".php");
            $jibun = $jibun + 1;
            $jibun = intval( $jibun );
            if( file_exists($jibun .".php") ){
                echo "<br /><br /><a href=$jibun.php>次へ</a>";
            } else{
                echo "<br /><br /><a href=http://localhost/sraid/>戻る</a>";
            }
            ?>';
            file_put_contents($title."/".$count.".php",$src,FILE_APPEND);
            $count = $count + 1;
        }
    }
    file_put_contents("index.html","<br /><a href=".$title."/0.php>".$title."</a>\n",FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href=index.html>戻る</a>
</body>
</html>
