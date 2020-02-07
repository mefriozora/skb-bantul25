<?php

    include_once "views/main.php";
?>
<body class="">
    <div class="page">
      <div class="flex-fill">
        <div class="header py-4">
          <div class="container">
            <label class="d-flex">
              <a class="header-brand" href="./index.php">
              <img src="../assets/image/bantul.png" class="header-brand-img" alt="tabler logo">
               <label for="">SKB Bantul</label>

              </a>             
              <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown d-none d-md-flex">
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                  <i class="fe fe-user"></i>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"></span>
                      <strong class="text-muted d-block mt-1"><?php echo $varData_user['pengguna_nama'];?></strong>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="./logout.php">
                      <i class="dropdown-icon fe fe-log-out"></i> Keluar
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
            
        </div>   
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
        <div class="container">
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="./home.php" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a href="jadwal.php" class="nav-link"><i class="fe fe-calendar"></i>Jadwal</a>
                  </li>
                  <li class="nav-item">
                    <a href="nilai.php" class="nav-link"><i class="fe fe-book-open"></i>Nilai</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
<?php
  $query = mysqli_query($connect, "SELECT pengguna_username,nis FROM tb_pengguna JOIN tb_siswa ON tb_siswa.nis=tb_pengguna.pengguna_username WHERE pengguna_username='".$_SESSION['Siswa']."'");
  $Data = mysqli_fetch_array($query);
?>

<div class="my-3 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Jadwal</li>
          </ol>
    <div class="page-header">
      <h4 class="">
        Jadwal 
      </h4>
    </div>
      <div class="">
        <div class="card">
        <div class="card-header">
                    <h3 class="card-title">Jadwal Kelas</h3>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Kelas</th>
                  <th>Paket</th>
                  <th>Tahun Ajaran</th>
                  <th>Nama Pamong Belajar</th>
                  <th class="w-2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
             
              $no=1;
              $sql = mysqli_query($connect, "SELECT g.rombel_id,e.pamong_nama,c.kelas_nama,f.paket_nama,b.ta_nama FROM tb_rombel_siswa g JOIN tb_rombel a ON g.rombel_id=a.rombel_id JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id JOIN tb_siswa h on g.nis=h.nis WHERE g.nis='".$_SESSION['Siswa']."'");
              $cek= mysqli_num_rows($sql);
              if($cek>0){
              while ($data= mysqli_fetch_array($sql)) {                 
              ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $data['kelas_nama'];?></td>
                  <td><?php echo $data['paket_nama'];?></td>
                  <td><?php echo $data['ta_nama'];?></td>
                  <td><?php echo $data['pamong_nama'];?></td>
                  <td class="text-right">
                  <a href="jadwal_permapel.php?id=<?php echo $data['rombel_id'] ?>" class="btn btn-info" role="button">Lihat Jadwal</a>
                  </td>
                </tr>
              <?php $no++; }} ?>
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
