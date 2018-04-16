<?php

session_start();
session_unset();
unset($_COOKIE['user']);
session_destroy();
echo "<br>unset  cookie<br>";
session_unset();
header("Location: login.php");
?>