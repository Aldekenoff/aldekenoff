<?php
  session_start();

     $login = $_POST['login'];
     $pass = $_POST['pass'];
     $name = $_POST['name'];
 
    try {
        $db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
    } catch (PDOException $e) {
        print "Ошибка подключпения к БД!: " . $e->getMessage();
        die();
    }    
 
    $connect = mysqli_connect('localhost', 'root', '', 'users'); 
    $pass = md5($pass);
        $db->query("INSERT INTO `users` (`name`,`login`,`pass`)
        VALUES('$name','$login','$pass')");


    header ('Location: index.php');
    
?>