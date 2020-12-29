<?php

    $name = $_POST['name_ch'];
    $login = $_POST['login_ch'];
    $pass = $_POST['pass_ch'];


    try {
        $db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
    } catch (PDOException $e) {
        print "Ошибка подключпения к БД!: " . $e->getMessage();
        die();
    }
    session_start();
    $user = $_SESSION['username'];
    

    if ($name != NULL) {
        $db->query("UPDATE `users` SET `name` = '$name'; ");
        unset($name);
    }
    if ($login != NULL) {
        $db->query("UPDATE `users` SET `login` = '$login'; ");
        unset($login);
    }
    if ($pass != NULL) {
        $db->query("UPDATE `users` SET `pass` = '$pass'; ");
        unset($pass);
    }

    
    header('Location: lk_index.php');
?>