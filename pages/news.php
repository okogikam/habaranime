<?php
if($page == "News"){
    $news = $data->pilih_semua_aktif("artikel",$conn);
    $y = rand(0,10);
    $flashNews = linkPost($page,$news[$y]['no'],$news[$y]['judul_artikel']);
    if(isset($_GET['c']) || isset($_GET['i'])){
        if(isset($_GET['i'])){
            $c = get_variabel($_GET['i']);
        }else{
            $c = get_variabel($_GET['c']);
        } 
        $pencarian_post = $data->dataQuery($conn,"SELECT * FROM artikel WHERE status='1' && kategori LIKE '%$c%' || judul_artikel LIKE '%$c%' ORDER BY waktu_artikel DESC");
    }else{
        $c = "news";
        $pencarian_post = $data->dataQuery($conn,"SELECT * FROM artikel WHERE status='1' && kategori LIKE '%$c%' ORDER BY waktu_artikel DESC");
    }
    
    $news_post = $data->dataQuery($conn,"SELECT * FROM artikel WHERE status='1' && kategori LIKE '%news%' ORDER BY waktu_artikel DESC");
    $info_post = $data->dataQuery($conn,"SELECT * FROM artikel WHERE status='1' && kategori LIKE '%info%' ORDER BY waktu_artikel DESC");
    $bionime_post = $data->dataQuery($conn,"SELECT * FROM artikel WHERE status='1' && kategori LIKE '%bionime%' ORDER BY waktu_artikel DESC");
    $cosplay_post = $data->dataQuery($conn,"SELECT * FROM artikel WHERE status='1' && kategori LIKE '%cosplay%' ORDER BY waktu_artikel DESC");
    $populer_post = $data->dataQuery($conn, "SELECT * FROM artikel WHERE status='1' ORDER BY view DESC");
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include_once "content_header.php"; ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card flash-news">
            <font>Flash News</font>
            <marquee><?php echo $flashNews; ?></marquee>
        </div>
        <!-- berita headline -->
        <div class="row mb-1 bg-headline">
            <div class="text-center headline">
            <div class="col-sm-12 p-3 ">
                <?php
                for($x=0;$x<3;$x++){
                $no = rand(0,20);
                $headline = $news[$no];
                $link_headline = linkPost($page,$headline['no'],$headline['judul_artikel']);
                $kategori_headline = $data->buatArray(",",$headline['kategori']);
                echo<<<_END
                <div class="card pt-1 col-sm-3 white">
                    <div class="post-img-sm">
                        <img class="img" src="$headline[gambar]">
                        <span class="kat"><a class="kat-link-1" href="#">$kategori_headline[0]</a></span>
                    </div>
                    <div class="judul-sm">
                        <p>$link_headline</p>
                    </div>
                </div>
_END;
                }
                    ?>        
            </div>
            </div>
            <div class="slideshow-container">
                <?php
                for($x=0;$x<3;$x++){
                if(isset($_GET['c'])){
                    $c = get_variabel($_GET['c']);
                    if($c=="news"){
                        $slide =$news_post;
                    }if($c=="info"){
                        $slide =$info_post;
                    }if($c=="bionime"){
                        $slide =$bionime_post;
                    }if($c=="cosplay"){
                        $slide =$cosplay_post;
                    }else{
                        $slide =$news_post;
                    }
                }else{
                    $slide =$news_post;
                }
                    $slide_post = $slide[$x];
                    $link_slide = linkPost($page,$slide_post['no'],$slide_post['judul_artikel']);
                    $kategori_slide=$data->buatArray(",",$slide_post['kategori']);
                echo<<<_END
                <div class="mySlides fade text-center card img-slide m-auto white">
                    <div class="p-2 post-img-sm">
                        <img class="img" src="$slide_post[gambar]">
                        <span class="kat"><a class="kat-link-1" href="#">$kategori_slide[0]</a></span>
                    </div>
                    <div class="card-footer">
                        <p>$link_slide</p>
                    </div>
                </div>
_END;
                }
                    ?>
                 
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
        
        <!-- main post-->
        <div class="row mt-5 p-1">
        <!--berita terbaru -->
        <div class="col-sm-8 mt-2 mb-2 bt-2 pt-3">
            <?php iklanHancau(); ?>
        <div class="row mb-2">
          <div class="col-sm-6">
            <p class="judul"><?php echo "Tampilkan: ".$c ; ?></p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right bg-none" style="background-color:transparent;">
              <li class="breadcrumb-item"><a href="?page=News&&c=news">News</a></li>
              <li class="breadcrumb-item"><a href="?page=News&&c=info">Info</a></li>
              <li class="breadcrumb-item"><a href="?page=News&&c=bionime">Bionime</a></li>
              <li class="breadcrumb-item"><a href="?page=News&&c=cosplay">Cosplay</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
            <div class="col-sm-12" id="news">
            <?php
                if(is_array($pencarian_post)){
                    
            
            if(is_array($pencarian_post[0])){
            $banyak_pencarian = count($pencarian_post);
            echo "<span>Banyak Post: $banyak_pencarian</span>";
            
            include "pages/iklan.html";
            
            foreach($pencarian_post as $newsPost){
            $trak = 1;
            $link_news = linkPost($page,$newsPost['no'],$newsPost['judul_artikel']);
            $kategori_news = $data->buatArray(",",$newsPost['kategori']);
            echo<<<_END
            <div class="row post-item">
            <div class="col-sm-3 post-img-sm">
                <img class="img" src="$newsPost[gambar]">
                <span class="kat"><a class="kat-link-1" href="#">$kategori_news[0]</a></span>
            </div>
            <div class="col-sm-8">
                <p class="judul-sm">$link_news</p>
                <span class="judul-sm">Post: $newsPost[waktu_artikel]</span>
            </div>
            </div>
_END;

                
            }
            }else{
                $newsPost = $pencarian_post;
                $link_news = linkPost($page,$newsPost['no'],$newsPost['judul_artikel']);
            $kategori_news = $data->buatArray(",",$newsPost['kategori']);
            echo<<<_END
            <div class="row post-item">
            <div class="col-sm-3 post-img-sm">
                <img class="img" src="$newsPost[gambar]">
                <span class="kat"><a class="kat-link-1" href="#">$kategori_news[0]</a></span>
            </div>
            <div class="col-sm-8">
                <p class="judul-sm">$link_news</p>
                <span class="judul-sm">Post: $newsPost[waktu_artikel]</span>
            </div>
            </div>
_END;
            }
                }else{ echo $pencarian_post;}
            ?>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" onclick="tampilkanLebih(5)">Tampilkan Lebih Banyak</button>
            </div>
        </div>
        <!--berita terpopuler -->
        <?php include_once "trending.php"; ?>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
    bacaJuga();
    function bacaJuga(){
        var post_isi = document.querySelector('.post-isi'),
            post_p = post_isi.getElementsByTagName('p'),
            baca_juga = document.querySelector('#baca-juga'),
            baca_link = baca_juga.innerHTML,
            b = document.createTextNode(baca_link);
            x = post_p.length - 4;
        if(x<0){x = 0;}
        post_p[x].insertAdjacentHTML('afterend',baca_link);
        console.log(baca_link);
    }
</script>
