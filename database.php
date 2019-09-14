<?php
$server = 'localhost';
$username= 'root';
$password = '';
$database = 'php_ambp';

try{
$conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
} catch (PDOException $e) {
    dile('connected failed:'.$e->getMessage());
    
}

?>