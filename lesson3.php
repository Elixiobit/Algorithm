<?php
//1 Дан массив из n элементов, начиная с 1. Каждый следующий элемент равен (предыдущий + 1).
// Но в массиве гарантированно 1 число пропущено. Необходимо вывести на экран пропущенное число.
//[1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16] => 11
//[1, 2, 4, 5, 6] => 3
//[] => 1
function getDensity ($array, $start, $end) {
    return ($end - $start)/($array[$end] - $array[$start]);
}
function getMiddle ($start,$end){
    return floor(($start + $end) / 2);
}
function getResult ($result, $n, $n2 = 0) {
    $nN = $n + $n2;
    echo "Искомое значение: $result";
    echo PHP_EOL;
    echo "Количество инреаций: $nN";
    echo PHP_EOL;
}
function emptyPosition (){
    $array = [1, 2 ,3, 4, 6, 7, 8, 9, 10, 11, 12, 13,14, 15, 16,17,18,19,20,21,22,23,24,25,26,27,28];
    $start = 0;
    $n = 0;
    $n2 = 0;
    $end = count($array) - 1;
    while (($end - $start) > 1 &&  !empty($array)){
        $n++;
        $middle = getMiddle($start, $end);
        $left = getDensity($array, $start, $middle);
        if ($left == 1) {
            $start = $middle;
        } else{
            $end = $middle;
        }
    }
    if (empty($array)){
        getResult(1, $n);
    }elseif (($array[$start] - 1)!= $start) {
        getResult(($array[$start] - 1), $n, $n2);
    }else {
        getResult(($array[$end] - 1), $n, $n2);
    }
}

//3*. Доработать алгоритм бинарного поиска для нахождения кол-ва повторений в массиве.
// Сложность O(logn) не должна измениться. Учтите, что массив длиной n может состоять
// из одного значения [4, 4, 4, 4, ...(n)..., 4]


$myArray = [1, 2 ,3, 4, 5,5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15,15, 16,17,18,19,20,21,21,22,23,24,25,26,27];
//$myArray = [5,5,5,5,5,5,5,5,5];
$start = 0;
$end = count($myArray) - 1;
function binarySearch($array, $start, $end, $num = 5)
{
    $n = 0;
    $repeat = 0;
    while ($start <= $end) {
        $n++;
        $base = getMiddle($start, $end);
        if ($array[$base] == $num) {
            $repeat++;
            array_splice($array, $base, 1);
            $end = count($array) - 1;
        } elseif ($array[$base] < $num) {
            $start = $base + 1;
        } else {
            $end = $base - 1;
        }
    }
    echo "Количество итераций: $n искомого числа $num" . PHP_EOL;
    echo "Количество повтрений: $repeat" . PHP_EOL;
}
$startTime = microtime(true);
$before = memory_get_usage();
//emptyPosition(); // запуск первой задачи.
binarySearch($myArray, $start, $end); // запуск третей задачи.
echo (microtime(true) - $startTime);
echo PHP_EOL;
echo memory_get_usage() - $before;
echo PHP_EOL;
