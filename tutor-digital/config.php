<?php

$db = pg_connect('host=localhost dbname=db_tutor user=postgres password=b45d4tz1d4n3');

if( !$db ){
    die("Gagal terhubung dengan database: " . pg_connect_error());}
?>
