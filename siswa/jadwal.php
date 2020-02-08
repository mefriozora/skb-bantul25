<?php

    include_once "views/main.php";
?>
<?php
  $query = mysqli_query($connect, "SELECT pengguna_username,nis FROM tb_pengguna JOIN tb_siswa ON tb_siswa.nis=tb_pengguna.pengguna_username WHERE pengguna_username='".$_SESSION['Siswa']."'");
  $Data = mysqli_fetch_array($query);
?>

<div class="my-3 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Jadwal</li>
          </ol>
    <div class="page-header">
      <h4 class="">
        Jadwal 
      </h4>
    </div>
      <div class="">
        <div class="card">
        <div class="card-header">
                    <h3 class="card-title">Jadwal Kelas</h3>
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
                  <th class="w-2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
             
              $no=1;
              $sql = mysqli_query($connect, "SELECT g.rombel_id,e.pamong_nama,c.kelas_nama,f.paket_nama,b.ta_nama FROM tb_rombel_siswa g JOIN tb_rombel a ON g.rombel_id=a.rombel_id JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id JOIN tb_siswa h on g.nis=h.nis WHERE g.nis='".$_SESSION['Siswa']."'");
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
                  <td class="text-right">
                  <a href="jadwal_permapel.php?id=<?php echo $data['rombel_id'] ?>" class="btn btn-info" role="button">Lihat Jadwal</a>
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
