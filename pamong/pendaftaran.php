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
            <li class="breadcrumb-item active">Data Pendaftar</li>
          </ol>
            <div class="page-header">
              <h4>
                Data Pendaftaran
              </h4>
            </div>
              <div class="">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                        <tr>
						  <th class="w-1">No.</th>
						  <th>Aksi</th>
						  <th>Status Pendaftar</th>
						  <th>No. Pendaftaran</th>
						  <th>Tanggal Pendaftaran</th>
                          <th>Nama</th>
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>Agama</th>
                          <th>Jenis Kelamin</th>
                          <th>Alamat Pendaftar</th>
                          <th>Nomor HP</th>
						  <th>Asal Sekolah</th>
						  <th>Paket Kesetaraan</th>
						  <th>Kelas Kesetaraan</th>
						  <th>Putus Sekolah Kelas</th>
						  <th>Putus Sekolah Semester</th>
						  <th>Alamat Sekolah</th>
						  <th>Bertempat Tinggal</th>
						  <th>Nama Ayah</th>
						  <th>Nama Ibu</th>
						  <th>Pekerjaan Ayah</th>
						  <th>Pekerjaan Ibu</th>
						  <th>Alamat Ortu</th>
						  <th>No. HP Ortu/Wali</th>
						  <th>Foto</th>
						  <th>Akte</th>
						  <th>KK</th>
						  <th>Ijazah / Raport </th>
						  <th>Sk Pindah</th>
						  <th></th>
                        </tr>
                      </th>
                      <tbody>
                      	<?php
              				$sql=mysqli_query($connect,"SELECT * FROM tb_pendaftar WHERE status_pendaftar='Belum Diterima'");
              				$no=1;
              				while($h=mysqli_fetch_array($sql)){ ?>
                        <tr>
						  <td><?php echo $no;?></td>
						  <td class="text-center">
                            <a href="verifikasi_pendaftar.php?id=<?php echo $h['no_pendaftar'] ?>"  onclick="return confirm('Yakin Merubah Status Verifikasi Data ?')" class="btn btn-success btn-sm"><i class="fe fe-check-circle">Ubah Status</i></a>
                          </td>
                          <td><?php echo $h['status_pendaftar'];?></td>
						  <td><?php echo $h['no_pendaftar'];?></td>
						  <td><?php echo $h['tgl_pendaftaran'];?></td>
						  <td><?php echo $h['nama'];?></td>
						  <td><?php echo $h['tempat_lhr'];?></td>
						  <td><?php echo $h['tanggal_lhr'];?></td>
						  <td><?php echo $h['agama'];?></td>
						  <td><?php echo $h['jenkel'];?></td>
						  <td><?php echo $h['alamat_domisili'];?></td>
						  <td><?php echo $h['no_hp'];?></td>
						  <td><?php echo $h['asal_sekolah'];?></td>
						  <td><?php echo $h['paket_kesetaraan'];?></td>
						  <td><?php echo $h['kelas_kesetaraan'];?></td>
						  <td><?php echo $h['putus_sekolah_kelas'];?></td>
						  <td><?php echo $h['putus_sekolah_semester'];?></td>
						  <td><?php echo $h['alamat_sekolah'];?></td>
						  <td><?php echo $h['bertempat_tinggal'];?></td>
						  <td><?php echo $h['nama_ayah'];?></td>
						  <td><?php echo $h['nama_ibu'];?></td>
						  <td><?php echo $h['pekerjaan_ayah'];?></td>
						  <td><?php echo $h['pekerjaan_ibu'];?></td>
						  <td><?php echo $h['alamat_ortu'];?></td>
						  <td><?php echo $h['no_hp_ortuwali'];?></td>
						  <td><a href="../pendaftaran/file_pendaftar/<?php echo $h['foto'];?>" target="_blank"><?php echo $h['foto'];?></a></td>
						  <td><a href="../pendaftaran/file_pendaftar/<?php echo $h['akte'];?>" target="_blank"><?php echo $h['akte'];?></a></td>
						  <td><a href="../pendaftaran/file_pendaftar/<?php echo $h['kk'];?>" target="_blank"><?php echo $h['kk'];?></a></td>
						  <td><a href="../pendaftaran/file_pendaftar/<?php echo $h['ijazah_raport'];?>" target="_blank"><?php echo $h['ijazah_raport'];?></a></td>
						  <td><a href="../pendaftaran/file_pendaftar/<?php echo $h['sk_pindah_sekolah'];?>" target="_blank"><?php echo $h['sk_pindah_sekolah'];?></a></td>
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
  </body>
</html>