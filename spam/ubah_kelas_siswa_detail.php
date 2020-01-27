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

$sql1=mysql_query("select * from siswa a left join kelas b on(a.id_kelas=b.id_kelas) where a.no_induk='$sesi_no_induk' AND a.no_pendaftar='$sesi_no_daftar'");
$v=mysql_fetch_array($sql1)?>

<div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">

          <div class="modal-header">
            <h4 class="modal-title">Data Siswa</h4>            
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
            <h4 class="modal-title">Ubah Kelas Siswa</h4>            
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
                  <th valign="top" class="w-5"><b>1. KELAS SEBELUMNYA</b></th><th class="w-1">:</th>
                  <th>                    
                    <?php echo $v['kelas'];?>
                  </th>
                  <th class=""></th>
                </tr>
                <tr>
                  <th valign="top" class="w-5"><b>2. Pindah ke KElas</b></th><th class="w-1">:</th>
                  <th>                    
                    <select name="pindahkelas" class="form-control">
                      <option value="">-Pilih-</option>
                      <?php
                      $sql_kelas=mysql_query("select * from kelas order by kelas asc");
                      while ($kl=mysql_fetch_array($sql_kelas)){
                        if($v['id_kelas']==$kl['id_kelas']){ ?>
                        <?php }else{ ?>
                         <option value="<?php echo $kl['id_kelas'];?>"><?php echo $kl['kelas'];?></option>
                       <?php } ?>
                      <?php } ?>
                    </select>
                  </th>
                  <th class=""></th>
                </tr>
                <tr>
                  <th valign="top" class="w-5"><b></b></th><th class="w-1"></th>
                  <th>        
                  *Keterangan bla blaa                                
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-blue" onclick="return confirm('Perubahan data kelas siswa akan disimpan ?');">
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
$main_view= "<script>window.location.href='ubah_kelas_siswa.php';</script>";

$no_daftar=$_POST['ndf'];
$no_induk=$_POST['ni'];
$tgl=date('Y-m-d');
$pindahkelas=$_POST['pindahkelas'];

if (empty($pindahkelas)){ 
  echo"<script>alert('Pilih data kelas baru');history.back(-1);</script>";  
}else{

      $input=mysql_query("UPDATE siswa set 
          `id_kelas`='$pindahkelas', 
          `tgl_terdaftar`='$tgl' 
          where no_induk='$no_induk' AND no_pendaftar='$no_daftar'"); 
        if ($input){
        echo "<script>alert('Kelas sukses di Update!');</script>";  
        echo $main_view;
        }
        else {
        echo "<script>alert('Proses Gagal');</script>";  
        echo $main_view;
        }    

      } 

break;

}


?>

