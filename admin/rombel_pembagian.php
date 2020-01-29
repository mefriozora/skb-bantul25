<?php include_once "views/main.php";?>
<?php 
  $idrombelee = $_SESSION['idrombel'];

?>
<div class="my-3 my-md-1">
  <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Pembagian Rombel</li>
          </ol>
          <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Pilih Kelas Rombel</h3>
                  </div>
                  <div class="card-body">
                  <form action="" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                <label>Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="kelas" id="nomer" class="form-control">
                      <option selected value="">-Pilih Kelas-</option>
                      <?php 
                      if($idrombelee=='0'){
                        $sql1=mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif')");
                      }else{
                        $sql1=mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='$idrombelee'");
                      }
                        $cek1= mysqli_num_rows($sql1);
                      if($cek1>0){
                          while ($data1= mysqli_fetch_array($sql1)) 
                      {
                      ?>
                      <option value="<?php echo $data1['rombel_id'] ?>">
                        <?php echo $data1['kelas_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['paket_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['ta_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['pamong_nama'] ?></option>
                      <?php }} ?>
                      
                    </select>
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
                <button class="btn btn-success" type="submit" name="tambah" value="Tambah">
                  Simpan
                </button>
                <button class="btn btn-danger"  name="reset" value="Refres" onClick="window.location.href='rombel_pembagian.php';">
                  Batal
                </button>
              </div>
      </div>
      <div class="col-lg-8">
                <form class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Siswa</h3>
                  </div>
                  <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Aksi</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                  $no=1;
                  $sql=mysqli_query($connect, "SELECT nis,nama_siswa FROM tb_siswa p WHERE NOT EXISTS 
                    (SELECT * FROM (SELECT h.nis AS niss,h.nama_siswa AS nma FROM tb_rombel_siswa g JOIN tb_rombel a ON g.rombel_id=a.rombel_id 
                    JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id 
                    JOIN tb_pamong_belajar e ON a.nik=e.nik
                    JOIN tb_paket f ON c.paket_id=f.paket_id JOIN tb_siswa h ON g.nis=h.nis 
                    WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif')) AS newp WHERE p.nis=newp.niss)");
                $cek= mysqli_num_rows($sql);
                if($cek>0){
                while ($data= mysqli_fetch_assoc($sql)) {
              ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td align="center">
                     <input type="checkbox" name="nis[]" value="<?php echo $data['nis'];?>" style="width:25px;height:25px;">
                  </td>
                  <td><?php echo $data['nis'] ?></td>
                  <td><?php echo $data['nama_siswa'] ?></td>
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
  </form>
    <?php
    if(isset($_POST['tambah']))
    {                                  
      
      $kelas = $_POST['kelas'];
      //var_dump($kelas);
      $nis  = $_POST['nis'];
      //var_dump($nis);
      $_SESSION['idrombel'] = $kelas;
      //var_dump($kelas);
      $jml = count($nis);
      //var_dump($jml);
      for ($i=0; $i<$jml; $i++) 
    {
      mysqli_query($connect, "INSERT INTO tb_rombel_siswa(rombel_id,nis) VALUES ('$kelas','{$nis[$i]}')");
    }
        //echo "masuk";
        echo "<script>alert('Data Berhasil Tersimpan')</script>";
        echo "<script>window.location='rombel_pembagian.php';</script>";
    }
    if(isset($_POST['reset']))
    {                                  
      $_SESSION['idrombel']='0';
      echo "<script>window.location='rombel_pembagian.php';</script>";
    }
?>
      <div class="">
        <div class="card body">
        <div class="card-header">
                    <h3 class="card-title">Daftar Rombel</h3>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Kelas</th>
                  <th>Paket</th>
                  <th>Tahun Ajaran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                //$nis=$_POST['nis'];
                    $no=1;
                    $sql=mysqli_query($connect, "SELECT h.nama_siswa,c.kelas_nama,f.paket_nama,b.ta_nama FROM tb_rombel_siswa g JOIN tb_rombel a ON g.rombel_id=a.rombel_id JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id JOIN tb_siswa h ON g.nis=h.nis WHERE a.rombel_id='$idrombelee'");
                    $cek= mysqli_num_rows($sql);
                  if($cek>0){
                    while ($data= mysqli_fetch_array($sql)) {                 
                ?>
                <tr>
                  <td><span class="text-muted"></span><?php echo $no; ?></td>
                  <td><?php echo $data['nama_siswa'] ?></td>
                  <td><?php echo $data['kelas_nama'] ?></td>
                  <td><?php echo $data['paket_nama'] ?></td>
                  <td><?php echo $data['ta_nama'] ?></td>
                  <td align="center">
                    <a onclick=" return confirm('Anda Yakin Ingin Menghapus??')" href="pembagianrombel.php?id=<?php echo $data['nama_siswa'];?>" ><i></i> Hapus</a>
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
  </div>
