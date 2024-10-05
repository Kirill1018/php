<?php
class Get {
private $globArr = array();
public function __construct(string $x, string $y, string $z) { $this->globArr = array($x, $y, $z); }
public function has(string $a) {
if (in_array($a, $this->globArr)) return 'true';
else return 'false';
}
public function get(string $a) {
if ($this->has($a) === 'true') return $a;
else throw new Exception("значение $a отсутствует в массиве");
}
}
class Post extends Get { public function __construct() { }}
class Files extends Get {
private $name;
private $type;
private $tmp_name;
private $error;
private $size;
public $fileArr = array();
public function __construct(string $title, string $kind, string $tmpTitle, bool $mistake, int $dimension) {
$this->name = $title;
$this->type = $kind;
$this->tmp_name = $tmpTitle;
$this->error = $mistake;
$this->size = $dimension;
$this->fileArr['name'] = $this->name;
$this->fileArr['type'] = $this->type;
$this->fileArr['tmp_name'] = $this->tmp_name;
$this->fileArr['error'] = $this->error;
$this->fileArr['size'] = $this->size;
}
public function getName() { return $this->name; }
public function getType() { return $this->type; }
public function getTmpName() { return $this->tmp_name; }
public function getErr() { return $this->error; }
public function getSize() { return $this->size; }
public function moveTo(File $program_, string $path) { $program_->fileArr['tmp_name'] = $path; }
}
class File extends Get { public function __construct() { } }
$file1 = new Files('image.jpg', 'image/jpeg', '/home/user/temp/phpjX2YXo', false, 119303);
$file2 = new Files('global_arrays.php','php', '/usr/src', false, 220414);
$file3 = new Files('text.txt', 'txt', '/usr', false, 331525);
$file1->globArr = [$file1, $file2, $file3];
$keys = array_keys($file1->fileArr);
$app = new File();
$file1->moveTo($app, '/path/to/file');
$file1->fileArr['tmp_name'] = $app->fileArr['tmp_name'];
class Request {
private $get;
private $post;
private $files;
public $url;
public function __construct(Get $receiving, Post $sending, Files $programs) {
$this->get = $receiving;
$this->post = $sending;
$this->files = $programs;
}
}
var_dump($file1->fileArr);
var_dump($file2->fileArr);
var_dump($file3->fileArr);
var_dump($file1->globArr);
var_dump($keys);
echo $file1->fileArr['tmp_name'].PHP_EOL;
?>
