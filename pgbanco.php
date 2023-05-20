<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('OBR', 'obra');

$conn=new mysqli(HOST,USER, PASSWORD, OBR);

if ($conn==true) {
    echo "sucesso";
}



