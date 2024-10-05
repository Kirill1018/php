<?php
include 'global_arrays.php';
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
$request = new Request(new Get('a', 'b', 'c'), new Post(), new Server());
return $request;
}
}
var_dump(Main::init());
?>
