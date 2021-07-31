<?php
$populer_post = $data->dataQuery($conn, "SELECT * FROM artikel WHERE status='1' ORDER BY view DESC");
?>
<div class="col-sm-4 p-1 m-0">
    <div class="card trend p-1 ml-1">
            <p class="judul">Trending News</p>
            <?php
            
            for($x=0;$x<5;$x++){
                $trending = $populer_post[$x];
                $link_trending = linkPost($page,$trending['no'],$trending['judul_artikel']);
            echo<<<_END
            <div class="row mb-1">
                <div class="col-4">
                <div style="background-image:url('$trending[gambar]');" class="img-trend img-blt"></div>
                </div>
                <div class="col-8">
                    <span class="font-weight-light judul-sm">$link_trending</span>
                </div>                
            </div>
_END;
            }
            ?>
    </div>
    <div class="card mt-1 ml-1">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- iklan panjang -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-9086552134201347"
             data-ad-slot="7269445737"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <div class = "card mt-1 ml-1">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLND56GTJyPqF6ACrc3_RRkNwkKELctuP3" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="card mt-1 ml-1">
    <?php
    iklanHancau();
    ?>
    <br>
    </div>
   
    <div class="card mt-1 ml-1">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- iklan panjang -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-9086552134201347"
             data-ad-slot="7269445737"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div>
