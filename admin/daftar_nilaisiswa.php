<?php include_once "views/main.php";?>
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
          <td><b>: <?php echo $data1['mapel_nama'] ?></b></td>
        </tr>
    </table>
    </div>
    <?php }} ?>
    <form method="post">
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
                    <th>Nilai PAS</th>
                    <th>Nilai PAT</th>
                    <th>Nilai Akhir</th>
                 </tr>
              </thead>
              <tbody>
              	<?php 
		      $no=1;
		      $sql=mysqli_query($connect, "SELECT a.nilai_id,(SELECT mapel_kkm FROM tb_mapel WHERE mapel_id='".$_GET['idmapel']."') AS kkm,a.nis,b.nama_siswa,nilai_tugas,nilai_pts,nilai_pas,nilai_pat,round((nilai_tugas+nilai_pts+nilai_pas+nilai_pat)/4,0) AS nilaiak FROM tb_nilai a JOIN tb_siswa b ON a.nis=b.nis WHERE a.rombel_id='".$_GET['idrombel']."' AND a.semester_id=(SELECT semester_id FROM tb_semester WHERE semester_status='Aktif') AND mapel_id='".$_GET['idmapel']."'");
		      $cek= mysqli_num_rows($sql);
		      if($cek>0){
		      while ($data= mysqli_fetch_assoc($sql)) {                 
		  ?>
		   
		  <tr>
		    <td><?php echo $no; ?><input type="hidden" name="idnilai[]" value="<?php echo $data['nilai_id'] ?>"></td>
		    <td><?php echo $data['nis'] ?></td>
		    <td><?php echo $data['nama_siswa'] ?></td>
		    <td><?php echo $data['kkm'] ?></td>
		    <td><input type="text" name="tugas[]" value="<?php echo $data['nilai_tugas'] ?>" style="width: 50px;" onkeyPress=""></td>
		    <td><input type="text" name="pts[]" value="<?php echo $data['nilai_pts'] ?>" style="width: 50px;" onKeyPress=""></td>
		    <td><input type="text" name="pas[]" value="<?php echo $data['nilai_pas'] ?>" style="width: 50px;" onKeyPress=""></td>
		    <td><input type="text" name="pat[]" value="<?php echo $data['nilai_pat'] ?>" style="width: 50px;" onKeyPress=""></td>
		   </td>
		    <td><?php echo $data['nilaiak'] ?></td>
		    
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
        if(isset($_REQUEST['tambah']))
        {                                  
          
          $idnilai = @$_POST['idnilai'];
          $nilaitugas = @$_POST['tugas'];
          $nilaipts = @$_POST['pts'];
          $nilaipas = @$_POST['pas'];
          $nilaipat = @$_POST['pat'];
          

          $jml=count($idnilai);
            for ($i=0; $i<$jml; $i++) {
                mysqli_query($connect,"UPDATE tb_nilai SET nilai_tugas='$nilaitugas[$i]',nilai_pts='$nilaipts[$i]',nilai_pas='$nilaipas[$i]',nilai_pat='$nilaipat[$i]' WHERE nilai_id='$idnilai[$i]'");
            }

            echo "<script>alert('Data Berhasil Tersimpan')</script>";
            echo "<script>window.location='daftar_nilaisiswa.php?idmapel=".$_GET['idmapel']."&idrombel=".$_GET['idrombel']."';</script>";
         
        }
  	?>
</div>
