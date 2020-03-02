<?php include_once "cek_session.php"; include_once "views/main.php";?>
<div class="my-3 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.php">Dashboard</a>
      </li>
        <li class="breadcrumb-item active">Nilai Siswa Warga Belajar</li>
  </ol>
  <?php 
      $no=1;
      $sql1=mysqli_query($connect, "SELECT (SELECT semester FROM tb_semester WHERE semester_status='Aktif') as semester,(SELECT mapel_nama FROM tb_mapel WHERE mapel_id='".$_GET['idmapel']."') AS mapel_nama,a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='".$_GET['idrombel']."'");
      $cek1= mysqli_num_rows($sql1);
      if($cek1>0){
      while ($data1= mysqli_fetch_array($sql1)) {                 
  ?>
  <div class="alert alert-info" role="alert">
    <table>
        <tr>
            <th style="text-align:left;" width="100px">Paket </th>
            <th style="text-align:left;" width="120px">: &nbsp&nbsp<?php echo $data1['paket_nama'] ?></th>
            <th style="text-align:left;" width="100px">Kelas </th>
        	<th style="text-align:left;" width="200px">: &nbsp&nbsp<?php echo $data1['kelas_nama'] ?></th>
            
        </tr>
        <tr>
        	<td><b>Tahun Ajaran </b></td>
          	<td><b>: &nbsp&nbsp<?php echo $data1['ta_nama'] ?></b></td>
        	<td><b>Semester </b></td>
          	<td><b>: &nbsp&nbsp<?php echo $data1['semester'] ?></b></td>
        </tr>

        <tr>
          <td style="text-align:left;"width="150px"><b>Pamong Belajar </b></td>
          <td><b>: &nbsp&nbsp<?php echo $data1['pamong_nama'] ?></b></td>
          <td><b>Mata Pelajaran </b></td>
          <td><b>:  &nbsp&nbsp<?php echo $data1['mapel_nama'] ?></b></td>
        </tr>
    </table>
    </div>
    <?php }} ?>
    <form method="post">
      <?php  
       $sql1=mysqli_query($connect, "SELECT (SELECT semester FROM tb_semester WHERE semester_status='Aktif') as semester,(SELECT mapel_nama FROM tb_mapel WHERE mapel_id='".$_GET['idmapel']."') AS mapel_nama,a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='".$_GET['idrombel']."'"); 
       $semester = mysqli_fetch_array($sql1);
      ?>
     <div class="">
        <div class="card">
          <div class="table-responsive">
            <table border="0px" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable" >
              <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>KKM</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai PTS</th>
                    <?php if ($semester['semester']=="Ganjil") {?>
                    <th>Nilai PAS</th>
                    <?php } else {?>
                      <th>Nilai PAT</th>
                    <?php }?>
                    <th>Nilai Akhir</th>
                 </tr>
              </thead>
              <tbody>
              	<?php 
		      $no=1;
		      // $sql=mysqli_query($connect, "SELECT a.nilai_id,(SELECT mapel_kkm FROM tb_mapel WHERE mapel_id='".$_GET['idmapel']."') AS kkm,a.nis,b.nama_siswa,nilai_tugas,nilai_pts,nilai_pas,nilai_pat,round((nilai_tugas+nilai_pts+nilai_pas+nilai_pat)/4,0) AS nilaiak FROM tb_nilai a JOIN tb_siswa b ON a.nis=b.nis WHERE a.rombel_id='".$_GET['idrombel']."' AND a.semester_id=(SELECT semester_id FROM tb_semester WHERE semester_status='Aktif') AND mapel_id='".$_GET['idmapel']."'");
          $sql = mysqli_query($connect, "SELECT g.nama_siswa, a.nis, b.mapel_id, b.mapel_nama, b.mapel_kkm, f.ta_id, f.semester_id, c.rombel_id, d.kelas_id FROM `tb_rombel_siswa` AS a
          JOIN `tb_rombel` AS c ON c.`rombel_id` = a.`rombel_id` 
          JOIN `tb_kelas` AS d ON d.`kelas_id`=c.`kelas_id`
          JOIN `tb_paket` AS e ON e.`paket_id`=d.`paket_id`
          JOIN `tb_mapel` AS b ON b.`paket_id`=d.`paket_id`
          JOIN `tb_tahunajaran` AS f ON f.`ta_id`=c.`ta_id`
          JOIN `tb_siswa` as g on g.`nis` = a.`nis`
           WHERE a.rombel_id='".$_GET['idrombel']."' AND f.semester_id=(SELECT semester_id FROM tb_semester WHERE semester_status='Aktif') and b.mapel_id = '".$_GET['idmapel']."'");
          $cek= mysqli_num_rows($sql);
		      if($cek>0){
		      while ($data= mysqli_fetch_assoc($sql)) {
						$nilai = mysqli_query($connect, "SELECT nilai_id, nilai_tugas, nilai_pts, nilai_pas_pat FROM tb_nilai WHERE nis='".$data['nis']."' AND rombel_id='".$_GET['idrombel']."' AND mapel_id='".$_GET['idmapel']."'");
					  $data_nilai = mysqli_fetch_array($nilai);              
		  ?>
		   
		  <tr>
		    <td><?php echo $no; ?></td>
		    <td><?php echo $data['nis']; ?><input type="text" name="nis[]" style="width: 50px;" hidden value="<?= $data['nis']?>" onkeyPress=""></td>
		    <td><?php echo $data['nama_siswa']; ?></td>
		    <td><?php echo $data['mapel_kkm']; ?></td>
		    <td><?php echo $data_nilai['nilai_tugas']?></td>
		    <td><?php echo $data_nilai['nilai_pts']?></td>
		    <td><?php echo $data_nilai['nilai_pas_pat']?></td>
			<td><?php echo number_format(($data_nilai['nilai_tugas'] + $data_nilai['nilai_pts'] + $data_nilai['nilai_pas_pat'] )/3, 2); ?></td>
		   
        <td><?php echo $data['nilaiak'] ?></td>
        <input type="text" name="nilai_id[]" style="width: 50px;" hidden value="<?= $data_nilai['nilai_id']?>" onkeyPress="">
        <input type="text" name="ta_id" style="width: 50px;" hidden value="<?= $data['ta_id']?>" onkeyPress="">
        <input type="text" name="semester_id" style="width: 50px;" hidden value="<?= $data['semester_id']?>" onkeyPress="">
        <input type="text" name="rombel_id" style="width: 50px;" hidden value="<?= $data['rombel_id']?>" onkeyPress="">
        <input type="text" name="kelas_id" style="width: 50px;" hidden value="<?= $data['kelas_id']?>" onkeyPress="">
        <input type="text" name="mapel_id" style="width: 50px;" hidden value="<?= $data['mapel_id']?>" onkeyPress="">
		    
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
</form>
	<?php
        if(isset($_REQUEST['tambah']))
        {                                  
          
          $nis = @$_POST['nis'];
          $nilaitugas = @$_POST['tugas'];
          $nilaipts = @$_POST['pts'];
          $nilaipas = @$_POST['pas'];
          $ta_id = @$_POST['ta_id'];
          $kelas_id = @$_POST['kelas_id'];
          $mapel_id = @$_POST['mapel_id'];
          $rombel_id = @$_POST['rombel_id'];
          $semester_id = @$_POST['semester_id'];
          

          $jml=count($nis);
            for ($i=0; $i<$jml; $i++) {
                mysqli_query($connect,"INSERT into tb_nilai(nis,rombel_id,kelas_id,ta_id,semester_id,mapel_id,nilai_tugas,nilai_pts,nilai_pas_pat) 
                values ('".$nis[$i]."','".$rombel_id."','".$kelas_id."','".$ta_id."','".$semester_id."','".$mapel_id."','".$nilaitugas[$i]."','".$nilaipts[$i]."','".$nilaipas[$i]."')");
            }

            echo "<script>alert('Data Berhasil Tersimpan')</script>";
			echo "<script>window.location='daftar_nilaisiswa.php?idmapel=".$_GET['idmapel']."&idrombel=".$_GET['idrombel']."';</script>";
         
        }
		if(isset($_REQUEST['ubah']))
        {                                  
          $nilai_id = @$_POST['nilai_id'];
          $nis = @$_POST['nis'];
          $nilaitugas = @$_POST['tugas'];
          $nilaipts = @$_POST['pts'];
          $nilaipas = @$_POST['pas'];
          $ta_id = @$_POST['ta_id'];
          $kelas_id = @$_POST['kelas_id'];
          $mapel_id = @$_POST['mapel_id'];
          $rombel_id = @$_POST['rombel_id'];
          

          $jml=count($nis);
            for ($i=0; $i<$jml; $i++) {
                mysqli_query($connect,"UPDATE tb_nilai SET nilai_tugas = '$nilaitugas[$i]' ,nilai_pts = '$nilaipts[$i]', nilai_pas_pat = '$nilaipas[$i]' WHERE nilai_id='$nilai_id[$i]'");
            }

            echo "<script>alert('Data Berhasil Diubah')</script><script>window.location='daftar_nilaisiswa.php?idmapel=".$_GET['idmapel']."&idrombel=".$_GET['idrombel']."';</script>";
         
        }
  	?>
</div>
