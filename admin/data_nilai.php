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
            <h4 class="modal-title">Data Nilai</h4>            
          </div>
          <div class="modal-body">

            <form action="?&act=cari" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Pilih Tahun Ajaran</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <select name="tahun_ajaran" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <?php 
                      $sql=mysql_query("select * from tahun_ajaran order by ta");
                      while ($k=mysql_fetch_array($sql)){
                      ?>
                      <option value="<?php echo $k['id_ta'];?>"><?php echo $k['ta'];?></option>
                      <?php } ?>

                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Semester</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <select name="semester" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <option value="GENAP">GENAP</option>
                      <option value="GANJIL">GANJIL</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Pilih Kelas</label>
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
                <button class="btn btn-success" type="submit">
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
$semester=$_POST['semester'];
$tahun_ajaran=$_POST['tahun_ajaran'];
$kelas=$_POST['kelas'];

$main_view= "<script>window.location.href='data_nilai_detail.php?&s=$semester&t=$tahun_ajaran&k=$kelas';</script>";
echo $main_view;
break;

}


?>