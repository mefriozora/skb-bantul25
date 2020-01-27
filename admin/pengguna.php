<?php include_once "views/main.php";?>

<div class="my-3 my-md-1">
  <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Pengguna</li>
          </ol>
    <div class="page-header">
      <h4 class="">
        Pengguna
      </h4>
    </div>
      <div class="">
        <div class="card">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Pengguna</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Level</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $no=1;
                $query=mysqli_query($connect, "SELECT * FROM `tb_pengguna` ORDER BY `pengguna_id`  DESC");
                $cek= mysqli_num_rows($query);
                if($cek>0){
                  while ($data= mysqli_fetch_array($query)) {                 
              ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $data['pengguna_nama'];?></td>
                  <td><?php echo $data['pengguna_username'];?></td>
                  <td><?php echo $data['pengguna_password'];?></td>
                  <td><?php echo $data['pengguna_level'];?></td>
                  
                </tr>
          <?php $no++;} } ?>
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


