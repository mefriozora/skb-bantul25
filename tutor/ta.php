<?php include_once "views/main.php";
//hapuus
?>
<?php 
$main_view= "<script>window.location.href='ta.php';</script>";
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
            <li class="breadcrumb-item active">Tahun Ajaran</li>
          </ol>
    <div class="page-header">
      <h4 class="">
        Tahun Ajaran
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
                  <th>Tahun Ajaran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql=mysqli_query($connect,"SELECT * from tahun_ajaran order by kode_ta asc");
              $no=1;
              while($h=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $h['ta'];?></td>
                  <td class="text-left">
                    <a href="?&act=form_update&id=<?php echo $h['kode_ta'];?>" class="btn btn-secondary btn-sm"><i class="fe fe-edit"></i></a>
                    <a href='?&act=delete&id=<?php echo $h['kode_ta'];?>' onClick="return confirm('Yakin data akan dihapus ?')"
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
                <label>Tahun</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tahun" type="text" class="form-control" onkeypress="return isNumber(event)" placeholder="Tahun Ajaran"/>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Tambah
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='ta.php';">
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
$sql=mysqli_query($connect,"SELECT * from tahun_ajaran where kode_ta='$id'");
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
                <label>Tahun</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <input name="tahun" type="text" class="form-control" onkeypress="return isNumber(event)" placeholder="Tahun Ajaran" value="<?php echo $h['ta'];?>"/>                    
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Update
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='ta.php';">
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
$tahun=$_POST['tahun'];
//validasi 1
if (empty($tahun)){ 
  echo"<script>alert('Masukkan data tahun');history.back(-1);</script>";  
}
else{  
  // validasi 2
  $cek_dulu=mysqli_query($connect,"SELECT * from tahun_ajaran where ta='$tahun'");
  $cek=mysqli_num_rows($cek_dulu);
   if($cek>0) {
   echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   }
   else {
   $input=mysqli_query($connect,"INSERT INTO tahun_ajaran (ta) 
    values ('$tahun')");
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
$tahun=$_POST['tahun'];
$id=$_POST['id'];
//validasi 1
if (empty($tahun)){ 
  echo"<script>alert('Masukkan data tahun');history.back(-1);</script>";  
}else{
  // validasi 2
  $cek_dulu=mysqli_query($connect,"SELECT * from tahun_ajaran where ta='$tahun'");
  $cek=mysqli_num_rows($cek_dulu);
   if($cek>0) {
   echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   }
   else {
   $input=mysqli_query($connect,"UPDATE tahun_ajaran set ta ='$tahun' where kode_ta='$id'"); 
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
$hapus=mysqli_query($connect,"DELETE FROM tahun_ajaran WHERE kode_ta='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>

