<?php
//Дан массив из n элементов, начиная с 1. Каждый следующий элемент равен (предыдущий + 1).
// Но в массиве гарантированно 1 число пропущено. Необходимо вывести на экран пропущенное число.
//Примеры:
/*[1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16] => 11
[1, 2, 4, 5, 6] => 3
[] => 1*/
$array = [1,2,4,5/*,6,7,8,9,10,11,12,13,14,15,16,17,18,20,21,22,23,24,25,26,27,28,29,30,31,32,33*/];

$start = 0;
//$end = $array[count($array) - 1];
$end = count($array) - 1;
//$n = 0;

while ($start < $end){
    $base = floor(($start + $end) / 2);
    echo $base . PHP_EOL;
    echo $array[$base] . PHP_EOL;
    $x = 0;

    echo PHP_EOL;
    $left = ($end - $base)/($array[$end] - $array[$base]);
    $right = ($base - $start)/($array[$base] - $array[$start]);


    if ($left == 1 || $right == 1){
        $num = $array[$base] + 1;
        echo "искомое число: $num";
    };
    exit;
    if (($array[$base] - $array[$start]) == 2){
        $num = $start + 1;
        echo "искомое число: $num";
    }
//    if (($base - $start) == 0){
//
//    }
    if ($left == 1){
//        $end = $base - 1;
        $start = $base + 1;
        $x = 1;
    } else {
//        $start = $base + 1;
        $end = $base - 1;
        $x = 2;
    };

}

