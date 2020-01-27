<?php include_once "views/main.php";?>
<?php 
switch ($_GET["act"]){
default:
//INDEX======================================================================================================
?>
    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Naik Kelas</h4>            
          </div>
          <div class="modal-body">
          <label>Keterangan</label>
            <form action="#" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Dari Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <select name="kelas" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <?php 
                      $sql=mysql_query("select * from kelas order by kelas");
                      while ($k=mysql_fetch_array($sql)){
                      ?>
                      <option value="<?php echo $k['id_kelas'];?>"><?php echo $k['kelas'];?></option>
                      <?php } ?>

                    </select>
                  </div>
              </div>
              
              <div class="form-group">
                <label>Naik ke Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <select name="kelas" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <?php 
                      $sql=mysql_query("select * from kelas order by kelas");
                      while ($k=mysql_fetch_array($sql)){
                      ?>
                      <option value="<?php echo $k['id_kelas'];?>"><?php echo $k['kelas'];?></option>
                      <?php } ?>

                    </select>
                  </div>
              </div>

              <div class="modal-footer">
                <button class="btn btn-success" type="submit" onclick="return confirm('Belum selesai');">
                  Pilih & Lanjutkan
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>  

<?php
break;

case "cari";
$kelas=$_POST['kelas'];
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

}