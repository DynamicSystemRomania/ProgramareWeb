<?php
/**
 * Created by IntelliJ IDEA.
 * User: ovidiu
 * Date: 28.03.2018
 * Time: 21:18
 */
require_once 'idiorm.php';
ORM::configure('sqlite:db.sqlite');
session_start();


echo '<form action="login.php" method="post">
            user: <input type="text" name="user"><br>
            passwd: <input type="text" name="passwd"><br>
            <input type="submit">
            </form>';

if($_POST!=[]) {
    $user = $_POST["user"];
    $passwd = $_POST["passwd"];
    $r = ORM::for_table('users')->rawQuery("select * from users where username = '" . $user . "' and password = '" . $passwd . "'")->findArray();


    if ($r == [])
        echo "<br>NU a reusit Autentificarea<br>";
    else {
        echo "<br>Autentificarea a reusit";
    }
}

if (!isset($_COOKIE["user"])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
    $cookie_name = "user";
    $cookie_value = $user;
    setcookie($cookie_name, $cookie_value, time() + (10), "/");

} else {
    unset($_COOKIE["user"]);
    
    echo "Cookie named '" . $cookie_name . "' is set!<br>";
    print_r($_COOKIE["user"]);
}