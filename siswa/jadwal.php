<?php include_once "cek_session.php"; include_once "views/main.php";?>
<div class="my-3 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Jadwal Pelajaran</li>
          </ol>
    <?php 
    $no=1;
    $nis_siswa = $_SESSION['username'];
    $get_pengguna = mysqli_query($connect, "SELECT rs.rombel_id FROM tb_siswa s JOIN tb_rombel_siswa rs ON s.nis=rs.nis WHERE s.nis='$nis_siswa'");
    $data_pengguna = mysqli_fetch_array($get_pengguna);
    $sql1=mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f on c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='".$data_pengguna['rombel_id']."'");
    $cek1= mysqli_num_rows($sql1);
    if($cek1>0){
    while ($data1= mysqli_fetch_array($sql1)) {                 
  ?>
   <div class="alert alert-info" role="alert">
    <table>
        <tr>
            <th style="text-align:left;" width="100px">Paket </th>
            <th style="text-align:left;" width="120px">: &nbsp&nbsp<?php echo $data1['paket_nama'] ?></th>
            <th style="text-align:left;" width="120px">Tahun Ajaran</th>
            <th style="text-align:left;" width="120px">: &nbsp&nbsp<?php echo $data1['ta_nama'] ?></th>
        </tr>
        <tr>
            <th style="text-align:left;" width="100px">Kelas </th>
            <th style="text-align:left;" width="200px">: &nbsp&nbsp<?php echo $data1['kelas_nama'] ?></th>
            <th style="text-align:left;" width="150px"> Pamong Belajar </th>
            <th style="text-align:left;" width="300px">: &nbsp&nbsp<?php echo $data1['pamong_nama'] ?></th>
        </tr>
    </table>
    </div>
   <br> 
    <?php }} ?>
    <form method="post">
     <div class="">
        <div class="card">
        <div class="card-header">
                    <h3 class="card-title">Jadwal Pelajaran</h3>
          </div>
          <div class="table-responsive">
            <table border="0px" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable" >
              <thead>
                <tr>
                    <th rowspan="2"><center>No</center></th>
                    <th rowspan="2"><center>Mata Pelajaran</center></th>
                    <th rowspan="2"><center>Hari</center></th>
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
                $sql=mysqli_query($connect, "SELECT a.jadwal_id,b.mapel_nama,a.jadwal_hari,a.jadwal_jammulai,a.jadwal_jamselesai, c.pamong_nama FROM tb_jadwal a JOIN tb_mapel b ON a.mapel_id=b.mapel_id JOIN tb_pamong_belajar c ON a.nik=c.nik WHERE a.rombel_id='".$data_pengguna['rombel_id']."'");
                $cek= mysqli_num_rows($sql);
                    if($cek>0){
                       while ($data= mysqli_fetch_assoc($sql)) {                 
              ?>
                <tr>
                  <td align="center"><span class="text-muted"><?php echo $no;?></span></td>
                  <td align="center"><?php echo $data['jadwal_hari'] ?></td>
                  <td align="center"><?php echo $data['mapel_nama'] ?></td>
                  <td align="center"><?php echo $data['jadwal_jammulai'] ?></td>
                  <td align="center"><?php echo $data['jadwal_jamselesai'] ?></td>
                  <td align="center"><?php echo $data['pamong_nama'] ?></td>
                </tr>
          <?php $no++;}} ?>
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
  </form>
  
  </div>

