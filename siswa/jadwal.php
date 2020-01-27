<?php include_once "views/main.php";?>
<?php 
$main_view= "<script>window.location.href='jadwal.php';</script>";
$main_view_input= "<script>window.location.href='jadwal.php?&act=form_create';</script>";
switch ($_GET["act"]){
default:
//INDEX======================================================================================================
?>
<div class="my-3 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Jadwal</li>
          </ol>
    <div class="page-header">
      <h4 class="">
        Jadwal 
      </h4>
    </div>
      <div class="">
        <div class="card">
          <div class="card-header">
          <a href="?&act=form_create" class="btn btn-primary" role="button">Tambah</a>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Tahun</th>
                  <th>Semester</th>
                  <th>Mata Pelajara</th>
                  <th>Kelas</th>
                  <th>Hari</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                  <th>Nama Tutor</th>
                  <th class="w-2">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql=mysqli_query($connect,"SELECT jadwal.id_jadwal, tahun_ajaran.ta, mapel.nama_mapel, jadwal.semester, kelas.kelas, jadwal.hari, jadwal.jam_mulai, jadwal.jam_selesai, tutor.nama_tutor FROM jadwal LEFT JOIN tahun_ajaran ON tahun_ajaran.kode_ta=jadwal.kode_ta LEFT JOIN kelas ON kelas.kode_kelas=jadwal.kode_kelas LEFT JOIN mapel ON mapel.kode_mapel=jadwal.kode_mapel LEFT JOIN tutor ON tutor.kode_tutor=jadwal.kode_tutor");
              $no=1;
              while($h=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $h['ta'];?></td>
                  <td><?php echo $h['semester'];?></td>
                  <td><?php echo $h['nama_mapel'];?></td>
                  <td><?php echo $h['kelas'];?></td>
                  <td><?php echo $h['hari'];?></td>
                  <td><?php echo $h['jam_mulai'];?></td>
                  <td><?php echo $h['jam_selesai'];?></td>
                  <td><?php echo $h['nama_tutor'];?></td>
                  <td class="text-right">
                    <a href="?&act=form_update&id=<?php echo $h['id_jadwal'];?>" class="btn btn-secondary btn-sm"><i class="fe fe-edit"></i></a>
                    <a href='?&act=delete&id=<?php echo $h['id_jadwal'];?>' onClick="return confirm('Yakin data akan dihapus ?')"
                    class="btn btn-secondary btn-sm"><i class="fe fe-trash"></i></a>
                  </td>
                </tr>
              <?php $no++; } ?>
              </tbody>
            </table>
            <script>
              require(['datatables', 'jquery'], function(datatable, $) {
                    $('.datatable').DataTable();
                  });
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php 
break;

case "form_create";
//$tahun_sesi = $_SESSION['tahun'] ?: '0';
//$semester_sesi = $_SESSION['semester'] ?: '0';
//$kelas_sesi = $_SESSION['kelas'] ?: '0';

?>
<div class="col-lg order-lg-first"><div class="container">
<table border='0' width="100%">
  <tr>
    <td valign="top">
      <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tahun Ajaran dan Kelas</h4>            
          </div>
          <div class="modal-body">

            <form action="?&act=save" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Tahun Ajaran</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="id_ta" class="form-control">
                      <option value="" selected>-Pilih-</option>
                      <?php                        
                        $sql = mysqli_query($connect, "SELECT * FROM tahun_ajaran");
                        while($j = mysqli_fetch_array($sql)){
                          if($j['kode_ta']==$tahun_sesi){
                            echo "<option selected value='$j[kode_ta]'>$j[ta]</option>";
                          }else{
                            echo "<option value='$j[kode_ta]'>$j[ta]</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Semester</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="semester" class="form-control">
                      <option value="">-Pilih-</option>
                      <option <?php if ($semester_sesi=="GENAP"){ echo "selected"; } ?> value="GENAP">GENAP</option>
                      <option <?php if ($semester_sesi=="GANJIL"){ echo "selected"; } ?> value="GANJIL">GANJIL</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="id_kelas" class="form-control">
                      <option value="" selected>- Pilih-</option>
                      <?php                        
                        $sql = mysqli_query($connect, "SELECT * FROM kelas");
                        while($j = mysqli_fetch_array($sql)){
                          if($j['kode_kelas']==$kelas_sesi){
                            echo "<option selected value='$j[kode_kelas]'>$j[kelas]</option>";
                          }else{
                            echo "<option value='$j[kode_kelas]'>$j[kelas]</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>  
  </td>

    <td valign="top">
      <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Data Jadwal KBM</h4>            
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Hari</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="hari" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <option value="senin">SENIN</option>
                      <option value="selasa">SELASA</option>
                      <option value="rabu">RABU</option>
                      <option value="kamis">KAMIS</option>
                      <option value="jumat">JUM'AT</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Waktu</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="jam_mulai" type="time" class="form-control" onkeypress="return isNumber(event)"/>  
                    <span style="margin-left:5px;margin-right:5px;">Sampai</span>
                    <input name="jam_selesai" type="time" class="form-control" onkeypress="return isNumber(event)"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Mata Pelajaran</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="id_mapel" class="form-control">
                      <option value="" selected>-Pilih-</option>
                      <?php                        
                        $sql = mysqli_query($connect,"SELECT * FROM mapel");
                        while($j = mysqli_fetch_array($sql)){
                          echo "
                            <option value='$j[kode_mapel]'>$j[nama_mapel]</option>";
                        }
                      ?>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Tutor</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="id_tutor" class="form-control">
                      <option value="" selected>-Pilih-</option>
                      <?php                        
                        $sql = mysqli_query($connect,"SELECT * FROM tutor");
                        while($j = mysqli_fetch_array($sql)){
                          echo "
                            <option value='$j[kode_tutor]'>$j[nama_tutor]</option>";
                        }
                      ?>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Tambah
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='jadwal.php';">
                Batal
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

  </td>
  </tr>
</table>
</div>
</div>

    
<?php
break;

case "form_update";
$id = $_GET['id'] ?: '0';
$sql=mysqli_query($connect,"select * from jadwal where id_jadwal='$id'");
$h=mysqli_fetch_array($sql);
?>
<div class="col-lg order-lg-first"><div class="container">
<table border='0' width="100%">
  <tr>
    <td valign="top">
      <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tahun Ajaran dan Kelas</h4>            
          </div>
          <div class="modal-body">

            <form action="?&act=update" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Tahun Ajaran</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="id_ta" class="form-control">
                      <option value="" selected>-Pilih-</option>
                      <?php
                            $querythajaran = mysqli_query($connect,"SELECT * FROM tahun_ajaran ORDER BY kode_ta");
                            while ($datathajaran = mysqli_fetch_array($querythajaran)){
                                if($datathajaran['kode_ta']==$h['kode_ta']){
                                    echo "<option selected value=$datathajaran[kode_ta]>$datathajaran[ta]</option>";
                                }else{
                                    echo "<option value=$datathajaran[kode_ta]>$datakelas[ta]</option>"; 
                                }
                            }
                        ?>   
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Semester</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="semester" class="form-control">
                      <option value="">-Pilih-</option>
                      <?php
                      if ($h['semester'] == "Ganjil") echo "<option value='Ganjil' selected>Ganjil</option>";
                        else echo "<option value='Ganjil'>Ganjil</option>";
                      if ($h['semester'] == "Genap") echo "<option value='Genap' selected>Genap</option>";
                        else echo "<option value='Genap'>Genap</option>";
                      ?>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="id_kelas" class="form-control">
                      <option value="" selected>- Pilih-</option>
                      <?php
                            $querykelas = mysqli_query($connect,"SELECT * FROM kelas ORDER BY kode_kelas");
                            while ($datakelas = mysqli_fetch_array($querykelas)){
                                if($datakelas['kode_kelas']==$h['kode_kelas']){
                                    echo "<option selected value=$datakelas[kode_kelas]>$datakelas[kelas]</option>";
                                }else{
                                    echo "<option value=$datakelas[kode_kelas]>$datakelas[kelas]</option>"; 
                                }
                            }
                        ?>   
                    </select>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>  
  </td>

    <td valign="top">
      <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Data Jadwal KBM</h4>            
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Hari</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="hari" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <?php
                      if ($h['hari'] == "senin") echo "<option value='senin' selected>SENIN</option>";
                        else echo "<option value='senin'>SENIN</option>";
                      if ($h['hari'] == "selasa") echo "<option value='selasa' selected>SELASA</option>";
                        else echo "<option value='selasa'>SELASA</option>";
                      if ($h['hari'] == "rabu") echo "<option value='rabu' selected>RABU</option>";
                        else echo "<option value='rabu'>RABU</option>";
                      if ($h['hari'] == "kamis") echo "<option value='kamis' selected>KAMIS</option>";
                        else echo "<option value='kamis'>KAMIS</option>";
                      if ($h['hari'] == "jumat") echo "<option value='jumat' selected>JUM'AT</option>";
                        else echo "<option value='jumat'>JUM'AT</option>";
                      ?>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Waktu</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="jam_mulai" type="time" class="form-control" value="<?php echo $h['jam_mulai'] ?>" onkeypress="return isNumber(event)"/>  
                    <span style="margin-left:5px;margin-right:5px;">Sampai</span>
                    <input name="jam_selesai" type="time" class="form-control" value="<?php echo $h['jam_selesai'] ?>" onkeypress="return isNumber(event)"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Mata Pelajaran</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="id_mapel" class="form-control">
                      <option value="" selected>-Pilih-</option>
                      <?php
                            $querymapel = mysqli_query($connect,"SELECT * FROM mapel ORDER BY kode_mapel");
                            while ($datamapel = mysqli_fetch_array($querymapel)){
                                if($datamapel['kode_mapel']==$h['kode_mapel']){
                                    echo "<option selected value=$datamapel[kode_mapel]>$datamapel[nama_mapel]</option>";
                                }else{
                                    echo "<option value=$datamapel[kode_mapel]>$datakelas[nama_mapel]</option>"; 
                                }
                            }
                        ?>  
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Tutor</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="id_tutor" class="form-control">
                      <option value="" selected>-Pilih-</option>
                      <?php
                            $querytutor = mysqli_query($connect,"SELECT * FROM tutor ORDER BY kode_tutor");
                            while ($datatutor = mysqli_fetch_array($querytutor)){
                                if($datatutor['kode_tutor']==$h['kode_tutor']){
                                    echo "<option selected value=$datatutor[kode_tutor]>$datatutor[nama_tutor]</option>";
                                }else{
                                    echo "<option value=$datatutor[kode_tutor]>$datatutor[nama_tutor]</option>"; 
                                }
                            }
                        ?>    
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Update
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='jadwal.php';">
                Batal
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

  </td>
  </tr>
</table>
</div>
</div>
<?php
break;

case "save";
session_start();
$semester =$_POST['semester'];
//var_dump($semester); exit();
$id_ta =$_POST['id_ta'];
//var_dump($id_ta); exit();
$id_kelas =$_POST['id_kelas'];
//var_dump($id_kelas); exit();
$id_mapel=$_POST['id_mapel'];
//var_dump($id_mapel); exit();
$hari =$_POST['hari'];
//var_dump($hari); exit();
$jam_mulai =$_POST['jam_mulai'];
//var_dump($jam_mulai); exit();
$jam_selesai=$_POST['jam_selesai'];
//var_dump($jam_selesai); exit();
$id_tutor =$_POST['id_tutor'];
//var_dump($id_tutor); exit();

//validasi 1
//if (empty($semester)){ echo"<script>alert('Masukkan semester');history.back(-1);</script>";  }
//else if (empty($id_ta)){ echo"<script>alert('Masukkan tahun');history.back(-1);</script>";  }
//else if (empty($id_mapel)){ echo"<script>alert('Masukkan mapel');history.back(-1);</script>";  }
//else if (empty($hari)){ echo"<script>alert('Masukkan hari');history.back(-1);</script>";  }
//else if (empty($jam_mulai)){ echo"<script>alert('Masukkan jam mulai');history.back(-1);</script>";  }
//else if (empty($jam_selesai)){ echo"<script>alert('Masukkan jam selesai');history.back(-1);</script>";  }
//else if (empty($id_tutor)){ echo"<script>alert('Masukkan tutor');history.back(-1);</script>";  }

//else{ 
   $input=mysqli_query($connect,"INSERT INTO `jadwal`(`id_jadwal`, `kode_ta`, `semester`, `kode_kelas`, `hari`, `kode_mapel`, `jam_mulai`, `jam_selesai`, `kode_tutor`) VALUES ('','$id_ta','$semester','$id_kelas','$hari','$id_mapel','$jam_mulai','$jam_selasa','$id_tutor')");
     var_dump($input); exit();
   if ($input){
    //$_SESSION[status]    = "sukses";
    //echo "masuk";
  echo $main_view;
  }
  else {
    //echo "gagal";
  echo "<script>alert('Proses Gagal');history.back(-1);</script>";  
  }

break;

case "update";
$semester =$_POST['semester'];
//var_dump($semester); exit();
$id_ta =$_POST['id_ta'];
//var_dump($id_ta); exit();
$id_kelas =$_POST['id_kelas'];
//var_dump($id_kelas); exit();
$id_mapel =$_POST['id_mapel'];
//var_dump($id_mapel); exit();
$hari =$_POST['hari'];
//var_dump($hari); exit();
$jam_mulai =$_POST['jam_mulai'];
//var_dump($jam_mulai); exit();
$jam_selesai=$_POST['jam_selesai'];
//var_dump($jam_selesai); exit();
$id_tutor =$_POST['id_tutor'];
//var_dump($id_tutor); exit();
$id=$_POST['id'];
//validasi 1
//if (empty($jadwal)){ 
  //echo"<script>alert('Masukkan data jadwal');history.back(-1);</script>";  
//}else{
  // validasi 2
  //$cek_dulu=mysql_query("select * from jadwal where jadwal='$jadwal'");
  //$cek=mysql_num_rows($cek_dulu);
   //if($cek>0) {
   //echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   //}
   //else {
   $update=mysqli_query($connect,"UPDATE `jadwal` SET `kode_ta`='$id_ta',`semester`='$semester',`kode_kelas`='$id_kelas',`hari`='$hari',`kode_mapel`='$id_mapel',`jam_mulai`='$jam_mulai',`jam_selesai`='$jam_selesai',`kode_tutor`='$id_tutor' WHERE id_jadwal='$id'"); 
      //var_dump($input);exit();
   if ($update){
     echo"masuk";
      //echo $main_view;
      }
      else {
        echo"gagal";
      //echo"<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
  

break;

case "delete";
$id=$_GET['id'];
$hapus=mysqli_query($connect,"DELETE FROM jadwal WHERE id_jadwal='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>

