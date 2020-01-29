<?php include_once "views/main.php";?>
?>

<div class="my-3 my-md-1">
  <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Data Rombel</li>
          </ol>
          <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Rombel</h3>
                  </div>
                  <div class="card-body">
                  <form action=" " enctype="multipart/form-data" method="post">
                  <div class="form-group">
                <label>Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                     <select name="kelas" class="form-control">
                      <option selected value="">-Pilih Kelas-</option>
                        <?php 
                            $sql1=mysqli_query($connect, "SELECT a.kelas_id,a.kelas_nama,b.paket_nama FROM tb_kelas a JOIN tb_paket b ON a.paket_id=b.paket_id");
                            $cek1= mysqli_num_rows($sql1);
                              if($cek1>0){
                              while ($data1= mysqli_fetch_array($sql1)) {
                        ?>
                        <option value="<?php echo $data1['kelas_id'] ?>">
                          <?php echo $data1['kelas_nama'] ?>&nbsp&nbsp&nbsp&nbsp<?php echo $data1['paket_nama'] ?>
                        </option>
                          <?php }} ?>
                      
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Pamong Belajar</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="pamong" class="form-control">
                      <option selected value="">-Pilih Pamong Belajar-</option>
                        <?php 
                            $sql2=mysqli_query($connect, "SELECT * FROM tb_pamong_belajar");
                            $cek2= mysqli_num_rows($sql2);
                              if($cek2>0){
                                  while ($data2= mysqli_fetch_array($sql2)) {
                        ?>
                          <option value="<?php echo $data2['nik'] ?>">
                            <?php echo $data2['pamong_nama'] ?></option>
                         <?php }} ?>
                      
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit" name="tambah" value="Tambah">
                  Tambah
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='datarombel.php';">
                  Batal
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php
        if(isset($_POST['tambah']))
        {                                  
          
          $kelas = @$_POST['kelas'];
          $pamong = @$_POST['pamong'];
            
          mysqli_query($connect, "INSERT INTO tb_rombel(rombel_id,kelas_id,nik,ta_id) 
          VALUES ('','$kelas','$pamong',(SELECT ta_id from tb_tahunajaran where ta_status='Aktif'))");

            ?><script type="text/javascript">alert("Data Berhasil Tersimpan");</script><?php
        }
    ?>
      <div class="col-lg-8">
                <form class="card">
                <div class="card-header">
                    <h3 class="card-title">Rombel</h3>
                  </div>
                  <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Kelas</th>
                  <th>Paket Kesetaraan</th>
                  <th>Tahun Ajaran</th>
                  <th>Pamong Belajar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
             
              $no=1;
              $sql = mysqli_query($connect, "SELECT  c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif')");
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
                  <td class="text-left">
                    <a href="rombel_data_edit.php?id=<?php echo $h['rombel_id'];?>" class="btn btn-info btn-sm"><i class="fe fe-edit">Ubah</i></a>
                    <a href='rombel_data.php?&act=delete&id=<?php echo $h['rombel_id'];?>' onClick="return confirm('Yakin data akan dihapus ?')"
                    class="btn btn-danger btn-sm"><i class="fe fe-trash">Hapus</i></a>
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