<?php include_once "views/main.php";?>
<?php 
$main_view= "<script>window.location.href='mapel.php';</script>";
switch ($_GET["act"]){
default:
//INDEX======================================================================================================
?>
<div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">
      <h1 class="page-title">
        Detail Mata Pelajaran
      </h1>
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
                  <th>Id Detail Mapel</th>
                  <th>Kode Mapel</th>
                  <th>Kode Kelas</th>
                  <th>Kode Tutor</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql=mysqli_query($connect,"SELECT * from detail_mapel order by id_detail_mapel asc");
              $no=1;
              while($h=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $h['kode_mapel'];?></td>
                  <td><?php echo $h['nama_mapel'];?></td>
                  <td class="text-left">
                    <a href="?&act=form_update&id=<?php echo $h['kode_mapel'];?>" class="btn btn-secondary btn-sm"><i class="fe fe-edit"></i></a>
                    <a href='?&act=delete&id=<?php echo $h['kode_mapel'];?>' onClick="return confirm('Yakin data akan dihapus ?')"
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
?>
    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>            
          </div>
          <div class="modal-body">

            <form action="?&act=save" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Kode Mata Pelajaran</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="kodemapel" type="text" class="form-control" onkeypress="" placeholder="Kode Mata pelajaran"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Mata Pelajaran</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="mapel" type="text" class="form-control" onkeypress="" placeholder="Mata pelajaran"/>
                  </div>
              </div>

              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Add
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='mapel.php';">
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

case "form_update";
$id = $_GET['id'] ?: '0';
$sql=mysqli_query($connect,"SELECT * from mapel where kode_mapel='$id'");
$h=mysqli_fetch_array($sql);
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
                <label>Kode Mata Pelajaran</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="kodemapel" type="text" class="form-control" onkeypress="" placeholder="Kode Mata pelajaran" value="<?php echo $h['kode_mapel'];?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Mapel</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <input name="mapel" type="text" class="form-control" onkeypress="" placeholder="mapel Ajaran" value="<?php echo $h['nama_mapel'];?>"/>                    
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Update
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='mapel.php';">
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
$kodemapel=$_POST['kodemapel'];
//var_dump($kodemapel);
$mapel=$_POST['mapel'];
//var_dump($mapel);
//validasi 1
if (empty($kodemapel)){ 
  echo"<script>alert('Masukkan kode mapel');history.back(-1);</script>";  
}elseif (empty($mapel)) {
  echo"<script>alert('Masukkan nama mapel');history.back(-1);</script>";  

}else{  
  // validasi 2
  $cek_dulu=mysqli_query($connect,"SELECT * from mapel where kode_mapel='$kodemapel'");
  $cek=mysqli_num_rows($cek_dulu);
   if($cek>0) {
   echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   }
   else {
   $input=mysqli_query($connect,"INSERT INTO mapel(kode_mapel,nama_mapel) VALUES ('$kodemapel','$mapel')");
   //var_dump($input); exit();
      if ($input){
        //$_SESSION[status]    = "sukses";
        //echo "masuk";
      echo $main_view;
      }
      else {
        //echo "gagal";
      echo "<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
  }

}
break;

case "update";
$kodemapel=$_POST['kodemapel'];
$mapel=$_POST['mapel'];
$id=$_POST['id'];
//validasi 1
if (empty($kodemapel)){ 
  echo"<script>alert('Masukkan kode mapel');history.back(-1);</script>";  
}elseif (empty($mapel)) {
  echo"<script>alert('Masukkan nama mapel');history.back(-1);</script>";
}else{
  // validasi 2
 // $cek_dulu=mysqli_query($connect,"SELECT * from mapel where kode_mapel='$id'");
  //$cek=mysqli_num_rows($cek_dulu);
   //if($cek>0) {
   //echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   //}
   //else {
   $input=mysqli_query($connect,"UPDATE mapel SET kode_mapel='$kodemapel',nama_mapel='$mapel' WHERE kode_mapel='$id'"); 
      if ($input){
      echo $main_view;
      }
      else {
      echo"<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
  }
//}
break;

case "delete";
$id=$_GET['id'];
$hapus=mysqli_query($connect,"DELETE FROM mapel WHERE kode_mapel='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>

