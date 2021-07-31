<?php
//include_once "rot/session.php";
include_once "rot/function.php";
$web_data = pilihDataWeb();
//$user_data = pilihUser($user_id);

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="ampunnya/<?php echo $web_data['icon']; ?>" type="image/x-icon" />
  <?php
  if(isset($_GET['id'])){
      $meta = metaPost($_GET['id']);
      echo $meta;
  }else{
     echo "<meta name='description' content='$web_data[diskripsi]'>";
echo "<meta name='keywords' content='$web_data[keyword]'>";
echo "<meta name='author' content='habaranime'>";
}
  
  ?>
  
  <meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="icon" href="<?php echo $web_data['icon']; ?>" type="image/x-icon" />
  <title><?php echo $web_data['title']; ?></title>
    
<!--required style-->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="ampunnya/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="ampunnya/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- style tambahan-->
<!--Google-->
<meta name="google-site-verification" content="JB11hbc_ZFErXrE-1Ko2lEz0AzFdqHorR2kS_-_i6Mw" />
<!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124212435-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-124212435-1');
</script>
<!-- google adsend -->

        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-9086552134201347",
            enable_page_level_ads: true
          });
        </script>

    <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
  <link rel="stylesheet" href="ampunnya/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    
    <!-- photoswipe -->
    <link rel="stylesheet" href="ampunnya/plugins/photoswipe/photoswipe.css">
    <link rel="stylesheet" href="ampunnya/plugins/photoswipe/default-skin/default-skin.css">
    
    <link rel="stylesheet" href="ampunnya/dist/css/bionime.css">
    <style>
        *{
            box-sizing: border-box;
        }
        .note-editable{
            min-height: 400px;
        }
        .kategori{
            max-height: 200px;
            overflow: auto;
        }
        .item-kategori{            
            cursor: pointer;
        }
        .photo-profil-xm{
            height: 45px;
            width: 45px;
            overflow: hidden;
            border-radius: 50%;
            position: relative;
        }
        .photo-profil-sm{
            height: 100px;
            width: 100px;
            overflow: hidden;
            border-radius: 50%;
            position: relative;
        }
        .photo-profil, .photo-icon{
            height: 200px;
            width: 200px;
            overflow: hidden;
            border-radius: 50%;
            position: relative;
        }
        .photo-profil img,.photo-profil-sm img, .photo-profil-xm img{
            width: 100%;
            height: 100%;
        }
        .photo-icon img{
            width: 100%;
        }
        .col-sm-12{
            overflow: auto;
        }
        .fade:not(.show){
            opacity: 1;
        }
        .mySlides a{
/*            color: white;*/
        }
        .white a{
/*            color: black;*/
        }
        .tab{
            display: none;
        }
        .show{
            display: flex;
        }
        .news.show{
            display: block;
        }
        .main-post img{
            max-width: 100%;
        }
        iframe{
            max-width:100%;
        }
        .grid-item { width: 200px ; }
        .grid-item--width2 { width: 400px ; }
    </style>
    <link rel="stylesheet" href="ampunnya/dist/css/news.css">   
    <!--w3 slideshow -->
    <link rel="stylesheet" href="ampunnya/plugins/w3-slideshow/w3-slideshow.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed  layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
 <?php include_once "navbar.php"; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once "main-sidebar.php"; ?>
  <!-- Content Wrapper. Contains page content -->
 <?php include_once "main-content.php"; ?>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <?php include_once "control-sidebar.php"; ?>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php //include_once "footer.php"; ?>
<!--/.main footer-->
</div>
<!-- ./wrapper -->
<!--<script src="dist/js/slide.js"></script>-->
    
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="ampunnya/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="ampunnya/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- adminlte App -->
<script src="ampunnya/dist/js/adminlte.min.js"></script>
    
<!--script tambahan-->
    <!-- overlayScrollbars -->
<script src="ampunnya/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="ampunnya/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
<script src="ampunnya/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>


<!--photoswipe -->
<script src="ampunnya/plugins/photoswipe/photoswipe.min.js"></script>
<script src="ampunnya/plugins/photoswipe/photoswipe-ui-default.min.js"></script>
<!--w3 slideshow-->
<script src="ampunnya/plugins/w3-slideshow/w3-slideshow.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
    <!--mansory layout-->
<!--<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>-->

<script>

    function tabPost(postId){
        var tabs = document.querySelectorAll('.tab'),
            leght = tabs.length;
        var tab = tabs.id;
        for(var i=0;i<leght;i++){
            tabs[i].classList.remove('show');
            var tabId = "#"+tabs[i].getAttribute('id');
            if(tabId == postId){
                tabs[i].classList.add('show');
                console.log(tabs[i].getAttribute('id'));
            }
//            console.log(tabs[i].getAttribute('id'));
        }
    }
    var banyakPost = 5;
    tampilkanPost(banyakPost);
    
    function tampilkanLebih(post){
        tampilkanPost(banyakPost += post);
    }
    
    function tampilkanPost(n){
        var post = document.querySelectorAll('.post-item'),
            maks = post.length;
        if(n>maks){
            n = maks;
        }
        for(var i = 0; i < n; i++){            
            post[i].style.display = "flex";
        }
    }
    linkKategori();
    function linkKategori(){
        var katLink = document.querySelectorAll('.kat-link-1'),
            legth = katLink.length;
        for(var i =  0; i<legth;i++){
            var kat = katLink[i].innerText;
            katLink[i].setAttribute("href","?page=News&&c="+kat);
        }
    }
    
    
</script>
    
</body>
</html>
