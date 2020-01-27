<?php include_once "views/main.php";?>
<?php 
switch ($_GET["act"]){
default:
//INDEX======================================================================================================
?>
<script type="text/javascript">
    function PreviewImage(no) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage"+no).files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview"+no).src = oFREvent.target.result;
        };
    }
</script>

<div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">
    </div>
      <div class="">
        <div class="card">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <!--<tbody>
              <tr>
                <td>
                  Keterangan
                  <ul>
                    <li>1. ket </li>
                    <li>1. ket </li>
                    <li>1. ket </li>
                    <li>1. ket </li>
                  </ul>
                </td>
              </tr>
              </tbody>-->
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
$sesi_no_daftar=$_GET['ndf'];
$sesi_no_induk=$_GET['ni'];
$sql=mysql_query("select * from pendaftar where no_induk='$sesi_no_induk' AND no_pendaftar='$sesi_no_daftar'");
$h=mysql_fetch_array($sql)?>

<div class="col-lg order-lg-first"><div class="container">
<table border='0' width="100%">
  <tr>
    <td valign="top" width="50%">

    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Data Pendaftar</h4>            
          </div>
          <div class="modal-body">

            <form action="?&act=save" enctype="multipart/form-data" method="post">
                    <input type="hidden" value="<?php echo $h['no_pendaftar'];?>" name="ndf"/>
                    <input type="hidden" value="<?php echo $h['no_induk'];?>" name="ni"/>
              <div class="form-group">
                <label>Nomor Pendaftaran</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input type="text" class="form-control" onkeypress="" value="<?php echo $h['no_pendaftar'];?>" readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>Nomor Induk</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_induk" type="text" class="form-control" onkeypress="" placeholder="No. Induk" value="<?php echo $h['no_induk'];?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Setara Paket</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="setara_paket" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <option <?php if($h['setara_paket']=="a"){echo "selected";}?> value="a">PAKET A</option>
                      <option <?php if($h['setara_paket']=="b"){echo "selected";}?>  value="b">PAKET B</option>
                      <option <?php if($h['setara_paket']=="c"){echo "selected";}?>  value="c">PAKET C</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Nama</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama" type="text" class="form-control" onkeypress="" placeholder="Nama" value="<?php echo $h['nama'];?>"/>
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
                <label>Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tanggal_lhr" type="date" class="form-control" onkeypress="" placeholder="Tanggal lahir" value="<?php echo $h['tanggal_lhr'];?>"/>
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
                <label>Jenis Kelamin</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="jenkel" class="form-control">
                      <option value="">-Pilih-</option>
                      <option <?php if ($h['jenkel']=="L"){ echo "selected"; } ?> value="L">Laki - laki</option>
                      <option <?php if ($h['jenkel']=="P"){ echo "selected"; } ?> value="P">Perempuan</option>
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
                <label>No HP</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_hp" type="text" class="form-control" onkeypress="return isNumber(event)" placeholder="Telp" value="<?php echo $h['no_hp'];?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>FOTO</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div><img id="uploadPreview1" src="../foto_siswa/<?php echo $h['foto'];?>" width="140" height="180"/><br /><br />
                    <input name="filefoto" id="uploadImage1" type="file" onchange="PreviewImage(1);" class="form-control" accept=".jpg, .png, .jpeg">
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>  

    </td>
  <td valign="top" width="50%">

    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Data Sekolah</h4>          
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Asal Sekolah</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="asal_sekolah" type="text" class="form-control" onkeypress="" placeholder="Asal Sekolah" value="<?php echo $h['asal_sekolah'];?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Alamat Sekolah</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <textarea name="alamat_sekolah" class="form-control"><?php echo $h['alamat_sekolah'];?></textarea>
                  </div>
              </div>
              <div class="form-group">
                <label>Setara Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="setara_kelas" type="text" class="form-control" onkeypress="" placeholder="Setara Kelas" value="<?php echo $h['setara_kelas'];?>"/>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>  

    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Data Orang tua / Wali</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Nama Orang tua / Wali</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama_ortuwali" type="text" class="form-control" onkeypress="" placeholder="orang tua / wali" value="<?php echo $h['nama_ortuwali'];?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <textarea name="alamat_ortuwali" class="form-control"><?php echo $h['alamat_ortuwali'];?></textarea>
                  </div>
              </div>
              <div class="form-group">
                <label>Pekerjaan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="pekerj_ortuwali" type="text" class="form-control" onkeypress="" placeholder="Pekerjaan" value="<?php echo $h['pekerj_ortuwali'];?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>No HP</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_hp_ortuwali" type="text" class="form-control" onkeypress="return isNumber(event)" placeholder="Telp" value="<?php echo $h['no_hp_ortuwali'];?>"/>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-blue">
                Simpan & Validasi Persyaratan
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

<?php
break;

case "save";
$main_view= "<script>window.location.href='verifikasi.php?&ndf=$_POST[ndf]&ni=$_POST[ni]';</script>";

$sesi_no_daftar=$_POST['ndf'];
$sesi_no_induk=$_POST['ni'];

$no_induk=$_POST['no_induk'];
$setara_paket=$_POST['setara_paket'];
$nama=$_POST['nama'];
$tempat_lhr=$_POST['tempat_lhr'];
$tanggal_lhr=$_POST['tanggal_lhr'];
$agama=$_POST['agama'];
$jenkel=$_POST['jenkel'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];
$asal_sekolah=$_POST['asal_sekolah'];
$alamat_sekolah=$_POST['alamat_sekolah'];
$setara_kelas=$_POST['setara_kelas'];
$nama_ortuwali=$_POST['nama_ortuwali'];
$alamat_ortuwali=$_POST['alamat_ortuwali'];
$pekerj_ortuwali=$_POST['pekerj_ortuwali'];
$no_hp_ortuwali=$_POST['no_hp_ortuwali'];

//validasi 1
if (empty($no_induk)){ echo"<script>alert('Masukkan No Induk');history.back(-1);</script>";  }
else if (empty($setara_paket)){ echo"<script>alert('Masukkan Setara Paket');history.back(-1);</script>";  }
else if (empty($nama)){ echo"<script>alert('Masukkan Nama');history.back(-1);</script>";  }
else if (empty($tempat_lhr)){ echo"<script>alert('Masukkan Tempat Lahir');history.back(-1);</script>";   }
else if (empty($tanggal_lhr)){ echo"<script>alert('Masukkan Tanggal Lahir');history.back(-1);</script>";  }
else if (empty($agama)){ echo"<script>alert('Masukkan Agama');history.back(-1);</script>";  }
else if (empty($jenkel)){ echo"<script>alert('Masukkan Jenis Kelamin');history.back(-1);</script>";  }
else if (empty($alamat)){ echo"<script>alert('Masukkan Alamat');history.back(-1);</script>";  }
else if (empty($no_hp)){ echo"<script>alert('Masukkan No HP / Telp');history.back(-1);</script>";  }
else if (empty($asal_sekolah)){ echo"<script>alert('Masukkan Asal sekolah');history.back(-1);</script>";  }
else if (empty($alamat_sekolah)){ echo"<script>alert('Masukkan Alamat sekolah');history.back(-1);</script>";  }
else if (empty($setara_kelas)){ echo"<script>alert('Masukkan Setara Kelas');history.back(-1);</script>";  }
else if (empty($nama_ortuwali)){ echo"<script>alert('Masukkan Nama Orang tua / wali');history.back(-1);</script>";  }
else if (empty($alamat_ortuwali)){ echo"<script>alert('Masukkan Alamat Orang tua / wali');history.back(-1);</script>";  }
else if (empty($pekerj_ortuwali)){ echo"<script>alert('Masukkan Pekerjaan Orang tua / wali');history.back(-1);</script>";  }
else if (empty($no_hp_ortuwali)){ echo"<script>alert('Masukkan Telp Orang tua / wali');history.back(-1);</script>";  }
else{
  // validasi foto
$filename   = $no_induk . "_" . $sesi_no_daftar; 
$extension  = pathinfo( $_FILES["filefoto"]["name"], PATHINFO_EXTENSION ); 
$basename   = $filename . '.' . $extension; 

  $lokasi_file    = $_FILES['filefoto']['tmp_name'];
  //$tipe_file      = $_FILES['filefoto']['type'];
  //$nama_file      = $_FILES['filefoto']['name'];
  // cek ada foto opo ora
  if (!empty($lokasi_file)){
      move_uploaded_file($lokasi_file,"../foto_siswa/".$basename);   
      $input=mysql_query("UPDATE pendaftar set 
          `no_induk`='$no_induk', 
          `setara_paket`='$setara_paket', 
          `nama`='$nama', 
          `tempat_lhr`='$tempat_lhr', 
          `tanggal_lhr`='$tanggal_lhr', 
          `agama`='$agama', 
          `jenkel`='$jenkel', 
          `alamat`='$alamat', 
          `no_hp`='$no_hp',  
          `asal_sekolah`='$asal_sekolah', 
          `alamat_sekolah`='$alamat_sekolah', 
          `setara_kelas`='$setara_kelas', 
          `nama_ortuwali`='$nama_ortuwali', 
          `alamat_ortuwali`='$alamat_ortuwali', 
          `pekerj_ortuwali`='$pekerj_ortuwali', 
          `no_hp_ortuwali`='$no_hp_ortuwali', 
          `foto`='$basename' 
          where no_induk='$sesi_no_induk' AND no_pendaftar='$sesi_no_daftar'"); 
        if ($input){
        echo $main_view;
        }
        else {
        echo "<script>alert('Proses Gagal');history.back(-1);</script>";  
        }

  }else{
      $input=mysql_query("UPDATE pendaftar set 
          `no_induk`='$no_induk', 
          `setara_paket`='$setara_paket', 
          `nama`='$nama', 
          `tempat_lhr`='$tempat_lhr', 
          `tanggal_lhr`='$tanggal_lhr', 
          `agama`='$agama', 
          `jenkel`='$jenkel', 
          `alamat`='$alamat', 
          `no_hp`='$no_hp', 
          `asal_sekolah`='$asal_sekolah', 
          `alamat_sekolah`='$alamat_sekolah', 
          `setara_kelas`='$setara_kelas', 
          `nama_ortuwali`='$nama_ortuwali', 
          `alamat_ortuwali`='$alamat_ortuwali', 
          `pekerj_ortuwali`='$pekerj_ortuwali', 
          `no_hp_ortuwali`='$no_hp_ortuwali'
          where no_induk='$sesi_no_induk' AND no_pendaftar='$sesi_no_daftar'"); 
        if ($input){
        echo $main_view;
        }
        else {
        echo "<script>alert('Proses Gagal1');history.back(-1);</script>";  
        }  
  }

}
break;

}
?>

