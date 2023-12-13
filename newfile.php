<?php

echo "好きな数値を入力してください： ";
$number = trim(fgets(STDIN));

if (!is_numeric($number)) {
    echo "無効な入力です。数値を入力してください。\n";
    exit(1);
}

$result = $number * 2;
echo "2倍の数値です：" . $result . "\n";
?>
