<?php
if(isset($_POST['simpan_setting'])){

$target_dir = "../wallpaper/";
$target_file = $target_dir . basename($_FILES["fileToUploadUrl"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["simpan_setting"])) {
  $check = getimagesize($_FILES["fileToUploadUrl"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
    // Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
    // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $icon = $_POST['icon'];
//  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUploadUrl"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUploadUrl"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
    $icon = $target_file;
}
    
    $alt = sanitizeString($_POST['title']);
    $tag = sanitizeString($_POST['keyword']);
    $url = $target_file;
    $hasil = dataquery("INSERT INTO wallpaper(alt,tag,url) VALUES('$alt','$tag','$url')");
    if($hasil == 1){
        $hasil = "berhasil";
    }else{
        $hasil = "terjadi kesalahan";
    }
}else{
    $hasil = "";
}

$web = pilihDataWeb();
$title = "";
$keyword = "";
$diskripsi = "";
$icon = "";
$email = "";

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Wallpaper HD</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gallery</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
     <form action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Wallpaper</h3>
            </div>
            <div class="card-body pt-0 pb-0">                
                <div class="form-group">
                <p class="photo-icon"><img id='output_image' src="<?php echo $icon; ?>" class='' name='uploadPreview'></p>  
                </div>
                <div class="form-group">                
                    <div class="input-group">
                        <div class="custom-file">
                <input type="hidden" name="icon" value="<?php echo $icon; ?>">
                <input type='file' name='fileToUploadUrl' id='fileToUploadUrl' onchange="preview_image(event)" placeholder='200 x 200px' class='custom-file-input' required>
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
          </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    Simpan Perubahan
                  </h3>
                </div>
                <div class="card-body pt-2 pb-2">
                    <?php echo "<p>$hasil</p>"; ?>
                    <button type="submit" name="simpan_setting" class="btn btn-default">Simpan</button>
                </div>
            </div>  
        </div>
        <!-- /.col-->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    Keterangan
                  </h3>
                </div>
                <div class="card-body">
                <div class="form-group mb-1">
                 <div class="form-group-prepend">
                    <span class="form-group-text">Alt</span>
                </div>
                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" required>
                </div> 
                    <div class="form-group mb-1">
                <div class="form-group-prepend">
                    <span class="form-group-text">Tag</span>
                </div>
                <input type="text" name="keyword" class="form-control" value="<?php echo $keyword; ?>" required>
                </div>
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