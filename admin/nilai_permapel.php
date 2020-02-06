<?php include_once "views/main.php"; ?>

<div class="my-3 my-md-1">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Nilai Siswa Warga Belajar</li>
    </ol>
    <?php
    $no = 1;
    $sql1 = mysqli_query($connect, "SELECT (SELECT semester FROM tb_semester where semester_status='Aktif') as semester,a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='" . $_GET['id'] . "'");
    $cek1 = mysqli_num_rows($sql1);
    if ($cek1 > 0) {
      while ($data1 = mysqli_fetch_array($sql1)) {
    ?>
        <div class="alert alert-info" role="alert">
          <table>
            <tr>
              <th style="text-align:left;" width="100px">Paket </th>
              <th style="text-align:left;" width="120px">: &nbsp&nbsp<?php echo $data1['paket_nama'] ?></th>
              <td><b>Tahun Ajaran </b></td>
              <td><b>: &nbsp&nbsp<?php echo $data1['ta_nama'] ?></b></td>
            </tr>
            <tr>
              <th style="text-align:left;" width="100px">Kelas </th>
              <th style="text-align:left;" width="200px">: &nbsp&nbsp<?php echo $data1['kelas_nama'] ?></th>

              <td><b>Semester </b></td>
              <td><b>: &nbsp&nbsp<?php echo $data1['semester'] ?></b></td>
            </tr>

            <tr>
              <td style="text-align:left;" width="150px"><b>Pamong Belajar </b></td>
              <td><b>: &nbsp&nbsp<?php echo $data1['pamong_nama'] ?></b></td>
            </tr>
          </table>
        </div>
    <?php }
    } ?>
    <form method="post">
      <div class="">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Mata Pelajaran</h3>
          </div>
          <div class="table-responsive">
            <table border="0px" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Mata Pelajaran</th>
                  <th>Jumlah Siswa</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                // $sql = mysqli_query($connect, "SELECT a.mapel_id,b.mapel_nama,COUNT(a.nis) AS jumlahsiswa FROM tb_nilai a JOIN tb_mapel b ON a.mapel_id=b.mapel_id WHERE a.rombel_id='" . $_GET['id'] . "' AND a.semester_id=(SELECT semester_id FROM tb_semester WHERE semester_status='Aktif') GROUP BY a.mapel_id");
                $sql = mysqli_query($connect, "SELECT COUNT(a.nis) AS jumlahsiswa, b.mapel_id, b.mapel_nama FROM `tb_rombel_siswa` AS a
                JOIN `tb_rombel` AS c ON c.`rombel_id` = a.`rombel_id` 
                JOIN `tb_kelas` AS d ON d.`kelas_id`=c.`kelas_id`
                JOIN `tb_paket` AS e ON e.`paket_id`=d.`paket_id`
                JOIN `tb_mapel` AS b ON b.`paket_id`=d.`kelas_id`
                JOIN `tb_tahunajaran` AS f ON f.`ta_id`=c.`ta_id`
                 WHERE a.rombel_id='".$_GET['id']."' AND f.semester_id=(SELECT semester_id FROM tb_semester WHERE semester_status='Aktif') GROUP BY b.mapel_id,  b.mapel_nama ");
                $cek = mysqli_num_rows($sql);
                if ($cek > 0) {
                  while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['mapel_nama'] ?></td>
                      <td><?php echo $data['jumlahsiswa'] ?></td>
                      <td>
                        <a href="daftar_nilaisiswa.php?idmapel=<?php echo $data['mapel_id']; ?>&idrombel=<?php echo $_GET['id'] ?>" class="btn btn-xs btn-success"><i class="fa fa-search-plus"></i>Lihat</a>
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
  </form>
</div>