<?php

// $db['db_host'] = 'localhost';
// $db['db_user'] = 'root';
// $db['db_pass'] = 'root';
// $db['db_name'] = 'cms';
// $db['db_port'] = 8889;

//funzione che converte le informazioni dell'array in costanti
// foreach($db as $key => $value){
//     define(strtoupper($key), $value);
// }



$connection = mysqli_connect('localhost', 'root', 'root', 'cms', 8889);
// $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

// if($connection){
//     echo " We are connected";
// }