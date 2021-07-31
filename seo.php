<?php
if(isset($_GET['judul'])){
    $judul_post = $_GET['judul'];
    echo "<meta name='keywords' content='info anime, anime series, anime movie,cosplay, $judul_post'>";
    echo "<meta name='description' content='info anime, anime series dan anime movie terbaru, cosplay, $judul_post'>";
}else{
    echo "<meta name='keywords' content='info anime, anime series, anime movie, cosplay'>";
    echo "<meta name='description' content='info anime, anime series dan anime movie terbaru, cosplay'>";
}
?>