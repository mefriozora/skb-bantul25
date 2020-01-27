<?php include_once "views/main.php";?>
<div class="my-3 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Nilai Siswa Warga Belajar</li>
          </ol>
    <div class="page-header">
      <h4 align="center">
        Daftar Matapelajaran
      </h4>
    </div>
    <?php 
	  $no=1;
	  $sql1=mysqli_query($connect, "SELECT (SELECT semester FROM tb_semester where semester_status='Aktif') as semester,a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='".$_GET['id']."'");
	  $cek1= mysqli_num_rows($sql1);
	  if($cek1>0){
	  while ($data1= mysqli_fetch_array($sql1)) {                 
	?>
    <table>
        <tr>
            <th style="text-align:left;" width="100px">Nama Paket </th>
            <th style="text-align:left;" width="120px">: <?php echo $data1['paket_nama'] ?></th>
            <th style="text-align:left;" width="100px">Nama Kelas </th>
            <th style="text-align:left;" width="200px">: <?php echo $data1['kelas_nama'] ?></th>
        </tr>
        <tr>
          <td><b>Tahun Ajaran </b></td>
          <td><b>: <?php echo $data1['ta_nama'] ?></b></td>
          <td><b>Semester </b></td>
          <td><b>: <?php echo $data1['semester'] ?></b></td>
        </tr>

        <tr>
          <td style="text-align:left;"width="150px"><b>Nama Pamong Belajar </b></td>
          <td><b>: <?php echo $data1['pamong_nama'] ?></b></td>
        </tr>
    </table>
    <?php }} ?>
    <form method="post">
     <div class="">
        <div class="card">
          <div class="table-responsive">
            <table border="0px" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable" >
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
                $no=1;
              $sql=mysqli_query($connect, "SELECT a.mapel_id,b.mapel_nama,COUNT(a.nis) AS jumlahsiswa FROM tb_nilai a JOIN tb_mapel b ON a.mapel_id=b.mapel_id WHERE a.rombel_id='".$_GET['id']."' AND a.semester_id=(SELECT semester_id FROM tb_semester WHERE semester_status='Aktif') GROUP BY a.mapel_id");
              $cek= mysqli_num_rows($sql);
              if($cek>0){
              while ($data= mysqli_fetch_assoc($sql)) {                 
            ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['mapel_nama'] ?></td>
                  <td><?php echo $data['jumlahsiswa'] ?></td>
                  <td>
                    <a href="daftar_nilaisiswa.php?id=<?php echo $data['mapel_id']; ?>?id=<?php echo'".$_GET[id]."' ?>" class="btn btn-xs btn-success"><i class="fa fa-search-plus"></i>&nbsp&nbsp Lihat</a>
                  </td>
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

