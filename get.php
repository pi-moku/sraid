<?php
$num = $_POST["num"];
if(!$num || 30 < $num){
    header('Location: tou.html');
} else{
    echo "<form action=get2.php method=POST>";
    echo "タイトル: <input type=text name=title><br /><br />";
    echo "個数: <input type=text value=$num name=kosuu readonly><br />";
    $count = 0;
    while(true){
        if($count == $num){
            break;
        } else{
            echo "$count 個目<textarea type=text name=".$count."></textarea><br />";
            $count = $count + 1;
        }
    }
    echo "<input type=submit value=送信>";
    echo "</form>";
}
?>
