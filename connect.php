<?php
    $hn = 'localhost';
    $un = 'habb3595_okogikam';
    $pw = 'jkluio789';
    $db = 'habb3595_anime';
    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error)die("Akses Gagal : ". $conn->connect_error);
?>