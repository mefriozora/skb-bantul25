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
$sql=mysql_query("select * from siswa a left join pendaftar b on (a.no_pendaftar=b.no_pendaftar and a.no_induk=b.no_induk) where a.no_induk='$sesi_no_induk' AND b.no_pendaftar='$sesi_no_daftar'");
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
              <div class="form-group">
                <label>Tanggal Siswa Terdaftar</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input type="text" class="form-control" onkeypress="" value="<?php echo date('d-m-Y',strtotime($h['tgl_terdaftar']));?>" readonly/>
                  </div>
              </div>
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
                    <input name="no_induk" type="text" class="form-control" onkeypress="" placeholder="No. Induk" value="<?php echo $h['no_induk'];?>" readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>Setara Paket</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="setara_paket" class="form-control" readonly>
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
                    <input name="nama" type="text" class="form-control" onkeypress="" placeholder="Nama" value="<?php echo $h['nama'];?>" readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tempat_lhr" type="text" class="form-control" onkeypress="" placeholder="Tempat lahir" value="<?php echo $h['tempat_lhr'];?>" readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tanggal_lhr" type="date" class="form-control" onkeypress="" placeholder="Tanggal lahir" value="<?php echo $h['tanggal_lhr'];?>" readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>Agama</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="agama" class="form-control" disabled>
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
                    <select name="jenkel" class="form-control" disabled>
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
                    <textarea name="alamat" class="form-control" readonly><?php echo $h['alamat'];?></textarea>
                  </div>
              </div>
              <div class="form-group">
                <label>No HP</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_hp" type="text" class="form-control" onkeypress="return isNumber(event)" placeholder="Telp" value="<?php echo $h['no_hp'];?>" readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>FOTO</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div><img id="uploadPreview1" src="../foto_siswa/<?php echo $h['foto'];?>" width="140" height="180"/>
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
                    <input name="asal_sekolah" type="text" class="form-control" onkeypress="" placeholder="Asal Sekolah" value="<?php echo $h['asal_sekolah'];?>" readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>Alamat Sekolah</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <textarea name="alamat_sekolah" class="form-control" readonly><?php echo $h['alamat_sekolah'];?></textarea>
                  </div>
              </div>
              <div class="form-group">
                <label>Setara Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="setara_kelas" type="text" class="form-control" onkeypress="" placeholder="Setara Kelas" value="<?php echo $h['setara_kelas'];?>" readonly/>
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
            <h4 class="modal-title">Data Orang Tua / Wali</h4>            
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Nama Orang tua / Wali</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama_ortuwali" type="text" class="form-control" onkeypress="" placeholder="orang tua / wali" value="<?php echo $h['nama_ortuwali'];?>" readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <textarea name="alamat_ortuwali" class="form-control" readonly><?php echo $h['alamat_ortuwali'];?></textarea>
                  </div>
              </div>
              <div class="form-group">
                <label>Pekerjaan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="pekerj_ortuwali" type="text" class="form-control" onkeypress="" placeholder="Pekerjaan" value="<?php echo $h['pekerj_ortuwali'];?>" readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>No HP</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_hp_ortuwali" type="text" class="form-control" onkeypress="return isNumber(event)" placeholder="Telp" value="<?php echo $h['no_hp_ortuwali'];?>" readonly/>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" onClick="history.go(-1)" class="btn btn">
                Kembali
                </button>
              </div>
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
break;

}
?>

