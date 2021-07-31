<?php
if(isset($_POST['simpan_User'])){
    $nama = sanitizeString($_POST['nama']);    
    $username = sanitizeString($_POST['username']);
    $email = sanitizeString($_POST['email']);
    $pass = $_POST['password'];
    $avatar = $_POST['fileToUploadUrl'];
    $status = $_POST['status'];
    $hasil = simpanUser($nama,$username,$avatar,$email,$pass,$status);
    
}else{
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
            <h1>Tambah Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Pengguna</li>
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
              <h3 class="card-title">Foto Profil</h3>
            </div>
            <div class="card-body pt-0 pb-0">                
                <div class="form-group">
                <p class="photo-profil text-center mt-1"><img id='uploadPreview' src='elevation-2' class='' name='uploadPreview'></p>  
                </div>
                <div class="form-group">
                <div class="form-group-prepend">
                    <span class="form-group-text">Url</span>
                </div>
                <input type='text' name='fileToUploadUrl' id='fileToUploadUrl' onchange='PreviewImageUrl()' placeholder='200 x 200px' class='form-control' required>
                </div>
            </div>
          </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    Tambah Pengguna
                  </h3>
                </div>
                <div class="card-body pt-2 pb-2">
                    <?php echo "<p>$hasil</p>"; ?>
                    <button type="submit" name="simpan_User" class="btn btn-default">Simpan</button>
                </div>
            </div>  
        </div>
        <!-- /.col-->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    Profil
                  </h3>
                </div>
                <div class="card-body">
                <div class="form-group mb-1">
                 <div class="form-group-prepend">
                    <span class="form-group-text">Nama</span>
                </div>
                <input type="text" name="nama" class="form-control">
                </div> 
                    <div class="form-group mb-1">
                <div class="form-group-prepend">
                    <span class="form-group-text">Username</span>
                </div>
                <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group mb-1">
                <div class="form-group-prepend">
                    <span class="form-group-text">Email</span>
                </div>
                <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group mb-1">
                <div class="form-group-prepend">
                    <span class="form-group-text">Status</span>
                </div>
                <select class="form-control select2" name="status">
                    <option selected="selected">Admin</option>
                    <option>Penulis</option>
                  </select>
                </div>
                <div class="form-group mb-1">
                <div class="form-group-prepend">
                    <span class="form-group-text">Password</span>
                </div>
                <input type="password" name="password" class="form-control">
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