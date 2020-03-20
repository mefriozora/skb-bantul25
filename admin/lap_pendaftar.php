<?php include_once "cek_session.php"; include_once "views/main.php";?>
<?php 
  include '../config/connection.php';
?>
<div class="my-md-1">
          <div class="container">
      <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Laporan Pendaftaran</li>
          </ol>
          <div class="">
        <div class="card">
        <div class="card-header">
      <h3 class="card-title">Filter Laporan Pendaftaran</h3>
    </div>
    <div class="card-body">
      <form method="GET">
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group" >
              <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user-o"></i>
              </div>
              <select class="form-control" name="tahun" id="form-tahun">
                <option>Pilih Tahun</option>
                       <?php
                          $now=date('Y');
                            for ($a=$now;$a>=2016;$a--) { 
                        ?>
                        <?php if (empty($_GET['ta'])) {
                        ?>
                        <option value="<?php echo $a?>"><?php echo $a?> 
                        <?php
                          } else {
                          $thn = $_GET['ta'];
                            if ($thn == $a) {
                              $selected = 'selected';
                            } else {
                              $selected = '';
                            }
                          ?>          
                          <option value="<?php echo $a?>"<?php echo $selected?>><?php echo $a?>
                          <?php }?>
                        <?php }  ?>
              </select>
              </div>
            </div>
           </div>

          <div class="col-lg-4">
          <div class="form-group" >
              <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user-o"></i>
              </div>
              <select class="form-control" name="paket" id="form-paket">
                <option value="">Pilih Paket</option>
                <option value="A">Paket A</option>
                <option value="B">Paket B</option>
                <option value="C">Paket C</option>
              </select>
              </div>
            </div>
           </div>

           <div class="col-lg-4">
            <div class="form-group" >
                <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user-o"></i>
                </div>
                <select class="form-control" name="kelas" id="form-kelas">
                  <option value="">Pilih Kelas</option>
                  <option value="Kelas 4">Kelas 4</option>
                  <option value="Kelas 5">Kelas 5</option>
                  <option value="Kelas 6">Kelas 6</option>
                  <option value="Kelas 7">Kelas 7</option>
                  <option value="Kelas 8">Kelas 8</option>
                  <option value="Kelas 9">Kelas 9</option>
                  <option value="Kelas 10">Kelas 10</option>
                  <option value="Kelas 11">Kelas 11</option>
                  <option value="Kelas 12">Kelas 12</option>
                </select>
                </div>
              </div>
             </div>
            </div>
          </div>
            <div class="form-group row">
                  <div class="col-lg-12">
                     <button class="btn btn-xs btn-primary" name="cari"/><i class="fa fa-search"></i> Tampilkan </button>
                     <button class="btn btn-xs btn-light" name="reset"/><a href="lap_pendaftar.php"><i class="fa fa-delete"></i> Reset Filter </a></button>
                    
                  </div>
            </div>
      </form>
    </div>
  </div>
  <div class="card">
      <div class="table-responsive">
            <table border="0px" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable" >
              <thead>
                <tr>
                  <th class="w-1">No.</th>
                  <th>Status Pendaftar</th>
                  <th>No. Pendaftaran</th>
                  <th>Tanggal Pendaftaran</th>
                  <th>Nama</th>
                  <th>Tempat, Tanggal Lahir</th>
                  <th>Agama</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat Pendaftar</th>
                  <th>Nomor HP</th>
                  <th>Asal Sekolah</th>
                  <th>Paket Kesetaraan</th>
                  <th>Kelas Kesetaraan</th>
                  <th>Nama Ortu</th>
                  <th>Pekerjaan Ortu</th>
                  <th>Alamat Ortu</th>
                  <th>No. HP Ortu/Wali</th>
                </tr>
              </thead>
               <tbody>
             <?php 
                $no=1;
                if (isset($_GET['cari'])) {
                $kelas        = $_GET['kelas'];
                $paket        = $_GET['paket'];
                $tahun        = $_GET['tahun'];
   
              echo '<h4 style="text-align:center;">Laporan Pendaftaran Diterima <br> ' .$_GET['kelas'].' Paket '.$_GET['paket'].' Tahun '.$_GET['tahun'].'</h4><hr>';       
      
             echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<left><a class="btn btn-primary" target="_blank" href="cetak_lap_pendaftaran.php?cari=&tahun='.$_GET[tahun].'&paket='.$_GET[paket].'&kelas='.$_GET[kelas].'">Cetak</a><left>';
             $pendaftaran = mysqli_query($connect, "SELECT * FROM tb_pendaftar WHERE YEAR(tgl_pendaftaran)='$tahun'AND paket_kesetaraan='$paket' AND kelas_kesetaraan='$kelas' AND status_pendaftar='Diterima'");
           }else{
              echo '<h4 style="text-align:center;"><br> Semua Laporan Pendaftaran Diterima </h4><hr>'; 

              $pendaftaran = mysqli_query($connect, "SELECT * FROM tb_pendaftar WHERE status_pendaftar='Diterima'");

           }
            $varTotal = mysqli_num_rows($pendaftaran);
                  // jika data kurang dari 1
                if ($varTotal>0) { 
                while($data_pendaftar = mysqli_fetch_array($pendaftaran)){

              ?>
                <tr>
                  <td align="center"><span class="text-muted"><?php echo $no;?></span></td>
                  <td align="center"><?php echo $data_pendaftar['status_pendaftar'] ?></td>
                  <td align="center"><?php echo $data_pendaftar['no_pendaftar'] ?></td>
                  <td align="center"><?php echo date("d F Y", strtotime($data_pendaftar['tgl_pendaftaran'])); ?></td>
                  <td align="justify"><?php echo $data_pendaftar['nama'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['tempat_lhr']?> , <?php echo date("d F Y", strtotime($data_pendaftar['tanggal_lhr'])); ?></td>
                  <td align="justify"><?php echo $data_pendaftar['agama'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['jenkel'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['alamat_domisili'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['no_hp'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['asal_sekolah'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['paket_kesetaraan'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['kelas_kesetaraan'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['nama_ayah'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['pekerjaan_ayah'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['alamat_ortu'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['no_hp_ortuwali'] ?></td>
                  
                  
                </tr>
                  <?php
                      $no++;}
                    }else{
                     ?> 
                     <tr> <!--muncul peringatan bahwa data tidak di temukan-->
                            <td colspan="17" align="center"> Laporan Pendaftaran Diterima Tidak Ditemukan</td>
                      </tr>
                      <?php
                     }
                      ?>
              </tbody>
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
  </body>
</html>