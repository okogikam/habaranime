<?php
include_once "rot/delete.php";

if(isset($_POST['post_id'])){
    $post_id = $_POST['post_id'];
    $hasil = deletePost($post_id);
}else{
    $hasil = "";
}
if(!empty($hasil)){
    echo <<<_END
    <div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Status</strong><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close" onclick="close_toasts()"><span aria-hidden="true">×</span></button></div><div class="toast-body">$hasil.</div></div></div>
_END;
}
$Posts = pilihSemuaPost(); 
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Semua Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Semua Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Post</h3>
              <p><?php echo $hasil; ?></p>
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th style="width:600px;">Judul Post</th>
                  <th>Status</th>
                  <th>View</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($Posts as $post){
                        if($post['status'] == 1){
                            $status = "Publish";
                        }else{
                            $status = "<p style='color:red;'>Draft</p>";
                        }                        
                        echo "<tr>";
                        echo "<td>$no</td>";
                        echo "<td><a href='?page=New%20Post&&id=$post[no]'>$post[judul_artikel]</a><br>
                        $post[kategori]<br>
                        $post[waktu_artikel]
                        </td>";
                        echo "<td>$status</td>";
                        echo "<td>$post[view]</td>";
                        echo "<td class='row'>";
                        echo "<form action='' method='post' class='p-0 col-6'>
                        <input type='hidden' name='post_id' value='$post[no]'>
                        <button class='btn bg-danger' type='submit' name='delete' title='hapus' onclick='return konfirmasi()'><i class='fas fa-trash'></i></button>
                        </form>";
                        echo "<a href='?page=New%20Post&&id=$post[no]' class='btn bg-primary col-5' title='edit'><i class='fas fa-edit'></i></a>";
                        echo "</td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>                
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Judul Post</th>
                  <th>Status</th>
                  <th>View</th>
                  <th>Option</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
