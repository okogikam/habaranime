<?php
if($page == "Home"){
    $news = $data->pilih_semua_aktif("artikel",$conn);
    $y = rand(0,10);
    $flashNews = linkPost($page,$news[$y]['no'],$news[$y]['judul_artikel']);
    $pilih_news = $data->dataQuery($conn,"SELECT * FROM artikel WHERE status='1' && kategori LIKE '%news%' ORDER BY no DESC");
    $pilih_info = $data->dataQuery($conn,"SELECT * FROM artikel WHERE status='1' && kategori LIKE '%info%' ORDER BY no DESC");
    $pilih_bionime = $data->dataQuery($conn,"SELECT * FROM artikel WHERE status='1' && kategori LIKE '%bionime%' ORDER BY no DESC");
    $pilih_cosplay = $data->dataQuery($conn,"SELECT * FROM artikel WHERE status='1' && kategori LIKE '%cosplay%' ORDER BY no DESC");
    $populer_post = $data->dataQuery($conn, "SELECT * FROM artikel ORDER BY view DESC");
    $news_post = $pilih_news;
    $info_post = $pilih_info;
    $bionime_post = $pilih_bionime;
    $cosplay_post = $pilih_cosplay;
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
        <div class="row mb-1 headline">
            <div class="col-sm-6">
                <?php
                for($x=0;$x<3;$x++){
                    $berita = $news[$x];
                    $link_berita = linkPost($page,$berita['no'],$berita['judul_artikel']);
                    $kategori= $data->buatArray(',',$berita['kategori']);
                 echo <<<_END
                <div class="card post-utama">
                <div class="row">
                    <div class="col-sm-6 card-body">
                        <p class='judul-sm'>$link_berita</p>
                        <span class='judul-sm'>Post: $berita[waktu_artikel]</span>
                    </div>
                    <div class="col-sm-6 post-img-sm">
                      <img class="img" src="$berita[gambar]">
                        <span class="kat $kategori[0]"><a class="kat-link-1" href="#">$kategori[0]</a></span>
                    </div>
                </div>
                </div>
_END;
                }
                            ?>
               
              
            </div>
            <div class="col-sm-6 pl-0">
                <?php
                $berita_utama = $news[3];
                $link_berita_utama = linkPost($page,$berita_utama['no'],$berita_utama['judul_artikel']);
                $kategori= $data->buatArray(',',$berita_utama['kategori']);
                echo<<<_END
                <div class="card">                   
                    <div class="post-img">
                      <img class="img" src="$berita_utama[gambar]">
                        <span class="kat $kategori[0]"><a class="kat-link-3" href="#">$kategori[0]</a></span>
                    </div>
                    <div class="card-body">
                        <p class='judul'>$link_berita_utama</p>
                        <span>Post: $berita_utama[waktu_artikel]</span>
                    </div>
                </div>
_END;
                ?>
            </div>
        </div>
        <div class="slideshow-container">
            <?php
            for($x=0;$x<4;$x++){
                $slide = $news[$x];
                $link_slide = linkPost($page,$slide['no'],$slide['judul_artikel']);
                $kategori_slide= $data->buatArray(',',$slide['kategori']);
                echo<<<_END
                <div class="mySlides fade text-center card img-slide m-auto black">
                    <div class="p-2 post-img">
                        <img class="img" src="$slide[gambar]">
                        <span class="kat $kategori_slide[0]"><a class="kat-link-3">$kategori_slide[0]</a></span>
                        
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
        <!-- main post-->
        <div class="row mt-5 p-1">
        <!--berita terbaru -->
        <div class="col-sm-8 mt-2 bt-2 pt-3">
            <?php iklanHancau(); ?>
        <div class="row mb-2">
          <div class="col-sm-6">
            <p class="judul">Berita Terbaru</p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right bg-none" style="background-color:transparent;">
              <li class="breadcrumb-item"><a href="#news" onclick="tabPost('#news')">News</a></li>
              <li class="breadcrumb-item"><a href="#info" onclick="tabPost('#info')">Info</a></li>
              <li class="breadcrumb-item"><a href="#bionime" onclick="tabPost('#bionime')">Bionime</a></li>
              <li class="breadcrumb-item"><a href="#cosplay" onclick="tabPost('#cosplay')">Cosplay</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
            <div class="row tab show" id="news">
             <?php   
                for($x=0;$x<4;$x++){
                $newsPost = $news_post[$x];
                $link_news = linkPost($page,$newsPost['no'],$newsPost['judul_artikel']);
                $kategori_news= $data->buatArray(',',$newsPost['kategori']);
                echo<<<_END
                
            <div class="col-sm-6">
                <div class="card">
                <div class="post-img-sm">
                    <img class="img" src="$newsPost[gambar]">
                    <span class="kat"><a class="kat-link-1" href="#">$kategori_news[0]</a></span>
                </div>
                <div class="card-body">
                    <p class="judul-sm">$link_news</p>
                    <span>Post: $newsPost[waktu_artikel]</span>
                </div>
                </div>
            </div>
_END;
                }
             ?>
              <div class="text-center ml-auto mr-auto mb-2">
                    <a href="?page=News&&c=news"><button class="btn btn-primary">Tampilkan Lebih Banyak</button></a>
              </div>
            </div>
            <div class="row tab" id="info">
                <?php   
                for($x=0;$x<4;$x++){
                $infoPost = $info_post[$x];
                $link_info = linkPost($page,$infoPost['no'],$infoPost['judul_artikel']);
                $kategori_info= $data->buatArray(',',$infoPost['kategori']);
                echo<<<_END
                
            <div class="col-sm-6">
                <div class="card">
                <div class="post-img-sm">
                    <img class="img" src="$infoPost[gambar]">
                    <span class="kat"><a class="kat-link-1" href="#">$kategori_info[0]</a></span>
                </div>
                <div class="card-body">
                    <p class="judul-sm">$link_info</p>
                    <span>Post: $infoPost[waktu_artikel]</span>
                </div>
                </div>
            </div>
_END;
                }
             ?>
               <div class="text-center ml-auto mr-auto mb-2">
                    <a href="?page=News&&c=info"><button class="btn btn-primary">Tampilkan Lebih Banyak</button></a>
              </div>
            </div>
            <div class="row tab" id="bionime">
                <?php   
                for($x=0;$x<4;$x++){
                $bionimePost = $bionime_post[$x];
                $link_bionime = linkPost($page,$bionimePost['no'],$bionimePost['judul_artikel']);
                $kategori_bionime= $data->buatArray(',',$bionimePost['kategori']);
                echo<<<_END
                
            <div class="col-sm-6">
                <div class="card">
                <div class="post-img-sm">
                    <img class="img" src="$bionimePost[gambar]">
                    <span class="kat"><a class="kat-link-1" href="#">$kategori_bionime[0]</a></span>
                </div>
                <div class="card-body">
                    <p class="judul-sm">$link_bionime</p>
                    <span>Post: $bionimePost[waktu_artikel]</span>
                </div>
                </div>
            </div>
_END;
                }
             ?>
               <div class="text-center ml-auto mr-auto mb-2">
                    <a href="?page=News&&c=bionime"><button class="btn btn-primary">Tampilkan Lebih Banyak</button></a>
              </div>
            </div>
            <div class="row tab" id="cosplay">
                <?php   
                for($x=0;$x<4;$x++){
                $cosplayPost = $cosplay_post[$x];
                $link_cosplay = linkPost($page,$cosplayPost['no'],$cosplayPost['judul_artikel']);
                $kategori_cosplay= $data->buatArray(',',$cosplayPost['kategori']);
                echo<<<_END
                
            <div class="col-sm-6">
                <div class="card">
                <div class="post-img-sm">
                    <img class="img" src="$cosplayPost[gambar]">
                    <span class="kat"><a class="kat-link-1" href="#">$kategori_cosplay[0]</a></span>
                </div>
                <div class="card-body">
                    <p class="judul-sm">$link_cosplay</p>
                    <span>Post: $cosplayPost[waktu_artikel]</span>
                </div>
                </div>
            </div>
_END;
                }
             ?>
               <div class="text-center ml-auto mr-auto mb-2">
                    <a href="?page=News&&c=cosplay"><button class="btn btn-primary">Tampilkan Lebih Banyak</button></a>
              </div>
            </div>
                
              
           
        </div>
        <!--berita terpopuler -->
        <?php include_once "trending.php"; ?>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->