<?php include_once "views/main.php"; ?>
<?php
$idrombelee = $_SESSION['idrombel'];

?>
<div class="my-3 my-md-1">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Pembagian Rombel</li>
    </ol>
    <div class="my-3 my-md-5">
      <div class="container">
      <?php include('rombel.php') ?>
        <div class="container text-center">
          <h5 class="h4 mb-3">
            Daftar Siswa Kelas
          </h5>
        </div>
        <div class="">
          <div class="card body">
            <div class="table-responsive">
              <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                  <tr>
                    <th class="w-2">No.</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Paket</th>
                    <th>Tahun Ajaran</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //$nis=$_POST['nis'];
                  $no = 1;
                  $sql = mysqli_query($connect, "SELECT a.nama_siswa, b.kelas_nama ,d.paket_nama, e.ta_nama FROM tb_rombel_siswa AS f JOIN tb_siswa AS a ON a.`nis` = f.`nis` JOIN `tb_rombel` AS g ON g.`rombel_id` = f.`rombel_id` JOIN `tb_kelas` AS b ON b.`kelas_id`=g.`kelas_id` JOIN `tb_paket` AS d ON d.`paket_id`=b.`paket_id` JOIN `tb_tahunajaran`AS e ON e.`ta_id`= g.`ta_id` WHERE e.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif')");
                  $cek = mysqli_num_rows($sql);
                  if ($cek > 0) {
                    while ($data = mysqli_fetch_array($sql)) {
                  ?>
                      <tr>
                        <td><span class="text-muted"></span><?php echo $no; ?></td>
                        <td><?php echo $data['nama_siswa'] ?></td>
                        <td><?php echo $data['kelas_nama'] ?></td>
                        <td><?php echo $data['paket_nama'] ?></td>
                        <td><?php echo $data['ta_nama'] ?></td>
                        <td align="center">
                          <a onclick=" return confirm('Anda Yakin Ingin Menghapus??')" href="pembagianrombel.php?id=<?php echo $data['nama_siswa']; ?>"><i></i> Hapus</a>
                        </td>
                      </tr>
                  <?php $no++;
                    }
                  } ?>
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
    </div>