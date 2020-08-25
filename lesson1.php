<?php
$originalNumber = 600851475143;
$sqrtInt = (int) sqrt($originalNumber);
$dividerMax = null;
for($divider = 1; $divider <= $sqrtInt; $divider++) {
    if($originalNumber % $divider == 0){
        $dividerMax = $divider;
    }
}
echo $dividerMax; //1234169



