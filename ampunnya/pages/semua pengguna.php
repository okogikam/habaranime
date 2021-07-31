<?php
include_once "rot/delete.php";
if(isset($_POST['delete_user'])){
    $id = $_POST['user_id'];
    $hasil = deleteUser($id);
}else if(isset($_POST['reset_pass'])){
    $id = $_POST['user_id'];
    $hasil = randomPassword();
    $reset_pass = $data->update_data("user",$id,"password","'$hasil'",$conn);
}else{
    $hasil = "";
}
if(!empty($hasil)){
    echo <<<_END
    <div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Status</strong><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close" onclick="close_toasts()"><span aria-hidden="true">×</span></button></div><div class="toast-body">$hasil.</div></div></div>
_END;
}
$Users = pilihSemuaUser();

?>
<!-- Content Wrapper. Contains page content -->
  <div class='content-wrapper'>
    <!-- Content Header (Page header) -->
    <section class='content-header'>
      <div class='container-fluid'>
        <div class='row mb-2'>
          <div class='col-sm-6'>
            <h1>Pengguna</h1>
          </div>
          <div class='col-sm-6'>
            <ol class='breadcrumb float-sm-right'>
              <li class='breadcrumb-item'><a href='#'>Home</a></li>
              <li class='breadcrumb-item active'>Pengguna</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class='content'>

      <!-- Default box -->
      <div class='card card-solid'>
        <div class='card-body pb-0'>
          <div class='row d-flex align-items-stretch'>
              <?php
    foreach($Users as $users){
        if(empty($users['avatar'])){
            $users['avatar'] = "dist/img/avatar.png";
        }
        echo <<<_END
        <div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch'>
              <div class='card bg-light'>
                <div class='card-header text-muted border-bottom-0'>
                  $users[status]
                </div>
                <div class='card-body pt-0'>
                  <div class='row'>
                    <div class='col-7'>
                      <h2 class='lead'><b>$users[user_name]</b></h2>
                      <ul class='ml-2 fa-ul'>
                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-user'></i></span> Nama: $users[nama]</li>
                        <li class='small'><span class='fa-li'><i class='fas fa-lg fa-envelope'></i></span> Email : $users[email]</li>
                      </ul>
                    </div>
                    <div class='col-5 text-center'>
                      <p class='photo-profil-sm text-center mt-1 image-fluid'><img src='$users[avatar]' alt='' class='image-fluid'></p>
                    </div>
                  </div>
                </div>
                <div class='card-footer'>
                  <div class='text-right'>
                    <form action='' method='post' class='p-0 '>
                        <input type='hidden' name='user_id' value='$users[no]'>
_END;
        
        if($user_status == "Admin"){
            echo "<button class='btn btn-sm bg-warning' type='submit' name='reset_pass' title='reset password' onclick='return konfirmasi()'><i class='fas fa-redo'></i></button>";
            echo "<button class='btn btn-sm bg-danger' type='submit' name='delete_user' title='hapus' onclick='return konfirmasi()'><i class='fas fa-trash'></i></button>";
        }
                        
                    echo<<<_END
                        
                        <a href='?page=Profil&&id=$users[no]' class='btn btn-sm btn-primary'>
                      <i class='fas fa-user'></i> View Profile
                    </a>
                    </form>                    
                  </div>
                </div>
              </div>
            </div>
_END;
    }
    ?>
            
          </div>
        </div>
        <!-- /.card-body -->
        <div class='card-footer'>
<!--
          <nav aria-label='Contacts Page Navigation'>
            <ul class='pagination justify-content-center m-0'>
              <li class='page-item active'><a class='page-link' href='#'>1</a></li>
              <li class='page-item'><a class='page-link' href='#'>2</a></li>
              <li class='page-item'><a class='page-link' href='#'>3</a></li>
              <li class='page-item'><a class='page-link' href='#'>4</a></li>
              <li class='page-item'><a class='page-link' href='#'>5</a></li>
              <li class='page-item'><a class='page-link' href='#'>6</a></li>
              <li class='page-item'><a class='page-link' href='#'>7</a></li>
              <li class='page-item'><a class='page-link' href='#'>8</a></li>
            </ul>
          </nav>
-->
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
  var x = confirm("Apa anda yakin?");
  if (x){
      return true;
  }    
  else{
      return false;
  }
   return x; 
}
</script>