<?php

$db = pg_connect('host=localhost dbname=Digitalisasi user=postgres password="sesuain ya ges"');

if( !$db ){
    die("Gagal terhubung dengan database: " . pg_connect_error());}
?>