<?php include_once "views/main.php";?>
  <form action="daftar_add.php"  method="POST" enctype="multipart/form-data" >
  <div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">
      <h1 class="page-title">
        Upload Berkas Persyaratan
      </h1>
    </div>
      <div class="">
        <div class="card">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Jenis Dokumen</th>
                  <th class="text-center" colspan="2" >Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><span class="text-muted">1</span></td>
                  <td>Scan PDF Akta Kelahiran </td>
                  <td></td>
                  <td class="text-right" style="width:400px">     
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="fileakta" id="upload" type="file" class="form-control" accept=".pdf">
                  </div>               
                  </td>                                  
                </tr>
                <tr>
                  <td><span class="text-muted">2</span></td>
                  <td>Scan PDF Kartu Keluarga (KK)</td>
                  <td></td>
                  <td class="text-right" style="width:400px">     
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="filekk" id="upload" type="file" class="form-control" accept=".pdf">
                  </div>               
                  </td>                                  
                </tr>
                <tr>
                  <td><span class="text-muted">3</span></td>
                  <td>Scan PDF Ijazah Terakhir</td>
                  <td></td>
                  <td class="text-right" style="width:400px">     
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="fileijazah" id="upload" type="file" class="form-control" accept=".pdf">
                  </div>            
                  </td>                                  
                </tr>
                <tr>
                  <td><span class="text-muted">4</span></td>
                  <td>Scan PDF Nilai Raport Terakhir</td>
                  <td></td>
                  <td class="text-right" style="width:400px">     
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="filerapot" id="upload" type="file" class="form-control" accept=".pdf">
                  </div>           
                  </td>                                  
                </tr>
                <tr>
                  <td><span class="text-muted">5</span></td>
                  <td>Scan PDF Surat Keterangan Pindah Sekolah</td>
                  <td></td>
                  <td class="text-right" style="width:400px">     
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="file_skpindah" id="upload" type="file" class="form-control" accept=".pdf">
                  </div>               
                  </td>                                  
                </tr>
                <tr>
                  <td><span class="text-muted">6</span></td>
                  <td>Foto</td>
                  <td></td>
                  <td class="text-right" style="width:400px">     
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    <input name="file_foto" id="upload" type="file" class="form-control" accept=".jpg">
                  </div>               
                  </td>                                  
                </tr>
              </tbody>
            </table>
            <div class="modal-footer">
                <button type="submit" class="btn btn-space btn-primary" name="daftar">Daftar</button>
                <button  class="btn btn-xs btn-light" name="btnBatal"><a href="index.php">Batal</a></button>
            </div>        
            </form>    
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

