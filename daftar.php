<?php include_once "views/main.php";?>
<?php
  include "config/connection.php";
?>
<style>
    #file_error{color: #FF0000;}
</style>
<style type="text/css">
  input:invalid {
    border-color: red;
}
input,
input:valid {
    border-color: #ccc;
}
</style>
<div class="my-3 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Pendaftaran</li>
          </ol>
    <div class="">
        <div class="card">
          <div class="table-responsive">
          <div class="alert alert-warning" role="alert">
             <table class="table card-table table-vcenter text-nowrap datatable">
              <tbody>
              <tr>
                <td>
                  Keterangan
                </td>
              </tr>
              <tr>
                <td>
                  <ul>
                    <li>Masukkan data diri anda dengan benar dan sesuai</li>
                    <li>Beri tanda (-) jika tidak diisi</li>
                    <li>File berkas persyaratan berformat .pdf kecuali foto berformat .jpg</li>
                    <li>Ukuran file berkas persyaratan maksimal 200kb</li>
                  </ul>
                </td>
              </tr>
              </tbody>
            </table>
            <script src="assets/js/main.js"></script>
            
            <script>
              function tampilkan(){
              var nama_paket=document.getElementById("form1").paket.value;
                if (nama_paket=="A"){
                 document.getElementById("tampil").innerHTML="<option value='Kelas 4'>Kelas 4</option><option value='Kelas 5'>Kelas 5</option><option value='Kelas 6'>Kelas 6</option>";
                }
                else if (nama_paket=="B"){
                  document.getElementById("tampil").innerHTML="<option value='Kelas 7'>Kelas 7</option><option value='Kelas 8'>Kelas 8</option><option value='Kelas 9'>Kelas 9</option>";
                }
                else if (nama_paket=="C"){
                  document.getElementById("tampil").innerHTML="<option value='Kelas 10'>Kelas 10</option><option value='Kelas 11'>Kelas 11</option><option value='Kelas 12'>Kelas 12</option>";
                }
              }
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="col-lg order-lg-first"><div class="container">
<table border='0' width="100%">
  <tr>
    <td valign="top" width="50%">
    <div>
    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pendaftaran Siswa</h4>            
          </div>
          <div class="modal-body">
          <form action="daftar_add.php"  method="POST" id="form1" name="form1" onsubmit="return true" enctype="multipart/form-data" >
          <div class="form-group" >
              <div class="form-group" >
                <label>Paket Kesetaraan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select id="paket" name="paket" onchange="tampilkan()" onclick='validasi("paket","Paket")' required class="form-control">
                        <option value="">Pilih Paket</option>
                        <option value="A">Paket A</option>
                        <option value="B">Paket B</option>
                        <option value="C">Paket C</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Mendaftar Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select id="tampil" name="tampil"  class="form-control">
                    </select>
                  </div>
              </div>
        </div>
      </div>
    </div>  
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Data Pendaftar</h4>            
          </div>
          <div class="modal-body">
            
              <div class="form-group">
                <label>Nama</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama" id="nama" type="text" class="form-control" pattern="^([A-Za-z . '])+$" title="Inputan Harus Huruf" onclick="validasi('nama','Nama')" required minlength="3" title="inputan minimal 3 karakter" />
                  </div>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tempat_lhr" id="tempat_lhr" type="text" class="form-control" pattern="^([A-Za-z . '])+$" title="Inputan Harus Huruf" onclick="validasi('tempat_lhr','Tempat Lahir')" required minlength="3" title="inputan minimal 3 karakter"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tanggal_lhr" id="tanggal_lhr" type="date" class="form-control" onclick="validasi('tanggal_lhr','Tanggal Lahir')" required/>
                  </div>
              </div>
              <div class="form-group">
                <label>Agama</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="agama" id="agama" class="form-control" onclick="validComboboxAgama();">
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
                <label>Jenis Kelamin</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="jenkel" id="jenkel" class="form-control" onclick="validComboboxGender();" >
                      <option selected value="">-Pilih-</option>
                      <option value="Laki-Laki">Laki - Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Alamat Domisili</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <textarea name="alamat" id="alamat" onclick="validasi('alamat','Alamat')" required  class="form-control"></textarea>
                  </div>
              </div>
              <div class="form-group">
                <label>No HP</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_hp" id="telepon"  pattern="^([0-9])+$" title="Inputan Harus Angka" onclick="validasi('telepon','Nomor HP')" required maxlength="12" title="inputan maximal 12 karakter" type="text" class="form-control" onkeypress="return isNumber(event)" />
                  </div>
              </div>
              <div>
              </div>
              </div>
          </div>
        </div>
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Data Sekolah Asal</h4>            
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Asal Sekolah</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="asal_sekolah" id="asal_sekolah" onclick="validasi('asal_sekolah','Asal Sekolah')" required type="text" class="form-control"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Putus Sekolah Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <select name="putus_sekolah_kelas" class="form-control">
                       <?php
                        include "config/connection.php";
                        $query = "SELECT * FROM tb_kelas";
                        $hasil = mysqli_query($connect,$query);
                          while($data=mysqli_fetch_array($hasil)){
                            echo "<option value=$data[kelas_id]>$data[kelas_nama]</option>";
                        }
                      ?>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Putus Sekolah Semester</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <select name="putus_sekolah_semester" class="form-control">
                      <?php
                        include "config/connection.php";
                        $query = "SELECT * FROM tb_semester";
                        $hasil = mysqli_query($connect,$query);
                          while($data=mysqli_fetch_array($hasil)){
                            echo "<option value=$data[semester_id]>$data[semester]</option>";
                        }
                      ?>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Alamat Sekolah</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <textarea name="alamat_sekolah" id="alamat_sekolah" onclick="validasi('alamat_sekolah','Alamat Sekolah')" required class="form-control"></textarea>
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
            <h4 class="modal-title">Data Orang Tua / Wali</h4>            
          </div>
          <div class="modal-body">
          <div class="form-group" >
                <label>Bertempat Tinggal Pada</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select id="tempat_tinggal" name="tempat_tinggal"  class="form-control">
                      <option selected value="">-Pilih-</option>
                      <option value="Ortu">Orang Tua</option>
                      <option value="Wali">Wali</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Nama Ayah / Wali</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama_ayah" id="nama_ayah" type="text" class="form-control" pattern="^([A-Za-z . '])+$" title="Inputan Harus Huruf" onclick="validasi('nama_ayah','Nama Ayah')" required minlength="3" title="inputan minimal 3 karakter"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Pekerjaan Ayah / Wali</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="pekerj_ayah" id="pekerj_ayah" type="text" class="form-control" pattern="^([A-Za-z])+$" title="Inputan Harus Huruf" onclick="validasi('pekerj_ayah','Pekerjaan Ayah')" required minlength="3" title="inputan minimal 3 karakter" />
                  </div>
              </div>
              <div class="form-group">
                <label>Nama Ibu</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama_ibu" id="nama_ibu" type="text" class="form-control" pattern="^([A-Za-z . '])+$" title="Inputan Harus Huruf" onclick="validasi('nama_ibu','Nama Ibu')" required minlength="3" title="inputan minimal 3 karakter"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Pekerjaan Ibu</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="pekerj_ibu" id="pekerj_ibu" type="text" class="form-control" pattern="^([A-Za-z])+$" title="Inputan Harus Huruf" onclick="validasi('pekerj_ibu','Pekerjaan Ibu')" required minlength="3" title="inputan minimal 3 karakter"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Alamat KK</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <textarea name="alamat_ortu" id="alamat_ortu" class="form-control" onclick="validasi('alamat_ortu','Alamat Orangtua')" required></textarea>
                  </div>
              </div>
              <div class="form-group">
                <label>No HP Orangtua / Wali</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_hp_ortuwali" id="telepon_ortu"  pattern="^([0-9])+$" title="Inputan Harus Angka" onclick="validasi('telepon_ortu','Nomor HP Orangtua')" required maxlength="12" title="inputan maximal 12 karakter" type="text" type="text" class="form-control" onkeypress="return isNumber(event)"/>
                  </div>
              </div>
            </div>
          </div>
        </div>
      <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Upload Berkas Persyaratan</h4>            
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label class="col-form-label">Akta Kelahiran</label>
                <div class="input-group" >
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="fileakta" id="upload" type="file" class="form-control" accept=".pdf">
                    <p style="color: red;">*Anda dapat upload file disini dengan ekstensi .pdf*</p>
                  </div>  
                  </div>
              </div>
              <div class="form-group">
                <label>Kartu Keluarga (KK)</label>
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="filekk" id="upload" type="file" class="form-control" accept=".pdf">
                    <p style="color: red;">*Anda dapat upload file disini dengan ekstensi .pdf*</p>
                  </div>  
                  </div>
              </div>
              <div class="form-group">
                <label>Ijazah Terakhir Dan Nilai Raport Terakhir</label>
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="fileijazah" id="upload" type="file" class="form-control" accept=".pdf">
                    <p style="color: red;">*Anda dapat upload file disini dengan ekstensi .pdf*</p>
                  </div>  
                  </div>
              </div>
              <div class="form-group">
                <label>Scan PDF Surat Keterangan Pindah Sekolah</label>
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="file_skpindah" id="upload" type="file" class="form-control" accept=".pdf">
                    <p style="color: red;">*Anda dapat upload file disini dengan ekstensi .pdf*</p>
                  </div>  
                  </div>
              </div>
              <div class="form-group">
                <label>Foto Pendaftar</label>
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="file_foto" id="upload" type="file" class="form-control" accept=".jpg">
                    <p style="color: red;">*Anda dapat upload foto disini dengan ekstensi .jpg*</p>
                  </div>  
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-space btn-primary" name="daftar">Daftar</button>
                <button type="reset" class="btn btn-space btn-danger" name="daftar">Batal</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
    </td>
  </tr>
</table>
<script src="assets/js/vendors/main.js"></script>
<script>
    var form = document.querySelector("#form1");
    function validasi(textbox, text) {
        var input = document.getElementById(textbox);

        var cek = form.checkValidity()
        if (cek == false) {
            input.oninvalid = function(e) {
                if (e.target.validity.valueMissing) {
                    e.target.setCustomValidity(text + " Wajib Diisi");
                    return;
                }
            }
            input.oninput = function(e) {
                e.target.setCustomValidity("")
            }
            form.reportValidity();
            console.log(cek);
        }

    }
  </script>
<script type="text/javascript">
  function validComboboxAgama()
{
 if (document.form1.agama.value == "") 
 {
  alert("Agama belum dipilih");
 }
}
</script>
<script type="text/javascript">
  function validComboboxGender()
{
 if (document.form1.jenkel.value == "") 
 {
  alert("Jenis Kelamin belum dipilih");
 }
}
</script>