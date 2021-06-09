<?php

$db = pg_connect('host=localhost dbname=db_tutor user=postgres password="  "');

if( !$db ){
    die("Gagal terhubung dengan database: " . pg_connect_error());}
?>
