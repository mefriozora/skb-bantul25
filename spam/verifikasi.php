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

<?php
$sesi_no_daftar=$_GET['ndf'];
$sesi_no_induk=$_GET['ni'];
$sql=mysql_query("select * from pendaftar where no_induk='$sesi_no_induk' AND no_pendaftar='$sesi_no_daftar'");
$h=mysql_fetch_array($sql);
// validasi

$sql1=mysql_query("select * from validasi where no_induk='$sesi_no_induk' AND no_pendaftar='$sesi_no_daftar'");
$v=mysql_fetch_array($sql1)?>

<div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">

          <div class="modal-header">
            <h4 class="modal-title">Validasi Pendaftaran</h4>            
          </div>
    </div>
      <div class="">
        <div class="card">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th class="w-5">No Pendaftaran</th><th class="w-1">:</th><th class="w-50"><?php echo $h['no_pendaftar'];?></th>
                  <th rowspan="5" valign="top" align"right"><img id="uploadPreview1" src="../foto_siswa/<?php echo $h['foto'];?>" width="140" height="180"/>
                </th>
                </tr>
                <tr>
                  <th class="w-5">No Induk</th><th class="w-1">:</th><th><?php echo $h['no_induk'];?></th>
                </tr>
                <tr>
                  <th class="w-5">Setara Paket</th><th class="w-1">:</th><th><?php echo $h['setara_paket'];?></th>
                </tr>
                <tr>
                  <th class="w-5">Nama Pendaftar</th><th class="w-1">:</th><th><?php echo $h['nama'];?></th>
                </tr>
                <tr>
                  <th class="w-5">Tempat Lahir</th><th class="w-1">:</th><th><?php echo $h['tempat_lhr'];?></th>
                </tr>
                <tr>
           <th class="w-5">Tanggal Lahir</th><th class="w-1">:</th><th><?php echo date('d-m-Y',strtotime($h['tanggal_lhr']));?>
         </th>
                </tr>
                <tr>
                  <th class="w-5">No HP / Telp</th><th class="w-1">:</th><th><?php echo $h['no_hp'];?></th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">
          <div class="modal-header">
            <h4 class="modal-title">Upload berkas persyaratan</h4>            
          </div>
    </div>
      <div class="">
        <div class="card">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Jenis Dokumen</th>
                  <th>Status</th>
                  <th class="text-center" colspan="2" >Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><span class="text-muted">1</span></td>
                  <td>Scan PDF Kartu Keluarga (KK)</td>
                  <td><?php if(!empty($h['kk'])){echo "Sudah di upload";}else{echo "Belum di Upload";};?></td>
                  <td class="text-right" style="width:400px">   
                  <button type="button" class="btn btn-success" onClick="window.location.href='../file_daftar/<?php echo $h['kk'];?>';">Lihat data</button>
                  </td>                                  
                </tr>
                <tr>
                  <td><span class="text-muted">2</span></td>
                  <td>Scan PDF Ijazah Terahir</td>
                  <td><?php if(!empty($h['ijazah'])){echo "Sudah di upload";}else{echo "Belum di Upload";};?></td>
                  <td class="text-right" style="width:400px">  
                  <button type="button" class="btn btn-success" onClick="window.location.href='../file_daftar/<?php echo $h['ijazah'];?>';">Lihat data</button>
                  </td>                                  
                </tr>
                <?php if($h['setara_paket']=='a'){?>
                <tr>
                  <td><span class="text-muted">3</span></td>
                  <td>Scan PDF Akta Kelahiran</td>
                  <td><?php if(!empty($h['akta'])){echo "Sudah di upload";}else{echo "Belum di Upload";};?></td>
                  <td class="text-right" style="width:400px">    
                  <button type="button" class="btn btn-success" onClick="window.location.href='../file_daftar/<?php echo $h['akta'];?>'">Lihat data</button>
                  </td>                                  
                </tr>
                <?php }?>
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


  <div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">

          <div class="modal-header">
            <h4 class="modal-title">Validasi Persyaratan Pendaftaran</h4>            
          </div>
    </div>
        <div class="card">
          <div class="table-responsive">
      <div class="">

            <form action="?&act=save" enctype="multipart/form-data" method="post">
                    <input type="hidden" value="<?php echo $h['no_pendaftar'];?>" name="ndf"/>
                    <input type="hidden" value="<?php echo $h['no_induk'];?>" name="ni"/>

            <table class="table card-table table-vcenter text-nowrap" style="width:500px;">
              <thead>
                <tr>
                  <th valign="top" class="w-5"><b>1. IJAZAH</b></th><th class="w-1">:</th>
                  <th>                    
                    <select name="ijazah" class="form-control">
                      <option value="">-Pilih-</option>
                      <option <?php if ($v['ijazah']=="s"){ echo "selected"; } ?> value="s">Sudah</option>
                      <option <?php if ($v['ijazah']=="b"){ echo "selected"; } ?> value="b">Belum</option>
                    </select>
                  </th>
                  <th class=""></th>
                </tr>
                <tr>
                  <th valign="top" class="w-5"><b>2. Raport</b></th><th class="w-1">:</th>
                  <th>                    
                    <select name="raport" class="form-control">
                      <option value="">-Pilih-</option>
                      <option <?php if ($v['raport']=="s"){ echo "selected"; } ?> value="s">Sudah</option>
                      <option <?php if ($v['raport']=="b"){ echo "selected"; } ?> value="b">Belum</option>
                    </select>
                  </th>
                  <th class=""></th>
                </tr>
                <tr>
                  <th valign="top" class="w-5"><b>3. Kartu Tanda Penduduk (KTP)</b></th><th class="w-1">:</th>
                  <th>                    
                    <select name="ktp" class="form-control">
                      <option value="">-Pilih-</option>
                      <option <?php if ($v['ktp']=="s"){ echo "selected"; } ?> value="s">Sudah</option>
                      <option <?php if ($v['ktp']=="b"){ echo "selected"; } ?> value="b">Belum</option>
                    </select>
                  </th>
                  <th class=""></th>
                </tr>
                <tr>
                  <th valign="top" class="w-5"><b></b></th><th class="w-1"></th>
                  <th>        
                  *Keterangan bla blaa                                
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-blue" onclick="return confirm('Data Validasi Persyaratan akan disimpan ? \nPastikan Data Entry Sudah Lengkap \n 1. Ijazah \n 2. Raport \n 3. KTP');">
                    Simpan Data
                    </button>
                  </div>
                  </th>
                  <th class=""></th>
                </tr>
              </thead>
            </table>
          </form>
          </div>
          </div>
        </div>
    </div>
  </div>
  <br>
  <br>
  <br>

<?php
break;

case "save";
$main_view= "<script>window.location.href='pendaftar.php';</script>";

$no_daftar=$_POST['ndf'];
$no_induk=$_POST['ni'];
$tgl=date('Y-m-d');

$ijazah=$_POST['ijazah'];
$raport=$_POST['raport'];
$ktp=$_POST['ktp'];

if($ijazah=="s" and $raport=="s" and $ktp=="s"){
  $status="lengkap";
}else{
  $status="belum";
}

//validasi 1
if (empty($ijazah)){ echo"<script>alert('Data Ijazah Belum Lengkap');history.back(-1);</script>";  }
else if (empty($raport)){ echo"<script>alert('Data Raport Belum Lengkap');history.back(-1);</script>";  }
else if (empty($ktp)){ echo"<script>alert('Data KTP Belum Lengkap');history.back(-1);</script>";  }
else{
  // cek validasi 2 ada belum?
  $cek_validasi=mysql_query("select * from validasi where no_pendaftar='$no_daftar' AND no_induk='$no_induk'");
  $h1=mysql_num_rows($cek_validasi);
  if($h1<=0){ //tidak ada
    $input=mysql_query("INSERT INTO validasi (`no_pendaftar`, `no_induk`, `tgl_validasi`, `ijazah`, `raport`, `ktp`, `status`) 
      values ('$no_daftar','$no_induk','$tgl','$ijazah','$raport','$ktp','$status')");
        if ($input){
           simpankesiswa($no_daftar,$no_induk,$status);
           echo "<script>alert('Sukses disimpan!');</script>"; 
           echo $main_view;
        }
        else {
          echo "<script>alert('Proses Gagal');history.back(-1);</script>";  
        }
  }

  else{
      $input=mysql_query("UPDATE validasi set 
          `tgl_validasi`='$tgl', 
          `ijazah`='$ijazah', 
          `raport`='$raport', 
          `ktp`='$ktp', 
          `status`='$status'
          where no_induk='$no_induk' AND no_pendaftar='$no_daftar'"); 
        if ($input){
           simpankesiswa($no_daftar,$no_induk,$status);
        echo "<script>alert('Sukses disimpan!');</script>";  
        echo $main_view;
        }
        else {
        echo "<script>alert('Proses Gagal');history.back(-1);</script>";  
        }      
  }

}
break;

}


function simpankesiswa($no_daftar,$no_induk,$status){
  $tgl=date('Y-m-d');
  if($status=="lengkap"){
  //cek dulu
    $cek_validasi=mysql_query("select * from siswa where no_pendaftar='$no_daftar' AND no_induk='$no_induk'");
    $h=mysql_num_rows($cek_validasi);
    if($h<=0){ //tidak ada    
      $input=mysql_query("INSERT INTO siswa (`no_pendaftar`, `no_induk`, `tgl_terdaftar`) 
      values ('$no_daftar','$no_induk','$tgl')");
    }else{
       $input=mysql_query("UPDATE siswa set 
        `tgl_terdaftar`='$tgl'
        where no_induk='$no_induk' AND no_pendaftar='$no_daftar'");    
    }
  }
    else{
  //cek dulu
    $cek_validasi=mysql_query("select * from siswa where no_pendaftar='$no_daftar' AND no_induk='$no_induk'");
    $h=mysql_num_rows($cek_validasi);
    if($h<=0){ //tidak ada    
      $input=mysql_query("DELETE FROM siswa where no_induk='$no_induk' AND no_pendaftar='$no_daftar'");
    }
  }
}

?>

