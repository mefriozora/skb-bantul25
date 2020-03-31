<?php include_once "cek_session.php"; include_once "views/main.php";?>
<div class="my-3 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="../admin/jadwal.php">Jadwal</a>
            </li>
            <li class="breadcrumb-item active">Jadwal Per Matapelajaran</li>
          </ol>
    <?php 
    $no=1;
    $sql1=mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='" . $_GET['id'] . "'");
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
       <div class="col-lg-12">
                <form class="card">
                <div class="card-header">
                    <h3 class="card-title">Jadwal Pelajaran</h3>
                  </div>
                  <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Hari</th>
                  <th>Matapelajaran</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                  <th>Pengampu</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql=mysqli_query($connect,"SELECT tb_jadwal.jadwal_id, tb_jadwal.rombel_id, tb_jadwal.jadwal_hari, tb_jadwal.mapel_id, tb_mapel.mapel_nama, tb_jadwal.jadwal_jammulai, tb_jadwal.jadwal_jamselesai, tb_pamong_belajar.pamong_nama FROM tb_jadwal JOIN tb_mapel ON tb_mapel.mapel_id=tb_jadwal.mapel_id JOIN tb_pamong_belajar ON tb_pamong_belajar.nik=tb_jadwal.nik WHERE tb_jadwal.rombel_id='".$_GET['id']."' ");
              $no=1;
              while($result=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $result['jadwal_hari'];?></td>
                  <td><?php echo $result['mapel_nama'];?></td>
                  <td><?php echo $result['jadwal_jammulai'];?></td>
                  <td><?php echo $result['jadwal_jamselesai'];?></td>
                  <td><?php echo $result['pamong_nama'];?></td>
                </tr>
              <?php $no++; } ?>
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