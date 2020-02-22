<?php include_once "views/main.php";?>
<?php
  include "config/connection.php";
?>
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
            
            <script>
              require(['datatables', 'jquery'], function(datatable, $) {
                    $('.datatable').DataTable();
                  });
            </script>
             <script type="text/javascript">
              function tampilkan(){
              var nama_paket=document.getElementById("form1").kesetaraan.value;
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
          <form action="daftar_add.php"  method="POST" id="form1"  name="form1" onsubmit="return true" enctype="multipart/form-data" >
          <div class="form-group" >
                <label>Pendaftaran Siswa</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select required id="kesetaraan" name="kesetaraan"  class="form-control">
                      <option selected value="">-Pilih-</option>
                      <option value="A">Reguler</option>
                      <option value="B">Putus Sekolah</option>
                    </select>
                  </div>
              </div>
              <div class="form-group" >
                <label>Paket Kesetaraan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select required id="kesetaraan" name="kesetaraan" onchange="tampilkan()" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <option value="A">PAKET A</option>
                      <option value="B">PAKET B</option>
                      <option value="C">PAKET C</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Mendaftar Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select required name="kelas_setara" id="tampil" class="form-control">
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
            <form id="formdaftar">
              <div class="form-group">
                <label>Nama</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama" id="nama" type="text" class="form-control" onclick="validasi('nama','NAMA')" required/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tempat_lhr" type="text" class="form-control" onkeypress="" />
                  </div>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="tanggal_lhr" type="date" class="form-control" onkeypress=""/>
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
                <label>Jenis Kelamin</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="jenkel" class="form-control">
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
                    <input name="asal_sekolah" type="text" class="form-control" onkeypress="" placeholder="Asal Sekolah"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Putus Sekolah Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="p_sekolah" type="text" class="form-control" onkeypress="" placeholder="Asal Sekolah"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Putus Sekolah Semester</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="p_sekolah" type="text" class="form-control" onkeypress="" placeholder="Asal Sekolah"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Alamat Sekolah</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <textarea name="alamat_sekolah" class="form-control"></textarea>
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
                    <select required id="kesetaraan" name="kesetaraan"  class="form-control">
                      <option selected value="">-Pilih-</option>
                      <option value="A">Orang Tua</option>
                      <option value="B">Wali</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Nama Ayah / Wali</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama_ayah" type="text" class="form-control" onkeypress="" placeholder="Nama Ayah"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Pekerjaan Ayah / Wali</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="pekerj_ayah" type="text" class="form-control" onkeypress="" placeholder="Pekerjaan Ayah"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Nama Ibu</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama_ibu" type="text" class="form-control" onkeypress="" placeholder="Nama Ibu"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Pekerjaan Ibu</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="pekerj_ibu" type="text" class="form-control" onkeypress="" placeholder="Pekerjaan Ibu"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Alamat KK</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <textarea name="alamat_ortu" class="form-control"></textarea>
                  </div>
              </div>
              <div class="form-group">
                <label>No HP Orangtua / Wali</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_hp_ortuwali" type="text" class="form-control" onkeypress="return isNumber(event)"/>
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
                  </div>  
                  </div>
              </div>
              <div class="form-group">
                <label>Kartu Keluarga (KK)</label>
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="filekk" id="upload" type="file" class="form-control" accept=".pdf">
                  </div>  
                  </div>
              </div>
              <div class="form-group">
                <label>Ijazah Terakhir Dan Nilai Raport Terakhir</label>
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="fileijazah" id="upload" type="file" class="form-control" accept=".pdf">
                  </div>  
                  </div>
              </div>
              <div class="form-group">
                <label>Scan PDF Surat Keterangan Pindah Sekolah</label>
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="file_skpindah" id="upload" type="file" class="form-control" accept=".pdf">
                  </div>  
                  </div>
              </div>
              <div class="form-group">
                <label>Foto Pendaftar</label>
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="file_foto" id="upload" type="file" class="form-control" accept=".jpg">
                    
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
      </form>
    </div>
    </td>
  </tr>
</table>
<script type="text/javascript">
  var input = document.getElementById('nama');
  input.oninvalid = function(event){
    event.target.setCustomValidity('Nama tidak boleh Kosong');
  }
  var input = document.getElementById('sandi');
  input.oninvalid = function(event){
    event.target.setCustomValidity('Password tidak boleh Kosong');
  }
</script>
<script src="assets/js/vendors/main.js"></script>
<script>

              var form = document.querySelector("#formdaftar");

              function validasi(textbox, text) {
              var input = document.getElementById(textbox);

              var cek = form.checkValidity()
                if (cek == false) {
                  input.oninvalid = function(e) {
                if (e.target.validity.valueMissing) {
                    e.target.setCustomValidity(text + " WAJIB DIISI");
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