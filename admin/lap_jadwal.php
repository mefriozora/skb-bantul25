<?php include_once "cek_session.php"; include_once "views/main.php";?>

<div class="my-4 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"> Laporan Jadwal</li>
          </ol>
      <div class="">
        <div class="card">
        <div class="card-header">
      <h3 class="card-title">Filter Laporan Jadwal</h3>
    </div>
    <div class="card-body">
      <form method="GET">
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group" >
            <label>Pilih Tahun Ajaran</label>
              <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user-o"></i>
              </div>
              <select class="form-control" name="ta" id="filter">
                <option value="">-Pilih Tahun Ajaran-</option>
               <?php
                            include '../config/connection.php';
                            $varsqlta = mysqli_query($connect,"SELECT DISTINCT ta_nama FROM tb_tahunajaran");
                            while ($resultta= mysqli_fetch_array($varsqlta)){
                           ?>
                          <?php if (empty($_GET['ta'])) {
                          ?>
                          <option value="<?php echo $resultta['ta_nama']?>"><?php echo $resultta['ta_nama']?>
                          <?php
                          } else { 
                            $thn = $_GET['ta_nama'];
                            if ($thn == $resultta['ta_nama']) {
                              $selected = 'selected';
                            } else {
                              $selected = '';
                            }
                          ?>
                          <option value="<?php echo $resultta['ta_nama']?>" <?php echo $selected?>><?php echo $resultta['ta_nama']?>
                          <?php }?>
                        <?php } ?>
              </select>
              </div>
            </div>
           </div>

           <div class="col-lg-6 ">
            <div class="form-group" >
              <label>Pilih Kelas</label>
                <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user-o"></i>
                </div>
                <select class="form-control" name="kelas" id="filter">
                  <option value="">-Pilih Kelas-</option>
                 <?php
                            include '../config/connection.php';
                            $varsqlkelas = mysqli_query($connect,"SELECT * FROM tb_kelas");
                            while ($resultkelas= mysqli_fetch_array($varsqlkelas)){
                           ?>
                          <?php if (empty($_GET['kelas'])) {
                          ?>
                          <option value="<?php echo $resultkelas['kelas_nama']?>"><?php echo $resultkelas['kelas_nama']?>
                          <?php
                          } else { 
                            $kelascbb = $_GET['kelas_nama'];
                            if ($kelascbb == $resultkelas['kelas_nama']) {
                              $selected = 'selected';
                            } else {
                              $selected = '';
                            }
                          ?>
                          <option value="<?php echo $resultkelas['kelas_nama']?>" <?php echo $selected?>><?php echo $resultkelas['kelas_nama']?>
                          <?php }?>
                        <?php } ?>
                </select>
                </div>
              </div>
             </div>
            </div>
           </div>
            <div class="form-group row text-left">
                  <div class="col-lg-12">
                     <button class="btn btn-xs btn-primary" name="cari"/><i class="fa fa-search"></i> Tampilkan </button>
                     <button class="btn btn-xs btn-light" name="reset"/><a href="lap_jadwal.php"><i class="fa fa-delete"></i> Reset Filter </a></button>
                    
                  </div>
            </div>
      </form>
    </div>
  </div>
  
    <div class="card">
        <div class="card-header">
                    <h3 class="card-title">Jadwal Pelajaran</h3>
          </div>
          <div class="table-responsive">
      
            <table border="0px" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable" >
              <thead>
                <tr>
                    <th rowspan="2"><center>No</center></th>
                    <th rowspan="2"><center>Hari</center></th>
                    <th rowspan="2"><center>Mata Pelajaran</center></th>
                    <th colspan="2"><center>Jam Belajar</center></th>
                    <th colspan="2"><center>Pengampu</center></th>
                 </tr>
                 <tr>
                    <th><center>Mulai</center></th>
                    <th><center>Selesai</center></th>
                  </tr>

              </thead>
              <tbody>
             <?php 
                $no=1;
                if (isset($_GET['cari'])) {
                $kelas        = $_GET['kelas'];
                $tahun        = $_GET['ta'];
                 echo '<h4 style="text-align:center;">Laporan Jadwal Pelajaran <br> ' .$_GET['kelas'].' Tahun '.$_GET['ta'].'</h4><hr>';       
      
                 echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<left><a class="btn btn-primary" target="_blank" href="cetak_lap_jadwal.php?cari=&ta='.$_GET[ta].'&kelas='.$_GET[kelas].'">Cetak</a><left>';

               $jadwal = mysqli_query($connect, "SELECT tb_jadwal.jadwal_id, tb_jadwal.jadwal_id, tb_jadwal.jadwal_jammulai, tb_jadwal.jadwal_jamselesai, tb_mapel.mapel_nama, tb_pamong_belajar.pamong_nama, tb_rombel.kelas_id, tb_kelas.kelas_nama, tb_rombel.ta_id, tb_tahunajaran.ta_nama FROM tb_jadwal JOIN tb_mapel ON tb_mapel.mapel_id=tb_jadwal.mapel_id JOIN tb_pamong_belajar ON tb_pamong_belajar.nik=tb_jadwal.nik JOIN tb_rombel ON tb_rombel.rombel_id=tb_jadwal.rombel_id JOIN tb_kelas ON tb_kelas.kelas_id=tb_rombel.kelas_id  JOIN tb_tahunajaran ON tb_tahunajaran.ta_id=tb_rombel.ta_id WHERE tb_kelas.kelas_nama='$kelas' AND tb_tahunajaran.ta_nama='$tahun' ");
             }else{

               $jadwal = mysqli_query($connect, "SELECT tb_jadwal.jadwal_id, tb_jadwal.jadwal_jammulai, tb_jadwal.jadwal_jamselesai, tb_mapel.mapel_nama, tb_pamong_belajar.pamong_nama, tb_rombel.kelas_id, tb_kelas.kelas_nama, tb_rombel.ta_id, tb_tahunajaran.ta_nama FROM tb_jadwal JOIN tb_mapel ON tb_mapel.mapel_id=tb_jadwal.mapel_id JOIN tb_pamong_belajar ON tb_pamong_belajar.nik=tb_jadwal.nik JOIN tb_rombel ON tb_rombel.rombel_id=tb_jadwal.rombel_id JOIN tb_kelas ON tb_kelas.kelas_id=tb_rombel.kelas_id  JOIN tb_tahunajaran ON tb_tahunajaran.ta_id=tb_rombel.ta_id");
 
           }
            $varTotal = mysqli_num_rows($jadwal);
                  // jika data kurang dari 1
                if ($varTotal>0) { 
                while($data_jadwal = mysqli_fetch_array($jadwal)){

              ?>
                <tr>
                  <td align="center"><span class="text-muted"><?php echo $no;?></span></td>
                  <td align="center"><?php echo $data_jadwal['jadwal_hari'] ?></td>
                  <td align="center"><?php echo $data_jadwal['mapel_nama'] ?></td>
                  <td align="center"><?php echo $data_jadwal['jadwal_jammulai'] ?></td>
                  <td align="center"><?php echo $data_jadwal['jadwal_jamselesai'] ?></td>
                  <td align="center"><?php echo $data_jadwal['pamong_nama'] ?></td>
               </tr>
           <?php
                      $no++;}
                    }else{
                     ?> 
                     <tr> <!--muncul peringatan bahwa data tidak di temukan-->
                            <td colspan="6" align="center" style="padding:10px;"> Laporan Jadwal Tidak Ditemukan</td>
                      </tr>
                      <?php
                     }
                      ?>
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