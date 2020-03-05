<?php include_once "cek_session.php"; include_once "views/main.php";?>

<div class="my-3 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Nilai</li>
          </ol>
    <div class="page-header">
      <h4 class="">
        Nilai Siswa Warga Belajar
      </h4>
    </div>
      <div class="">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Kelas</th>
                  <th>Paket</th>
                  <th>Tahun Ajaran</th>
                  <th>Nama Pamong Belajar</th>
                  <th colspan="2"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                <?php
             
              $no=1;
              $nik_pamong = $_SESSION['username'];
              $get_pengguna = mysqli_query($connect, "SELECT r.rombel_id FROM tb_pamong_belajar p JOIN tb_rombel r ON p.nik=r.nik WHERE p.nik='$nik_pamong'");
              $data_pengguna = mysqli_fetch_array($get_pengguna);
              // $sql = mysqli_query($connect, "SELECT a.rombel_id, c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif')");
              $sql = mysqli_query($connect, "SELECT a.rombel_id, c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a 
              JOIN tb_tahunajaran b ON b.ta_id=a.ta_id 
              JOIN tb_kelas c ON c.kelas_id=a.kelas_id 
              JOIN tb_pamong_belajar e ON e.nik=a.nik 
              JOIN tb_paket f ON f.paket_id=c.paket_id 
              WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif')AND a.rombel_id='".$data_pengguna['rombel_id']."'");
              $cek= mysqli_num_rows($sql);
              if($cek>0){
              while ($data= mysqli_fetch_array($sql)) {                 
              ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $data['kelas_nama'];?></td>
                  <td><?php echo $data['paket_nama'];?></td>
                  <td><?php echo $data['ta_nama'];?></td>
                  <td><?php echo $data['pamong_nama'];?></td>
                  <td align="center">
                  <a href="nilai_permapel.php?id=<?php echo $data['rombel_id'] ?>" class="btn btn-success" role="button"><i class="fe fe-edit-2"></i>&nbspMasukkan Nilai</a>
                  <a href="nilai_rekap.php?id=<?php echo $data['rombel_id'] ?>" class="btn btn-info" role="button"><i class="fe fe-eye"></i>&nbspNilai Rekap</a>
                  </td>
                </tr>
              <?php $no++; }} ?>
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
