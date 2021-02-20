<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '123456');
define('DBNAME', 'eventos_calendar');

try {
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';',USER,PASS);
} catch (PDOExecption $e) {
    echo $e->getMessage();
}



