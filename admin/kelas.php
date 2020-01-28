<?php include_once "views/main.php";?>
<?php 
$main_view= "<script>window.location.href='kelas.php';</script>";
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
            <li class="breadcrumb-item active">Kelas</li>
          </ol>
          <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Kelas</h3>
                  </div>
                  <div class="card-body">
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
              
              <div class="form-group">
                <label>Paket Kesetaraan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="paket_kesetaraan" class="form-control">
                      <option selected value="">-Pilih Paket Kesetaraan-</option>
                        <?php
                        //include "../config/connection.php"; 
                            $querypaket = mysqli_query($connect,"SELECT * FROM tb_paket");
                            while ($datapaket = mysqli_fetch_array($querypaket)){
                        ?>
                      <option value="<?php echo $datapaket['paket_id'] ?>"><?php echo $datapaket['paket_nama'] ?>
                            <?php } ?>
                      </option>
                      
                    </select>
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
      <div class="col-lg-8">
                <form class="card">
                <div class="card-header">
                    <h3 class="card-title">Kelas</h3>
                  </div>
                  <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Kelas</th>
                  <th>Paket Kesetaraan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql=mysqli_query($connect,"SELECT tb_kelas.kelas_id, tb_kelas.kelas_nama, tb_kelas.paket_id, tb_paket.paket_nama FROM tb_kelas LEFT JOIN tb_paket ON tb_paket.paket_id=tb_kelas.paket_id");
              $no=1;
              while($h=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $h['kelas_nama'];?></td>
                  <td><?php echo $h['paket_nama'];?></td>
                  <td class="text-left">
                    <a href="?&act=form_update&id=<?php echo $h['kelas_id'];?>" class="btn btn-secondary btn-sm"><i class="fe fe-edit"></i></a>
                    <a href='?&act=delete&id=<?php echo $h['kelas_id'];?>' onClick="return confirm('Yakin data akan dihapus ?')"
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
<?php
break;

case "form_update";
$id = $_GET['id'] ?: '0';
$sql=mysqli_query($connect,"SELECT * from tb_kelas where kelas_id='$id'");
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
                    <input name="kelas" type="text" class="form-control" onkeypress="" placeholder="Kelas" value="<?php echo $h['kelas_nama'];?>"/>
                  </div>
              </div>
              
              <div class="form-group">
                <label>Paket Kesetaraan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="paket_kesetaraan" class="form-control">
                    <option selected value="">-Pilih Paket Kesetaraan-</option>
                        <?php
                            $querypaket = mysqli_query($connect,"SELECT * FROM tb_paket ORDER BY paket_id");
                            while ($datapaket = mysqli_fetch_array($querypaket)){
                                if($datapaket['paket_id']==$h['paket_id']){
                                    echo "<option selected value=$datapaket[paket_id]>$datapaket[paket_nama]</option>";
                                }else{
                                    echo "<option value=$datapaket[paket_id]>$datapaket[paket_nama]</option>"; 
                                }
                            }
                        ?>    
                      </option>
                    </select>
                  </div>
              </div>
              
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Update
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

case "save";
$kelas=$_POST['kelas'];
//var_dump($kodemapel);

$paket_kesetaraan =$_POST['paket_kesetaraan'];

//validasi 1
//if (empty($kodemapel)){ 
  //echo"<script>alert('Masukkan kode mapel');history.back(-1);</script>";  
//}elseif (empty($mapel)) {
  //echo"<script>alert('Masukkan nama mapel');history.back(-1);</script>";  
//}elseif (empty($kelas)) {
  //echo"<script>alert('Pilih Kelas');history.back(-1);</script>";  
 
//}else{  
  // validasi 2
  $cek_dulu=mysqli_query($connect,"SELECT * from tb_kelas where kelas_nama='$kelas'");
  $cek=mysqli_num_rows($cek_dulu);
   //if($cek>0) {
   //echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   //}
   //else {
   $input=mysqli_query($connect,"INSERT INTO `tb_kelas`(`kelas_id`, `kelas_nama`, `paket_id`) VALUES ('','$kelas','$paket_kesetaraan')");
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
  //}
//}

break;

case "update";
$kelas = $_POST['kelas'];
$paket_kesetaraan = $_POST['paket_kesetaraan'];
//var_dump($paket_kesetaraan);
$id = $_POST['id'];
//var_dump($id);
//validasi 1
//if (empty($kodemapel)){ 
  //echo"<script>alert('Masukkan kode mapel');history.back(-1);</script>";  
//}elseif (empty($mapel)) {
  //echo"<script>alert('Masukkan nama mapel');history.back(-1);</script>";
//}elseif (empty($kelas)) {
  //echo"<script>alert('Pilih Kelas');history.back(-1);</script>";  
  
//}else{
  // validasi 2
 // $cek_dulu=mysqli_query($connect,"SELECT * from mapel where kode_mapel='$id'");
  //$cek=mysqli_num_rows($cek_dulu);
   //if($cek>0) {
   //echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   //}
   //else {
    $input=mysqli_query($connect,"UPDATE `tb_kelas` SET `kelas_nama`='$kelas',`paket_id`='$paket_kesetaraan' WHERE kelas_id='$id'"); 
   //var_dump($input); exit();
      if ($input){
       // echo "update";
      echo $main_view;
      }
      else {
        //echo "gagal";
      echo"<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
  //}
//}
break;

case "delete";
$id=$_GET['id'];
$hapus=mysqli_query($connect,"DELETE FROM tb_kelas WHERE kelas_id='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>

