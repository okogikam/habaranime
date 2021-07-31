<?php 
include 'rot/connect.php';
//objeck utama
$data = new data;
class data{
    public $conn;
    //function dasar
    function dataQuery($conn,$query){
        $result = $conn->query($query);
        if(!$result){
            return $conn->error;
        }else{
            $rows = $result->num_rows;
            if($rows>1){
                $hasil_akhir = array();
                for($x=0;$x<$rows;$x++){
                $result->data_seek($x);
                $data = $result->fetch_array(MYSQLI_ASSOC);
                $hasil_sm = array();
                foreach($data as $item =>$isi){
                  $hasil_sm  += array($item => $isi);
                }
                $hasil_akhir += array("$x"=>$hasil_sm);
                $hasil = $hasil_akhir;
             }
            }if($rows == 1){
             $result->data_seek(0);
              $hasil = $result->fetch_array(MYSQLI_BOTH);
            }
            return $hasil;
        }
    }
    function buatArray($sintak,$isi){
        $result = explode($sintak,$isi);
        return $result;
    }
    
//    banyak data
    function banyak_post($tabel,$conn){
        $query = "select * from $tabel";
        $result = $conn->query($query);
        if(!$result)die($conn->error);
        $rows = $result->num_rows;
        return $rows; //hasil berupa angka
    }
    
//   pilih data
    function pilih_semua($tabel,$conn){
        $hasil_akhir = array();
        $query = "select * from $tabel ORDER BY no DESC";
        $result = $conn->query($query);
        if(!$result)die($conn->error);
        $rows = $result->num_rows;
        for($x=0;$x<$rows;$x++){
            $result->data_seek($x);
            $data = $result->fetch_array(MYSQLI_ASSOC);
            $hasil = array();
            foreach($data as $item =>$isi){
              $hasil  += array($item => $isi);
            }
            $hasil_akhir += array("$x"=>$hasil);
        }
        return $hasil_akhir; //hasil berupa array
    }
    function pilih_semua_aktif($tabel,$conn){
        $hasil_akhir = array();
        $query = "select * from $tabel WHERE status='1' ORDER BY no DESC";
        $result = $conn->query($query);
        if(!$result)die($conn->error);
        $rows = $result->num_rows;
        for($x=0;$x<$rows;$x++){
            $result->data_seek($x);
            $data = $result->fetch_array(MYSQLI_ASSOC);
            $hasil = array();
            foreach($data as $item =>$isi){
              $hasil  += array($item => $isi);
            }
            $hasil_akhir += array("$x"=>$hasil);
        }
        return $hasil_akhir; //hasil berupa array
    }
    //    mengambil data
    function open($tabel,$id,$nilai,$conn){
        $query = "SELECT * FROM $tabel WHERE $id='$nilai'";
        $result = $conn->query($query);
        if(!$result)die($conn->error);
        $data = $result->fetch_array(MYSQLI_BOTH);
        
        return $data;
    }
    function buka_semua($tabel,$id,$conn){
        $hasil_akhir = array();
        
        $query = "select * from $tabel ORDER BY $id DESC";
        $result = $conn->query($query);
        if(!$result)die($conn->error);
        
        $rows = $result->num_rows;
        for($x=0;$x<$rows;$x++){
            $result->data_seek($x);
            $data = $result->fetch_array(MYSQLI_ASSOC);
            $hasil = array();
            foreach($data as $item =>$isi){
              $hasil  += array($item => $isi);
            }
            $hasil_akhir += array("$x"=>$hasil);
        }
        return $hasil_akhir; //hasil berupa array
    }
    function buka_semua_aktif($query,$conn){
        $hasil_akhir = array();
        
        $result = $query;
        if(!$result)die($conn->error);
        
        $rows = $result->num_rows;
        for($x=0;$x<$rows;$x++){
            $result->data_seek($x);
            $data = $result->fetch_array(MYSQLI_ASSOC);
            $hasil = array();
            foreach($data as $item =>$isi){
              $hasil  += array($item => $isi);
            }
            $hasil_akhir += array("$x"=>$hasil);
        }
        return $hasil_akhir; //hasil berupa array
    }
    
//    delete data
    function delete($tabel,$where,$value,$conn){
        $query = "DELETE FROM $tabel WHERE $where = '$value'";
         $result = $conn->query($query);
        if(!$result){
            $hasil = "Gagal dihapus - ";
            $hasil .= $conn->error;
        }else{
            $hasil = "Berhasil dihapus";
        }
        return $hasil;
    }
    //    input data
    function input_data($tabel,$kolom,$nilai,$conn){
        $query = "INSERT INTO $tabel($kolom) VALUES($nilai)";
        $result = $conn->query($query);
        if(!$result){
            $hasil = "Gagal disimpan - ";
            $hasil .= $conn->error;
        }else{
            $hasil = "Berhasil disimpan";
        }
        return $hasil;
    }
    //    update data
    function update_data($tabel,$id,$kolom,$nilai,$conn){
        $koloms = explode(',',$kolom);
        $nilais = explode('#&#',$nilai);
        $row_kolom = count($koloms);
        $row_nilai = count($nilais);
        if($row_kolom == $row_nilai){
            for($x=0;$x<$row_kolom;$x++){
                $query = "UPDATE $tabel SET $koloms[$x]=$nilais[$x] WHERE no='$id'";
                $result = $conn->query($query);
                if(!$result){
                     $hasil = "Gagal disimpan - ";
                    $hasil .= $conn->error;
                }else{
                    $hasil = "Berhasil disimpan";
                }
            }
        }else{
            $hasil = "Gagal disimpan - error didaftar kolom";
        }
        return $hasil;
    }
}

function tambahView($id){
    global $data;
    global $conn;
    $post = $data->dataQuery($conn, "SELECT * FROM artikel WHERE no='$id'");
    $post_view = $post['view'];
    $post_view += 1;
    $tambah_view = $data->dataQuery($conn, "UPDATE artikel SET view='$post_view' WHERE no='$id'");
    return $tambah_view;
}

function metaPost($id){
    global $data;
    global $conn;
    $meta = $data->dataQuery($conn,"SELECT * FROM artikel WHERE no='$id'");
    $meta_judul = str_replace("td_ptk"," ",$meta['judul_artikel']);
    $hasil = "
      <meta name='description' content='$meta_judul'>
      <meta name='keywords' content='$meta_judul,$meta[kategori]'>
      <meta name='author' content='HabarAnime'>

<!-- Open Graph / Facebook -->
<meta property='og:type' content='website'>
<meta property='og:title' content='$meta_judul'>
<meta property='og:description' content='$meta_judul, $meta[kategori]'>
<meta property='og:image' content='$meta[gambar]'>

<!-- Twitter -->
<meta property='twitter:card' content='summary_large_image'>
<meta property='og:title' content='$meta_judul'>
<meta property='og:description' content='$meta_judul, $meta[kategori]'>
<meta property='og:image' content='$meta[gambar]'>
    ";
    return $hasil;
}
function linkPost($page,$id,$post){
    $post = get_post($post);
    $result = "<a href='?page=News&&id=$id'>$post</a>";
    return $result;
}
// fungsi untuk mencegah hack
     function get_post($var)
    {
        $var = str_replace("td_ptk","'",$var);
         $var = html_entity_decode($var);
         return $var;
    }
 function get_variabel($var){
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = str_replace("'","td_ptk",$var);
    $var = str_replace('"',"",$var);
    return $var;
}

    function mysqli_fix_string($conn, $string)
    {
        if(get_magic_quotes_gpc())$string = stripslashes($string);
        return $conn->real_escape_string($srting);
    }
    
    function mysql_entities_fix_string($conn, $string)
    {
        return htmlentities(mysqli_fix_string($conn, $string));
    }

    // fungsi untuk membersihkan variabel masukan dalam string
    function sanitizeString ($var)
    {
        $var = stripslashes($var); // untuk membuang slashes yang tidak diinginkan
        $var = strip_tags($var); // to strip HTML entirely fron an input, gunakan sebelum htmlentities
        $var = htmlentities($var); // untuk membuang semua HTML dari string
        $var = str_replace("'","td_ptk",$var);
        return $var;
    }

    // fungsi untuk membersihkan variaber masukan ke mysql
    function sanitizeMySQL ($connection, $var)
    {
        /*$var = sanitizeString($var);*/ // untuk memanggil fungsi sanitizeString
        $var = $connection->real_escape_string($var); // to prevent escape characters from bieng injected.        
        return $var;
    }

    //menghapus data session
    function destroy_session_and_data()
    {
        $_SESSION = array();
        setcookie(session_name(), '', time() - 2592000, '/');
        session_destroy();
    }
//kategori
function tambah_kategori($kategori){
    $kategori_baru = array();
    global $data;
    global $conn;
    $Kategoris = $data->buka_semua("kategori","id_kat",$conn);
    $kategoris = array();
    foreach($Kategoris as $x_kat){
        $kategoris += array($x_kat['kategori']);
    }
    $kategori_1 = explode(",",$kategori);
    
    $kategori_baru = array_diff($kategori_1,$kategoris);
    foreach($kategori_baru as $kat_baru){
        $kat = $data->input_data("kategori","kategori","'$kat_baru'",$conn);
    }
    return $kat;
}
//tag
function tambah_tag($tag){
    $Tag_baru = array();
    global $data;
    global $conn;
    $TAGS = $data->buka_semua("tag","id_tag",$conn);
    $Tags = array();
    foreach($TAGS as $x_tag){
        $Tags += array($x_tag['tag']);
    }
    $tag_1 = explode(",",$tag);
    
    $Tag_baru = array_diff($tag_1,$Tags);
    foreach($Tag_baru as $tag_baru){
        $tag = $data->input_data("tag","tag","'$tag_baru'",$conn);
    }
    return $tag;
}
//post
function banyakPost(){
    global $data;
    global $conn;
    $Posts = $data->banyak_post("artikel",$conn);
    return $Posts;
}
function pilihSemuaPost(){
    global $data;
    global $conn;
    $Posts = $data->pilih_semua("artikel",$conn);
    return $Posts;
}
function openPost($id){
    global $data;
    global $conn;
    $Posts = $data->open("artikel","no",$id,$conn);
    return $Posts;
}
function simpanPost($judul,$isi,$gambar,$kategori,$status,$tag){
    global $data;
    global $conn;
//    kolom post
    $kolom_1 = "judul_artikel,isi,gambar,kategori,status,tag";
    $nilai_1 = "'$judul','$isi','$gambar','$kategori','$status','$tag'";

    $Posts = $data->input_data("artikel",$kolom_1,$nilai_1,$conn);  
    
    $tambah_kat = tambah_kategori($kategori);
    $tambah_tag = tambah_tag($tag);
    
    return $Posts;
}
function editPost($id,$judul,$isi,$gambar,$kategori,$status,$tag){
    global $data;
    global $conn;
    $kolom_1 = "judul_artikel,isi,gambar,kategori,status,tag";
    $nilai_1 = "'$judul'#&#'$isi'#&#'$gambar'#&#'$kategori'#&#'$status'#&#'$tag'";

    $Posts = $data->update_data("artikel",$id,$kolom_1,$nilai_1,$conn); 
    
    $tambah_kat = tambah_kategori($kategori);
    $tambah_tag = tambah_tag($tag);
    
    return $Posts;
}

//./post


//komentar
function pilihSemuaKomentar(){
    global $data;
    global $conn;
    $komen = $data->pilih_semua("komentar",$conn);
    return $komen;
}

//./komentar

//gallery
function pilihSemuaPhoto(){
    global $data;
    global $conn;
    $gallery = $data->pilih_semua_aktif("galery",$conn);
    return $gallery;
}
function banyakPhoto(){
    global $data;
    global $conn;
    $gallery = $data->banyak_post("galery",$conn);
    return $gallery;
}
function pilihPhoto($id){
    global $data;
    global $conn;
    $gallery = $data->open("galery","no",$id,$conn);
    return $gallery;
}
function displayPhoto($n){
    global $data;
    global $conn;
    $status = pilihPhoto($n);
    $status = $status['status'];
    if($status == 0){
        $gallery = $data->update_data("galery",$n,"status","1",$conn);
    }else{
        $gallery = $data->update_data("galery",$n,"status","0",$conn);
    }
    
    return $gallery;
}
function simpanPhoto($tag,$alt,$url,$status){
    global $data;
    global $conn;
//    kolom post
    $kolom_1 = "tag,alt,gambar,status";
    $nilai_1 = "'$tag','$alt','$url','$status'";

    $gallery = $data->input_data("galery",$kolom_1,$nilai_1,$conn);  
   
    
    return $gallery;
}
function editPhoto($id,$tag,$alt,$url,$status){
    global $data;
    global $conn;
    $kolom_1 = "tag,alt,gambar,status";
    $nilai_1 = "'$tag'#&#'$alt'#&#'$url'#&#'$status'";

    $gallery = $data->update_data("galery",$id,$kolom_1,$nilai_1,$conn); 
    
    
    return $gallery;
}
//./gaellry
//user
function pilihSemuaUser(){
    global $data;
    global $conn;
    $user = $data->pilih_semua("user",$conn);
    return $user;
}
function banyakUser(){
    global $data;
    global $conn;
    $user = $data->banyak_post("user",$conn);
    return $user;
}
function pilihUser($id){
    global $data;
    global $conn;
    $user = $data->open("user","no",$id,$conn);
    return $user;
}

function simpanUser($nama,$username,$avatar,$email,$pass,$status){
    global $data;
    global $conn;
//    kolom post
    $kolom_1 = "nama,user_name,avatar,status,email,password";
    $nilai_1 = "'$nama','$username','$avatar','$status','$email','$pass'";

    $user = $data->input_data("user",$kolom_1,$nilai_1,$conn);  
   
    
    return $user;
}
function editUser($id,$nama,$username,$avatar,$email,$pass,$status){
    global $data;
    global $conn;
    $kolom_1 = "nama,user_name,avatar,status,email,password";
    $nilai_1 = "'$nama'#&#'$username'#&#'$avatar'#&#'$status'#&#'$email'#&#'$pass'";

    $user = $data->update_data("user",$id,$kolom_1,$nilai_1,$conn); 
    
    
    return $user;
}
//reset password
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
//./user
//web data
function pilihDataWeb(){
    global $data;
    global $conn;
    $web = $data->open("meta_web","no","1",$conn);
    return $web;
}
function editDataWeb($id,$title,$keyword,$diskripsi,$icon,$email){
    global $data;
    global $conn;
    $kolom_1 = "title,keyword,diskripsi,icon,email";
    $nilai_1 = "'$title'#&#'$keyword'#&#'$diskripsi'#&#'$icon'#&#'$email'";

    $gallery = $data->update_data("meta_web",$id,$kolom_1,$nilai_1,$conn); 
    
    
    return $gallery;
}
//./web data
//save ke file
function save_file($artikel){
    //membuat file
    $fh =fopen("kategori.txt",'w+') or die("file gagal dibuat");
//    file_put_contents("artikel.php",implode($artikel));
    $pre = <<<_END
    <?php
    #kategoris =
_END;
    $pre = str_replace("#","$",$pre);
    $pra = <<<_END
    
    ?>
_END;
    $isi = var_export($artikel,true);
    $text = $pre . $isi . $pra;
    fwrite($fh,$text) or die("file gagal disimpan"); //menyimpan file
    fclose($fh);
    copy("kategoris.txt","./kategoris.php"); //mengganti nama file
}

//page number
function pageNumber($n,$url,$pg){
    $numpage = "<nav aria-label='Contacts Page Navigation'>";
    $numpage .= "<ul class='pagination justify-content-center m-0'>";
    $prev = $pg - 1;
    $next = $pg + 1;
    if($prev < 1){$prev = 1;}
    if($next > $n){ $next = $n;}
    $numpage .= "<li class='page-item'><a class='page-link' href='$url&&pg=$prev'>Prev</a></li>";
    for($x=1;$x<=$n;$x++){
        if($x == $pg){
            $numpage .= "<li class='page-item active'><a class='page-link' href='$url&&pg=$x'>$x</a></li>";
        }else{
            $numpage .= "<li class='page-item'><a class='page-link' href='$url&&pg=$x'>$x</a></li>";
        }
    }
    $numpage .= "<li class='page-item'><a class='page-link' href='$url&&pg=$next'>Next</a></li>";
    $numpage .= "</ul>";
    $numpage .= "</nav>";
    
    return $numpage;
}
//pengunjung
function totalPengunjung(){
    $pengunjung = 0;
    $posts = pilihSemuaPost();
    foreach($posts as $post){
        $pengunjung += $post['view']; 
    }
    return $pengunjung;
}

function iklanHancau(){
    echo "<div>";
    echo "<a href='https://wa.me/6287816704607' target='self'>";
    echo "<img style='width:100%;' src='https://hancau.net/wp-content/uploads/2020/11/banner-iklan-hancau.gif'>";
    echo "</a>";
    echo "</div>";
}

?>