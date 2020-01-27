<?php include_once "views/main.php";?>
<?php 
  include '../config/connection.php';
?>
<div class="my-md-1">
          <div class="container">
      <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Siswa Aktif</li>
          </ol>
            <div class="page-header">
              <h4>
                Siswa Aktif
              </h4>
            </div>
              <div class="">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                        <tr>
                          <th class="w-1">No.</th>
                          <th>No. Pendaftaran</th>
                          <th>Nama</th>
                          <th>Diterima Kelas</th>
                          <th>Kelas Sekarang</th>
                          <th>Tahun Ajaran</th>
                          <th>Status Siswa</th>
                                      
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                      $sql=mysqli_query($connect,"SELECT siswa.id_siswa,siswa.no_pendaftar, siswa.nama, siswa.kelas_diterima, kelas.kelas, tahun_ajaran.ta, siswa.status_siswa FROM siswa LEFT JOIN kelas ON kelas.kode_kelas=siswa.kode_kelas LEFT JOIN tahun_ajaran ON tahun_ajaran.kode_ta=siswa.kode_ta");
                      $no=1;
                      while($h=mysqli_fetch_array($sql)){ ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $h['no_pendaftar'];?></td>
                          <td><?php echo $h['nama'];?></td>
                          <td><?php echo $h['kelas_diterima'];?></td>
                          <td><?php echo $h['kelas'];?></td>
                          <td><?php echo $h['ta'];?></td>
                          <td><?php echo $h['status_siswa'];?></td>
                          
                          
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
          <!-- Modal Popup Dosen -->
    
  </body>
</html>