<?php include "../config/connection.php"; ?>
<div class="card">
        <div class="card-header">
          <h2 align="center">
            SANGGAR KEGIATAN BELAJAR (SKB) BANTUL
          <br>
          <small>Jl. Imogiri Barat KM 7, Semail,Bangunharjo,Kec.Sewon,Bantul,Yogyakarta</small>
          <br>
          <small>Kode Pos : 55188, Telepon : (0274) 4396012</small>
          </h2>
          <hr style="color: #000;">
          <br>
            <h3 class="card-title"><center>Laporan Pendaftaran</center></h3>
        </div>
        <div class="table-responsive">
          <table border="1px" width="100%" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable" >
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
                    <th>Putus Sekolah Kelas</th>
                    <th>Putus Sekolah Semester</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Pekerjaan Ayah</th>
                    <th>Pekerjaan Ibu</th>
                    <th>Alamat Ortu</th>
                    <th>No. HP Ortu/Wali</th>
                </tr>
              </thead>
               <tbody>
                <?php 
                $no=1;
                $kelas = @$_GET['kelas'];
                $ta = @$_GET['ta'];
                $paket = @$_GET['paket'];
                $pendaftar = mysqli_query($connect, "SELECT * FROM tb_pendaftar WHERE status_pendaftar='Diterima'");
                  while($data_pendaftar = mysqli_fetch_array($pendaftar)){
                    ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $data_pendaftar['status_pendaftar'] ?></td>
                  <td><?php echo $data_pendaftar['no_pendaftar'] ?></td>
                  <td><?php echo date("d F Y", strtotime($data_pendaftar['tgl_pendaftaran'])); ?></td>
                  <td><?php echo $data_pendaftar['nama'] ?></td>
                  <td><?php echo $data_pendaftar['tempat_lhr']?> ,<?php echo date("d F Y", strtotime($data_pendaftar['tanggal_lhr'])); ?></td>
                  <td><?php echo $data_pendaftar['agama'] ?></td>
                  <td><?php echo $data_pendaftar['jenkel'] ?></td>
                  <td><?php echo $data_pendaftar['alamat_domisili'] ?></td>
                  <td><?php echo $data_pendaftar['no_hp'] ?></td>
                  <td><?php echo $data_pendaftar['asal_sekolah'] ?></td>
                  <td><?php echo $data_pendaftar['paket_kesetaraan'] ?></td>
                  <td><?php echo $data_pendaftar['kelas_kesetaraan'] ?></td>
                  <td><?php echo $data_pendaftar['putus_sekolah_kelas'] ?></td>
                  <td><?php echo $data_pendaftar['putus_sekolah_semester'] ?></td>
                  <td><?php echo $data_pendaftar['nama_ayah'] ?></td>
                  <td><?php echo $data_pendaftar['nama_ibu'] ?></td>
                  <td><?php echo $data_pendaftar['pekerjaan_ayah'] ?></td>
                  <td><?php echo $data_pendaftar['pekerjaan_ibu'] ?></td>
                  <td><?php echo $data_pendaftar['alamat_ortu'] ?></td>
                  <td><?php echo $data_pendaftar['no_hp_ortuwali'] ?></td>
                  
                  
                </tr>
          <?php $no++;} ?>
              </tbody>
            </table>
          </div>
        </div>
      <script>
  window.print();
</script>
