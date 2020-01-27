<?php include_once "views/main.php";?>
<?php 
  include '../config/connection.php';
?>
<div class="my-md-1">
          <div class="container">
      <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Siswa Aktif</li>
          </ol>
<div class="">
    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Data Siswa Aktif</h4>            
          </div>
          <div class="modal-body">
            <?php
                include "../config/connection.php";
                $query = mysqli_query($connect,"SELECT tb_siswa.nis, tb_siswa.no_pendaftar, tb_siswa.nama_siswa, tb_siswa.siswa_status FROM tb_siswa LEFT JOIN tb_pendaftar ON tb_siswa.no_pendaftar=tb_pendaftar.no_pendaftar  WHERE tb_siswa.nis='".$_GET['id']."'");
                $Data  = mysqli_fetch_array($query);
            ?>

            <form action="siswa_edit_proses.php?id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>No. Pendaftar</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_pendaftar" readonly type="text" class="form-control" onkeypress="" value="<?php echo $Data['no_pendaftar'] ?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Nama Siswa</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama_siswa" readonly type="text" class="form-control" onkeypress="" value="<?php echo $Data['nama_siswa'] ?> "/>
                  </div>
              </div>
              <div class="form-group">
                <label>No Induk Siswa</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                        <input name="no_induk" readonly type="text" class="form-control" onkeypress="" value="<?php echo $Data['nis'] ?> "/>
                    </div>
              </div>
              <div class="form-group">
                <label>Status Siswa</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="statussiswa" class="form-control">
                      <option selected value="">-Pilih Status-</option>
                      <?php
                      if ($Data['siswa_status'] == "Aktif") echo "<option value='Aktif' selected>Aktif</option>";
                        else echo "<option value='Aktif'>Aktif</option>";
                      if ($Data['siswa_status'] == "Tidak Aktif") echo "<option value='Tidak Aktif' selected>Tidak Aktif</option>";
                        else echo "<option value='Tidak Aktif'>Tidak Aktif</option>";
                      ?>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit" name="btnedit" value="btnedit">
                  Ubah
                </button>
                <button type="reset" class="btn btn-danger">
                  Batal
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>  
    
  </body>
</html>