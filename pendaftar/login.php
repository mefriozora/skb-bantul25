<?php include_once "views/main.php";?>
<?php 
$main_view= "<script>window.location.href='kelas.php';</script>";
switch ($_GET["act"]){
default:
//INDEX======================================================================================================
?>

    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Login</h4>        
          </div>
          <div class="alert alert-info">
          <label for="" align="center">Silahkan login dengan menggunakan NISN Anda untuk Username dan Password</label>
          </div>
          <div class="modal-body">
            <form action="cek_login.php" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="username" type="text" class="form-control" onkeypress="" placeholder="Username"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="password" type="password" class="form-control" onkeypress="" placeholder="Password"/>
                  </div>
              </div> 
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Login
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='../index.php';">
                Kembali
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>  
<?php
break;

case "form_update";
$id = $_GET['id'] ?: '0';
$sql=mysql_query("select * from kelas where id_kelas='$id'");
$h=mysql_fetch_array($sql);
?>
    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Data</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
          </div>
          <div class="modal-body">

            <form action="?&act=update" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <input name="kelas" type="text" class="form-control" onkeypress="" placeholder="kelas Ajaran" value="<?php echo $h['kelas'];?>"/>                    
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Add
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='kelas.php';">
                Cancel
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>  
<?php
break;

case "save";
$kelas=$_POST['kelas'];
//validasi 1
if (empty($kelas)){ 
  echo"<script>alert('Masukkan data kelas');history.back(-1);</script>";  
}
else{  
  // validasi 2
  $cek_dulu=mysql_query("select * from kelas where kelas='$kelas'");
  $cek=mysql_num_rows($cek_dulu);
   if($cek>0) {
   echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   }
   else {
   $input=mysql_query("INSERT INTO kelas (kelas) 
    values ('$kelas')");
      if ($input){
        //$_SESSION[status]    = "sukses";
      echo $main_view;
      }
      else {
      echo "<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
  }

}
break;

case "update";
$kelas=$_POST['kelas'];
$id=$_POST['id'];
//validasi 1
if (empty($kelas)){ 
  echo"<script>alert('Masukkan data kelas');history.back(-1);</script>";  
}else{
  // validasi 2
  $cek_dulu=mysql_query("select * from kelas where kelas='$kelas'");
  $cek=mysql_num_rows($cek_dulu);
   if($cek>0) {
   echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   }
   else {
   $input=mysql_query("UPDATE kelas set kelas ='$kelas' where id_kelas='$id'"); 
      if ($input){
      echo $main_view;
      }
      else {
      echo"<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
  }
}
break;

case "delete";
$id=$_GET['id'];
$hapus=mysql_query("DELETE FROM kelas WHERE id_kelas='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>

