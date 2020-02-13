<?php include_once "cek_session.php"; include_once "views/main.php";?>
<?php 
$main_view= "<script>window.location.href='mapel.php';</script>";
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
            <li class="breadcrumb-item active">Mata Pelajaran</li>
          </ol>
          <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Mata Pelajaran</h3>
                  </div>
                  <div class="card-body">
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
                <button type="reset" class="btn btn-danger" onClick="window.location.href='mapel.php';">
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
                    <h3 class="card-title">Mata Pelajaran</h3>
                  </div>
                  <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Kode Mapel</th>
                  <th>Nama Mapel</th>
                  <th>KKM Mapel</th>
                  <th>Paket Kesetaraan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql=mysqli_query($connect,"SELECT tb_mapel.mapel_id, tb_mapel.mapel_kode, tb_mapel.mapel_nama, tb_mapel.mapel_kkm, tb_mapel.paket_id, tb_paket.paket_nama FROM tb_mapel LEFT JOIN tb_paket ON tb_paket.paket_id=tb_mapel.paket_id ");
              $no=1;
              while($h=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $h['mapel_kode'];?></td>
                  <td><?php echo $h['mapel_nama'];?></td>
                  <td><?php echo $h['mapel_kkm'];?></td>
                  <td><?php echo $h['paket_nama'];?></td>
                  <td class="text-left">
                    <a href="mapel_edit.php?id=<?php echo $h['mapel_id'];?>" class="btn btn-info btn-sm"><i class="fe fe-edit"></i>Edit</a>
                    <a href='?&act=delete&id=<?php echo $h['mapel_id'];?>' onClick="return confirm('Yakin data akan dihapus ?')"
                    class="btn btn-danger btn-sm"><i class="fe fe-trash"></i>Hapus</a>
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

case "save";
$kodemapel=$_POST['kodemapel'];
//var_dump($kodemapel);
$mapel=$_POST['mapel'];

//var_dump($mapel);
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
  $cek_dulu=mysqli_query($connect,"SELECT * from tb_mapel where mapel_kode='$kodemapel'");
  $cek=mysqli_num_rows($cek_dulu);
   //if($cek>0) {
   //echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   //}
   //else {
   $input=mysqli_query($connect,"INSERT INTO `tb_mapel`(`mapel_id`, `mapel_kode`, `mapel_nama`, `mapel_kkm`, `paket_id`) VALUES ('','$kodemapel', '$mapel' , '70' , '$paket_kesetaraan')");
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

case "delete";
$id=$_GET['id'];
$hapus=mysqli_query($connect,"DELETE FROM tb_mapel WHERE mapel_id='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>

