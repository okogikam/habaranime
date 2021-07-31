<?php
include_once "rot/session.php";
include_once "rot/function.php";
$web_data = pilihDataWeb();
$user_data = pilihUser($user_id);
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="icon" href="<?php echo $web_data['icon']; ?>" type="image/x-icon" />
  <title><?php echo $web_data['title']; ?></title>
    
<!--required style-->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- style tambahan-->
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- Toastr -->
<!--  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">-->
    <style>
        *{
            box-sizing: border-box;
        }
        .note-editable{
            min-height: 400px;
        }
        .kategori{
            max-height: 200px;
            overflow: auto;
        }
        .item-kategori{            
            cursor: pointer;
        }
        .photo-profil-xm{
            height: 45px;
            width: 45px;
            overflow: hidden;
            border-radius: 50%;
            position: relative;
        }
        .photo-profil-sm{
            height: 100px;
            width: 100px;
            overflow: hidden;
            border-radius: 50%;
            position: relative;
        }
        .photo-profil, .photo-icon{
            height: 200px;
            width: 200px;
            overflow: hidden;
            border-radius: 50%;
            position: relative;
        }
        .photo-profil img,.photo-profil-sm img, .photo-profil-xm img{
            width: 100%;
            height: 100%;
        }
        .photo-icon img{
            width: 100%;
        }
        .col-sm-12{
            overflow: auto;
        }
    </style>
    <script>
    function PreviewImageUrl(){
        var url = document.getElementById('fileToUploadUrl').value;
//        var Url = FileReader.readAsDataURL(document.getElementById('fileToUploadUrl').files[0]);
        var view = document.getElementById('uploadPreview');
        view.src = url;
    };
    </script>
    <script>
    function preview_image(event) {
     var reader = new FileReader();
     reader.onload = function()
     {
      var output = document.getElementById('output_image');
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
    }
    </script>
    
</head>
<body class="hold-transition sidebar-mini layout-fixed  layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
 <?php include_once "navbar.php"; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once "main-sidebar.php"; ?>
  <!-- Content Wrapper. Contains page content -->
 <?php include_once "main-content.php"; ?>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <?php include_once "control-sidebar.php"; ?>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include_once "footer.php"; ?>
<!--/.main footer-->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
    
<!--script tambahan-->
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="dist/js/demo.js"></script>-->
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<!-- Page Script -->
<script>
  $(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for glyphicon and font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var glyph = $this.hasClass('glyphicon')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (glyph) {
        $this.toggleClass('glyphicon-star')
        $this.toggleClass('glyphicon-star-empty')
      }

      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>
    <!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
    <!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
    <!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
    <!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script>
    function tambahKategori(items){
        var ktg = document.getElementById('kategori');
        var hasil = ktg.value += items + ',';
        return hasil;
    }
    function tambahTag(items){
        var ktg = document.getElementById('tag');
        var hasil = ktg.value += items + ',';
        return hasil;
    }
    function close_toasts(){
        var toasts = document.getElementById('toastsContainerTopRight');
        toasts.style.display = 'none';
       
    }
</script>
</body>
</html>
