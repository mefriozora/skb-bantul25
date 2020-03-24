<?php include_once "cek_session.php"; include_once "views/main.php";?>
<?php 

$main_view= "<script>window.location='jadwal_permapel.php?id=".$_GET['id']."';</script>";
switch ($_GET["act"]){
default:
//INDEX======================================================================================================
?>
<div class="my-3 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="../admin/jadwal.php">Jadwal</a>
            </li>
            <li class="breadcrumb-item active">Jadwal Per Matapelajaran</li>
          </ol>
    <?php 
    $no=1;
    $sql1=mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='" . $_GET['id'] . "'");
    $cek1= mysqli_num_rows($sql1);
    if($cek1>0){
    while ($data1= mysqli_fetch_array($sql1)) {                 
  ?>
   <div class="alert alert-info" role="alert">
    <table>
        <tr>
            <th style="text-align:left;" width="100px">Paket </th>
            <th style="text-align:left;" width="120px">: &nbsp&nbsp<?php echo $data1['paket_nama'] ?></th>
            <th style="text-align:left;" width="120px">Tahun Ajaran</th>
            <th style="text-align:left;" width="120px">: &nbsp&nbsp<?php echo $data1['ta_nama'] ?></th>
            
        </tr>

        <tr>
            <th style="text-align:left;" width="100px">Kelas </th>
            <th style="text-align:left;" width="200px">: &nbsp&nbsp<?php echo $data1['kelas_nama'] ?></th>
            <th style="text-align:left;" width="150px"> Pamong Belajar </th>
            <th style="text-align:left;" width="300px">: &nbsp&nbsp<?php echo $data1['pamong_nama'] ?></th>
            
        </tr>
    </table>
    </div>
   <br> 
   <?php }} ?>
             <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Edit Jadwal Pelajaran</h3>
                  </div>
                  <?php

                    $id = $_GET['idjadwal'] ?: '0';
                    $query=mysqli_query($connect,"SELECT * from tb_jadwal where jadwal_id='$id'");
                    $jadwal=mysqli_fetch_array($query);
                ?>
                  <div class="card-body">
                  <form action="?&act=update&id=<?php echo $_GET['id'] ?>" id="formtambahjadwal" enctype="multipart/form-data" method="post">
                 <input type="hidden" name="id" value="<?php echo $_GET['idjadwal'];?>">
                  <div class="form-group">
                <label>Hari</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <select name="hari" class="form-control">
                       <option value="">Pilih Hari</option>
                       <option <?php if ($jadwal['jadwal_hari']=="Senin"){ echo "selected"; } ?> value="Senin">Senin</option>
                       <option <?php if ($jadwal['jadwal_hari']=="Selasa"){ echo "selected"; } ?> value="Selasa">Selasa</option>
                       <option <?php if ($jadwal['jadwal_hari']=="Rabu"){ echo "selected"; } ?> value="Rabu">Rabu</option>
                       <option <?php if ($jadwal['jadwal_hari']=="Kamis"){ echo "selected"; } ?> value="Kamis">Kamis</option>
                       <option <?php if ($jadwal['jadwal_hari']=="Jumat"){ echo "selected"; } ?> value="Jumat">Jumat</option>
                      
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label> Mata Pelajaran</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <select name="mapel" class="form-control">
                      <option value="">Pilih Matapelajaran</option>
                          <?php 
                            $varTampil = mysqli_query($connect, "SELECT m.mapel_nama, m.mapel_id FROM tb_rombel r JOIN tb_kelas k ON r.kelas_id=k.kelas_id JOIN tb_paket p ON k.paket_id=p.paket_id JOIN tb_mapel m ON p.paket_id=m.paket_id WHERE r.rombel_id='".$_GET['id']."'");
                              while ($varDataCat = mysqli_fetch_array($varTampil)) {
                                if ($varDataCat['mapel_id']== $jadwal['mapel_id']) {
                                  echo "<option selected value=$varDataCat[mapel_id]>$varDataCat[mapel_nama]</option>";
                                } else {
                                  echo "<option value=$varDataCat[mapel_id]>$varDataCat[mapel_nama]</option>";
                                }
                    
                              }
                          ?>  
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Jam Mulai</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="jamm" class="form-control">
                            <option value="">Pilih Jam Mulai</option>
                            <option value="07.00" <?php if($h['jadwal_jammulai']=="07.00") echo selected;?>>07.00</option>
                            <option value="08.00" <?php if($h['jadwal_jammulai']=="08.00") echo selected;?>>08.00</option>
                            <option value="09.00" <?php if($h['jadwal_jammulai']=="09.00") echo selected;?>>09.00</option>
                            <option value="09.30" <?php if($h['jadwal_jammulai']=="09.30") echo selected;?>>09.30</option>
                            <option value="10.30" <?php if($h['jadwal_jammulai']=="10.30") echo selected;?>>10.30</option>
                            <option value="11.30" <?php if($h['jadwal_jammulai']=="11.30") echo selected;?>>11.30</option>
                            <option value="12.00" <?php if($h['jadwal_jammulai']=="12.00") echo selected;?>>12.00</option>
                            <option value="13.00" <?php if($h['jadwal_jammulai']=="13.00") echo selected;?>>13.00</option>
                            <option value="13.30" <?php if($h['jadwal_jammulai']=="13.30") echo selected;?>>13.30</option>
                       </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Jam Selesai</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="jams" class="form-control">
                            <option value="">Pilih Jam Selesai</option>
                            <option value="07.00" <?php if($h['jadwal_jamselesai']=="07.00") echo selected;?>>07.00</option>
                            <option value="08.00" <?php if($h['jadwal_jamselesai']=="08.00") echo selected;?>>08.00</option>
                            <option value="09.00" <?php if($h['jadwal_jamselesai']=="09.00") echo selected;?>>09.00</option>
                            <option value="09.30" <?php if($h['jadwal_jamselesai']=="09.30") echo selected;?>>09.30</option>
                            <option value="10.30" <?php if($h['jadwal_jamselesai']=="10.30") echo selected;?>>10.30</option>
                            <option value="11.30" <?php if($h['jadwal_jamselesai']=="11.30") echo selected;?>>11.30</option>
                            <option value="12.00" <?php if($h['jadwal_jamselesai']=="12.00") echo selected;?>>12.00</option>
                            <option value="13.00" <?php if($h['jadwal_jamselesai']=="13.00") echo selected;?>>13.00</option>
                            <option value="13.30" <?php if($h['jadwal_jamselesai']=="13.30") echo selected;?>>13.30</option>
                            <option value="14.30" <?php if($h['jadwal_jamselesai']=="14.30") echo selected;?>>14.30</option>
                            <option value="15.00" <?php if($h['jadwal_jamselesai']=="15.00") echo selected;?>>15.00</option>
                       </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Pengampu</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="pengampu" class="form-control">
                            <option value="">Pilih Pengampu</option>
                            <?php 
                            $varpengampu = mysqli_query($connect, "SELECT * FROM tb_pamong_belajar ORDER BY nik");
                              while ($varDatapengampu = mysqli_fetch_array($varpengampu)) {
                                if ($varDatapengampu['nik']== $jadwal['nik']) {
                                  echo "<option selected value=$varDatapengampu[nik]>$varDatapengampu[pamong_nama]</option>";
                                } else {
                                  echo "<option value=$varDatapengampu[nik]>$varDatapengampu[pamong_nama]</option>";
                                }
                    
                              }
                          ?>  
                       </select>
                  </div>
              </div>
              <div class="form-group">
                      <label></label>
                      <?php
                        $sql=mysqli_query($connect,"SELECT a.rombel_id, b.ta_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id  WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='" . $_GET['id'] . "'");
                        $h=mysqli_fetch_array($sql);
          
                      ?>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="rombel" id="rombel" type="hidden" class="form-control" value="<?php echo $h['rombel_id'] ?>" />
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Update
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='jadwal_permapel.php?id='".$_GET[id]."'">
                  Batal
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
           <div class="col-lg-9">
                <form class="card">
                <div class="card-header">
                    <h3 class="card-title">Jadwal Pelajaran</h3>
                  </div>
                  <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Hari</th>
                  <th>Matapelajaran</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                  <th>Pengampu</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql=mysqli_query($connect,"SELECT tb_jadwal.jadwal_id, tb_jadwal.rombel_id, tb_jadwal.jadwal_hari, tb_jadwal.mapel_id, tb_mapel.mapel_nama, tb_jadwal.jadwal_jammulai, tb_jadwal.jadwal_jamselesai, tb_pamong_belajar.pamong_nama FROM tb_jadwal JOIN tb_mapel ON tb_mapel.mapel_id=tb_jadwal.mapel_id JOIN tb_pamong_belajar ON tb_pamong_belajar.nik=tb_jadwal.nik WHERE tb_jadwal.rombel_id='".$_GET['id']."' ");
              $no=1;
              while($result=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $result['jadwal_hari'];?></td>
                  <td><?php echo $result['mapel_nama'];?></td>
                  <td><?php echo $result['jadwal_jammulai'];?></td>
                  <td><?php echo $result['jadwal_jamselesai'];?></td>
                  <td><?php echo $result['pamong_nama'];?></td>
                  <td class="text-left">
                    <a href="jadwal_permapel_edit.php?idjawal=<?php echo $result['jadwal_id']; ?>&id=<?php echo $_GET['id'] ?>" class="btn btn-info btn-sm"><i class="fe fe-edit"></i>Edit</a>
                    <a href='?&act=delete&idjadwal=<?php echo $result['jadwal_id']; ?>&id=<?php echo $_GET['id'] ?>'  onClick="return confirm('Yakin data akan dihapus ?')"
                    class="btn btn-danger btn-sm"><i class="fe fe-trash"></i>Hapus</a>
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
  <?php
break;

case "update";
$mapel=$_POST['mapel'];
$hari = $_POST['hari'];
$jamm = $_POST['jamm'];
$jams = $_POST['jams'];
$pengampu = $_POST['pengampu'];
$rombel = $_POST['rombel'];
$id = $_POST['id'];

$update = mysqli_query($connect,"UPDATE `tb_jadwal` SET `jadwal_hari`='$hari',`jadwal_jammulai`='$jamm',`jadwal_jamselesai`='$jams',`nik`='$pengampu' WHERE jadwal_id='$id'");
//var_dump($input); exit();
      if ($update){
       // echo "update";
      echo $main_view;
      }
      else {
        //echo "gagal";
      echo"<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
  //}
//}
break;
}
?>