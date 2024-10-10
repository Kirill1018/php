<?php
$link = '/api/user/login';
$kirAlph = ['Й', 'Ц', 'У', 'К', 'Е', 'Н', 'Г', 'Ш', 'Щ', 'З', 'Х', 'Ъ', 'Ф', 'Ы', 'В', 'А', 'П', 'Р', 'О', 'Л', 'Д', 'Ж', 'Э', 'Я', 'Ч', 'С', 'М', 'И', 'Т', 'Ь', 'Б', 'Ю', 'Ё'];
$reference = array();
for ($i = 0; $i < strlen($link); $i++) $reference[$i] = $link[$i];
for ($i = 0; $i < count($reference); $i++) {
if ($reference[$i] === '/') $reference[$i + 1] = strtoupper($link[$i + 1]);
for ($x = 0; $x < count($kirAlph); $x++) if ($reference[$i] === $kirAlph[$x]) $reference[$i] === strtolower($kirAlph[$x]);
}
$citation = implode($reference);
echo $citation.PHP_EOL;
?>
