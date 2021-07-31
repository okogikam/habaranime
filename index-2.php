<?php
include "rot/connect.php";
?>
<html>
    <head>
        
        <link rel="shortcut icon" href="img/logo-blog.png">
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
        <?php
        if(isset($_GET['id'])){
    $id = $_GET['id'];

$post = "SELECT * FROM artikel WHERE no = '$id'";
$row4s = $conn->query($post);
if(!$row4s)die($conn->error);
$row4s->data_seek(0);
$des = $row4s->fetch_array(MYSQLI_BOTH);
            echo "<title>$des[judul_artikel]</title>";
            echo "<meta name='description' content='$des[judul_artikel]'>";
}else{
            echo "<title>Habar-Anime</title>";
            echo "<meta name='description' content='Info Anime Series dan Movie Terbaru'>";
        }
        ?>        
        <?php include "seo.php"; ?>
<meta name="google-site-verification" content="JB11hbc_ZFErXrE-1Ko2lEz0AzFdqHorR2kS_-_i6Mw" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/style.css">    
        <style>
            
        </style>
<!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124212435-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-124212435-1');
        </script>
        <!-- google adsend -->
<!--
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-9086552134201347",
            enable_page_level_ads: true
          });
        </script>
-->
        <script>
    // Fungsi Preview image 
            function PreviewImage(){
               var url = document.getElementById('fileToUpload').value;
                var view = document.getElementById('uploadPreview');
                view.src = url;
            };
    function PreviewImageUrl(){
        var url = document.getElementById('fileToUploadUrl').value;
//        var Url = FileReader.readAsDataURL(document.getElementById('fileToUploadUrl'));
        var view = document.getElementById('uploadPreview');
        view.src = url;
    };
</script>
        
    </head>
    <body id="body">
        <?php include "header.php" ?>
        
<!--        <?php include "./nav.php"; ?>-->
        
        <?php include "post.php"; ?>
        
        <?php include "footer.php"; ?>
<!--        <script src="js/materialize.min.js"></script>-->
<!--        <script src="js/nav.js"></script>-->
        <script>
//            window.onscroll = function() {myFunction()};
            window.onscroll = function() {stickyMenu()};       
            var navbar = document.getElementById("topheader");
            var sticky = navbar.offsetTop;
            function stickyMenu(){
                
                if(window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky");
                } else {
                    navbar.classList.remove("sticky");
                }
            };
            var menus = navbar.getElementsByClassName("menu");
            
            for (var i = 0; i < menus.length; i++) {
                menus[i].addEventListener("click", function(){
                    var sekarang = document.getElementsByClassName("active");
                    sekarang[0].className = sekarang[0].className.replace(" active", "");
                    this.className += " active";
                })
            }
            //slideshow
            var slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n){
                showSlides(slideIndex += n);
            };
            
            function currentSlide(n) {
                showSlides(slideIndex = n);
            };
            
            function showSlides(n){
                var i;
                var slides = document.getElementsByClassName("slide");
                var dots = document.getElementsByClassName("dot");
                if (n > slides.length) {slideIndex = 1}
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slideIndex++;
                if(slideIndex > slides.length) { slideIndex = 1}
                slides[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " active";
                setTimeout(showSlides, 8000);
            };
        
            //akhir slideshow
            
            
            var slideIndexGalery = 1;
            showSlideGalery(slideIndexGalery);
            
            function plusSlidesGalery(n){
                showSlideGalery(slideIndexGalery += n);
            }
            
            function showSlideGalery(n){
                var i;
                var galery = document.getElementsByClassName("slide-galery");
                if (n > galery.length) {slideIndexGalery = 1}
                for (i = 0; i < galery.length; i++) {
                    galery[i].style.display = "none";
                }
                
                slideIndexGalery++;
                if(slideIndexGalery > galery.length) { slideIndexGalery = 1}
                galery[slideIndexGalery-1].style.display = "block";
                setTimeout(showSlideGalery,2000);
            };
        </script>
    </body>
</html>
