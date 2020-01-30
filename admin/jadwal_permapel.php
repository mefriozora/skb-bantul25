<?php include_once "views/main.php";?>
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
	  $sql1=mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f on c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='".$_GET['id']."'");
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
    <form method="post">
     <div class="">
        <div class="card">
        <div class="card-header">
                    <h3 class="card-title">Jadwal Per Mata Pelajaran</h3>
          </div>
          <div class="table-responsive">
            <table border="0px" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable" >
              <thead>
                <tr>
                    <th rowspan="2"><center>No</center></th>
                    <th rowspan="2"><center>Mata Pelajaran</center></th>
                    <th rowspan="2"><center>Hari</center></th>
                    <th colspan="2"><center>Jam Belajar</center></th>
                 </tr>
                 <tr>
                    <th><center>Mulai</center></th>
                    <th><center>Selesai</center></th>
                  </tr>

              </thead>
              <tbody>
             <?php 
                $no=1;
                $sql=mysqli_query($connect, "SELECT a.jadwal_id,b.mapel_nama,a.jadwal_hari,a.jadwal_jammulai,a.jadwal_jamselesai FROM tb_jadwal a JOIN tb_mapel b ON a.mapel_id=b.mapel_id WHERE a.rombel_id='".$_GET['id']."'");
                $cek= mysqli_num_rows($sql);
                    if($cek>0){
                       while ($data= mysqli_fetch_assoc($sql)) {                 
              ?>
                <tr>
                  <td align="center"><span class="text-muted"><?php echo $no;?></span></td>
                  <td align="center"><?php echo $data['mapel_nama'] ?><input type="hidden" name="idjadwal[]" value="<?php echo $data['jadwal_id'] ?>"></td>
                  <td align="center">
                  	<select name="hari[]">
                            <option value="<?php echo $data['jadwal_hari'] ?>"><?php echo $data['jadwal_hari'] ?></option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                          </select>
                  </td>
                  <td align="center">
                    <select name="jamm[]">
                            <option value="<?php echo $data['jadwal_jammulai'] ?>"><?php echo $data['jadwal_jammulai'] ?></option>
                            <option value="07.00">07.00</option>
                            <option value="08.00">08.00</option>
                            <option value="09.00">09.00</option>
                            <option value="09.30">09.30</option>
                            <option value="10.30">10.30</option>
                            <option value="11.30">11.30</option>
                            <option value="12.00">12.00</option>
                            <option value="13.00">13.00</option>
                            <option value="13.30">13.30</option>
                          </select>
                  </td>
                  <td align="center">
                  	<select name="jams[]">
                            <option value="<?php echo $data['jadwal_jamselesai'] ?>"><?php echo $data['jadwal_jamselesai'] ?></option>
                            <option value="07.00">07.00</option>
                            <option value="08.00">08.00</option>
                            <option value="09.00">09.00</option>
                            <option value="09.30">09.30</option>
                            <option value="10.30">10.30</option>
                            <option value="11.30">11.30</option>
                            <option value="12.00">12.00</option>
                            <option value="13.00">13.00</option>
                            <option value="13.30">13.30</option>
                            <option value="14.30">14.00</option>
                            <option value="15.00">15.00</option>
                          </select>
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
      <button type="submit" name="tambah" class="btn btn-primary" role="button">Simpan</button>
    </div>
  </form>
  <?php
	    if(isset($_REQUEST['tambah'])){                                  
	      
	      $idjadwal=@$_POST['idjadwal'];
	      $hari=@$_POST['hari'];
	      $jamm=@$_POST['jamm'];
	      $jams=@$_POST['jams'];
	      

	      $jml=count($idjadwal);
	        for ($i=0; $i<$jml; $i++) {
	            mysqli_query($connect,"UPDATE tb_jadwal SET jadwal_hari='$hari[$i]',jadwal_jammulai='$jamm[$i]',jadwal_jamselesai='$jams[$i]' WHERE jadwal_id='$idjadwal[$i]'");
	        }

	        echo "<script>alert('Data Berhasil Tersimpan')</script>";
	        echo "<script>window.location='jadwal_permapel.php?id=".$_GET['id']."';</script>";
	     
	    }
	?>
  </div>

