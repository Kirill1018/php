<?php
$value = 100;
$value = $value * 0.5;
$value = sqrt($value);
$value = (int)$value;
echo var_dump($value);
$x = 1;
$y = 2;
$z = 3;
$vectLength = sqrt(pow($x, 2) + pow($y, 2) + pow($z, 2));
echo $vectLength.PHP_EOL;
function isPal() {
$strPoly = 'word';
$simpleLine;
$revLine;
for ($i = 0; $i < strlen($strPoly) / 2; $i++) $simpleLine[$i] = $strPoly[$i];
for ($i = strlen($strPoly) - 1, $x = 0; $i > strlen($strPoly) / 2, $x < strlen($strPoly) / 2; $i--, $x++) $revLine[$x] = $strPoly[$i];
if ($simpleLine === $revLine) return "строка $strPoly - палиндром";
else return "при вводе строки $strPoly с конца совпадения отсутствуют";
}
echo isPal().PHP_EOL;
function multiply($number) {
$multipliers = [];
$results = [];
echo 'Array('.PHP_EOL;
echo '['.PHP_EOL;
for ($i = 1; $i <= 10; $i++) {
$result = $number * $i;
echo "'$number * $i' => $result,\n";
}
echo ']'.PHP_EOL;
$text = ")\n";
return $text;
}
$table = multiply(3);
print_r($table);
?>
