<?php

if(isset($_GET['page'])){
    $page = get_variabel($_GET['page']); 
    if(isset($_GET['c'])){
            $page_title = get_variabel($_GET['c']);
        }else{
            $page_title = $page;
    }
}else{
    $page = "Home";
    $page_title = $page;
}
$halaman = strtolower($page);
if(isset($_GET['id'])){
    $halaman = strtolower("Post");
}
include_once "pages/$halaman.php";
?>