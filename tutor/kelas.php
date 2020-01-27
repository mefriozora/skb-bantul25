<?php include_once "views/main.php";?>
<?php 
$main_view= "<script>window.location.href='kelas.php';</script>";
switch ($_GET["act"]){
default:
//INDEX======================================================================================================
?>
<div class="my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Kelas</li>
          </ol>
    <div class="page-header">
      <h4>
      Kelas
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
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql=mysqli_query($connect,"SELECT * from kelas order by kode_kelas asc");
              $no=1;
              while($h=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $h['kelas'];?></td>
                  <td class="text-left">
                    <a href="?&act=form_update&id=<?php echo $h['kode_kelas'];?>" class="btn btn-secondary btn-sm"><i class="fe fe-edit"></i></a>
                    <a href='?&act=delete&id=<?php echo $h['kode_kelas'];?>' onClick="return confirm('Yakin data akan dihapus ?')"
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
   <div class="my-3 my-md-5">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Kelas</li>
          </ol>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>            
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
                  Tambah
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='kelas.php';">
                Batal
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
$sql=mysqli_query($connect,"SELECT * from kelas where kode_kelas='$id'");
$h=mysqli_fetch_array($sql);
?>
    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Data</h4>            
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
                  Update
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
  $cek_dulu=mysqli_query($connect,"SELECT * from kelas where kelas='$kelas'");
  $cek=mysqli_num_rows($cek_dulu);
   if($cek>0) {
   echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   }
   else {
   $input=mysqli_query($connect,"INSERT INTO kelas (kelas) 
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
  $cek_dulu=mysqli_query($connect,"SELECT * from kelas where kelas='$kelas'");
  $cek=mysqli_num_rows($cek_dulu);
   if($cek>0) {
   echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   }
   else {
   $input=mysqli_query($connect,"UPDATE kelas set kelas ='$kelas' where kode_kelas='$id'"); 
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
$hapus=mysqli_query($connect,"DELETE FROM kelas WHERE kode_kelas='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>

