<?php
if(isset($_GET['id'])){
    $id_post = get_variabel($_GET['id']);
    $post = $data->dataQuery($conn,"SELECT * FROM artikel WHERE no='$id_post'");
    $kategori = $data->buatArray(',',$post['kategori']);
    if(is_array($post)){
        $post_lain = $data->dataQuery($conn,"SELECT judul_artikel,no FROM artikel ORDER BY waktu_artikel DESC");
        $b = count($post_lain);
        $a = rand(0,$b);
        if($a == $id_post){$a++;}
        $baca_juga = $post_lain[$a]['no'];
        $baca_juga_judul = get_post($post_lain[$a]['judul_artikel']);
        $n = count($post_lain);
        for($x=0;$x<$n;$x++){
            $judul = $post_lain[$x]['judul_artikel'];
            if($judul == $post['judul_artikel']){
                $next = $x-1;
                $prev = $x+1;
                if($next < 0 ){$next = 0;}
                if($prev > $n ){$prev = $n;}
                
                $post_selanjutnya = $post_lain[$next]['no'];
                $post_sebelumnya = $post_lain[$prev]['no'];
            }
        }
    }
    //$tambah_view = tambahView($id_post);
    //echo $tambah_view;
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include_once "content_header.php"; ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- main post-->
        <div class="row mt-5 p-1">
        <!--berita terbaru -->
        <div class="card col-sm-8 p-0">  
        
         <div class="main-post col-sm-12 p-0">
             <div class="post-thumnell text-center">
                 <img class="img" src="<?php echo $post['gambar']; ?>">
             </div>
             <div class="post-judul p-3">
                 <h1><?php echo get_post($post['judul_artikel']); ?></h1>
                 <?php
                 foreach($kategori as $kat){
                 echo<<<_END
                 <span class=""><a class="kat-link-1" >$kat</a></span>
_END;
                 }
                 ?>
             </div>
             <div class="post-isi text-justify p-4">
                 <?php 
                 include "./pages/iklan.html";
                 echo get_post($post['isi']); 
                 ?>                
                 
                 
             </div>
             <div class="post-list p-3">
                 <p class="float-left"><a href="?page=News&&id=<?php echo $post_selanjutnya; ?>">&#x00AB; Post Selanjutnya</a></p>
                 <p class="float-right"><a href="?page=News&&id=<?php echo $post_sebelumnya; ?>">Post Sebelumnya &#x00BB;</a></p>
             </div>
        </div>
            <div id="baca-juga">
                 <p><a href="?page=News&&id=<?php echo $baca_juga; ?>">Baca juga: <?php echo $baca_juga_judul; ?></a></p>
            </div>
        </div>
        <!--berita terpopuler -->
        <?php include_once "trending.php"; ?>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  