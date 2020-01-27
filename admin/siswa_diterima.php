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
            <li class="breadcrumb-item active">Siswa Diterima</li>
          </ol>
            <div class="page-header">
              <h4>
                Siswa Diterima
              </h4>
            </div>
              <div class="">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                        <tr>
                          <th class="w-1">No.</th>
                          <th>Status Pendaftar</th>
                          <th>No. Pendaftaran</th>
                          <th>NISN</th>
                          <th>Nama</th>
                          <th>Paket Kesetaraan</th>
                          <th>Kelas Kesetaraan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                      $sql=mysqli_query($connect,"SELECT * FROM tb_pendaftar  WHERE status_pendaftar='Diterima'");
                      $no=1;
                      while($h=mysqli_fetch_array($sql)){ ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $h['status_pendaftar'];?></td>
                          <td><?php echo $h['no_pendaftar'];?></td>
                          <td><?php echo $h['nisn'];?></td> 
                          <td><?php echo $h['nama'];?></td>
                          <td><?php echo $h['paket_kesetaraan'];?></td>
                          <td><?php echo $h['kelas_kesetaraan'];?></td>
                          <td>
                          <a href="siswa.php?id=<?php echo $h['no_pendaftar']?>" class="btn btn-success">Tambah ke Siswa</a>
                          </td>
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