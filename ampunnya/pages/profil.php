<?php
if(isset($_GET['id']) || isset($_POST['id_user'])){
    $id = sanitizeString($_GET['id']);
    $Profil = pilihUser($id);
    
    if(isset($_POST['pass_reset'])){
    $pass_baru = $_POST['pass_baru'];
    $pass_baru_ulang = $_POST['pass_baru_ulang'];
    $pass_lama = $_POST['pass_lama'];
        if($pass_lama === $Profil['password'] and $pass_baru==$pass_baru_ulang){
            $hasil = $data->update_data("user",$id,"password","'$pass_baru'",$conn);
        }else{
            $hasil = "ERROR - Password Salah";
        }
    
    }else if(isset($_POST['simpan_User'])){
        $nama = sanitizeString($_POST['nama']);    
        $username = sanitizeString($_POST['username']);
        $email = sanitizeString($_POST['email']);
        $avatar = sanitizeString($_POST['fileToUploadUrl']);
        $status = sanitizeString($_POST['status']);
        $pass = $Profil['password'];
        $hasil = editUser($id,$nama,$username,$avatar,$email,$pass,$status);
    }else{
        $hasil = "gagal:404";
    }
    $Profil = pilihUser($id);
}else{
    $Profil['nama']=$user_data['nama'];
    $Profil['email']=$user_data['email'];
    $Profil['user_name']=$user_data['user_name'];
    $Profil['avatar']=$user_data['avatar'];
    $Profil['no']=$user_data['no'];
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
            <h1>Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
     <form action="" method="post" name="myForm">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Foto Profil</h3>
            </div>
            <div class="card-body pt-0 pb-0">                
                <div class="form-group">
                <p class="photo-profil text-center mt-1"><img id='uploadPreview' src='<?php echo "$Profil[avatar]"; ?>' class='elevation-2' name='uploadPreview'></p>  
                </div>
                <div class="form-group">
                <div class="form-group-prepend">
                    <span class="form-group-text">ubah</span>
                </div>
                <input type='text' name='fileToUploadUrl' id='fileToUploadUrl' onchange='PreviewImageUrl()' placeholder='200 x 200px' class='form-control' value="<?php echo $Profil['avatar']; ?>" required>
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
                    <p><?php echo $hasil; ?></p>
                    <input type="hidden" name="id_user" value="<?php echo $Profil['no']; ?>">
                    <button type="submit" name="simpan_User" class="btn btn-default">Simpan</button>
                </div>
            </div>  
        </div>
        <!-- /.col-->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profil" data-toggle="tab">Profil</a></li>
                  <?php if($Profil['no'] == $_SESSION['user_id']){ 
                  echo"<li class='nav-item'><a class='nav-link' href='#password' data-toggle='tab'>Rubah Password</a></li>"; 
                  }?>
                </ul>
              </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                <div class="active tab-pane" id="profil">
                <div class="form-group mb-1">
                 <div class="form-group-prepend">
                    <span class="form-group-text">Nama</span>
                </div>
                <input type="text" name="nama" class="form-control" value="<?php echo $Profil['nama']; ?>">
                </div> 
                    <div class="form-group mb-1">
                <div class="form-group-prepend">
                    <span class="form-group-text">Username</span>
                </div>
                <input type="text" name="username" class="form-control" value="<?php echo $Profil['user_name']; ?>">
                </div>
                <div class="form-group mb-1">
                <div class="form-group-prepend">
                    <span class="form-group-text">Email</span>
                </div>
                <input type="email" name="email" class="form-control" value="<?php echo $Profil['email']; ?>">
                </div>
                <div class="form-group mb-1">
                <div class="form-group-prepend">
                    <span class="form-group-text">Status</span>
                </div>
                <?php
                    if($user_status == "Admin"){
                        echo "<select class='form-control select2' name='status'>";
                    }else{
                        echo "<select class='form-control select2' name='status' disabled>";
                    }
                ?>
                
                    <?php
                    if($user_status =="Admin"){
                        echo "<option selected='selected' >Admin</option>
                    <option>Penulis</option>";
                    }else{
                        echo "<option>Admin</option>
                    <option selected='selected' >Penulis</option>";
                    }
                    ?>
                    
                  </select>
                </div>
                
                </div>
                <div class="tab-pane" id="password">
                
                <div class="form-group mb-1">
                <div class="form-group-prepend">
                <span class="form-group-text">Pasword Lama</span>
                </div>
                <input type="password" name="pass_lama" class="form-control" >
                </div>
                <div class="form-group mb-1">
                <div class="form-group-prepend">
                    <span class="form-group-text">Password Baru</span>
                </div>
                <input type="password" name="pass_baru" class="form-control" >
                </div>
                
                <div class="form-group mb-1">
                <div class="form-group-prepend">
                    <span class="form-group-text">Tulis Ulang</span>
                </div>
                <input type="password" name="pass_baru_ulang" class="form-control" >
                </div>
                    <button type="submit" name="pass_reset" class="btn btn-default bg-warning" value='reset'>Reset</button>
                </div>
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
