<?php
include_once "rot/delete.php";

if(isset($_POST['komen_id'])){
    $komen_id = $_POST['komen_id'];
    $hasil = deleteKomentar($komen_id);
}else{
    $hasil = "";
}
if(!empty($hasil)){
    echo <<<_END
    <div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Status</strong><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close" onclick="close_toasts()"><span aria-hidden="true">×</span></button></div><div class="toast-body">$hasil.</div></div></div>
_END;
}
$komens = pilihSemuaKomentar(); 
$url = "https://habaranime.info/?page=News";
?>  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Komentar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Komentar</li>
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
              <h3 class="card-title">Daftar Komentar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th style="width:300px;">Komentar</th>
                  <th>Post</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach($komens as $komen){
                        $komentar = get_post($komen['komentar']);
                        echo "<tr>";
                        echo "<td>$no</td>";
                        echo "<td>$komen[username]</td>";
                        echo "<td>$komen[email]</td>";
                        echo "<td>$komentar</td>";
                        echo "<td>";
                        echo "<form action='' method='post' class='p-0'>
                        <input type='hidden' name='komen_id' value='$komen[no]'>
                        
                        <a href='$url&&id=$komen[no]' class='btn btn-dafult bg-success' title='lihat'><i class='fas fa-external-link-alt'></i></a>
                        
                        <button class='btn bg-danger' type='submit' name='delete_komentar' title='hapus' onclick='return konfirmasi()'><i class='fas fa-trash'></i></button>
                        </form>";
                        echo "</td>";
                        echo "</tr>";
                        $no++;
                    }
                ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Komentar</th>
                  <th>Post</th>
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



