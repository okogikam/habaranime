<?php
include_once "rot/delete.php";
if(isset($_POST['delete_photo'])){
    $id = $_POST['photo_id'];
    $hasil = dataquery("DELETE FROM wallpaper WHERE no='$id'");
    if($hasil == 1){ 
        $hasil = "berhasil";
    }
}else{
    $hasil = "";
}
if(!empty($hasil)){
    echo <<<_END
    <div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Status</strong><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close" onclick="close_toasts()"><span aria-hidden="true">×</span></button></div><div class="toast-body">$hasil.</div></div></div>
_END;
}
$gallery = $data->pilih_semua('wallpaper',$conn);
$jumlah = count($gallery);
if(isset($_GET['pg'])){
    $pg = $_GET['pg'];
}else{
    $pg = 1;
}
$min = ($pg-1)*9;
$maks = $pg*9;
if($maks > $jumlah){ $maks = $jumlah;}
$list = ceil($jumlah/9);
$url = "?page=Wallpaper";
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gallery</h1>
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
<button class="btn btn-default">
    <a href="?page=Wallpaper_HD">Tambah Baru</a>
</button>
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
              <?php
              for($x=$min;$x<$maks;$x++){
                  $photo = $gallery[$x];
                  if($photo['status'] == 1){
                      $eye = "fas fa-eye";
                  }else{
                      $eye = "fas fa-eye-slash";
                  }
                  echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch'>
              <div class='card bg-light'>
                <div class='card-header text-muted border-bottom-0'>
                  $photo[tag]
                </div>
                <div class='card-body pt-0'>
                  <img class='img-fluid' src='$photo[url]' alt='$photo[alt]'>                   
                </div>
                <div class='card-footer'>
               
                  <div class='text-right'>
                  <form action='' method='post'>
                  <input type='hidden' name='photo_id' value='$photo[no]'>
                    <button type='submit' name='delete_photo' class='btn btn-sm bg-teal' onclick='return konfirmasi()'>
                      <i class='fas fa-trash'></i>
                    </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>";
              }
              ?>
            
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <?php 
            
            echo pageNumber($list,$url,$pg); 
          ?>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
    function konfirmasi() {
  var x = confirm("Are you sure you want to delete?");
  if (x){
      return true;
  }    
  else{
      return false;
  }
   return x; 
}
</script>