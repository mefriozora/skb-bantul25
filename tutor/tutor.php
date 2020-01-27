<?php include_once "views/main.php";?>
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
            <li class="breadcrumb-item active">Tutor</li>
          </ol>
    <div class="page-header">
      <h4>
        Tutor
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
                          <th class="w-1">No.</th>
                          <th>Kode Tutor</th>
                          <th>Nama Tutor</th>
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>Jenis Kelamin</th>
                          <th>Alamat</th>
                          <th>Agama</th>
                          <th>No. HP</th>
                          <th>Terdaftar</th>
                          <th>Aksi</th>
                          <th></th>
                        </tr>
              </thead>
              <tbody>
              <?php
              $sql=mysqli_query($connect,"SELECT * from tutor order by kode_tutor asc");
              $no=1;
              while($h=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                        <td><?php echo $h['kode_tutor'];?></td>
                        <td><?php echo $h['nama_tutor'];?></td>
                        <td><?php echo $h['tempat_lhr'];?></td>
                        <td><?php echo $h['tanggal_lhr'];?></td>
                        <td><?php echo $h['jenkel'];?></td>
                        <td><?php echo $h['alamat'];?></td>
                        <td><?php echo $h['agama'];?></td>
                        <td><?php echo $h['no_hp'];?></td>
                        <td><?php echo $h['tgl_terdaftar'];?></td>
                  <td class="text-right">
                    <a href="?&act=form_update&id=<?php echo $h['kode_tutor'];?>" class="btn btn-secondary btn-sm"><i class="fe fe-edit"></i></a>
                    <a href='?&act=delete&id=<?php echo $h['kode_tutor'];?>' onClick="return confirm('Yakin data akan dihapus ?')"
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
                <label>Kode Tutor</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="kode_tutor" type="text" class="form-control" onkeypress="" placeholder="Kode Tutor" />
                  </div>
              </div>
              <div class="form-group">
                <label>Nama Tutor</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama_tutor" type="text" class="form-control" onkeypress="" placeholder="Nama Tutor" />
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
                      <option value="laki-laki">Laki - laki</option>
                      <option value="perempuan">Perempuan</option>
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
                <label>No HP</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_hp" type="text" class="form-control" onkeypress="return isNumber(event)" placeholder="Telp"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tanggal Terdaftar</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tanggal_terdaftar" type="date" class="form-control" onkeypress="" placeholder="Tanggal Terdaftar"/>
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
    </div>  
<?php
break;

case "form_update";
$id = $_GET['id'] ?: '0';
$sql=mysqli_query($connect,"SELECT * from tutor where kode_tutor='$id'");
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
             <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
             <div class="form-group">
                <label>Kode Tutor</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="kode_tutor" type="text" class="form-control" onkeypress="" value="<?php echo $h['kode_tutor'];?>"/>
                  </div>
              <div class="form-group">
                <label>Nama Tutor</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama_tutor" type="text" class="form-control" onkeypress="" value="<?php echo $h['nama_tutor'];?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tempat_lhr" type="text" class="form-control" onkeypress="" placeholder="Tempat lahir" value="<?php echo $h['tempat_lhr'];?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tanggal_lhr" type="date" class="form-control" onkeypress="" placeholder="Tgl lahir" value="<?php echo $h['tanggal_lhr'];?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="jenkel" class="form-control">
                      <option value="">-Pilih-</option>
                      <option <?php if ($h['jenkel']=="laki-laki"){ echo "selected"; } ?> value="laki-laki">Laki - laki</option>
                      <option <?php if ($h['jenkel']=="perempuan"){ echo "selected"; } ?> value="perempuan">Perempuan</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <textarea name="alamat" class="form-control"><?php echo $h['alamat'];?></textarea>
                  </div>
              </div>
              <div class="form-group">
                <label>Agama</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="agama" class="form-control">
                      <option value="">-Pilih-</option>
                      <option <?php if ($h['agama']=="ISLAM"){ echo "selected"; } ?> value="ISLAM">ISLAM</option>
                      <option <?php if ($h['agama']=="KRISTEN"){ echo "selected"; } ?> value="KRISTEN">KRISTEN</option>
                      <option <?php if ($h['agama']=="KATOLIK"){ echo "selected"; } ?> value="KATOLIK">KATOLIK</option>
                      <option <?php if ($h['agama']=="HINDU"){ echo "selected"; } ?> value="HINDU">HINDU</option>
                      <option <?php if ($h['agama']=="BUDHA"){ echo "selected"; } ?> value="BUDHA">BUDHA</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>No HP</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_hp" type="text" class="form-control" onkeypress="return isNumber(event)" 
                    placeholder="Telp" value="<?php echo $h['no_hp'];?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tanggal Terdaftar</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tanggal_terdaftar" type="date" class="form-control" onkeypress="" placeholder="Tanggal Terdaftar" value="<?php echo $h['tgl_terdaftar']?>" />
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Update
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='tutor.php';">
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
//create id
    $hari = date("Ymd");
    $sql = mysqli_query($connect,"SELECT IFNULL(count(kode_tutor), 0) as idMAX FROM tutor");
    $data = mysqli_fetch_array($sql);
    $idMax = $data['idMAX']+1;
    $NewID = $hari .sprintf('%04s', $idMax);

$kode_tutor=$_POST['kode_tutor'];
$nama_tutor=$_POST['nama_tutor'];
$tempat_lhr=$_POST['tempat_lhr'];
$tanggal_lhr=$_POST['tanggal_lhr'];
$jenkel=$_POST['jenkel'];
$alamat=$_POST['alamat'];
$agama=$_POST['agama'];
$no_hp=$_POST['no_hp'];
$tgl_terdaftar=date('Y-m-d');
//validasi 1
if (empty($nama_tutor)){ echo"<script>alert('Masukkan data nama');history.back(-1);</script>";  
}else if (empty($tempat_lhr)){ echo"<script>alert('Masukkan tempat lahir');history.back(-1);</script>";  
}else if (empty($tanggal_lhr)){ echo"<script>alert('Masukkan tgl lahir');history.back(-1);</script>";  
}else if (empty($jenkel)){ echo"<script>alert('Masukkan jenkel');history.back(-1);</script>";  
}else if (empty($alamat)){ echo"<script>alert('Masukkan alamat');history.back(-1);</script>";  
}else if (empty($no_hp)){ echo"<script>alert('Masukkan no telp');history.back(-1);</script>";  
}
else{  
   $input=mysqli_query($connect, "INSERT INTO tutor (`kode_tutor`, `nama_tutor`, `tempat_lhr`, `tanggal_lhr`, `jenkel`, `alamat`, `agama`, `no_hp`, `tgl_terdaftar`) 
    values ('$kode_tutor','$nama_tutor','$tempat_lhr','$tanggal_lhr','$jenkel','$alamat','$agama','$no_hp','$tgl_terdaftar')");
      if ($input){
      echo $main_view;
      }
      else {
      echo "<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
}
break;

case "update";
$id=$_POST['id'];
$kode_tutor=$_POST['kode_tutor'];
$nama_tutor=$_POST['nama_tutor'];
$tempat_lhr=$_POST['tempat_lhr'];
$tanggal_lhr=$_POST['tanggal_lhr'];
$jenkel=$_POST['jenkel'];
$alamat=$_POST['alamat'];
$agama=$_POST['agama'];
$no_hp=$_POST['no_hp'];
//validasi 1
if (empty($nama_tutor)){ echo"<script>alert('Masukkan data nama');history.back(-1);</script>";  
}else if (empty($tempat_lhr)){ echo"<script>alert('Masukkan tempat lahir');history.back(-1);</script>";  
}else if (empty($tanggal_lhr)){ echo"<script>alert('Masukkan tgl lahir');history.back(-1);</script>";  
}else if (empty($jenkel)){ echo"<script>alert('Masukkan jenkel');history.back(-1);</script>";  
}else if (empty($alamat)){ echo"<script>alert('Masukkan alamat');history.back(-1);</script>";  
}else if (empty($no_hp)){ echo"<script>alert('Masukkan no telp');history.back(-1);</script>";  
}
else{ 
   $input=mysqli_query($connect,"UPDATE tutor SET 
    kode_tutor = '$kode_tutor',
    nama_tutor ='$nama_tutor', 
    tempat_lhr ='$tempat_lhr', 
    tanggal_lhr ='$tanggal_lhr', 
    jenkel ='$jenkel', 
    alamat ='$alamat', 
    agama ='$agama', 
    no_hp ='$no_hp'
    WHERE kode_tutor='$id'"); 
      if ($input){
      echo $main_view;
      }
      else {
      echo"<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
}
break;

case "delete";
$id=$_GET['id'];
$hapus=mysqli_query($connect,"DELETE FROM tutor WHERE kode_tutor='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>

