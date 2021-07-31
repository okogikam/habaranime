<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post = openPost($id);
    $judul = $post['judul_artikel'];
    $isi = get_post($post['isi']);
    $kategori = $post['kategori'];
    $tag = $post['tag'];
    $gambar = $post['gambar'];
    $hasil = "";
    if(isset($_POST['draft'])){
    $id = $_POST['id'];
    $judul = sanitizeString($_POST['judul']);
    $isi = get_post($_POST['isi']);
    $kategori = sanitizeString($_POST['kategori']);
    $tag = sanitizeString($_POST['tag']);
    $gambar = $_POST['fileToUploadUrl'];
    $status = 0;
    $hasil = editPost($id,$judul,$isi,$gambar,$kategori,$status,$tag);
    $ids = openPost($id);
    $isi = get_post($ids['isi']);
    
    }else if(isset($_POST['update'])){
    $id = $_POST['id'];
    $judul = sanitizeString($_POST['judul']);
    $isi = sanitizeString($_POST['isi']);
    $kategori = sanitizeString($_POST['kategori']);
    $tag = sanitizeString($_POST['tag']);
    $gambar = $_POST['fileToUploadUrl'];
    $status = 1;
    $hasil = editPost($id,$judul,$isi,$gambar,$kategori,$status,$tag);
    $ids =  openPost($id);
    $isi = get_post($ids['isi']);
    }
}else if(isset($_POST['simpan'])){
    $judul = sanitizeString($_POST['judul']);
    $isi = sanitizeString($_POST['isi']);
    $kategori = sanitizeString($_POST['kategori']);
    $tag = sanitizeString($_POST['tag']);
    $gambar = $_POST['fileToUploadUrl'];
    $status = 0;
    $hasil = simpanPost($judul,$isi,$gambar,$kategori,$status,$tag);
    $ids = pilihSemuaPost();
    $id = $ids[0]['no'];
    $isi = get_post($ids[0]['isi']);
//    header("location:?page=New%20Post&&id=$id");
}else if(isset($_POST['publish'])){
//    $id = $_POST['id'];
    $judul = sanitizeString($_POST['judul']);
    $isi = sanitizeString($_POST['isi']);
    $kategori = sanitizeString($_POST['kategori']);
    $tag = sanitizeString($_POST['tag']);
    $gambar = $_POST['fileToUploadUrl'];
    $status = 1;
    $hasil = simpanPost($judul,$isi,$gambar,$kategori,$status,$tag);
    $ids = pilihSemuaPost();
    $id = $ids[0]['no'];
    $isi = get_post($ids[0]['isi']);

}else if(isset($_POST['draft'])){
    $id = $_POST['id'];
    $judul = sanitizeString($_POST['judul']);
    $isi = sanitizeString($_POST['isi']);
    $kategori = sanitizeString($_POST['kategori']);
    $tag = sanitizeString($_POST['tag']);
    $gambar = $_POST['fileToUploadUrl'];
    $status = 0;
    $hasil = editPost($id,$judul,$isi,$gambar,$kategori,$status,$tag);
    $ids = pilihSemuaPost();
    $isi = get_post($ids[0]['isi']);
    
}else if(isset($_POST['update'])){
    $id = $_POST['id'];
    $judul = sanitizeString($_POST['judul']);
    $isi = sanitizeString($_POST['isi']);
    $kategori = sanitizeString($_POST['kategori']);
    $tag = sanitizeString($_POST['tag']);
    $gambar = $_POST['fileToUploadUrl'];
    $status = 1;
    $hasil = editPost($id,$judul,$isi,$gambar,$kategori,$status,$tag);
    $ids = pilihSemuaPost();
    $isi = get_post($ids[0]['isi']);
}else{
    $hasil = "";
    $judul = "";
    $isi = "";
    $kategori = "";
    $tag = "";
    $gambar = "";
    $id = "";
}
$daftar_katagori = $data->buka_semua("kategori","id_kat",$conn);
$daftar_tag = $data->buka_semua("tag","id_tag",$conn);
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Text Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Text Editors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
     <form action="" method="post">
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Judul Post</h3>
            </div>
            <div class="card-body">                  
              <input type="text" name="judul" class="form-control" value="<?php echo $judul; ?>" required>
            </div>
          </div>
            
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Post
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>             
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" placeholder="Place some text here" name="isi"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $isi; ?></textarea>
              </div>
              <p class="text-sm mb-0">
                Editor <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">Documentation and license
                information.</a>
              </p>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    Simpan Post
                  </h3>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <p><?php echo $hasil; ?></p>
                    <?php
                    if(!empty($id)){
                        echo "
                        <button type='submit' name='draft' class='btn btn-default'>Draft</button>
                    <button type='submit' name='update' class='btn btn-default'>Update</button>";
                    }else{
                        echo"
                        <button type='submit' name='simpan' class='btn btn-default'>Simpan</button>
                    <button type='submit' name='publish' class='btn btn-default'>Publish</button>";
                    }
                    ?>
<!--
                    <button type='submit' name='simpan' class='btn btn-default'>Simpan</button>
                    <button type='submit' name='publish' class='btn btn-default'>Publish</button>
-->
                </div>
            </div>
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Kategori</h3>
            </div>
            <div class="card-body">                  
              <input type="text" name="kategori" class="form-control" id="kategori" value="<?php echo $kategori; ?>">
              <div class="kategori">
                  <?php
                  foreach($daftar_katagori as $daftar_kat){
                      echo<<<_END
                      <p class="item-kategori" onclick="tambahKategori('$daftar_kat[kategori]')">$daftar_kat[kategori]</p>
_END;
                      
                  }
                  ?>
                  
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tags</h3>
            </div>
            <div class="card-body">                  
              <input type="text" name="tag" class="form-control" id="tag" value="<?php echo $tag; ?>">
              <div class="kategori">
                  <?php
                  foreach($daftar_tag as $tags){
                      echo<<<_END
                      <p class="item-kategori" onclick="tambahTag('$tags[tag]')">$tags[tag]</p>
_END;
                      
                  }
                  ?>
              </div>
            </div>
          </div>
            
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    Gambar
                  </h3>
                </div>
                <div class="card-body">
                    <p class="text-center" style='max-width:100%;overflow:hidden;'><img id='uploadPreview' src='<?php echo $gambar; ?>' style='max-width: 300px;width: 100%;margin-right: 20px;' name='uploadPreview'></p>
                    <p>URL: <input type='text' name='fileToUploadUrl' id='fileToUploadUrl' onchange='PreviewImageUrl()' placeholder='copy url image disini..' class='form-control' value="<?php echo $gambar; ?>" required></p>
                    
                </div>
            </div>
        </div>
          <!--./col-->
      </div>
      <!-- ./row -->
     </form>
     <!-- ./form-->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->