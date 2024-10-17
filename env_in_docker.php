<?php
class Database {
    public $users = array();
    public function __construct() { }
    protected $passwords = ['password1', 'password2', 'password3'];
    protected $logins = ['qwerty', 'asdfgh', 'kirill'];
    protected $tokens = array();
}
class User extends Database {
    public function __construct() { }
    protected $keywords = array();
    protected $nicknames = array();
    public $logIsSent = false;
    public $passwIsSent = false;
    public function getUserByLogin(string $login) {
        if (in_array($login, $this->nicknames)) return new User();
        else return;
    }
    public function getUsByPassw(string $password) {
        if (in_array($password, $this->keywords)) return new User();
        else return;
    }
}
class Models extends User {
    public function __construct() { for ($i = 0; $i < count($this->logins); $i++) {
        array_push($this->keywords, $this->passwords[$i]);
        array_push($this->nicknames, $this->logins[$i]);
    }
}
}
class Login extends Models {
    public $modelling;
    public function __construct() {
        $this->logIsSent = true;
        $this->passwIsSent = true;
        $this->modelling = new Models();
    }
    public $username = 'kirill';
    public $passphrase = 'password3';
    public $usIsFound = false;
    public function postRequest() {
        if (in_array($this->username, $this->modelling->nicknames) && in_array($this->passphrase, $this->modelling->keywords) && array_search($this->username, $this->modelling->nicknames) === array_search($this->passphrase, $this->modelling->keywords)) {for ($i = 0; $i < count($this->logins); $i++) $this->tokens[$i] = 'токен пользователя скрыт';
            $this->tokens[array_search($this->username, $this->modelling->nicknames)] = rand();
            var_dump($this->tokens);
            for ($i = 0; $i < count($this->logins); $i++) $this->users[$this->logins[$i]] = $this->tokens[$i];
            var_dump($this->users);
            $this->usIsFound = true;
            return 'пользователь найден в базе данных';
        }
        else return 'ошибка в логине или пароле';
    }
    public function getTok() {
        if ($this->usIsFound) {
            $token = ['token' => $this->tokens[array_search($this->username, $this->modelling->nicknames)]];
            return json_encode($token, JSON_PRETTY_PRINT);
        }
        else {
            $error = ['error' => 'ошибка'];
            return json_encode($error, JSON_PRETTY_PRINT);
        }
    }
}
class Api extends Login { public function __construct() { } }
class Controllers extends Api { public function __construct() { } }
$id = new Login();
var_dump($id->modelling->getUserByLogin($id->username));
var_dump($id->modelling->getUsByPassw($id->passphrase));
if ($id->logIsSent && $id->passwIsSent) echo $id->postRequest().PHP_EOL;
echo $id->getTok().PHP_EOL;
?>