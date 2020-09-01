<?php
//2. Простые делители числа 13195 - это 5, 7, 13 и 29. Каков самый большой делитель числа 600851475143,
// являющийся простым числом?
    function getMaxDivisor()
{
    $originalNumber = 600851475143;
    $sqrtInt = (int)sqrt($originalNumber);
    $dividerMax = null;
    for ($divider = 1; $divider <= $sqrtInt; $divider++) {
        if ($originalNumber % $divider == 0) {
            $dividerMax = $divider;
        }
    }
    echo $dividerMax; //1234169
}

//1. Проверить баланс скобок в выражении, игнорируя любые внуренние символы. В решении по возможности испольщовать SplStack.
//Примеры:
//"Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}" - true
//((a + b)/ c) - 2 - true
//"([ошибка)" - false
//"(") - false


$string = "\"(ошибка)\"";
$verify = [
    "}" => "{",
    ")" => "(",
    "]" => "[",
    "\"" => "\"",
];
function getArray($string)
{
    return str_split($string);
}
function get($string,$verify)
{
    $stack = new SplStack();
    $array = getArray($string);
    foreach ($array as $value) {
        if (in_array($value, $verify)) {
            $stack->push($value);
        } elseif (array_key_exists($value, $verify) ) {
           if (($stack->count() > 0) && $stack->top() == $verify[$value]){
                $stack->pop();
            } else return false;
        } else continue;
    }
    return true;
}
function getResult($string, $verify){
    if (get($string, $verify)) {
        echo "все ОК";
    } else {
        echo "Стоит перепроверить";
    }
}



$start = microtime(true);
$before = memory_get_usage();
//getMaxDivisor(); // запуск задачи №2
getResult($string, $verify);  // запуск задачи №1
echo PHP_EOL;
echo (microtime(true) - $start);
echo PHP_EOL;
echo memory_get_usage() - $before;
echo PHP_EOL;