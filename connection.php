<?php

define('hostname', 'localhost:3306');
define('user', 'root');
define('password', 'root');
define('databaseName', 'android');


$connect = mysqli_connect(hostname, user, password, databaseName);

?>
