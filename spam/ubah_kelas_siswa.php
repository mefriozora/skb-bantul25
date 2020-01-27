<?php include_once "views/main.php";?>
<?php 
switch ($_GET["act"]){
default:
//INDEX======================================================================================================
?>
    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Kelas Siswa</h4>            
          </div>
          <div class="modal-body">

            <form action="?&act=cari" enctype="multipart/form-data" method="post">     
              <div class="form-group">
                <label>Nomor Pendaftaran</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_pendaftaran" type="text" onkeypress="return isNumber(event)" class="form-control" onkeypress=""/>
                  </div>
              </div>            
              <div class="form-group">
                <label>Nomor Induk</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_induk" type="text" onkeypress="return isNumber(event)" class="form-control" onkeypress=""/>
                  </div>
              </div>

              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Pilih & Lanjutkan
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>  

<?php
break;

case "cari";
$sesi_no_daftar=$_POST['no_pendaftaran'];
$sesi_no_induk=$_POST['no_induk'];

$main_view= "<script>window.location.href='ubah_kelas_siswa_detail.php?&ndf=$sesi_no_daftar&ni=$sesi_no_induk';</script>";
echo $main_view;
break;

}


?>