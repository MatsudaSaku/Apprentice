<?php
function calculate($num1, $num2, $operator)
{
    $result = null;

    if (is_numeric($num1) && is_numeric($num2)) {

        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num1 > 0 && $num2 > 0) {
                    $result = $num1 / $num2;
                } else {
                    echo 'ゼロによる割り算は許可されていません。' . PHP_EOL;
                }
                break;
            default:
                throw new Exception('演算子には  +、-、*、/ のいずれかを使用してください');
        }
    } else {
        throw new Exception('num1、 num2 には整数を入力してください');
    }

    return $result;
}

echo "1番目の整数を入力してください:" . PHP_EOL;
$num1 = trim(fgets(STDIN));

echo "2番目の整数を入力してください:" . PHP_EOL;
$num2 = trim(fgets(STDIN));

echo "演算子(+, -, *, /)を入力してください:" . PHP_EOL;
$operator = trim(fgets(STDIN));

try {
    $result = calculate($num1, $num2, $operator);
    echo $result . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
