<?php include_once "views/main.php";?>

    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pembagian Kelas</h4>            
          </div>
          <div class="modal-body">

            <form action="pem_kelas_view.php" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Pilih Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <select name="kelas" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <?php 
                      $sql=mysql_query("select * from kelas order by kelas");
                      while ($k=mysql_fetch_array($sql)){
                      ?>
                      <option value="<?php echo $k['id_kelas'];?>"><?php echo $k['kelas'];?></option>
                      <?php } ?>

                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Jumlah siswa Yang ditampilkan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="jmlsiswa" type="text" onkeypress="return isNumber(event)" class="form-control" onkeypress="" placeholder="Jml data siswa Contoh : 50"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Urutkan Berdasarkan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <select name="urut" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <option value="no_pendaftar">NO PENDAFTARAN</option>
                     
                      <option value="nama">NAMA</option>
                    
                    </select>
                  </div>
              </div>
              <!--<div class="form-group">
                <label>Tampilkan</label>  
                  <div class="form-check">
                  <input class="form-check-input" type="radio" name="view" id="exampleRadios1" value="0" checked>
                  <label class="form-check-label" for="exampleRadios1">
                  Siswa belum memiliki Kelas
                  </label>
                  </div>  
              </div>-->

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
