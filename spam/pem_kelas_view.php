<?php include_once "views/main.php";?>
<?php include_once "views/status.php";?>
<?php 
$main_view= "<script>window.location.href='pem_kelas.php';</script>";
switch ($_GET["act"]){
default:
//INDEX======================================================================================================
?>
<style type="text/css">
#hid{
  border: 0px;color:grey;
}
</style>
<div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">
      <h1 class="page-title">
        Pembagian Kelas
      </h1>
    </div>

      <form action="?&act=save" enctype="multipart/form-data" method="post">
      <div class="">
        <div class="card">
          <div class="table-responsive">          
            <table class="table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>No Pendaftaran</th>
                  <th>No Induk</th>
                  <th>Nama</th>
                  <th>Masuk Kelas</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $jmlsiswa=$_POST['jmlsiswa'];
              $urut=$_POST['urut'];
              $view=$_POST['view'];
              $kelas=$_POST['kelas'];
              //ambil kelas
              $sql_kelas=mysql_query("select * from kelas where id_kelas='$kelas'");
              $kl=mysql_fetch_array($sql_kelas);

              $sql=mysql_query("select * from siswa a left join pendaftar b on (a.no_pendaftar=b.no_pendaftar and a.no_induk=b.no_induk) left join kelas c on (a.id_kelas=c.id_kelas) where a.id_kelas=0 order by b.$urut LIMIT $jmlsiswa");

              $no=1;
              while($h=mysql_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><input type="text" name="no_pendaftar[]" value="<?php echo $h['no_pendaftar'];?>" id="hid" readonly></td>
                  <td><input type="text" name="no_induk[]" value="<?php echo $h['no_induk'];?>" id="hid" readonly></td>
                  <td><?php echo $h['nama'];?></td>
                  <td><?php echo $kl['kelas']?:'-';?></td>
                </tr>
              <?php $no++; } ?>
              </tbody>
            </table>
            <script>
              require(['datatables', 'jquery'], function(datatable, $) {
                    $('.datatable').DataTable();
                  });
            </script>

              <div class="modal-footer">
                <input type="hidden" name="kelas" value="<?php echo $kelas;?>" readonly>
                <button class="btn btn-blue" type="submit" onclick="return confirm('Data Pembagian Kelas Akan Disimpan ?');">
                  Simpan data
                </button>
              </div>
          </div>
        </div>
      </div>
    </form>

    </div>
  </div>
<?php 
break;

case "form_create";
?>
    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
          </div>
          <div class="modal-body">

            <form action="?&act=save" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="kelas" type="text" class="form-control" onkeypress="" placeholder="Kelas"/>
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
$no_pendaftar=$_POST['no_pendaftar'];
$no_induk=$_POST['no_induk'];
$jml=count($no_pendaftar);
//validasi 1
for($i=0; $i<$jml; $i++){
  $input=mysql_query("UPDATE siswa set id_kelas='$kelas' where no_pendaftar='$no_pendaftar[$i]' AND no_induk='$no_induk[$i]'");
}
   
  if ($input){
   echo $main_view;
  }
  else {
    echo "<script>alert('Proses Gagal');history.back(-1);</script>";  
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

