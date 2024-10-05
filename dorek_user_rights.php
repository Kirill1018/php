<?php
function upload() {
$uplArr = array(
'DBAdapter' => 'adapter/DBAdapter.php',
'DBMSSQL' => 'adapter/DBMSSQL.php',
'MssqlPropelPDO' => 'adapter/MSSQL/MssqlPropelPDO.php',
'MssqlDebugPDO' => 'adapter/MSSQL/MssqlDebugPDO'
);
return $uplArr;
}
class Autoload { public static function registrate() { return upload(); } }
class Main {
public static function init() {
var_dump(include 'global_arrays.php');
var_dump(Autoload::registrate());
}
}
Main::init();
?>
