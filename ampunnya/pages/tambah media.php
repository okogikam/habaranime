<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post = pilihPhoto($id);
    $tag = $post['tag'];
    $alt = get_post($post['alt']);
    $url = $post['gambar'];
   
    $hasil = "";
    if(isset($_POST['draft'])){
    $id = $_POST['id'];
    $tag = sanitizeString($_POST['tag']);
    $alt = sanitizeString($_POST['alt']);
    $url = $_POST['fileToUploadUrl'];;
    
    $status = 0;
    $hasil = editPhoto($id,$tag,$alt,$url,$status);
        
    }else if(isset($_POST['update'])){
    $id = $_POST['id'];
    $tag = sanitizeString($_POST['tag']);
    $alt = sanitizeString($_POST['alt']);
    $url = $_POST['fileToUploadUrl'];
    $status = 1;
    $hasil = editPhoto($id,$tag,$alt,$url,$status);
    
    }
}else if(isset($_POST['simpan'])){
    $alt = sanitizeString($_POST['alt']);    
    $tag = sanitizeString($_POST['tag']);
    $url = $_POST['fileToUploadUrl'];
    $status = 0;
    $hasil = simpanPhoto($tag,$alt,$url,$status);
    $ids = pilihSemuaPhoto();
    $id = $ids[0]['no'];
    
}else if(isset($_POST['publish'])){
//    $id = $_POST['id'];
    $alt = sanitizeString($_POST['alt']);    
    $tag = sanitizeString($_POST['tag']);
    $url = $_POST['fileToUploadUrl'];
    $status = 1;
    $hasil = simpanPhoto($tag,$alt,$url,$status);
    $ids = pilihSemuaPost();
    $id = $ids[0]['no'];

}else if(isset($_POST['draft'])){
    $id = $_POST['id'];
    $alt = sanitizeString($_POST['alt']);    
    $tag = sanitizeString($_POST['tag']);
    $url = $_POST['fileToUploadUrl'];
    $status = 0;
    $hasil = "";
    
    
}else if(isset($_POST['update'])){
    $id = $_POST['id'];
    $alt = sanitizeString($_POST['alt']);    
    $tag = sanitizeString($_POST['tag']);
    $url = $_POST['fileToUploadUrl'];
    $status = 1;
    $hasil = "";
   
}else{
    $id = "";
    $tag = "";
    $alt = "";
    $url = "";
    $hasil = "";
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Media</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Media</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
     <form action="" method="post">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail</h3>
            </div>
            <div class="card-body">
                <div class="input-group mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text">Tag</span>
                </div>
                <input type="text" name="tag" class="form-control" value='<?php echo $tag; ?>' required>
                </div>
                <div class="input-group mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text">Alt</span>
                </div>
                <input type="text" name="alt" class="form-control" value='<?php echo $alt; ?>'>
                </div>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Url</span>
                </div>
                <input type='text' name='fileToUploadUrl' id='fileToUploadUrl' value='<?php echo $url; ?>' onchange='PreviewImageUrl()' placeholder='copy url image disini..' class='form-control' required>
                </div>
            </div>
          </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    Simpan Media
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
                </div>
            </div>  
        </div>
        <!-- /.col-->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    Gambar
                  </h3>
                </div>
                <div class="card-body">
                    <p style='max-width:100%;overflow:hidden;'><img id='uploadPreview' src='<?php echo $url; ?>' style='width: 100%;margin:auto;' name='uploadPreview'></p>   
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