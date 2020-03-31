<?php include_once "cek_session.php"; include_once "views/main.php";?>

<div class="my-3 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"> Laporan Nilai</li>
          </ol>
      <div class="">
        <div class="card">
        <div class="card-header">
			<h3 class="card-title">Filter Laporan Nilai</h3>
		</div>
		<div class="card-body">
			<form method="GET">
			<div class="row">
				<div class="col-lg-3">
					<div class="form-group" >
						<label>Pilih Tahun Ajaran</label>
						  <div class="input-group">
							<div class="input-group-addon">
							  <i class="fa fa-user-o"></i>
							</div>
							<select class="form-control" name="ta" id="filter">
								<option value="">-Pilih Tahun Ajaran-</option>
							 <?php
                        		include '../config/connection.php';
                        		$varsqlta = mysqli_query($connect,"SELECT DISTINCT ta_nama FROM tb_tahunajaran");
                         		while ($resultta= mysqli_fetch_array($varsqlta)){
                      		 ?>
                          <?php if (empty($_GET['ta'])) {
                          ?>
                          <option value="<?php echo $resultta['ta_nama']?>"><?php echo $resultta['ta_nama']?>
                          <?php
                          } else { 
                            $thn = $_GET['ta_nama'];
                            if ($thn == $resultta['ta_nama']) {
                              $selected = 'selected';
                            } else {
                              $selected = '';
                            }
                          ?>
                          <option value="<?php echo $resultta['ta_nama']?>" <?php echo $selected?>><?php echo $resultta['ta_nama']?>
                          <?php }?>
                        <?php } ?>
							</select>
						  </div>
					  </div>
					 </div>
				<div class="col-lg-3">
					<div class="form-group" >
						<label>Pilih Semester</label>
						  <div class="input-group">
							<div class="input-group-addon">
							  <i class="fa fa-user-o"></i>
							</div>
							<select class="form-control" name="semester" id="filter">
								<option value="">-Pilih Semester-</option>
							 <?php
                        		include '../config/connection.php';
                        		$varsqlsemester = mysqli_query($connect,"SELECT * FROM tb_semester");
                         		while ($resultsemester= mysqli_fetch_array($varsqlsemester)){
                      		 ?>
                          <?php if (empty($_GET['semester'])) {
                          ?>
                          <option value="<?php echo $resultsemester['semester']?>"><?php echo $resultsemester['semester']?>
                          <?php
                          } else { 
                            $semestercbb = $_GET['semester'];
                            if ($semestercbb == $resultsemester['semester']) {
                              $selected = 'selected';
                            } else {
                              $selected = '';
                            }
                          ?>
                          <option value="<?php echo $resultsemester['semester']?>" <?php echo $selected?>><?php echo $resultsemester['semester']?>
                          <?php }?>
                        <?php } ?>
							</select>
						  </div>
					  </div>
					 </div>
					 <div class="col-lg-3">
						<div class="form-group" >
							<label>Pilih Kelas</label>
							  <div class="input-group">
								<div class="input-group-addon">
								  <i class="fa fa-user-o"></i>
								</div>
								<select class="form-control" name="kelas" id="filter">
									<option value="">-Pilih Kelas-</option>
								 <?php
                        		include '../config/connection.php';
                        		$varsqlkelas = mysqli_query($connect,"SELECT * FROM tb_kelas");
                         		while ($resultkelas= mysqli_fetch_array($varsqlkelas)){
                      		 ?>
                          <?php if (empty($_GET['kelas'])) {
                          ?>
                          <option value="<?php echo $resultkelas['kelas_nama']?>"><?php echo $resultkelas['kelas_nama']?>
                          <?php
                          } else { 
                            $kelascbb = $_GET['kelas_nama'];
                            if ($kelascbb == $resultkelas['kelas_nama']) {
                              $selected = 'selected';
                            } else {
                              $selected = '';
                            }
                          ?>
                          <option value="<?php echo $resultkelas['kelas_nama']?>" <?php echo $selected?>><?php echo $resultkelas['kelas_nama']?>
                          <?php }?>
                        <?php } ?>
								</select>
							  </div>
						  </div>
						 </div>
					 <div class="col-lg-3">
						<div class="form-group" >
							<label>Pilih Mapel</label>
							  <div class="input-group">
								<div class="input-group-addon">
								  <i class="fa fa-user-o"></i>
								</div>
								<select class="form-control" name="mapel" id="filter">
									<option value="">-Pilih Mapel-</option>
								 <?php
                        		include '../config/connection.php';
                        		$varsqlmapel = mysqli_query($connect,"SELECT * FROM tb_mapel");
                         		while ($resultmapel= mysqli_fetch_array($varsqlmapel)){
                      		 ?>
                          <?php if (empty($_GET['mapel'])) {
                          ?>
                          <option value="<?php echo $resultmapel['mapel_nama']?>"><?php echo $resultmapel['mapel_nama']?>
                          <?php
                          } else { 
                            $mapelcbb = $_GET['mapel_nama'];
                            if ($mapelcbb == $resultmapel['mapel_nama']) {
                              $selected = 'selected';
                            } else {
                              $selected = '';
                            }
                          ?>
                          <option value="<?php echo $resultmapel['mapel_nama']?>" <?php echo $selected?>><?php echo $resultmapel['mapel_nama']?>
                          <?php }?>
                        <?php } ?>
								</select>
							  </div>
						  </div>
						 </div>
						</div>
						<div class="form-group row text-left">
                  <div class="col-lg-12">
                     <button class="btn btn-xs btn-primary" name="cari"/><i class="fa fa-search"></i> Tampilkan </button>
                     <button class="btn btn-xs btn-light" name="reset"/><a href="lap_nilai.php"><i class="fa fa-delete"></i> Reset Filter </a></button>
                    
                  </div>
            </div>
			</form>
		</div>
        </div>

		<div class="card">
        

			<table border="0px" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable" >
              <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Matapelajaran</th>
                    <th>KKM</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai PTS</th>
                    <?php if ($_GET['semester']=="Ganjil") {?>
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
                if (isset($_GET['cari'])) {
                $kelas 		   = $_GET['kelas'];
                $semester 	 = $_GET['semester'];
				        $ta 		     = $_GET['ta'];
				        $mapel 		   = $_GET['mapel'];

				echo '<h4 style="text-align:center;">Daftar Nilai '.$_GET['kelas'].'<br> Semester '.$_GET['semester'].' Tahun Ajaran '.$_GET['ta'].'</h4>';				
        echo '<center><h5>Mata Pelajaran : '.$_GET['mapel'].'</h5></center><hr>';
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<left><a class="btn btn-primary" target="_blank" href="cetak_lap_nilai.php?cari=&ta='.$_GET[ta].'&semester='.$_GET[semester].'&kelas='.$_GET[kelas].'&mapel='.$_GET[mapel].'""">Cetak</a><left>';

				$nilai = mysqli_query($connect, "SELECT tb_nilai.nilai_id, tb_nilai.nis, tb_siswa.nama_siswa, tb_nilai.kelas_id, tb_kelas.kelas_nama, tb_nilai.ta_id, tb_tahunajaran.ta_nama, tb_nilai.semester_id, tb_semester.semester, tb_nilai.mapel_id, tb_mapel.mapel_nama, tb_mapel.mapel_kkm, tb_nilai.nilai_tugas, tb_nilai.nilai_pts, tb_nilai.nilai_pas_pat, tb_nilai.status FROM tb_nilai JOIN tb_siswa ON tb_siswa.nis=tb_nilai.nis JOIN tb_kelas ON tb_kelas.kelas_id=tb_nilai.kelas_id JOIN tb_tahunajaran ON tb_tahunajaran.ta_id=tb_nilai.ta_id JOIN tb_semester ON tb_semester.semester_id=tb_nilai.semester_id JOIN tb_mapel ON tb_mapel.mapel_id=tb_nilai.mapel_id WHERE tb_kelas.kelas_nama='$kelas' AND tb_tahunajaran.ta_nama='$ta' AND tb_semester.semester='$semester' AND tb_mapel.mapel_nama='$mapel'");
				
				
				 }else{
				 	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Semua Daftar Nilai<hr>';

				 	$nilai = mysqli_query($connect, "SELECT tb_nilai.nilai_id, tb_nilai.nis, tb_siswa.nama_siswa, tb_nilai.kelas_id, tb_kelas.kelas_nama, tb_nilai.ta_id, tb_tahunajaran.ta_nama, tb_nilai.semester_id, tb_semester.semester, tb_nilai.mapel_id, tb_mapel.mapel_nama, tb_mapel.mapel_kkm, tb_nilai.nilai_tugas, tb_nilai.nilai_pts, tb_nilai.nilai_pas_pat, tb_nilai.status FROM tb_nilai JOIN tb_siswa ON tb_siswa.nis=tb_nilai.nis JOIN tb_kelas ON tb_kelas.kelas_id=tb_nilai.kelas_id JOIN tb_tahunajaran ON tb_tahunajaran.ta_id=tb_nilai.ta_id JOIN tb_semester ON tb_semester.semester_id=tb_nilai.semester_id JOIN tb_mapel ON tb_mapel.mapel_id=tb_nilai.mapel_id");
				 }

				$varTotal = mysqli_num_rows($nilai);
                  // jika data kurang dari 1
                if ($varTotal>0) { 
                while($data_nilai = mysqli_fetch_array($nilai)){
              ?>
              
         <tr>
		    <td><?php echo $no; ?></td>
		    <td><?php echo $data_nilai['nis']; ?></td>
		    <td><?php echo $data_nilai['nama_siswa']; ?></td>
		    <td><?php echo $data_nilai['mapel_nama']; ?></td>
		    <td><?php echo $data_nilai['mapel_kkm']; ?></td>
		    <td><input disabled type="number" min="0" name="tugas[]" style="width: 50px;" value="<?= $data_nilai['nilai_tugas']?>"  onkeyPress=""></td>
		    <td><input disabled type="number" min="0" name="pts[]"  style="width: 50px;" value="<?= $data_nilai['nilai_pts']?>" onKeyPress=""></td>
		    <td><input disabled type="number" min="0" name="pas[]"  style="width: 50px;" value="<?= $data_nilai['nilai_pas_pat']?>" onKeyPress=""></td>
			<td><?php echo number_format(($data_nilai['nilai_tugas'] + $data_nilai['nilai_pts'] + $data_nilai['nilai_pas_pat'] )/3, 2); ?>
			</td>
		</tr>
           <?php
                      $no++;}
                    }else{
                     ?> 
                     <tr> <!--muncul peringatan bahwa data tidak di temukan-->
                            <td colspan="8" align="center" style="padding:10px;"> Laporan Nilai Tidak Ditemukan</td>
                      </tr>
                      <?php
                     }
                      ?>
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