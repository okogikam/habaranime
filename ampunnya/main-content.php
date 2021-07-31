<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];    
}else{
    $page = "Dashboard";
}
$halaman = strtolower($page);
include_once "pages/$halaman.php";
?>