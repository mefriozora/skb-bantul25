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
            <li class="breadcrumb-item active">Paket Kesetaraan</li>
          </ol>
            <div class="page-header">
              <h4>
                Paket Kesetaraan
              </h4>
            </div>
              <div class="">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Paket Kesetaraan</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                      $sql=mysqli_query($connect,"SELECT * from tb_paket");
                      $no=1;
                      while($h=mysqli_fetch_array($sql)){ ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $h['paket_nama'];?></td>
                        </tr>
                        
                      </tbody>
                      <?php $no++; } ?>
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