<?php include_once "cek_session.php"; include_once "views/main.php";?>
<?php 
$main_view= "<script>window.location.href='tutor.php';</script>";
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
            <li class="breadcrumb-item active">Pamong Belajar/Tutor</li>
          </ol>
          <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Pamong Belajar/Tutor</h3>
                  </div>
                  <div class="card-body">
                  <form action="?&act=save" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>NIK Pamong Belajar</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nik" type="text" class="form-control" onkeypress="" placeholder="NIK Pamong Belajar" />
                  </div>
              </div>
              <div class="form-group">
                <label>Nama Pamong Belajar</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama_pamong" type="text" class="form-control" onkeypress="" placeholder="Nama Pamong Belajar" />
                  </div>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tempat_lhr" type="text" class="form-control" onkeypress="" placeholder="Tempat lahir"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tanggal_lhr" type="date" class="form-control" onkeypress="" placeholder="Tgl lahir"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="jenkel" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <option value="laki-laki">Laki - Laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Agama</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="agama" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <option value="ISLAM">ISLAM</option>
                      <option value="KRISTEN">KRISTEN</option>
                      <option value="KATOLIK">KATOLIK</option>
                      <option value="HINDU">HINDU</option>
                      <option value="BUDHA">BUDHA</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <textarea name="alamat" class="form-control"></textarea>
                  </div>
              </div>
              
              <div class="form-group">
                <label>No HP</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_hp" type="text" class="form-control" onkeypress="return isNumber(event)" placeholder="Telp"/>
                  </div>
              </div>
             <div class="form-group">
                <label>Jabatan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="jabatan" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <option value="Pamong Belajar">Pamong Belajar</option>
                      <option value="Tutor">Tutor</option>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Tambah
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='tutor.php';">
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
                    <h3 class="card-title">Data Pamong Belajar/Tutor</h3>
                  </div>
                  <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                        <tr>
                          <th class="w-1">No.</th>
                          <th>NIK Pamong</th>
                          <th>Nama Pamong</th>
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>Jenis Kelamin</th>
                          <th>Agama</th>
                          <th>Alamat</th>
                          <th>No. HP</th>
                          <th>Jabatan</th>
                          <th>Aksi</th>
                        </tr>
              </thead>
              <tbody>
              <?php
              $sql=mysqli_query($connect,"SELECT * from tb_pamong_belajar order by nik asc");
              $no=1;
              while($h=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                        <td><?php echo $h['nik'];?></td>
                        <td><?php echo $h['pamong_nama'];?></td>
                        <td><?php echo $h['pamong_tempat_lhr'];?></td>
                        <td><?php echo $h['pamong_tanggal_lhr'];?></td>
                        <td><?php echo $h['pamong_jenkel'];?></td>
                        <td><?php echo $h['pamong_agama'];?></td>
                        <td><?php echo $h['pamong_alamat'];?></td>
                        <td><?php echo $h['pamong_no_hp'];?></td>
                        <td><?php echo $h['pamong_jabatan'];?></td>
                  <td class="text-right">
                    <a href="tutor_edit.php?id=<?php echo $h['nik'];?>" class="btn btn-info btn-sm"><i class="fe fe-edit"></i>Edit</a>
                    <a href='?&act=delete&id=<?php echo $h['nik'];?>' onClick="return confirm('Yakin data akan dihapus ?')"
                    class="btn btn-danger btn-sm"><i class="fe fe-trash">Hapus</i></a>
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
$nik            = $_POST['nik'];
$nama_pamong    =$_POST['nama_pamong'];
$tempat_lhr     =$_POST['tempat_lhr'];
$tanggal_lhr    =$_POST['tanggal_lhr'];
$jenkel         =$_POST['jenkel'];
$alamat         =$_POST['alamat'];
$agama          =$_POST['agama'];
$no_hp          =$_POST['no_hp'];
$jabatan        = $_POST['jabatan'];
$varUser        = $_POST['nik'];
$varPswd        = md5($_POST['nik']);
//validasi 1
//if (empty($nama_tutor)){ echo"<script>alert('Masukkan data nama');history.back(-1);</script>";  
//}else if (empty($tempat_lhr)){ echo"<script>alert('Masukkan tempat lahir');history.back(-1);</script>";  
//}else if (empty($tanggal_lhr)){ echo"<script>alert('Masukkan tgl lahir');history.back(-1);</script>";  
//}else if (empty($jenkel)){ echo"<script>alert('Masukkan jenkel');history.back(-1);</script>";  
//}else if (empty($alamat)){ echo"<script>alert('Masukkan alamat');history.back(-1);</script>";  
//}else if (empty($no_hp)){ echo"<script>alert('Masukkan no telp');history.back(-1);</script>";  
//}
//else{  
   $input = "INSERT INTO `tb_pamong_belajar`(`nik`, `pamong_nama`, `pamong_tempat_lhr`, `pamong_tanggal_lhr`, `pamong_jenkel`, `pamong_agama`, `pamong_alamat`, `pamong_no_hp`, `pamong_jabatan`) VALUES ('$nik','$nama_pamong','$tempat_lhr','$tanggal_lhr','$jenkel','$agama', '$alamat', '$no_hp','$jabatan')";
    //var_dump($input); 
   $queryUser  = mysqli_query($connect,"INSERT INTO `tb_pengguna`(`pengguna_id`, `pengguna_nama`, `pengguna_username`, `pengguna_password`, `pengguna_level`) VALUES ('','$nama_pamong','$varUser','$varPswd','Pamong')");
    //var_dump($queryUser); 
   $sql = mysqli_query($connect,$input);
      if ($sql){

        //echo "masuk";
      echo $main_view;
      }
      else {
        //echo " gagal";
      echo "<script>alert('Proses Gagal');history.back(-1);</script>";  
      }


break;

case "delete";
$id=$_GET['id'];
$hapus=mysqli_query($connect,"DELETE FROM tb_pamong_belajar WHERE nik='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>

