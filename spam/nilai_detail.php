<?php include_once "views/main.php";?>
<?php include_once "views/status.php";?>
<?php 
$main_view= "<script>window.location.href='pem_kelas.php';</script>";
switch ($_GET["act"]){
default:

$semester=$_GET['s'];
$tahun_ajaran=$_GET['t'];
$kelas=$_GET['k'];
$mapel=$_GET['m'];
//ambil kelas
$sql_kelas=mysql_query("select * from kelas where id_kelas='$kelas'");
$kl=mysql_fetch_array($sql_kelas);

$sql_ta=mysql_query("select * from tahun_ajaran where id_ta='$tahun_ajaran'");
$ta=mysql_fetch_array($sql_ta);

$sql_ma=mysql_query("select * from mapel where id_mapel='$mapel'");
$ma=mysql_fetch_array($sql_ma);

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

          <div class="modal-header">
            <h4 class="modal-title">Input Nilai Siswa</h4>            
          </div>
    </div>
        <div class="card">
          <div class="table-responsive">
      <div class="">
            <table class="table card-table table-vcenter text-nowrap" style="width:500px;">
              <thead>
                <tr>
                  <th valign="top" class="w-5"><b>TAHUN AJARAN</b></th><th class="w-1">:</th>
                  <th>                    
                    <?php echo $ta['ta'];?>
                  </th>
                  <th class=""></th>
                </tr>
                <tr>
                  <th valign="top" class="w-5"><b>SEMESTER</b></th><th class="w-1">:</th>
                  <th>                                        
                    <?php echo $semester;?>
                  </th>
                  <th class=""></th>
                </tr>
                <tr>
                  <th valign="top" class="w-5"><b>KELAS</b></th><th class="w-1">:</th>
                  <th>                       
                    <?php echo $kl['kelas'];?>
                  </th>
                  <th class=""></th>
                </tr>
                <tr>
                  <th valign="top" class="w-5"><b>Mata Pelajaran</b></th><th class="w-1">:</th>
                  <th>                       
                    <?php echo $ma['mapel'];?>
                  </th>
                  <th class=""></th>
                </tr>
              </thead>
            </table>
          </div>
          </div>
        </div>
    </div>
  </div>

<div class="my-3 my-md-5">
  <div class="container">
      <div class="">
        <div class="card">
          <div class="table-responsive">  
          <form action="?&act=save" enctype="multipart/form-data" method="post">       
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>No Pendaftaran</th>
                  <th>No Induk</th>
                  <th>Nama</th>
                  <th>Ulangan Harian</th>
                  <th>UTS</th>
                  <th>UAS</th>
                </tr>
              </thead>
              <tbody>
              <?php

              $sql=mysql_query("select * from siswa a left join pendaftar b on (a.no_pendaftar=b.no_pendaftar and a.no_induk=b.no_induk) left join kelas c on (a.id_kelas=c.id_kelas) where a.id_kelas='$kelas' order by a.no_pendaftar");

              $no=1;
              while($h=mysql_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><input type="text" name="np[]" value="<?php echo $h['no_pendaftar'];?>" id="hid" readonly></td>
                  <td><input type="text" name="ni[]" value="<?php echo $h['no_induk'];?>" id="hid" readonly></td>
                  <td><?php echo $h['nama'];?></td>
                  <td><input name="uh[]" type="text" class="form-control" onkeypress="return isNumberKey(this,event)"/></td>
                  <td><input name="ut[]" type="text" class="form-control" onkeypress="return isNumberKey(this,event)"/></td>
                  <td><input name="ua[]" type="text" class="form-control" onkeypress="return isNumberKey(this,event)"/></td>
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
                <input type="hidden" name="ta" value="<?php echo $ta['id_ta'];?>">
                <input type="hidden" name="semester" value="<?php echo $semester;?>">
                <input type="hidden" name="kelas" value="<?php echo $kl['id_kelas'];?>">
                <input type="hidden" name="id_mapel" value="<?php echo $ma['id_mapel'];?>">
                <button class="btn btn-blue" type="submit" onclick="return confirm('Data nilai siswa Akan Disimpan ?');">
                  Simpan data
                </button>
              </div>
    </form>
          </div>
        </div>
      </div>

    </div>
  </div>
<?php 
break;

case "save";
$main_view= "<script>window.location.href='nilai.php';</script>";

$kelas=$_POST['kelas'];
$ta=$_POST['ta'];
$id_mapel=$_POST['id_mapel'];
$semester=$_POST['semester'];

$np=$_POST['np'];
$ni=$_POST['ni'];
$jml=count($np);

$uh=$_POST['uh'];
$ut=$_POST['ut'];
$ua=$_POST['ua'];

if (empty($id_mapel)){ 
  echo"<script>alert('Masukkan mata pelajaran');history.back(-1);</script>";  
}else{
  for($i=0; $i<$jml; $i++){
    $cek_dulu=mysql_query("select * from nilai where no_pendaftar='$np[$i]' AND no_induk='$ni[$i]' AND id_ta='$ta' AND id_kelas='$kelas' AND id_mapel='$id_mapel' AND semester='$semester'");
    $cek=mysql_num_rows($cek_dulu);
     if($cek>0) {
       $input=mysql_query("UPDATE nilai set nilai_ulhar='$uh[$i]', nilai_uts='$ut[$i]', nilai_uas='$ua[$i]' where no_pendaftar='$np[$i]' AND no_induk='$ni[$i]' AND id_ta='$ta' AND id_kelas='$kelas' AND id_mapel='$id_mapel' AND semester='$semester'");
     }
     else {
    $input=mysql_query("INSERT INTO nilai (`no_induk`, `no_pendaftar`, `id_ta`, `id_mapel`, `id_kelas`, `nilai_ulhar`, `nilai_uts`, `nilai_uas`, `semester`) 
    values ('$ni[$i]','$np[$i]','$ta','$id_mapel','$kelas','$uh[$i]','$ut[$i]','$ua[$i]','$semester')");
    }    
  }

        if ($input){
      echo"<script>alert('Proses Input data Nilai Sukses');</script>";  
      echo $main_view;
      }
      else {
      echo"<script>alert('Proses Gagal');history.back(-1);</script>";  
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

