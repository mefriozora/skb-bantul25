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
                  <th>Kelas</th>
                  <th class="w-2">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql=mysql_query("select a.id_ta,a.id_kelas,b.ta,a.semester,c.kelas from jadwal_kbm a left join tahun_ajaran b on a.id_ta=b.id_ta left join kelas c on a.id_kelas=c.id_kelas group by b.ta,a.semester,c.kelas");
              $no=1;
              while($h=mysql_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $h['ta'];?></td>
                  <td><?php echo $h['semester'];?></td>
                  <td><?php echo $h['kelas'];?></td>
                  <td class="text-right">
                    <a href="jadwal_detail.php?&thn=<?php echo $h['id_ta'];?>&sem=<?php echo $h['semester'];?>&kls=<?php echo $h['id_kelas'];?>" class="btn btn-secondary btn-sm"><i class="fe fe-search"></i></a>
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
$tahun_sesi = $_SESSION['tahun'] ?: '0';
$semester_sesi = $_SESSION['semester'] ?: '0';
$kelas_sesi = $_SESSION['kelas'] ?: '0';

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
                        $sql = mysql_query("SELECT * FROM tahun_ajaran");
                        while($j = mysql_fetch_array($sql)){
                          if($j['id_ta']==$tahun_sesi){
                            echo "<option selected value='$j[id_ta]'>$j[ta]</option>";
                          }else{
                            echo "<option value='$j[id_ta]'>$j[ta]</option>";
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
                      <option value="" selected>-Pilih-</option>
                      <?php                        
                        $sql = mysql_query("SELECT * FROM kelas");
                        while($j = mysql_fetch_array($sql)){
                          if($j['id_kelas']==$kelas_sesi){
                            echo "<option selected value='$j[id_kelas]'>$j[kelas]</option>";
                          }else{
                            echo "<option value='$j[id_kelas]'>$j[kelas]</option>";
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
                      <option value="SENIN">SENIN</option>
                      <option value="SELASA">SELASA</option>
                      <option value="RABU">RABU</option>
                      <option value="KAMIS">KAMIS</option>
                      <option value="JUM'AT">JUM'AT</option>
                      <option value="SABTU">SABTU</option>
                      <option value="MINGGU">MINGGU</option>
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
                        $sql = mysql_query("SELECT * FROM mapel");
                        while($j = mysql_fetch_array($sql)){
                          echo "
                            <option value='$j[id_mapel]'>$j[mapel]</option>";
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
                        $sql = mysql_query("SELECT * FROM tutor");
                        while($j = mysql_fetch_array($sql)){
                          echo "
                            <option value='$j[id_tutor]'>$j[nama_tutor]</option>";
                        }
                      ?>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Pemantau</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="id_user" class="form-control">
                      <option value="" selected>-Pilih-</option>
                      <?php                        
                        $sql = mysql_query("SELECT * FROM user where level='PEMANTAU'");
                        while($j = mysql_fetch_array($sql)){
                          echo "
                            <option value='$j[id_user]'>$j[nama]</option>";
                        }
                      ?>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Add
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='jadwal.php';">
                Cancel
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
$sql=mysql_query("select * from jadwal where id_jadwal='$id'");
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
                <label>Jadwal</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <input name="jadwal" type="text" class="form-control" onkeypress="" placeholder="jadwal Ajaran" value="<?php echo $h['jadwal'];?>"/>                    
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Add
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='jadwal.php';">
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
session_start();
$semester=$_POST['semester'];
$id_ta=$_POST['id_ta'];
$id_kelas=$_POST['id_kelas'];
$id_mapel=$_POST['id_mapel'];
$hari=$_POST['hari'];
$jam_mulai=$_POST['jam_mulai'];
$jam_selesai=$_POST['jam_selesai'];
$id_tutor=$_POST['id_tutor'];
$id_user=$_POST['id_user'];
//validasi 1
if (empty($semester)){ echo"<script>alert('Masukkan semester');history.back(-1);</script>";  }
else if (empty($id_ta)){ echo"<script>alert('Masukkan tahun');history.back(-1);</script>";  }
else if (empty($id_mapel)){ echo"<script>alert('Masukkan mapel');history.back(-1);</script>";  }
else if (empty($hari)){ echo"<script>alert('Masukkan hari');history.back(-1);</script>";  }
else if (empty($jam_mulai)){ echo"<script>alert('Masukkan jam mulai');history.back(-1);</script>";  }
else if (empty($jam_selesai)){ echo"<script>alert('Masukkan jam selesai');history.back(-1);</script>";  }
else if (empty($id_tutor)){ echo"<script>alert('Masukkan tutor');history.back(-1);</script>";  }
else if (empty($id_user)){ echo"<script>alert('Masukkan pemantau');history.back(-1);</script>";  }
else{ 
   $input=mysql_query("INSERT INTO jadwal_kbm (`id_kelas`, `semester`, `id_ta`, `id_mapel`, `hari`, `jam_mulai`, `jam_selesai`, `id_tutor`, `id_user`) 
    values ('$id_kelas','$semester','$id_ta','$id_mapel','$hari','$jam_mulai','$jam_selesai','$id_tutor','$id_user')");
      if ($input){
      $_SESSION['tahun']    = $id_ta;
      $_SESSION['kelas']    = $id_kelas;
      $_SESSION['semester']    = $semester;
      echo $main_view_input;
      }
      else {
      echo "<script>alert('Proses Gagal');history.back(-1);</script>";  
      }

}
break;

case "update";
$jadwal=$_POST['jadwal'];
$id=$_POST['id'];
//validasi 1
if (empty($jadwal)){ 
  echo"<script>alert('Masukkan data jadwal');history.back(-1);</script>";  
}else{
  // validasi 2
  $cek_dulu=mysql_query("select * from jadwal where jadwal='$jadwal'");
  $cek=mysql_num_rows($cek_dulu);
   if($cek>0) {
   echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   }
   else {
   $input=mysql_query("UPDATE jadwal set jadwal ='$jadwal' where id_jadwal='$id'"); 
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
$hapus=mysql_query("DELETE FROM jadwal WHERE id_jadwal='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>

