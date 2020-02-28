<?php include_once "views/main.php";?>
<?php 
    include "config/connection.php";
?>
<div class="my-3 my-md-1">
  <div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Pengumuman Pendaftaran</li>
    </ol>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <div class="text-wrap p-lg-6">
                    <h2 class="mt-0 mb-4">Pengumuman Pendaftaran</h2>
                    <div class="alert alert-info">
                        <strong>Pengumuman Pendaftaran Sanggar Kegiatan Belajar Bantul</strong>
                    </div>
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
                          <th>Nama</th>
                          <th>Paket Kesetaraan</th>
                          <th>Kelas Kesetaraan</th>
                         
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
                          <td><?php echo $h['nama'];?></td>
                          <td><?php echo $h['paket_kesetaraan'];?></td>
                          <td><?php echo $h['kelas_kesetaraan'];?></td>
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
                </div>
            </div>
        </div>
    </div>
</div>